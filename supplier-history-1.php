<?php include 'files/header.php'; ?>
<?php include 'files/menu.php';?>

<div class="container">
   <div class="row">
      <div class="col-sm-12">
         <div class="page-title-box">
            <div class="btn-group pull-right">
               <ol class="breadcrumb hide-phone p-0 m-0">
                  <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                  <li class="breadcrumb-item"><a href="#">Report</a></li>
                  <li class="breadcrumb-item active">Supplier History</li>
               </ol>
            </div>
            <h4 class="page-title">Supplier History</h4>
         </div>
      </div>
   </div>
   <!-- end page title end breadcrumb -->
   <div class="row">
      <div class="col-xl-12">
         <div class="card m-b-30">
            <div class="card-body">
               <form action="" method="POST">
                  <div class="row">
                     <div class="col">
                        <label for="">Supplier Name</label>
                        <input type="hidden" name="supplierid" id="supplierid">
                        <input type="text" class="form-control" id="supplier" placeholder="type out supplier name">
                     </div>
                     <div class="col">
                        <label for="">Date-From</label>
                        <input type="text" class="form-control" name="start" id="start">
                     </div>
                     <div class="col">
                        <label for="">Date-To</label>
                        <input type="text" class="form-control" name="to" id="to">
                     </div>
                     <div class="col">
                       <div class="form-group">
                        <label></label>
                        <select class="form-control" name="is_type">
                          <option value="default">--All--</option>
                          <option value="payment">Payment</option>
                          <option value="proudct">Product</option>
                        </select>
                     </div>
                     </div>
                     
                     <div class="col">
                        <button type="submit" name="filter" style="position: absolute;top: 29px;" class="btn btn-outline-primary">Search <i class="fa fa-search"></i> </button>
                     </div>
                  </div>
               </form>
               <?php 
                  /*echo "<pre>";
                  print_r($rp->getE());
                  echo "</pre>";*/
                  
                      $exequery = $pr->purQueryEnquery();
                      $sum =0;
                  
                      $searchtype = "";
                      if (isset($_GET['supid'])) 
                      {
                        $searchtype = "all";
                        $exequery = $pr->purQueryEnquery($_GET['supid']);

                      }
                     
                      if (isset($_POST['filter'])) 
                       {
                         
                           if ($_POST['is_type'] == "default") 
                           {
                            $searchtype = "all";
                               if (!empty($_POST['supplierid']) && (empty($_POST['start']) && empty($_POST['to']))) 
                               {
                  $exequery = $pr->purQueryEnquery($_POST['supplierid']);
                               }
                             
                            if (!empty($_POST['supplierid'])&& (!empty($_POST['start']) && empty($_POST['to'])))
                               {
                             $exequery = $pr->purQueryEnquery($_POST['supplierid'],$_POST['start']);
                               }
                  
                          if (!empty($_POST['supplierid'])&& (!empty($_POST['start']) && !empty($_POST['to'])))
                               {
                             $exequery = $pr->purQueryEnquery($_POST['supplierid'],$_POST['start'],$_POST['to']);
                               }
                              
                           }
                           else if ($_POST['is_type'] == "payment") 
                           {
                            $searchtype = "pay";
                             $exequery = $pr->getSupplierPaymentList();
                               if (!empty($_POST['supplierid']) && (empty($_POST['start']) && empty($_POST['to']))) 
                                  {
                  $exequery = $pr->getSupplierPaymentList($_POST['supplierid']);
                                  }
                                
                  if (!empty($_POST['supplierid'])&& (!empty($_POST['start']) && empty($_POST['to'])))
                   {
                        $exequery = $pr->getSupplierPaymentList($_POST['supplierid'],$_POST['start']);
                    }
                  
                    if (!empty($_POST['supplierid'])&& (!empty($_POST['start']) && !empty($_POST['to'])))
                       {
                                $exequery = $pr->getSupplierPaymentList($_POST['supplierid'],$_POST['start'],$_POST['to']);
                        }
                        
                           }
                           else if ($_POST['is_type'] == "proudct") 
                           {
                               $searchtype = "pro";
                                $exequery = $pr->getSupplierProductList();
                               if (!empty($_POST['supplierid']) && (empty($_POST['start']) && empty($_POST['to']))) 
                                  {
                  $exequery = $pr->getSupplierProductList($_POST['supplierid']);
                                  }
                                
                  if (!empty($_POST['supplierid'])&& (!empty($_POST['start']) && empty($_POST['to'])))
                   {
                        $exequery = $pr->getSupplierProductList($_POST['supplierid'],$_POST['start']);
                    }
                  
                    if (!empty($_POST['supplierid'])&& (!empty($_POST['start']) && !empty($_POST['to'])))
                       {
                                $exequery = $pr->getSupplierProductList($_POST['supplierid'],$_POST['start'],$_POST['to']);
                        }
                        
                           }
                         
                  
                              
                       }
                  
                      
                              /*echo "<pre>";
                              print_r($exequery);
                              echo "</pre>";*/
                              $data = $db->joinQuery($exequery)->fetchAll();
                             /* echo "<pre>";
                              print_r($data);
                              echo "</pre>";*/
                                 ?> 
            </div>
         </div>
         <div class="card m-b-30">
            <div class="card-body">
               <?php 
                  if (isset($_POST['filter'])) 
                  {
                    if (!empty($_POST['supplierid'])) 
                    {
                      echo ' <address style="margin-left: 44px;">'.$dm->getUserFullDetails($_POST['supplierid']).' </address>';
                    }
                   
                       
                  }

                   if (isset($_GET['supid'])) 
                    {
                    echo ' <address style="margin-left: 44px;">'.$dm->getUserFullDetails($_GET['supid']).' </address>';
                    }
                  ?>       
               <div class="table-responsive">
                  <table border="1" id="datatable-buttons">
                     <thead>
                        <tr>
                           <th>#</th>
                           <th>Date</th>
                           <th>Description</th>
                           <th>Purchase Amount</th>
                           <th>Purchase Return Amount</th>
                           <th>Cash In</th>
                           <th>Balance</th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
                           <td></td>
                           <td></td>
                           <td></td>
                           <td></td>
                           <td></td>
                           <td class="text-right" >Start Cash</td>
                           <td><?=$sum?></td>
                        </tr>
                        <?php
                           $i=0;
                           $purchasesum = 0;
                           $paymentsum = 0;
                           $return =0;
                           foreach ($data as $val) 
                           {  
                             $i++;
                           $tkn = trim($val['token']);
                           $amount = trim($val['total']);
                           $str = $pr->getSupplierToken($tkn,$amount,trim($val['paytaka']));
                           $payment    = $str['payamount'];
                           $puramount  = $str['puramount'];
                           $return     = $str['purreturn'];
                           $desc       = $str['descrip'];
                           
                           
                           
                           if ($puramount != 0 && $payment !=0 ) 
                           {
                               if ($searchtype == "pay") 
                               {
                                 $puramount = 0;
                                 $sum += (float)$payment;
                                 $paymentsum += (float)$payment;
                               }
                               else if ($searchtype == "pro") 
                               {
                                 $payment = 0;
                                 $sum += (float)$puramount;
                                 $purchasesum += (float)$puramount;
                               }
                               else if ($searchtype == "all") 
                               {
                                $purchasesum += (float)$puramount;
                                $paymentsum  += (float)$payment;
                                 $sum += (float)$puramount-(float)$payment;
                               }
                               
                             
                           }
                           else if ($puramount != 0 && $payment == 0) 
                           {
                           
                             
                             if ($searchtype == "pay") 
                               {
                                 $payment = 0;
                                 $puramount = 0;
                                 continue;
                                // $sum += (float)$puramount;
                               }
                               else if ($searchtype == "pro") 
                               {
                                 $payment = 0;
                                 $sum += (float)$puramount;
                                 $purchasesum += (float)$puramount;
                               }
                               else if ($searchtype == "all") 
                               {
                                $purchasesum += (float)$puramount;
                                $paymentsum  += (float)$payment;
                                 $sum += (float)$puramount-(float)$payment;
                               }
                             
                            
                           }
                           else if ($return  != 0) 
                           {
                           
                             
                               if ($searchtype == "pro") 
                               {
                                 $payment  = 0;
                                 $sum     -= (float)$return;
                                 $return  += (float)$return;
                               }
                               else if ($searchtype == "all") 
                               {
                                 $sum -= (float)$return;
                                 $return += (float)$return;
                               }
                                
                             
                           }
                           else
                           {
                               if ($searchtype == "pay") 
                               {
                                  $sum   += (float)$payment;
                                 $paymentsum  += (float)$payment;
                               }
                               else if ($searchtype == "pro") 
                               {
                                  $sum += (float)$payment;
                                  $purchasesum += (float)$puramount;
                                  
                               }
                               else if ($searchtype == "all") 
                               {
                                  $sum -= (float)$payment;
                                  $purchasesum += (float)$puramount;
                                  $paymentsum   += (float)$payment;
                               }
                           
                             
                           }
                           
                             
                           
                             ?>
                        <tr>
                           <td><?=$i?></td>
                           <td><?=$val['purchasedate']?></td>
                           <td><?=$desc?></td>
                           <td><?=($puramount==0)?" ":$puramount?></td>
                           <td><?=($return==0)?" ":$return?></td>
                           <td><?=($payment==0)?" ":$payment?></td>
                           <td><?=$sum?></td>
                        </tr>
                        <?php 
                           }
                           
                           ?>
                     </tbody>
                     <tr >
                      
                      <td rowspan="4" colspan="5"></td>
                      

                        <td class="text-right">Total Purchase amount</td>
                        <td ><?=$purchasesum?></td>
                     </tr>
                     <tr>
                        <td  class="text-right">Total Payment amount</td>
                        <td ><?=$paymentsum?></td>
                     </tr>
                     <tr>
                        <td  class="text-right">Total Return</td>
                        <td ><?=$return?></td>
                     </tr>
                     <tr>
                        <td class="text-right">Balance</td>
                        <td ><?=$sum?></td>
                     </tr>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<?php include 'files/footer.php';?>