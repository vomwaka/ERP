<?php
	function asMoney($value){
		return number_format($value, 2);
	}
?>

@extends('layouts.accounting')
@section('content')

<style type="text/css" media="screen">
	hr{
		border-color: #fff !important;
	}	
</style>

<div class="row">
	<div class="col-lg-12">
		<h4><font color="green">Add New Asset</font></h4>
	</div>
</div>

<div class="row">
	<div class="col-lg-12" style="background: #E1F5FE">
		<form class="form-inline" role="form" action="{{ URL::to('assetManagement') }}" method="POST">
			<h4 style="color: #0BAEED">Asset Details</h4><hr>
			<div class="form-group">
				<label>Asset Name: </label><br>
				<input type="text" class="form-control input-sm" name="assetName" placeholder="Asset Name" style="width: 300px">
			</div>&emsp;

			<div class="form-group">
				<label>Asset Number: </label><br>
				<input type="text" class="form-control input-sm" name="assetNumber" value="" style="width: 250px">
			</div><br><br>

			<div class="form-group">
				<label>Purchase Date: </label>
				<div class="right-inner-addon ">
					<i class="fa fa-calendar"></i>
					<input type="text" class="form-control datepicker21 input-sm" readonly="readonly" name="purchaseDate" value="{{date('Y-m-d')}}" style="width: 200px">
				</div>
			</div>&emsp; 

			<div class="form-group">
				<label>Purchase Price: </label><br>
				<div class="input-group" style="width: 150px">
					<span class="input-group-addon">KES</span>
					<input type="text" class="form-control input-sm" name="purchasePrice" placeholder="{{ asMoney(0) }}" style="width: 200px">
				</div>
			</div>&emsp;

			<div class="form-group">
				<label>Warranty Expiry: </label><br>
				<div class="right-inner-addon ">
					<i class="fa fa-calendar"></i>
					<input type="text" class="form-control datepicker21 input-sm" readonly="readonly" name="warrantyExpiry" value="{{date('Y-m-d', strtotime('+1 year'))}}" style="width: 200px">
				</div>
			</div>&emsp;

			<div class="form-group">
				<label>Serial Number: </label><br>
				<input type="text" class="form-control input-sm" name="serialNumber" placeholder="Serial Number">
			</div><br><br>

			<div class="form-group">
				<label>Asset Type</label><br>
				<select class="form-control input-sm" name="assetType" style="width: 300px">
					<option value="">-- No Asset type available --</option>
				</select>
			</div><br><br>
			<hr><!-- ===================================== -->

			<h4 style="color: #0BAEED">Book Value</h4><hr>
			<div class="form-group">
				<label>Depreciation Start Date: </label><br>
				<div class="right-inner-addon ">
					<i class="fa fa-calendar"></i>
					<input type="text" class="form-control datepicker21 input-sm" readonly="readonly" name="depreciationStartDate" value="{{date('Y-m-d')}}" style="width: 200px">
				</div>
			</div><br><br>

			<div class="form-group">
				<label>Depreciation Method</label><br>
				<select class="form-control input-sm" name="depreciationMethod" style="width: 300px">
					<option value="">-- No Depreciation --</option>
					<option value="">Straight-Line Method</option>
					<option value="">Sum of Years Digits</option>
					<option value="">-- No Depreciation --</option>
				</select>
			</div>&emsp;

			<div class="form-group">
				<label>Averaging Method</label><br>
				<select class="form-control input-sm" name="averagingMethod" style="width: 300px">
					<option value=""></option>
				</select>
			</div><br><br>

			<div class="form-group">
				<label>Rate(%): </label><br>
				<input type="radio" class="form-control input-sm" name="method" checked>
				<input type="text" class="form-control input-sm" name="rate" placeholder="{{ asMoney(0) }}" style="width: 150px"> 
			</div>&emsp;

			<div class="form-group">
				<label>Effective Life Years: </label><br>
				<input type="radio" class="form-control input-sm" name="method">
				<input type="text" class="form-control input-sm" name="lifeYears" placeholder="" style="width: 150px"> 
			</div><hr>
			
			<div class="col-lg-12 form-group text-right">
				<a href="{{ URL::to('assetManagement') }}" class="btn btn-danger btn-sm">Cancel</a>&emsp;&emsp;
				<input type="submit" class="btn btn-primary btn-sm" name="btnSubmit" value="Register">
			</div><br><hr>

		</form>
	</div>
</div>

@stop