
<?php 
 include 'files/header.php';
 include 'files/menu.php';
?>
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

                                $prev = previCash();
                    
                        
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
                <td><?=$prev?></td>
            </tr>
            
            <?php 
            
               $i=0;
               $sum = doubleval($prev);
                  foreach ($data as $val) 
                  { 
                     $i++;
                   
                     $tkn     =  trim($val['token']);
                     $amounts =  trim($val['payment_taka']);
                     $sign    =  getMoneyToken($tkn,intval($amounts));
                    
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
                    <div class="card card-body">
                        <h4>
                          Last 50 days Cash History
                        </h4>
                       <table class="table table-bordered">
                           <thead>
                             <tr>
                               <th>#</th>
                               <th>Date</th>
                               <th>Details</th>
                             </tr>
                           </thead>
                           <tbody>
                             <?php 
                              
                                 $balances = calculatePreviCash()['p_objs'];
                                /* echo "<pre>";
                                 print_r($balances);
                                 echo "</pre>";*/
                                  for($i=0; $i<count($balances); $i++){
                                     ?>
                                       <tr>
                                         <td><?=$i?></td>
                                         <td><?=$balances[$i]->date?></td>
                                         <td>
                                               <div class="line-height-10">
                                                  <p> Cash Start : <?=$balances[$i]->starting?>  </p>
                                                  <p> Cash Amount : <?=$balances[$i]->amount?>  </p>
                                                  <p> Last Cash  : <?=$balances[$i]->ending?>  </p>
                                               </div>
                                              
                                         </td>
                                       </tr>
                                     <?php 
                                  }

                             ?>
                           </tbody>
                       </table>
                    </div>
                </div>
             </div>

            </div> <!-- end container -->
       
    
    <?php 
        include 'files/footer.php';
    ?>
