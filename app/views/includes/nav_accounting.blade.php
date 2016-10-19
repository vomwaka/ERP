
 <nav class="navbar-default navbar-static-side" role="navigation" id="wrap">
           


            <div class="sidebar-collapse">

                <ul class="nav" id="side-menu">
                    
                    <li>
                        <a href="{{ URL::to('accounts') }}"><i class="glyphicon glyphicon-user fa-fw"></i> Chart of Accounts</a>
                    </li>

                    <li>
                        <a href="{{ URL::to('journals') }}"><i class="fa fa-barcode fa-fw"></i> Journal Entries</a>
                    </li>


                    <li>
                        <a href="{{ URL::to('journals/create') }}"><i class="fa fa-check fa-fw"></i> Add Journal Entry</a>
                    </li>
                    
                     <li>
                        <a href="{{ URL::to('bankAccounts') }}"><i class="fa fa-university fa-fw"></i> Banking</a>
                    </li>

                    <!--<li>
                        <a href="#"  >
                            <i class="fa fa-bank fa-lg"></i>  Bank Accounts <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="nav ">
                            <li>
                                <a href="{{ URL::to('maintenances') }}"><i class="fa fa-th fa-fw"></i>  Maintenance</a>
                            </li>
                            
                            
                            <li>
                                <a href="{{ URL::to('tests') }}"><i class="fa fa-list fa-fw"></i> Tests</a>
                            </li>
                            
                        </ul>
                    </li>-->

                    
                </ul>
                <!-- /#side-menu -->
            </div>
            <!-- /.sidebar-collapse -->
        </nav>
        <!-- /.navbar-static-side -->