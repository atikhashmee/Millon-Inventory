
<?php 
 include 'files/header.php';
 include 'files/menu.php';



?>



<style>
    /* homepage style css codes are written here */

    .description{
        font-size: 15px;
    }
    /* Tabs*/
section {
    padding: 60px 0;
}

section .section-title {
    text-align: center;
    color: #007b5e;
    margin-bottom: 50px;
    text-transform: uppercase;
}
#tabs{
    background: #007b5e;
    color: #eee;
}
#tabs h6.section-title{
    color: #eee;
}

#tabs .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
    color: #f3f3f3;
    background-color: transparent;
    border-color: transparent transparent #f3f3f3;
    border-bottom: 4px solid !important;
    font-size: 20px;
    font-weight: bold;
}
#tabs .nav-tabs .nav-link {
    border: 1px solid transparent;
    border-top-left-radius: .25rem;
    border-top-right-radius: .25rem;
    color: #eee;
    font-size: 20px;
}
</style>

       
            <div class="container">

                <!-- Page-Title -->
                <!-- <div class="row">
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
                </div> -->
                <!-- end page title end breadcrumb -->


                <!-- <div class="row">
                    <div class="col-md-6 col-xl-3">
                        <div class="mini-stat clearfix bg-white">
                            <span class="mini-stat-icon bg-light"><i class="mdi mdi-cart-outline text-danger"></i></span>
                            <div class="mini-stat-info text-right text-muted">
                      <span class="counter text-danger"><?=number_format((float)$fn->myCashBalance(),2,'.',',')?></span>
                                Cash 
                            </div>
                            <p class="mb-0 m-t-20 text-muted">Total income: $22506 <span class="pull-right"><i class="fa fa-caret-up m-r-5"></i>10.25%</span></p>
                        </div>
                    </div>
                    <div class="col-md-6 col-xl-3">
                        <div class="mini-stat clearfix bg-success">
                            <span class="mini-stat-icon bg-light"><i class="mdi mdi-currency-usd text-success"></i></span>
                            <div class="mini-stat-info text-right text-white">
                                <span class="counter text-white">
                                    <?=$fn->mySale()[0]?>
                                        
                                    </span>
                                Total Sell
                            </div>
                            <p class="mb-0 m-t-20 text-light">
                                Total income:
                             <?=$fn->mySale()[1]?> 
                         </p>
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
                </div> -->
                <!-- start of cash report -->
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col"></div>
                                    <div class="col">
                                        <h4>Bismillahir Rahmanir Rahim</h4>
                                        <h5>Today : <?=date('l',strtotime(date('Y-m-d')))?> </h5>
                                        <h5>Date : <?=$df->format('F j, Y, g:i a')?></h5>

                                        <?php 

                                  // echo $df->format("Y-m-d");
                         $data = cashReport($df->format('Y-m-d'));
                                        ?>
                                    </div>
                                    <div class="col"></div>
                                </div>

        <div class="table-responsive">                         
        <table style="width: 100%" border="1" id="datatable">
         <thead>
            <tr>
               <th>#</th>
               <th>Descrioption</th>
               <th>Credit</th>
               <th>Debit</th>
               <th>Balance</th>
            </tr>
         </thead>
         <tbody>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td>Pre cash</td>
                <td><?=datewiseCashBalance($df->sub(new DateInterval('P1D'))->format('Y-m-d'))?></td>
            </tr>
            
            <?php 
            
               $i=0;
               $sum = 0;
                  foreach ($data as $val) 
                  { 
                     $i++;
                   
                     $tkn     =  trim($val['token']);
                     $amounts =  trim($val['payment_taka']);
                     $sign    =  getMoneyToken($tkn,$amounts);
                    
                     $td1     =  (substr($sign, 0,1)   !="-")?$amounts:" ";
                     $td2     =  (substr($sign, 0,1)   =="-")?$amounts:" ";

                     $detail  =  detailsOfAction($tkn,trim($val['customerid']));

                     $sum    +=  getMoneyToken($tkn,$amounts);
               
                    
                   ?>
            <tr>
               <td><?=$i?></td>
               <td><?=$detail?></td>
               <td><?=$td1?></td>
               <td><?=$td2?></td>
               <td><?=$sum?></td>
               </tr>
            <?php   }
               ?>
              
         </tbody>
            <tr>
               
               <td colspan="4" class="text-right"> <h5>Total Cash Balance</h5> </td>
              <td> <strong><?=number_format((float)$sum,2,'.',',')?></strong></td>
             </tr>
      </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
             <!-- end of cash report -->

                <div class="row">
                    <div class="col-md-6">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <h4 class="mt-0 header-title">Today's sale</h4>
                                  <table border="1" style="width: 100%" id="datatable">
                                    <tr>
                                      <th>#</th>
                                      <th>Name</th>
                                      <th>Quantity</th>
                                    </tr>
                                    <?php
                                    function getProperty($proid)
                                    {
                                      $item =   $GLOBALS['db']->selectAll('product_info')->fetch(PDO::FETCH_ASSOC);
                                       return [
                                         "cat"  =>$item['product_cat'],
                                         "brand"=>$item['brand_id'],
                                         "size" =>$item['size_id']
                                       ];
                                    }
                                    $sql = "SELECT `productid`, SUM(`quantity`) as totalitem FROM `sell` WHERE `selldate`=CURDATE() GROUP BY `productid`";
                                    $todaydata = $db->joinQuery($sql)->fetchAll();
                                    $count    = 0;
                                    $procat   = array();
                                    $probrand = array();
                                    $prosize  = array();
                                    foreach ($todaydata as $td) 
                                    {

                        array_push($procat, getProperty($td['productid'])['cat']);
                      array_push($prosize, getProperty($td['productid'])['size']);
                    array_push($probrand, getProperty($td['productid'])['brand']);
                                        $count++;
                                        ?>
                                        <tr>
                                          <td><?=$count?></td>
                                          <td><?=$td['productid']?></td>
                                          <td><?=$td['totalitem']?></td>
                                        </tr>
                                        <?php
                                    }
                                     $procat = array_unique($procat);




                                    ?>
                                  </table>
                                  <div class="row">
                                    <?php

                                       foreach ($procat as $pcat =>$pval )
                                      {
                                           ?>
                                              <div class="col-xs-6">
                                            <a href="#" class="active" id="login-form-link"><?=$pval?></a>
                                          </div>
                                 
                                           <?php
                                       }
                                    ?>
                                  </div>
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

           

            </div> <!-- end container -->
       
    
    <?php 
        include 'files/footer.php';
    ?>
