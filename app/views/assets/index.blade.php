<?php
	function asMoney($value){
		return number_format($value, 2);
	}
?>

@extends('layouts.accounting')
@section('content')

<div class="row">
	<div class="col-lg-12">
		<h4><font color="green">Fixed Assets</font></h4>
		<hr>
	</div>
</div>

<div class="row">	
	<!-- QUICK LINK BUTTONS -->
	<div class="col-lg-12">
		<a href="{{ URL::to('assetManagement/create') }}" class="btn btn-info btn-sm"><i class="fa fa-plus fa-fw"></i> New Asset</a>&emsp;
		<a href="" class="btn btn-warning btn-sm"> Run Depreciation</a>&emsp;
		<hr>
	</div><!-- ./END -->

	<!-- FIXED ASSETS BODY SECTION -->
	<div class="col-lg-12">
		<!-- TAB LINKS -->
		<ul class="nav nav-tabs">
			<li class="active"><a data-toggle="tab" href="#registeredAssets">Registered ()</a></li>
			<li><a data-toggle="tab" href="#soldDisposedAssets">Sold & Disposed ()</a></li>
		</ul>

		<!-- TAB CONTENT -->
		<div class="tab-content">
			<!-- REGISTERED ASSETS -->
			<div id="registeredAssets" class="tab-pane fade in active">
				<table class="table table-condensed table-bordered table-responsive table-hover users">
					<thead>
						<tr>
							<th>#</th>
							<th>Asset Name</th>
							<th>Asset Number</th>
							<th>Asset Type</th>
							<th>Purchase Date</th>
							<th>Purchase Price</th>
							<th>Book Value</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>{{ 1 }}</td>
							<td>LCD Display</td>
							<td>SC-005</td>
							<td>Computer</td>
							<td>{{ date('M d, Y') }}</td>
							<td>{{ asMoney(22000) }}</td>
							<td>{{ asMoney(19589.25) }}</td>
							<td>
								<div class="btn-group pull-right"> 
									<button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
										Action <i class="fa fa-caret-down fa-fw"></i>
									</button>
									<ul class="dropdown-menu" role="menu"> 
										<li><a href="{{ URL::to('assetManagement/2') }}">View</a></li>
										<li><a href="{{ URL::to('assetManagement/2/edit') }}">Edit</a></li>
										<li><a href="{{ URL::to('assetManagement/dispose/2') }}">Dispose</a></li>
										<li><a href="{{ URL::to('assetManagement/delete/2') }}" onclick="return (confirm('Are you sure you want to delete this item?'))">Delete</a></li>
									</ul>
								</div>
							</td>
						</tr>
					</tbody>
				</table>
			</div><!-- ./End of registered assets -->
			
			<!-- SOLD/DISPOSED ASSETS -->
			<div id="soldDisposedAssets" class="tab-pane fade in">
				
			</div><!-- ./End of disposed assets -->
		</div><!-- ./End of tab cotent -->

	</div><!-- ./End of body section -->

</div>

@stop