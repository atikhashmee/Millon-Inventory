<?php include 'files/header.php'; ?>
    <?php include 'files/menu.php';

 $salehistory = $db->joinQuery('SELECT DISTINCT `selldate`,`billchallan`,`customerid` FROM `sell` WHERE `billchallan`="'.$_GET['invo'].'"')->fetch(PDO::FETCH_ASSOC);
 ?>

        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box">
                        <div class="btn-group pull-right">
                            <ol class="breadcrumb hide-phone p-0 m-0">
                                <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Products</a></li>
                                <li class="breadcrumb-item active">Products sale History</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Product Sale History</h4>

                    </div>
                </div>
            </div>
            <!-- end page title end breadcrumb -->

            <div class="row">
                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <div class="row" style="margin-bottom: 71px;">
                              <div class="col-md-12">
                                <div class="text-center line-height-0 font-12">
                                                        <h3> <strong> Janata Steel Corporation </strong></h3>
                                                        <p> <strong>Ka-24/1, Sohid Abdul Aziz Road, Jagannathpur, vatara, Dhaka 1229</strong>  </p>
                                                        <p> <strong>+88 01554327812,+88 01682409301,+88 01912 541124</strong> </p>
                                                        <div style="width: 100%; overflow: hidden; font-size: 14">
                                                            <div style="width: 33.33%; float: left;">
                                                                              <address style="line-height: 14px; text-align: justify; font-size: 12px;">
                                                     <strong>Customer Info:</strong><br>
                                          <?=$dm->getUserFullDetails($salehistory['customerid'])?>
                                                              </address>
                                                            </div>
                                                            <div style="width: 33.33%; float: left;">
                                                               <h6><strong>Challan</strong> <br> [Offical Copy] </h6>
                                                            </div>
                                                            <div style="width: 33.33%; float: left; padding-left: 151px;">
                                                               <address style="line-height: 14px; text-align: justify; font-size: 12px;">
                     <strong>Shipment Details:</strong>
                     <br>
                     Invoice No: <?=$salehistory['billchallan']?><br>
                     Sale Date :  <?=date("Y-M-d",strtotime($salehistory['selldate']))?>
                                                </address>
                                                            </div>
                                                        </div>
                                                         
                                                  </div>
                              </div>
                              <div class="col-md-12">
                                <div class="p-2">
                                            <h3 class="panel-title font-16">
                                                  <strong>Challan summary</strong></h3>
                                        </div>
                                <div class="table-responsive">
                                                <table class="table table-bordered table-hover">
                                                    <thead>
                                                        <tr>
                                                            <td><strong>#SL</strong></td>
                                                            <td><strong>Invoice No</strong></td>
                                                            <td><strong>Item description</strong></td>
                                                            <td class="text-center"><strong>Quantity</strong></td>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php 

                          $invoiceinfo = $db->selectAll('sell','`billchallan`="'.$_GET['invo'].'"')->fetchAll();
                          /*echo "<pre>";
                          print_r($invoiceinfo);
                          echo "</pre>";*/
                          $sum =0;
                          $weight = 0;
                          $transport = 0;
                          $vat = 0;
                          $i= 0;

                            foreach ($invoiceinfo as $inv) 
                            {
                              $i++;
                              $sum += ($inv['price']*$inv['quantity']);
                              $weight = $inv['weight'];
                              $transport = $inv['transport'];
                              $vat = $inv['vat'];
                              ?>
                                                            <tr>
                                                              <td><?=$i?></td>
                                                              <td><?=$inv['billchallan']?></td>
                                                                <td>
                                                                    <?=$fn->getProductName($inv['productid'])?>
                                                                </td>

                                                                <td class="text-center">
                                                                    <?=$inv['quantity']?>
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
                    <div style="width: 100%; border: 1px dashed  #000;"></div>
                            <div class="row" style="margin-top: 71px;">
                              <div class="col-md-12">
                                <div class="text-center line-height-0 font-12">
                                                        <h3> <strong> Janata Steel Corporation </strong></h3>
                                                        <p> <strong>Ka-24/1, Sohid Abdul Aziz Road, Jagannathpur, vatara, Dhaka 1229</strong>  </p>
                                                        <p> <strong>+88 01554327812,+88 01682409301,+88 01912 541124</strong> </p>
                                                        <div style="width: 100%; overflow: hidden; font-size: 14">
                                                            <div style="width: 33.33%; float: left;">
                                                                              <address style="line-height: 14px; text-align: justify; font-size: 12px;">
                                                     <strong>Customer Info:</strong><br>
                                          <?=$dm->getUserFullDetails($salehistory['customerid'])?>
                                                              </address>
                                                            </div>
                                                            <div style="width: 33.33%; float: left;">
                                                               <h6><strong>Challan</strong> <br> [Customer Copy] </h6>
                                                            </div>
                                                            <div style="width: 33.33%; float: left; padding-left: 151px;">
                                                               <address style="line-height: 14px; text-align: justify; font-size: 12px;">
                     <strong>Shipment Details:</strong>
                     <br>
                     Invoice No: <?=$salehistory['billchallan']?><br>
                     Sale Date :  <?=date("Y-M-d",strtotime($salehistory['selldate']))?>
                                                </address>
                                                            </div>
                                                        </div>
                                                         
                                                  </div>
                              </div>
                              <div class="col-md-12">
                                <div class="p-2">
                                            <h3 class="panel-title font-16">
                                                  <strong>Challan summary</strong></h3>
                                        </div>
                                <div class="table-responsive">
                                                <table class="table table-bordered table-hover">
                                                    <thead>
                                                        <tr>
                                                            <td><strong>#SL</strong></td>
                                                            <td><strong>Invoice No</strong></td>
                                                            <td><strong>Item description</strong></td>
                                                            <td class="text-center"><strong>Quantity</strong></td>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php 

                          $invoiceinfo = $db->selectAll('sell','`billchallan`="'.$_GET['invo'].'"')->fetchAll();
                          /*echo "<pre>";
                          print_r($invoiceinfo);
                          echo "</pre>";*/
                          $sum =0;
                          $weight = 0;
                          $transport = 0;
                          $vat = 0;
                          $i= 0;

                            foreach ($invoiceinfo as $inv) 
                            {
                              $i++;
                              $sum += ($inv['price']*$inv['quantity']);
                              $weight = $inv['weight'];
                              $transport = $inv['transport'];
                              $vat = $inv['vat'];
                              ?>
                                                            <tr>
                                                              <td><?=$i?></td>
                                                              <td><?=$inv['billchallan']?></td>
                                                                <td>
                                                                    <?=$fn->getProductName($inv['productid'])?>
                                                                </td>

                                                                <td class="text-center">
                                                                    <?=$inv['quantity']?>
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
                            

                            <div class="row">
                                <div class="col-12">
                                    <div class="panel panel-default">
                                        
                                        <div class="">
                                            

                                            <div class="d-print-none mo-mt-2">
                                                <div class="pull-right">

                                                    <a href="javascript:window.print()" class="btn btn-outline-secondary waves-effect waves-light">Print Challan <i class="fa fa-print"></i>
       </a>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- end row -->

                        </div>
                    </div>
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->

        </div>

        <?php include 'files/footer.php'; ?>