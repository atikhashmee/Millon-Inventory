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

                                <div class="row">
                                    <div class="col-12">
                                        
                                        <div class="row">
                                            <div class="col-6">
                                                <address>
                                       <strong>Customer Info:</strong><br>
                            <?=$dm->getUserFullDetails($salehistory['customerid'])?>
                                                </address>
                                            </div>
                                            <div class="col-6 text-right">
                                                <address>
                     <strong>Shipment Details:</strong>
                     <br>
                     Invoice No: <?=$salehistory['billchallan']?><br>
                     Sale Date :  <?=date("Y-M-d",strtotime($salehistory['selldate']))?>
                                                </address>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <div class="panel panel-default">
                                            <div class="p-2">
                                                <h3 class="panel-title font-20">
                                                  <strong>Challan summary</strong></h3>
                                            </div>
                                            <div class="">
                       <div class="table-responsive">
                      <table class="table table-bordered table-hover">
                      <thead>
                      <tr>
                    <td><strong>Item</strong></td>
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


                            foreach ($invoiceinfo as $inv) 
                            {
                              $sum += ($inv['price']*$inv['quantity']);
                              $weight = $inv['weight'];
                              $transport = $inv['transport'];
                              $vat = $inv['vat'];
                              ?>
                              <tr>
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

        <div class="d-print-none mo-mt-2">
        <div class="pull-right">
          
       <a href="javascript:window.print()" class="btn btn-outline-secondary waves-effect waves-light">Print Challan <i class="fa fa-print"></i>
       </a>
        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div> <!-- end row -->

                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->
  
</div>



<?php include 'files/footer.php'; ?>
