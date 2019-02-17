<?php include 'files/header.php'; ?>
<?php include 'files/menu.php';
 
    $saleinvoQuery = "SELECT  `purchasedate`, `billchallan`, `supplier`, `productid`, `quantity`, `price`, `weight`, `transport`, `vat`, `discount`, `comission`, `payment_taka`,`token` FROM `purchase` WHERE `billchallan`='".$_GET['invo']."' 
                                       UNION
                                       SELECT `return_date`, `memono`, `supplierId`, `productid`, `quntity`,`price`, `weight`, `transport`, `vat`, `discount`, `comission`,'0',`token` FROM `purchase_return` WHERE `memono`='".$_GET['invo']."'";
                                      
                                       $invoiceinfo = $db->joinQuery($saleinvoQuery )->fetchAll();
   
   ?>
<div class="container">
   <div class="row">
      <div class="col-sm-12">
         <div class="page-title-box">
            <div class="btn-group pull-right">
               <ol class="breadcrumb hide-phone p-0 m-0">
                  <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                  <li class="breadcrumb-item"><a href="#">Products</a></li>
                  <li class="breadcrumb-item active">Products Purchase History</li>
               </ol>
            </div>
            <h4 class="page-title">Product Purchase History</h4>
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
                              <strong>Supplier Info:</strong><br>
                      <?=$dm->getUserFullDetails($invoiceinfo[0]['supplier'])?>
                           </address>
                        </div>
                        <div class="col-6 text-right">
                           <address>
                              <strong>Shipment Details:</strong>
                              <br>
                              Invoice No: <?=$invoiceinfo[0]['billchallan']?><br>
                              Invoice create Date :  <?=date("Y-M-d",strtotime($invoiceinfo[0]['purchasedate']))?>
                           </address>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="row">
                  <div class="col-12">
                     <div class="panel panel-default">
                        <div class="p-2">
                           <h3 class="panel-title font-20"><strong>Invoice summary</strong></h3>
                        </div>
                        <div class="">
                           <div class="table-responsive">
                              <table class="table table-bordered">
                                 <thead>
                                    <tr>
                                       <td><strong>Sl</strong></td>
                                       <td><strong>Date</strong></td>
                                       <td><strong>Item</strong></td>
                                       <td class="text-center"><strong>Price</strong></td>
                                       <td class="text-center"><strong>Quantity</strong></td>
                                       <td class="text-center"><strong>Sold</strong></td>
                                       <td class="text-center"><strong>Return</strong></td>
                                       <td class="text-right"><strong>Totals</strong></td>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php 
                                      
                                       
                                       $sum =0;
                                       $weight = 0;
                                       $transport = 0;
                                       $vat = 0;
                                       $discount = 0;
                                       $comission = 0;
                              
                                       $payment = 0;
                                       
                                       $returnextra = 0;
                                       $saleamountbyproduct =0;
                                       
                                       
                                       $i=0;
                                        foreach ($invoiceinfo as $inv) 
                                        {
                                        	$i++;
                                        	$sld =" ";
                                        	$rtrn = " ";
                                       if ($inv['token'] == "p_Cheque" || $inv['token'] == "p_Cash") 
                                           {
                                           	   $saleamountbyproduct   +=   ($inv['price']*$inv['quantity']);
                                           	   $sld   =   ($inv['price']*$inv['quantity']);
                                           	   $sum      +=  ($inv['price']*$inv['quantity']);
                                        		$weight    = $inv['weight'];
                                                $transport = $inv['transport'];
                                                $vat       = $inv['vat'];
                                                $discount  = $inv['discount'];
                                                $comission = $inv['comission'];
                                                $payment = $inv['payment_taka'];
                                        	}
                                        	else if ($inv['token'] == "pr")
                                        	 {
                                        		$returnextra  += $inv['weight'] + $inv['transport'];
                                                 $rtrn = ($inv['price']*$inv['quantity']);
                                           	     $sum  -=  ($inv['price']*$inv['quantity']);
                                        	}
                                        	
                                          
                                          
                                          ?>
                                    <tr>
                                       <td><?=$i?></td>
                                       <td>
                                          <?=$inv['purchasedate']?>
                                       </td>
                                       <td>
                                          <?=$fn->getProductName($inv['productid'])?>
                                       </td>
                                       <td class="text-center">
                                          <?=$inv['price']?>
                                       </td>
                                       <td class="text-center">
                                          <?=$inv['quantity']?>
                                       </td>
                                       <td class="text-center">
                                          <?=$sld?>
                                       </td>
                                       <td class="text-center">
                                          <?=$rtrn?>
                                       </td>
                                       <td class="text-right">
                                          <?=$sum?>
                                       </td>
                                    </tr>
                                    <?php
                                       }
                                       
                                       
                                       $selextra = new Bc();
                                       $selextra->setAmount($saleamountbyproduct);
                                       $selextra->setWeight($weight);
                                       $selextra->setTransport($transport);
                                       $selextra->setVat($vat);
                                       $selextra->setDiscount($discount);
                                       $selextra->setComission($comission);
                                       
                                       
                                       ?>  
                                    <tr>
                                       <td colspan="7" class="text-right"> <strong>Sub Total</strong> </td>
                                       <td class="text-right"><?=number_format($sum)?></td>
                                    </tr>
                                    <tr>
                                      
                                       <td colspan="7" class="text-right"> <strong>Sale Extra</strong> </td>
                                       <td class="text-right"><?=number_format($selextra->getResult()-$sum)?></td>
                                    </tr>
                                    <tr>
                                      
                                       <td colspan="7" class="text-right"> <strong>Purchase Return Extra</strong> </td>
                                       <td class="text-right"><?=number_format($returnextra)?></td>
                                    </tr>
                                    <tr>
                                      
                                       <td colspan="7" class="text-right"> <strong>Grand Total</strong> </td>
                                       <td class="text-right"><?=number_format(
                                          ($selextra->getResult()-$returnextra))?></td>
                                    </tr>
                                    <hr>
                                    <tr>
                                      
                                       <td colspan="7" class="text-right"> <strong>Paid</strong> </td>
                                       <td class="text-right"><?=number_format((float)$payment)?></td>
                                    </tr>
                                    <tr>
                                      
                                       <td colspan="7" class="text-right"><strong>Due</strong> </td>
                                       <td class="text-right"><?=number_format((float)
                                          $selextra->getResult()-((float)$returnextra+(float)$payment))?></td>
                                    </tr>
                                 </tbody>
                              </table>
                           </div>
                           <div class="d-print-none mo-mt-2">
                              <div class="pull-right">
                                <a href="product-return.php?invoice=<?=$_GET['invo']?>&isEnabled=true&token=purchase" class="btn btn-outline-info waves-effect waves-light">Return <i class="fa fa-external-link"></i></a>
                                 <a href="javascript:window.print()" class="btn btn-outline-success waves-effect waves-light">Print <i class="fa fa-print"></i></a>
                                 <a href="#" class="btn btn-outline-primary waves-effect waves-light">Mail</a>
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