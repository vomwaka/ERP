@extends('layouts.accounting')
@section('content')

<?php
	function asMoney($value) {
	  return number_format($value, 2);
	}
?>

<script type="text/javascript">
	$("input.date-picker").click(function(){
		$("#ui-datepicker-div").css("z-index",5000);    
	});
</script>

<style type="text/css" media="screen">
		table{
			color: #AAA;
		}
		thead{
			border: 1px solid #ddd;
		}
		thead tr th{
			background: #E1F5FE !important;
			color: #777;
			vertical-align: middle !important;
			padding: 0px 5px !important;
		}

		ul{
			text-align: left;
		}
		
		h4,h6{
			margin-bottom: 7px;
			margin-top: 7px;
		}

		h6{ color: #777; }

		tbody tr{
			text-align: center;
		}

</style>



<!--
BEGINNING OF PAGE
-->
<div class="row">
	<div class="col-lg-12">
  	<h4><font color='green'>Bank Accounts</font></h4>
		<hr>
	</div>	
</div>

<div class="row">
	<div class="col-lg-12">
		<a href="{{{ URL::to('bankAccounts/create') }}}" class="btn btn-info btn-sm"><i class="fa fa-plus fa-fw"></i>&nbsp; Add Bank Account</a>
		<hr>
	</div>

	<div class="col-lg-10">
		@if(isset($bnkAccount))
		@foreach($bnkAccount as $account)
			
			<table class="table table-bordered table-responsive">
				<thead>
					<tr>
						<th>
							<h4><font color="#0BAEED">{{ $account->account_name }}</font></h4>
							<h6>{{ $account->account_number }}</h6>
						</th>
						<th>

							<!-- ERROR MESSAGES -->
							@if (Session::has('error'))
					    <div class="alert alert-danger">
					        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					        {{ Session::get('error') }}<br>
					        {{ Session::forget('error') }}
					    </div>
					    @endif

							<!-- SUCCESS MESSAGE -->
					    @if(Session::has('success'))
							<div class="alert alert-success">
								<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					        {{ Session::get('success') }}<br>
					        {{ Session::forget('success') }}
					    </div>
					    @endif

						</th>
						<th style="text-align: right !important">
							<div class="btn-group dropdown pull-right">
	              <button class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
	                  Manage Account <span class="caret"></span>
	              </button>

	              <ul class="dropdown-menu dropdown-menu-left" role="menu">
	                  <li><a href="#uploadStatement" data-toggle="modal">Import Statement</a></li>
	                  <li><a href="{{ URL::to('bankAccounts/reconcile/'.$account->id) }}">Reconcile Account</a></li>
	                  <li><a href="">Reconciliation Report</a></li>
	              </ul>
	            </div>
						</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						@if($account->bal_bd !== '')
							<td>
								<h4><font color="#0BAEED">${{ asMoney($account->bal_bd) }}</font></h4>
								<h6>Bank Statement Balance</h6>
								<h6><strong>{{ date('M j, Y', strtotime($account->stmt_date)) }}</strong></h6>
							</td>
							<td style="border-left: 1px solid #ddd !important;">
								<h4><font color="#0BAEED">${{ asMoney(24000) }}</font></h4>
								<h6>Xara Statement Balance</h6>
								<h6><strong>{{ date('M j, Y', strtotime($account->stmt_date)) }}</strong></h6>
							</td>
							<td style="vertical-align: middle; border-left: 1px solid #ddd !important;">
								<a href="{{ URL::to('bankAccounts/reconcile/'.$account->id) }}" class="btn btn-success btn-sm">Reconcile Accounts</a>
							</td>
						@else
							<td colspan="1">
								<h4><font color="#0BAEED">${{ asMoney(0) }}</font></h4>
								<h6>Bank Statement Balance</h6>
								<h6><font color="#E74C3C">NO STATEMENT TRANSACTIONS UPLOADED FOR THIS MONTH YET</font></h6>
							</td>
							<td colspan="2" style="vertical-align: middle; border-left: 1px solid #ddd !important;">
								<a href="#uploadStatement" class="btn btn-success btn-sm" data-toggle="modal">Upload Bank Statement</a>
							</td>
						@endif
					</tr>
				</tbody>
			</table>
				<hr>

			<!-- BANK STATEMENT UPLOAD (INFO REQUIRED) MODAL -->
			<div  id="uploadStatement" class="modal fade">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<!--
							File upload form
						-->
						<form role="form" action="{{{ URL::to('bankAccounts/uploadStatement') }}}" method="POST" enctype="multipart/form-data">
							<input type="hidden" name="bnk_id" value="{{$account->id}}">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
									<span class="sr-only">Close</span>
								</button>
								<h4 class="modal-title"><font color="green">Upload Bank Statement (CSV Format)</font></h4>
							</div>
							<div class="modal-body">
								<h4>The following are the requirements for the bank statement:</h4>
								<p>
									&#45; It should be in a CSV(Comma Separated Values) format<br>
									&#45; The following fields should be included:
								</p>
								<div style="margin-left: 20px;">
									<p>
										&#10003; <strong>Date</strong> of transaction, format<strong>(YYYY-MM-DD)</strong>.<br>
										&#10003; <strong>Description</strong> of transaction.<br>
										&#10003; Transaction <strong>reference</strong> number (NOT mandatory).<br>
										&#10003; Transaction <strong>Amount</strong> (+ve if deposit, -ve if withdrawal).<br>
										&#10003; <strong>Cheque number</strong> if it exists.<br>
										&#10003; <font color="red"><strong>NB: The file should contain a header row (Containing column headings)</strong></font>
									</p>
								</div>
								<hr>
								<div style="background:#E1F5FE; padding: 10px;">
									<div class="form-group">
					            <label for="username">Statement Month</label>
					            <div class="right-inner-addon ">
					                <i class="glyphicon glyphicon-calendar"></i>
					                <input class="form-control input-sm datepicker2"  readonly="readonly" type="text" name="stmt_month" id="date" value="{{date('M-Y')}}">
					            </div>
					        </div>
									<div class="form-group">
											<label>Bank Balance b/d</label>
											<input class="form-control input-sm" type="text" name="bal_bd" placeholder="Bank Balance B/D">
									</div>
									<div class="form-group">
											<label>Upload Statement</label>
											<input type="file" class="btn btn-info btn-sm" name="bknStatementCSV">
									</div>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>&emsp;
								<input type="submit" class="btn btn-primary btn-sm" value="Upload File">
							</div>
						</form><!-- /.form -->
					</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
			</div><!-- /.modal -->
			<!-- END MODAL -->


		@endforeach

		@else
			<h4><font color='red'>No Bank Accounts Available!</font></h4>
		@endif<!-- 
		
		<table class="table table-bordered table-responsive">
			<thead>
				<tr>
					<th>
						<h4><font color="#0BAEED">Bank Account Name</font></h4>
						<h6>1237485961548</h6>
					</th>
					<th></th>
					<th style="text-align: right !important">
						<div class="btn-group dropdown pull-right">
		              <button class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
		                  Manage Account <span class="caret"></span>
		              </button>
		
		              <ul class="dropdown-menu dropdown-menu-left" role="menu">
		                  <li><a href="#uploadStatement" data-toggle="modal">Import Statement</a></li>
		                  <li><a href="{{ URL::to('bankAccounts/reconcile/4') }}">Reconcile Account</a></li>
		                  <li><a href="">Reconciliation Report</a></li>
		              </ul>
		            </div>
					</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					@if(true)
						<td>
							<h4><font color="#0BAEED">${{ asMoney(25000) }}</font></h4>
							<h6>Bank Statement Balance</h6>
							<h6>March 6, 2016</h6>
						</td>
						<td style="border-left: 1px solid #ddd !important;">
							<h4><font color="#0BAEED">${{ asMoney(24000) }}</font></h4>
							<h6>Xara Statement Balance</h6>
							<h6>March 1, 2016</h6>
						</td>
						<td style="vertical-align: middle; border-left: 1px solid #ddd !important;">
							<a href="{{ URL::to('bankAccounts/reconcile/4') }}" class="btn btn-success btn-sm">Reconcile Accounts</a>
						</td>
					@else
						<td colspan="1">
							<h4><font color="#0BAEED">${{ asMoney(0) }}</font></h4>
							<h6>Bank Statement Balance</h6>
							<h6><font color="#E74C3C">NO STATEMENT TRANSACTIONS UPLOADED FOR THIS MONTH YET</font></h6>
						</td>
						<td colspan="2" style="vertical-align: middle; border-left: 1px solid #ddd !important;">
							<a href="#uploadStatement" class="btn btn-success btn-sm" data-toggle="modal">Upload Bank Statement</a>
						</td>
					@endif
				</tr>
			</tbody>
		</table>
			<hr> -->
	</div>
</div>


@stop

