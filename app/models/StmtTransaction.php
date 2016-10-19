<?php 

class StmtTransaction extends Eloquent{

	protected $table = 'stmt_transactions';

	/**
	 * Link with BankStatement
	 */
	public function bank_transaction(){
		return $this->belongsTo('BankStatement');
	}
}