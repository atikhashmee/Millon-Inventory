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
                                                  <strong>Order summary</strong></h3>
                                            </div>
                                            <div class="">
                       <div class="table-responsive">
                        <style>
                          table.content-table>thead tr td{
                            border-top:2.5px solid #000;

                        }table.content-table>tbody tr:last-child{
                            border-bottom:2.5px solid #000;
                            
                        } </style>
                      <table class="table content-table">
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
                          
                          $invoiceinfo = $db->selectAll('sell','`billchallan`="'.$_GET['invo'].'"')->fetchAll();
                          /*echo "<pre>";
                          print_r($invoiceinfo);
                          echo "</pre>";*/
                          $sum =0;
                          $weight = 0;
                          $transport = 0;
                          $vat = 0;

                          $commision = 0;
                          $discount = 0;


                          $paidamount = 0;
                          $payment_type = "";


                            foreach ($invoiceinfo as $inv) 
                            {
                              $paidamount = $inv['payment_taka'];
                              $sum += ($inv['price']*$inv['quantity']);
                              $weight = $inv['weight'];
                              $transport = $inv['transport'];
                              $vat = $inv['vat'];
                              $commision = $inv['comission'];
                              $discount = $inv['discount'];
                              $payment_type = $inv['payment_status'];
                              ?>
                              <tr>
                                <td>
                                  <?=$fn->getProductName($inv['productid'])?>
                                </td> 
                                <td class="text-center">
                                  <?=$inv['price']?>
                                </td>
                                <td class="text-center">
                                  <?=$inv['quantity']?>
                                </td>
                                <td class="text-right">
                                  <?=($inv['price']*$inv['quantity'])?>
                                </td>

                                
                              </tr>
                        
                              <?php
                            }

                            $bc = new Bc();
                      $bc->setAmount($sum);
                      $bc->setWeight($weight);
                      $bc->setTransport($transport);
                      $bc->setVat($vat);
                      $bc->setDiscount($discount);
                      $bc->setComission($commision);
                          ?>  
                                             
                       </tbody>
                                                    </table>

                                  

                                                  <div style="float: right;">
                                                    <style>
                                                      table.down-table tr td{
                                                            margin: 2px;
                                                padding: 5px 52px;
                                                border-bottom: 2px solid #0000008c;
                                                      }
                                                      table.down-table tr td:last-child{
                                                        text-align: right;
                                                         padding-right: 0px;
                                                      }

                                                    </style>
                                                      <table  class="down-table">
                                                           <tr>
                                                             <td>Total</td>
                                                             <td><?=number_format((float)$sum)?></td>
                                                           </tr>
                                                           <tr>
                                                             <td>V+T+W</td>
                                                             <td><?=number_format((float)$vat)?> (%) + <?=number_format((float)$transport)?>+<?=number_format((float)$weight)?></td>
                                                           </tr>
                                                           <tr>
                                                             <td>C/D</td>
                                                             <td><?=(float)$commision?> (%) /<?=(float)$discount?></td>
                                                           </tr>
                                                           <tr>
                                                             <td>Grand Total</td>
                                                             <td><?php 
                                                             $grand_total =$bc->getResult();
                                                             echo number_format($grand_total)?></td>
                                                           </tr>
                                                           <tr>
                                                             <td>Paid</td>
                                                             <td><?=$paidamount?></td>
                                                           </tr><tr>
                                                             <td>Payment Type</td>
                                                             <td><?=$payment_type?></td>
                                                           </tr>
                                                           <tr>
                                                             <td>Due</td>
                                                             <td><?= number_format((double)$grand_total-(double)$paidamount,0,0,2) ?></td>
                                                           </tr>
                                                      </table>
                                                  </div>




                                                </div>
                                                  <style>
                                                    @import url('https://fonts.googleapis.com/css?family=Source+Sans+Pro');
                                                    .footer-style{
                                                     margin-top: 345px !important;

                                                        font-family: 'Source Sans Pro', sans-serif;
                                                    }
                                                    .left-conent{
                                                      
                                                      text-align: center;
                                                      line-height: 10px;
                                                      font-size: 19px;
                                                   
                                                    }
                                                  </style>
                                                <!--  invoice style  -->
                                  <div class="card card-body d-flex justify-content-center align-items-center flex-column footer-style">
                                                <h1>Thank you</h1>
                                                <div><div class="left-conent">
                                                        
                                                        <p> <strong> Janata Steel Corporation </strong></p>
                                                        <p> Ka-24/1, Sohid Abdul Aziz Road, Jagannathpur, vatara, Dhaka 1229 </p>
                                                        <p>+88 01554327812,+88 01682409301,+88 01912 541124</p>
                                                    </div></div>
                                                </div>

        <div class="d-print-none mo-mt-2">
        <div class="pull-right">
          
       <!--  <a href="product-return.php?invoice=<?=$_GET['invo']?>&isEnabled=true&token=sell" class="btn btn-outline-info waves-effect waves-light">Return <i class="fa fa-minus-square-o"></i></a> -->
        <!-- <a href="#" 
        onclick="deleteItem('product-sale-history','<?=$_GET['invo']?>')"
         class="btn btn-outline-danger waves-effect waves-light">Delete <i class="fa fa-trash"></i></a> -->
        <a href="product-sale-edit.php?invo=<?=$_GET['invo']?>" class="btn btn-outline-warning waves-effect waves-light">Update <i class="fa fa-external-link"></i></a>
        <a href="javascript:window.print()" class="btn btn-outline-success waves-effect waves-light">Print Invoice <i class="fa fa-print"></i></a><a href="challan_print.php?invo=<?=$_GET['invo']?>" class="btn btn-outline-secondary waves-effect waves-light">Print Challan <i class="fa fa-print"></i></a>
        <a href="#" class="btn btn-outline-primary waves-effect waves-light">Mail</a>
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
