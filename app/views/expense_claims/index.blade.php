<?php 
	function asMoney($value){
		return number_format($value, 2);
	}
?>

@extends('layouts.accounting')
@section('content')

<div class="row">
	<div class="col-lg-12">
		<h4><font color="green">Expense Claims</font></h4>
		<hr>
	</div>
</div>


<!-- BODY SECTION -->
<div class="row">
	<div class="col-lg-12">
		<!-- TAB LINKS -->
		<ul class="nav nav-tabs">
			<li class="active"><a data-toggle="tab" href="#currentClaims">Current Claims</a></li>
			<li><a data-toggle="tab" href="#awaitingAuthorization">Awaiting Authorization</a></li>
			<li><a data-toggle="tab" href="#awaitingPayment">Awaiting Payment</a></li>
		</ul>

		<!-- TAB CONTENT -->
		<div class="tab-content">

			<!-- CURRENT CLAIMS TAB -->
			<div id="#currentClaims" class="tab-pane fade in active">
				<hr>
					<a href="" class="btn btn-primary btn-sm"><i class="fa fa-plus-square fa-fw"></i> Add Receipt</a>&emsp;
					<a href="" class="btn btn-warning btn-sm"><i class="fa fa-paper-plane fa-fw"></i> Submit for Approval</a>
				<hr>

				<table class="table table-condensed table-bordered table-responsive table-hover">
					<thead>
						<tr>
							<th>Receipt</th>
							<th>Receipt From</th>
							<th>Receipt Date</th>
							<th>Date Entered</th>
							<th>Items</th>
							<th>Status</th>
							<th>Amount</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Receipt</td>
							<td>Receipt From</td>
							<td>Receipt Date</td>
							<td>Date Entered</td>
							<td>Items</td>
							<td>Status</td>
							<td>Amount</td>
						</tr>
					</tbody>
				</table>
			</div><!-- ./END OF CURRENT CLAIMS -->


			<!-- AWAITING AUTHORIZATION -->
			<div id="#currentClaims" class="tab-pane fade in active">
				
			</div><!-- ./AWAITING AUTHORIZATION -->


			<!-- AWAITING PAYMENT -->
			<div id="#currentClaims" class="tab-pane fade in active">
				
			</div><!-- ./AWAITING PAYMENT -->

		</div>
	</div>
</div>


@stop