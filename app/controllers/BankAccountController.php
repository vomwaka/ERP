<?php

class BankAccountController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$bnkAccount = DB::table('bank_accounts')
											->join('bank_statements','bank_accounts.id','=','bank_statements.bank_account_id')
											->where('bank_statements.stmt_month',date('m-Y'))
											->select('bank_accounts.*','bank_statements.bal_bd as bal_bd','bank_statements.stmt_month as stmt_month', 
												'bank_statements.created_at as stmt_date')
											->get();

		return View::make('banking.index', compact('bnkAccount'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('banking.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), BankAccount::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$bnkAccount = new BankAccount;

		$bnkAccount->bank_name = Input::get('bnkName');
		$bnkAccount->account_name = Input::get('acName');
		$bnkAccount->account_number = Input::get('acNumber');
		$bnkAccount->save();

		return Redirect::back()->withSuccess('Bank Account successfully added');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


	/**
	 * ============================================================================================
	 * UPLOAD BANK STATEMENTS (CSV file)
	 */
	public function uploadBankStatement(){
			$bnk_id = Input::get('bnk_id');
			$stmt_month = Input::get('stmt_month');
			$bal_bd = Input::get('bal_bd');

			if($bal_bd === ''){
					return Redirect::back()->withError('Please insert Bank Balance b/d');	
			}

			if(Input::hasFile('bknStatementCSV')){
					$csv_file = Input::file('bknStatementCSV');

					if($csv_file->isValid()){
							//$destination = public_path().'/migrations/';

							// Check if directory exists make sure it has correct permissions, if not make it
				      if (is_dir($destination = public_path().'/bankStatements/')) {
				          chmod($destination, 0777);
				      } else {
				          mkdir($destination, 0777, true);
				      }

				      //return $destination;
				      $fileName = 'bnkStatement';
				      $fileName = $fileName.'_'.$stmt_month;
				      //$fileName = $fileName.'_'.date('m-Y');
				      $ext = $csv_file->getClientOriginalExtension();
				      $file = $fileName.'.'.$ext;

				      if(file_exists($destination.$file)){
				      		return Redirect::back()->withError('File already exists!');	
				      } 

				      $moved_file = $csv_file->move($destination, $file);
				      $moved_file = $this->normalize($moved_file);

				      // INSERT BANK STATEMENT DATA TO DB
					  	$bnk_statement = new BankStatement;
					  	$bnk_statement->bank_account_id = $bnk_id;
					  	$bnk_statement->bal_bd = $bal_bd;
					  	$bnk_statement->stmt_month = $stmt_month;
					  	$bnk_statement->save();

					  	$lastInsertID = $bnk_statement->id;

				      // UPLOAD FILE CONTENTS TO DB
				      $this->importFileContents($moved_file,$lastInsertID);

				      return Redirect::back()->withSuccess('Transactions successfully uploaded!');	

					}	else{
							return Redirect::back()->withError('Please upload a valid csv file');	
					}
				
			} else{
					return Redirect::back()->withError('Please upload a valid csv file');
			}
	}


	protected function normalize($file_path) {
    //Load the file into a string
    $string = @file_get_contents($file_path);

    if (!$string) {
        return $file_path;
    }

    //Convert all line-endings using regular expression
    $string = preg_replace('~\r\n?~', "\n", $string);

    file_put_contents($file_path, $string);

    return $file_path;
  }

  /**
   * INSERT CSV DATA INTO DB
   */
  private function importFileContents($file_path, $lastInsertID) {

		  $query = sprintf("LOAD DATA LOCAL INFILE '%s' INTO TABLE stmt_transactions 
		      FIELDS TERMINATED BY ',' 
		      LINES TERMINATED BY '\\n' 
		      IGNORE 1 LINES
		      (@col1, @col2, @col3, @col4, @col5)
		      set bank_statement_id=$lastInsertID, transaction_date=@col1, description=@col2, ref_no=@col3, 
		      transaction_amnt=@col4, check_no=@col5, created_at=NOW(), updated_at=NOW()", 
		      addslashes($file_path));

		  return DB::connection()->getpdo()->exec($query);
	}

	/**=====================================================================================================**/


	/**
	 * GET THE RECONCILIATION PAGE
	 */
	public function showReconcile($id){
		$bnkAccount = DB::table('bank_accounts')
											->join('bank_statements','bank_accounts.id','=','bank_statements.bank_account_id')
											->where('bank_statements.stmt_month',date('m-Y'))
											->where('bank_accounts.id', $id)
											->select('bank_accounts.*','bank_statements.bal_bd as bal_bd','bank_statements.stmt_month as stmt_month', 
												'bank_statements.created_at as stmt_date')
											->first();

		$stmt_transactions = DB::table('stmt_transactions')
														->where('stmt_transactions.bank_statement_id', $id)
														->where('stmt_transactions.status', '<>', 'RECONCILED')
														->select('*')
														->get();

		return View::make('banking.createReconcile', compact('bnkAccount', 'stmt_transactions'));
	}

}
