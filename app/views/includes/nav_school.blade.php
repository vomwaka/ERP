<style type="text/css">
.side {
    margin-left: 160px;
}

</style>

 <nav class="navbar-default navbar-static-side" id="wrap" role="navigation">
    
           


            <div class="sidebar-collapse">

                <ul class="nav" id="side-menu">

                    <li>
                        <a href="#"><i class="fa fa-tachometer fa-fw"></i>Administration <i class="fa fa-caret-down"></i></a>
                        <ul class="nav">
                            <li><a href="#"><i class="fa fa-credit-card fa-fw"></i>Admission </a>
                            <li><a href="#"><i class="fa fa-credit-card fa-fw"></i>Accounts</a>
                            <li><a href="#"><i class="fa fa-credit-card fa-fw"></i>Hostels</a> 
                            <li><a href="#"><i class="fa fa-barcode fa-fw"></i>Bus Routes</a> 
                        </ul>
                    </li> 

                    <li>
                        <a href="#"><i class="fa fa-home fa-fw"></i>Buildings/Blocks <i class="fa fa-caret-down"></i></a>
                        <ul class="nav">
                            <li>
                              <a href="#"><i class="fa fa-credit-card fa-fw"></i>Laboratories </a>
                            </li>
                            <li>
                              <a href="#"><i class="fa fa-credit-card fa-fw"></i>Buses</a>
                            </li>
                            <li>
                              <a href="#"><i class="fa fa-credit-card fa-fw"></i>Library</a>
                            </li>
                        </ul>
                    </li> 

                    <li>
                        <a href="#"><i class="fa fa-th fa-fw"></i>Department Information <i class="fa fa-caret-down"></i></a>
                        <ul class="nav">
                            <li>
                                <a href="#"><i class="fa fa-folder-open fa-fw"></i>Course</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-folder-open fa-fw"></i>Staff</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-folder-open fa-fw"></i>Infrastructure</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-folder-open fa-fw"></i>Syllabus</a>
                            </li>
                        </ul>
                    </li> 

                    <li>
                        <a href="#"><i class="fa fa-users fa-fw"></i>Staff Information <i class="fa fa-caret-down"></i></a>
                        <ul class="nav">
                            <li>
                                <a href="#"><i class="fa fa-folder-open fa-fw"></i>Profile</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-folder-open fa-fw"></i>Attendance</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-folder-open fa-fw"></i>Salary</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-folder-open fa-fw"></i>Feedback</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-folder-open fa-fw"></i>View Student Details</a>
                            </li>
                        </ul>
                    </li>
                    
                    <li>
                        <a href="#"><i class="fa fa-graduation-cap fa-fw"></i>Student Information <i class="fa fa-caret-down"></i></a>
                        <ul class="nav">
                            <li>
                                <a href="#"><i class="fa fa-folder-open fa-fw"></i>Profile</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-folder-open fa-fw"></i>Attendance</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-folder-open fa-fw"></i>Results</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-folder-open fa-fw"></i>Remarks</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-file fa-fw"></i>Examination Branch <i class="fa fa-caret-down"></i></a>
                        <ul class="nav">
                            <li>
                                <a href="#"><i class="fa fa-folder-open fa-fw"></i>Examination Form</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-folder-open fa-fw"></i>Results</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-folder-open fa-fw"></i>Attendance</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-folder-open fa-fw"></i>Schedule</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-folder-open fa-fw"></i>Seating Arrangement:</a>
                            </li>
                        </ul>
                    </li>
                    
                    <li>
                        <a href="#"><i class="fa fa-folder-open fa-fw"></i>Reports</a>
                    </li>
                   
                    
                </ul>

                <br><br>

                <!--<?php
                    $organization = Organization::find(Confide::user()->organization_id);
                    $pdate = (strtotime($organization->payroll_support_period)-strtotime(date("Y-m-d"))) / 86400;
                    ?>
                    @if($pdate<0 && $organization->payroll_license_key ==1)
                       <h4 style="color:red">
                       Your annual support license for payroll product has expired!!!....
                       Please upgrade your license by clicking on the link below.</h4>
                       <a href="{{ URL::to('activatedproducts') }}">Upgrade license</a>
                    @else
                    @endif-->
                <!-- /#side-menu -->
            </div>
            <!-- /.sidebar-collapse -->
        </nav>
        <!-- /.navbar-static-side -->
