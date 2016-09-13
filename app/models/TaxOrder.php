<?php

class TaxOrder extends \Eloquent {
/*
	use \Traits\Encryptable;
    

	protected $encryptable = [

		'allowance_name',
	];
	*/

	// Don't forget to fill this array
	public $table = "tax_orders";

	protected $fillable = [];

public function tax(){

		return $this->belongsTo('Tax');
	}
public function erporders(){

		return $this->hasMany('Erporder');
	}

}