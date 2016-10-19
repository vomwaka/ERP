@extends('layouts.accounting')
@section('content')

<?php
	function asMoney($value) {
	  return number_format($value, 2);
	}
?>

<style type="text/css" media="screen">
		h4,h6{
			margin-bottom: 7px;
			margin-top: 7px;
		}	

		h6{ color: #777; }

		hr{
			margin: 15px 0;
		}

		.bal{
			width: auto;
			display: inline-block;
			margin: 10px 0; 
			padding: 0 10px;
			text-align: center;
		}

		.tab-pane{
			padding-top: 15px;
		}

		table.recon > thead tr th{
			border-bottom: 1px solid #ddd !important; 
			text-align: center;
		}
		
		table.recon tbody tr td{
			vertical-align: middle !important;
		}

		table.recon tbody tr td{
			border-bottom: 1px solid #ddd !important;
		}

		table.bord{
			width: 100%;
			table-layout: fixed;
			margin: 7px 0;
		}
		
		table.bord .bnk_stmt{ background: #ECEFF1 }
		table.bord .gl_stmt{ background: #FBFBFB }

		table.bord tr td{	border: 1px solid #ddd !important; }
		
		td.cnter, th.cnter{
			text-align: center;
			vertical-align: middle !important;
		}
		
		table.hdr{
			margin-top: 10px;
			background: #E1F5FE !important;
			font-weight: 500;
			border-bottom: none;
		}

		tr.hder{
			background: #E1F5FE;
		}

</style>

<!--
BEGINNING OF PAGE
-->
<div class="row">
	<div class="col-lg-12">
		<h4><font color='green'>Bank Reconciliation</font></h4>
		<hr>
	</div>
	<div class="col-lg-12">
		@if(isset($bnkAccount))

			<div class="col-lg-12" style="margin-top: 0; background: #E1F5FE !important;">
				<div class="bal">
					<h4><font color="#0BAEED">{{ $bnkAccount->account_name }}</font></h4>
					<h6>{{ $bnkAccount->account_number }}</h6>
				</div>
				<div class="bal" style="border-left: 1px solid #ddd !important;">
					<h4><font color="#0BAEED">{{ $bnkAccount->bank_name }}</font></h4>
					<h6>Bank Name</h6>
				</div>
			</div>
			<div class="col-lg-12" style="background: #fbfbfb; border-bottom: 1px solid #ddd;">
				<div class="bal">
					<h4><font color="#0BAEED">${{ asMoney($bnkAccount->bal_bd) }}</font></h4>
					<h6>Bank Statement Balance</h6>
				</div>
				<div class="bal" style="border-left: 1px solid #ddd !important;">
					<h4><font color="#0BAEED">${{ asMoney(0) }}</font></h4>
					<h6>Xara Statement Balance</h6>
				</div>
			</div>

		@endif
	</div>
		
	<!--
		TAB-LINKS
	-->
	<div class="col-lg-12" style="background: ">
		<br><br>
		<ul class="nav nav-tabs">
			<li class="active"><a data-toggle="tab" href="#reconcile">Reconcile</a></li>
			<li><a data-toggle="tab" href="#bnkStmt">Bank Statements</a></li>
			<li><a data-toggle="tab" href="#acTransact">Account Transactions</a></li>
		</ul>

	
		<div class="tab-content">
			<!--
				RECONCILIATION TAB
			-->
			<div id="reconcile" class="tab-pane fade in active">
				<table class="table table-bordered recon">
					<thead>
						<tr>
							<th></th>
							<th><font color="#44B78B">Review Your Bank Statements&hellip;</font></th>
							<th class="cnter"><a href="" class="btn btn-success btn-sm">Approve All</a></th>
							<th><font color="#44B78B">&hellip;And match them against your GL(Cash Book)</font></th>
						</tr>
					</thead>
					<tbody>
						<!-- Transactions -->
						<?php $count=1; ?> 
							<col width="3%" />
							<col width="44.5%" />
					    <col width="8%" />
					    <col width="44.5%" />
						<tr class="hder">
							<td></td>
							<td>
								<table class="table hdr"> 
										<col width="20%" />
								    <col width="40%" />
								    <col width="20%" />
								    <col width="20%" />
									<tr>
										<td>Date</td>
										<td>Transaction description</td>
										<td>Debit</td>
										<td>Credit</td>
									</tr>
								</table>
							</td>
							<td class="cnter">
								<a href="" class="btn btn-success btn-circle"><i class="glyphicon glyphicon-ok"></i></a>&emsp;
								<a href="" class="btn btn-danger btn-circle"><i class="glyphicon glyphicon-remove"></i></a>
							</td>
							<td>
								<table class="table hdr"> 
										<col width="20%" />
								    <col width="40%" />
								    <col width="20%" />
								    <col width="20%" />
									<tr>
										<td>Date</td>
										<td>Transaction description</td>
										<td>Debit</td>
										<td>Credit</td>
									</tr>
								</table>
							</td>
						</tr>
						<!-- /.end of transactions header -->

						@if(count($stmt_transactions))
						@foreach($stmt_transactions as $strans)
							
							<!-- Transactions -->
							<tr>
								<td>{{ $count }}</td>
								<td>
									<table class="table bord"> 
											<col width="20%" />
									    <col width="40%" />
									    <col width="20%" />
									    <col width="20%" />
										<tr class="bnk_stmt">
											<td>{{ $strans->transaction_date }}</td>
											<td >{{ $strans->description }}</td>
											@if($strans->transaction_amnt < 0)
												<td>{{ asMoney(ltrim($strans->transaction_amnt, '-')) }}</td>
												<td></td>
											@else
												<td></td>
												<td>{{ asMoney($strans->transaction_amnt) }}</td>
											@endif
										</tr>
									</table>
								</td>
								<td class="cnter">
									<a href="" class="btn btn-success btn-circle"><i class="glyphicon glyphicon-ok"></i></a>&emsp;
									<a href="" class="btn btn-danger btn-circle"><i class="glyphicon glyphicon-remove"></i></a>
								</td>
								<td>
									<table class="table bord"> 
											<col width="20%" />
									    <col width="40%" />
									    <col width="20%" />
									    <col width="20%" />
										<tr class="gl_stmt">
											<td>Date</td>
											<td>Transaction description</td>
											<td>Debit</td>
											<td>Credit</td>
										</tr>
									</table>
								</td>
							</tr>
							<!-- /.end of transactions -->
							<?php $count++ ?>

						@endforeach
						@endif

					</tbody>
				</table>
			</div>

			<!--
				BANK STATEMENTS TAB
			-->
			<div id="bnkStmt" class="tab-pane fade">
				fbvjlbdj
			</div>

			<!--
	 			ACCOUNT TRANSACTIONS
			-->
			<div id="acTransact" class="tab-pane fade">
				jdfblvhdb
			</div>
		</div>
		
	</div>

</div>

@stop