@extends('layouts.system')
@section('content')
<br/><br/><br/><br/>

<div class="row">
	<div class="col-lg-1">



</div>	

<div class="col-lg-3">

{{ HTML::image("images/OMWAKS.png", "Logo") }}


</div>	


<div class="col-lg-5 ">

	<table class="table table-bordered table-condensed">

												  				<tr>

																	<td>System</td><td>OMWAKS FINANCIAL ERP </td>
																</tr>
																<tr>

																	<td>Version</td><td>v1.0.0</td>
																</tr>

																<tr>

																	<td>Licensed To</td><td>{{Organization::getOrganizationName()}}</td>
																</tr>
																

																
																

															</table>



</div>	



</div>


@stop