<?php

Class BankStatement extends Eloquent{

	protected $table = 'bank_statements';

	/**
	 * Link with BankAcount
	 */
	public function bank_account(){
		return $this->belongsTo('BankAccount');
	}

	/**
	 * Link with Bank Statement Transactions
	 */
	public function stmt_transaction(){
		return $this->hasMany('StmtTransaction');
	}
}