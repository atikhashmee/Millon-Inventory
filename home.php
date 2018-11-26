
<?php 
    
 include 'files/header.php';
 include 'files/menu.php';
?>


       
            <div class="container">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="btn-group pull-right">
                                <ol class="breadcrumb hide-phone p-0 m-0">
                                    <li class="breadcrumb-item"><a href="#">Upcube</a></li>
                                    <li class="breadcrumb-item active">Dashboard</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Dashboard</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->


                <div class="row">
                    <div class="col-md-6 col-xl-3">
                        <div class="mini-stat clearfix bg-white">
                            <span class="mini-stat-icon bg-light"><i class="mdi mdi-cart-outline text-danger"></i></span>
                            <div class="mini-stat-info text-right text-muted">
                      <span class="counter text-danger"><?=number_format((float)$fn->myCashBalance(),2,'.',',')?></span>
                                Cash 
                            </div>
                            <!-- <p class="mb-0 m-t-20 text-muted">Total income: $22506 <span class="pull-right"><i class="fa fa-caret-up m-r-5"></i>10.25%</span></p> -->
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3">
                        <div class="mini-stat clearfix bg-success">
                            <span class="mini-stat-icon bg-light"><i class="mdi mdi-currency-usd text-success"></i></span>
                            <div class="mini-stat-info text-right text-white">
                                <span class="counter text-white"><?=$fn->mySale()[0]?></span>
                                Total Sell
                            </div>
                            <p class="mb-0 m-t-20 text-light">Total income: <?=$fn->mySale()[1]?> </p>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3">
                        <div class="mini-stat clearfix bg-white">
                            <span class="mini-stat-icon bg-light"><i class="mdi mdi-cube-outline text-warning"></i></span>
                            <div class="mini-stat-info text-right text-muted">
                                <span class="counter text-warning">5210</span>
                                New Users
                            </div>
                            <p class="mb-0 m-t-20 text-muted">Total income: $22506 <span class="pull-right"><i class="fa fa-caret-up m-r-5"></i>10.25%</span></p>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3">
                        <div class="mini-stat clearfix bg-info">
                            <span class="mini-stat-icon bg-light"><i class="mdi mdi-currency-btc text-info"></i></span>
                            <div class="mini-stat-info text-right text-light">
                                <span class="counter text-white">20544</span>
                                Unique Visitors
                            </div>
                            <p class="mb-0 m-t-20 text-light">Total income: $22506 <span class="pull-right"><i class="fa fa-caret-up m-r-5"></i>10.25%</span></p>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <h4 class="mt-0 header-title">Email Sent</h4>

                                <ul class="list-inline widget-chart m-t-20 text-center">
                                    <li>
                                        <h4 class=""><b>3652</b></h4>
                                        <p class="text-muted m-b-0">Marketplace</p>
                                    </li>
                                    <li>
                                        <h4 class=""><b>5421</b></h4>
                                        <p class="text-muted m-b-0">Last week</p>
                                    </li>
                                    <li>
                                        <h4 class=""><b>9652</b></h4>
                                        <p class="text-muted m-b-0">Last Month</p>
                                    </li>
                                </ul>

                                <div id="morris-area-example" style="height: 300px"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <h4 class="mt-0 header-title">Revenue</h4>

                                <ul class="list-inline widget-chart m-t-20 text-center">
                                    <li>
                                        <h4 class=""><b>5248</b></h4>
                                        <p class="text-muted m-b-0">Marketplace</p>
                                    </li>
                                    <li>
                                        <h4 class=""><b>321</b></h4>
                                        <p class="text-muted m-b-0">Last week</p>
                                    </li>
                                    <li>
                                        <h4 class=""><b>964</b></h4>
                                        <p class="text-muted m-b-0">Last Month</p>
                                    </li>
                                </ul>

                                <div id="morris-bar-example" style="height: 300px"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="col-xl-8">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <h4 class="mt-0 m-b-15 header-title">Recent Candidates</h4>

                                <div class="table-responsive">
                                    <table class="table table-hover mb-0">
                                        <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Status</th>
                                            <th>Age</th>
                                            <th>Start date</th>
                                            <th>Salary</th>
                                        </tr>

                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td>Tiger Nixon</td>
                                            <td>System Architect</td>
                                            <td><span class="badge badge-info">Active</span></td>
                                            <td>61</td>
                                            <td>2011/04/25</td>
                                            <td>$320,800</td>
                                        </tr>
                                        <tr>
                                            <td>Garrett Winters</td>
                                            <td>Accountant</td>
                                            <td><span class="badge badge-info">Active</span></td>
                                            <td>63</td>
                                            <td>2011/07/25</td>
                                            <td>$170,750</td>
                                        </tr>
                                        <tr>
                                            <td>Ashton Cox</td>
                                            <td>Junior Technical Author</td>
                                            <td><span class="badge badge-info">Active</span></td>
                                            <td>66</td>
                                            <td>2009/01/12</td>
                                            <td>$86,000</td>
                                        </tr>
                                        <tr>
                                            <td>Cedric Kelly</td>
                                            <td>Senior Javascript Developer</td>
                                            <td><span class="badge badge-default">Deactive</span></td>
                                            <td>22</td>
                                            <td>2012/03/29</td>
                                            <td>$433,060</td>
                                        </tr>
                                        <tr>
                                            <td>Airi Satou</td>
                                            <td>Accountant</td>
                                            <td><span class="badge badge-info">Active</span></td>
                                            <td>33</td>
                                            <td>2008/11/28</td>
                                            <td>$162,700</td>
                                        </tr>
                                        <tr>
                                            <td>Brielle Williamson</td>
                                            <td>Integration Specialist</td>
                                            <td><span class="badge badge-info">Active</span></td>
                                            <td>61</td>
                                            <td>2012/12/02</td>
                                            <td>$372,000</td>
                                        </tr>

                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <h4 class="mt-0 header-title">Monthly Earnings</h4>

                                <ul class="list-inline widget-chart m-t-20 text-center">
                                    <li>
                                        <h4 class=""><b>3654</b></h4>
                                        <p class="text-muted m-b-0">Marketplace</p>
                                    </li>
                                    <li>
                                        <h4 class=""><b>954</b></h4>
                                        <p class="text-muted m-b-0">Last week</p>
                                    </li>
                                    <li>
                                        <h4 class=""><b>8462</b></h4>
                                        <p class="text-muted m-b-0">Last Month</p>
                                    </li>
                                </ul>

                                <div id="morris-donut-example" style="height: 265px"></div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- end row -->

            </div> <!-- end container -->
       
    
    <?php 
        include 'files/footer.php';
    ?>
