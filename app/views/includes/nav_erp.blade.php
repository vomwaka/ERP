
<style type="text/css">
#wrap{
    margin-top: 50px !important;
    position: fixed;
    top: 0;
    border-radius: 0 0 0.5em 0.5em;
}
</style>

 <nav class="navbar-default navbar-static-side" id="wrap" role="navigation">
    
           


            <div class="sidebar-collapse">

                <ul class="nav" id="side-menu">

                 

                  <li>
                    <a href="{{ URL::to('items') }}"><i class="glyphicon glyphicon-barcode fa-fw"></i> Items</a>
                  </li>

                  <li>
                    <a href="{{ URL::to('clients') }}"><i class="glyphicon glyphicon-user fa-fw"></i> Clients / Supplier</a>
                  </li>  

                  <li>
                    <a href="{{ URL::to('expenses') }}"><i class="glyphicon glyphicon-list fa-fw"></i> Expenses</a>
                  </li> 
               
                  <li>
                    <a href="{{ URL::to('salesorders') }}"><i class="glyphicon glyphicon-list fa-fw"></i> Sales Orders</a>
                  </li>
                        
                  <li>
                    <a href="{{ URL::to('purchaseorders') }}"><i class="glyphicon glyphicon-list fa-fw"></i>  Purchase Orders</a>
                  </li>

                  <li>
                    <a href="{{ URL::to('quotationorders') }}"><i class="glyphicon glyphicon-list fa-fw"></i> Quotation</a>
                  </li>
                
                 <!--  <li>
                    <a href="{{ URL::to('account') }}"><i class="fa fa-tasks fa-fw"></i>  Accounts</a>
                  </li> -->
                  
                  <li>
                    <a href="{{ URL::to('paymentmethods') }}"><i class="fa fa-tasks fa-fw"></i>  Payment Methods</a>
                  </li>
                        
                  <li>
                    <a href="{{ URL::to('payments') }}"><i class="glyphicon glyphicon-list fa-fw"></i>  Payments</a>
                  </li>
                
                  <li>
                    <a href="{{ URL::to('stocks') }}"><i class="glyphicon glyphicon-random fa-fw"></i>  Stock</a>
                  </li>

                  <li>
                    <a href="{{ URL::to('locations') }}"><i class="glyphicon glyphicon-home fa-fw"></i>  Stores</a>
                  </li>   

                  <li>
                    <a href="{{ URL::to('taxes') }}"><i class="glyphicon glyphicon-list fa-fw"></i> Taxes</a>
                  </li> 

                  <li>
                    <a href="{{ URL::to('erpReports') }}"><i class="glyphicon glyphicon-folder-open fa-fw"></i>  Reports</a>
                  </li>   


                    
                    
                </ul>
                <!-- /#side-menu -->
            </div>
            <!-- /.sidebar-collapse -->
        </nav>
        <!-- /.navbar-static-side -->
