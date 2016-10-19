<?php

Class BankAccount extends Eloquent{

	protected $table = 'bank_accounts';

	/**
	 * Validation Rules
	 */
	public static $rules = [
		'bnkName' => 'required',
		'acName' => 'required',
		'acNumber' => 'required',
	];

	/**
	 * Link with BankStatement
	 */
	public function bank_statement(){
		return $this->hasMany('BankStatement');
	}
}