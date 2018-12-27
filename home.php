
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
        <table class="table table-hover table-bordered" id="datatable-buttons">
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
                <td><?=previousDayCash()?></td>
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

                                <nav>
                 <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                        

                        <?php
                            $i=0;
                            $categories = $db->selectAll("cateogory")->fetchAll();
                            foreach ($categories as $cat) 
                            {  

                                $class = ($i==0)?"active":" ";
                                ?>
                                <a class="nav-item nav-link <?=$class?>" id="nav-<?=$cat['cat_id']?>-tab" data-toggle="tab" href="#nav-<?=$cat['cat_name']?>" role="tab" aria-controls="nav-<?=$cat['cat_name']?>" aria-selected="true"><?=$cat['cat_name']?></a>
                                <?php
                                $i++;
                            }

                        ?>
                        
                    </div>
                </nav>
                <div class="tab-content py-3 px-3 px-sm-0" id="nav-tabContent">
                    <?php
                        $j =0;
                        foreach ($categories as $ca) 
                        {
                            $class = ($j==0)?"active":" ";
                            ?>
                            <div class="tab-pane fade show <?=$class?>" id="nav-<?=$cat['cat_name']?>" role="tabpanel" aria-labelledby="nav-<?=$cat['cat_name']?>-tab">
                                <?php
                                    if ($ca['cat_id'] == 1) 
                                    {
                                        ?>
                                          <table class="table table-borderd" id="datatable">
                                              <thead>
                                                  <tr>
                                                      <th>#</th>
                                                      <th>Name</th>
                                                      <th>Quantity</th>
                                                  </tr>
                                              </thead>
                                              <tbody>
                                                  <?php
                                                    $sizes =  $db->joinQuery("SELECT DISTINCT `pro_size_name` FROM `p_size`")->fetchAll();
                                                    foreach ($sizes as $sz) 
                                                    {
                                                        ?>
                                                          <tr>
                                                              <td>#</td>
                                                              <td><?=$sz['pro_size_name']?></td>
                                                              <td></td>
                                                          </tr>
                                                        <?php
                                                    }
                                                  ?>
                                              </tbody>
                                          </table>
                                        <?php
                                    }
                                    else if ($ca['cat_id'] == 2)
                                    {
                                        ?>
                                         <h3>hello world</h3>
                                        <?php
                                    }

                                ?>
                                    
                            </div>
                            <?php
                            $j++;
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

                <div class="row">

                    <div class="col-xl-8">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <h4 class="mt-0 m-b-15 header-title">
                                Product reviews
                            </h4>

                                <div class="table-responsive">
                                    <table class="table table-hover mb-0">
                                        <thead>
                                        <tr>
                                            <th>Invoice</th>
                                            <th>Product</th>
                                            <th>Status</th>
                                            <th>Qunatity</th>
                                            <th>Date</th>
                                            <th>Price</th>
                                        </tr>

                                        </thead>
                                        <tbody>
                                            <?php 

 $sql = "SELECT `billchallan`,`selldate`, `token`, `productid`, `quantity`,`price` FROM `sell`  
UNION 
SELECT `billchallan`, `purchasedate`,`token`,`productid`,`quantity`,`price` FROM `purchase`
UNION
SELECT `memono`, `return_date`, `token`,`productid`,`quntity`,`price` FROM `sell_return` 
UNION
SELECT `memono`, `return_date`,`token`,`productid`,`quntity`,`price`  FROM `purchase_return`";

$query =  $db->joinQuery($sql)->fetchAll();
foreach ($query as $qu) {
    ?>
        
                                               <tr>
                                            <td><?=$qu['billchallan']?></td>
                                            <td><?=$qu['productid']?></td>
                                            <td><span class="badge badge-info"><?php 
                                            if ($qu['token'] == 'p') {
                                                echo "Purchase";
                                            }else if ($qu['token'] == 's') {
                                                echo "Sale";
                                            }else if ($qu['token'] == 'sr') {
                                                echo "Sale Return";
                                            }else if ($qu['token'] == 'pr') {
                                                echo "Purchase Return";
                                            }
                                            
                                            ?></span></td>
                                            <td><?=$qu['quantity']?></td>
                                            <td><?=date_format(date_create($qu['selldate']),"d/m/Y"); ?></td>
                                            <td><?=$qu['price']?></td>
                                        </tr>
    <?php 
   
}

                                            ?>
                                        

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
