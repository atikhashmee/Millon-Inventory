<?php include 'files/header.php'; ?>
<?php include 'files/menu.php';


 ?>



<?php 
   if (isset($_GET['del-id'])) {
           if ($db->delete("sell","billchallan = '".$_GET['del-id']."'")) {?>
<script> alert('Data has been deleted'); window.location.href='sellproduct.php'; </script>
<?php   }
   }




   $salehistory = $db->joinQuery('SELECT DISTINCT `memono`,`return_date` FROM `purchase_return` WHERE `memono`= "'.$_GET['invo'].'"')->fetch(PDO::FETCH_ASSOC);

  /* echo "<pre>";
   print_r($salehistory);
   echo "</pre>";*/

   
   
   
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
                                                    John Smith<br>
                                                    1234 Main<br>
                                                    Apt. 4B<br>
                                                    Springfield, ST 54321
                                                </address>
                                            </div>
                                            <div class="col-6 text-right">
                                                <address>
                     <strong>Shipment Details:</strong>
                     <br>
                     Invoice No: <?=$salehistory['memono']?><br>
                     Sale Date :  <?=date("Y-M-d",strtotime($salehistory['return_date']))?>
                                                </address>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <div class="panel panel-default">
                                            <div class="p-2">
                                                <h3 class="panel-title font-20"><strong>Order summary</strong></h3>
                                            </div>
                                            <div class="">
                       <div class="table-responsive">
                      <table class="table">
                      <thead>
                      <tr>
                    <td><strong>Item</strong></td>
              <td class="text-center"><strong>Price</strong></td>
            <td class="text-center"><strong>Quantity</strong></td>
            <td class="text-right"><strong>Totals</strong></td>
                </tr>
                   </thead>
                       <tbody>
                          <?php 
                          $invoiceinfo = $db->selectAll('purchase_return','`memono`="'.$_GET['invo'].'"')->fetchAll();
                          /*echo "<pre>";
                          print_r($invoiceinfo);
                          echo "</pre>";*/
                          $sum =0;
                          $weight = 0;
                          $transport = 0;
                          $vat = 0;


                            foreach ($invoiceinfo as $inv) {
                              $sum += ((int)$inv['price']*(int)$inv['quntity']);
                              $weight = $inv['weight'];
                              $transport = $inv['transport'];
                              $vat = $inv['vat'];
                              ?>
                              <tr>
                                <td>
                                  <?=$fn->getProductName(trim($inv['productid']))?>
                                </td> 
                                <td class="text-center">
                                  <?=$inv['price']?>
                                </td>
                                <td class="text-center">
                                  <?=$inv['quntity']?>
                                </td>
                                <td class="text-right">
                                  <?=((int)$inv['price']*(int)$inv['quntity'])?>
                                </td>

                                
                              </tr>
                        
                              <?php
                            }

                          ?>  
                          <tr>
                            <td></td>
                            <td></td>
                            <td class="text-right"> <strong>Total</strong> </td>
                            <td class="text-right"><?=number_format($sum)?></td>
                          </tr>
                          <tr>
                            <td></td>
                            <td></td>
                            <td class="text-right"> <strong>Weight</strong> </td>
                            <td class="text-right"><?=number_format($weight)?></td>
                          </tr> 
                          <tr>
                            <td></td>
                            <td></td>
                            <td class="text-right"> <strong>Transport</strong> </td>
                            <td class="text-right"><?=number_format($transport)?></td>
                          </tr> 
                          <tr>
                            <td></td>
                            <td></td>
                            <td class="text-right"> <strong>Subtotal</strong> </td>
                            <td class="text-right"><?=number_format(
                              ($transport+$weight+$sum))?></td>
                          </tr>
                          <hr>
                          <tr>
                            <td></td>
                            <td></td>
                            <td class="text-right"> <strong>Vat</strong> </td>
                            <td class="text-right"><?=number_format($vat)?></td>
                          </tr>
                          <tr>
                            <td></td>
                            <td></td>
                            <td class="text-right"><strong>Grand Total</strong> </td>
                            <td class="text-right"><?=number_format(
                              ($transport+$weight+$sum) + ( ($vat/100) * ($transport+$weight+$sum)))?></td>
                          </tr>                      
                       </tbody>
                                                    </table>
                                                </div>

        <div class="d-print-none mo-mt-2">
        <div class="pull-right">
        <a href="#" class="btn btn-danger waves-effect waves-light">Delete <i class="fa fa-minus-square-o"></i></a>
        <a href="purchase-return-edit.php?invo=<?=$_GET['invo']?>" class="btn btn-warning waves-effect waves-light">Update <i class="fa fa-external-link"></i></a>
        <a href="javascript:window.print()" class="btn btn-success waves-effect waves-light">Print <i class="fa fa-print"></i></a>
        <a href="#" class="btn btn-primary waves-effect waves-light">Mail</a>
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
