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

		table.bord{
			width: 100%;
			margin: 10px 0;
		}
		
		table.bord .bnk_stmt{ background: #FBFBFB }
		table.bord .gl_stmt{ background: #E1F5FE }

		table.bord tr td{	border: 1px solid #ddd !important; }
		
		td.cnter, th.cnter{
			text-align: center;
			vertical-align: middle !important;
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
		<div class="col-lg-12" style="margin-top: 0; background: #E1F5FE !important;">
			<h4><font color="#0BAEED">Bank Account Name</font></h4>
			<h6>1237485961548</h6>
		</div>
		<div class="col-lg-12" style="background: #fbfbfb; border-bottom: 1px solid #ddd;">
			<div class="bal">
				<h4><font color="#0BAEED">${{ asMoney(25000) }}</font></h4>
				<h6>Bank Statement Balance</h6>
			</div>
			<div class="bal" style="border-left: 1px solid #ddd !important;">
				<h4><font color="#0BAEED">${{ asMoney(0) }}</font></h4>
				<h6>Xara Statement Balance</h6>
			</div>
		</div>
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
							<th><font color="#44B78B">Review Your Bank Statements&hellip;</font></th>
							<th class="cnter"><a href="" class="btn btn-success btn-sm">Approve All</a></th>
							<th><font color="#44B78B">&hellip;And match them against your GL(Cash Book)</font></th>
						</tr>
					</thead>
					<tbody>
						<!-- Transactions -->
						<tr>
							<td>
								<table class="table bord"> 
									<tr class="bnk_stmt">
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
								<table class="table bord"> 
									<tr class="gl_stmt">
										<td>Date</td>
										<td>Transaction description</td>
										<td>Debit</td>
										<td>Credit</td>
									</tr>
								</table>
							</td>
						</tr>
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