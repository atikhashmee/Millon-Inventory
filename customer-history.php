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
                  <li class="breadcrumb-item active">Customer History</li>
               </ol>
            </div>
            <h4 class="page-title">Customer History</h4>
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
                        <input type="hidden" name="customerid" id="customerid">
                        <input type="text" class="form-control" id="customer" placeholder="type out customer name">
                     </div>
                     <div class="col"><input type="text" class="form-control" name="start" id="start"></div>
                     <div class="col"><input type="text" class="form-control" name="to" id="to"></div>
                     <div class="col">
                        <div class="form-group">
                           <select class="form-control" name="is_type">
                              <option value="default">--All--</option>
                              <option value="payment">Payment</option>
                              <option value="proudct">Product</option>
                           </select>
                        </div>
                     </div>
                     <div class="col">
                        <div class="form-group">
                           <div class="custom-control custom-checkbox" style="top: 3px;">
                              <input type="checkbox" class="custom-control-input"  id="customCheck"
                                 value="Yes" name="customCheck">
                              <label class="custom-control-label" for="customCheck">
                                 <p style="font-size: 12px;"> Include Cash Opening Balance</p>
                              </label>
                           </div>
                        </div>
                     </div>
                     <div class="col">
                        <button type="submit" name="filter" class="btn btn-outline-primary">Search <i class="fa fa-search"></i> </button>
                     </div>
                  </div>
               </form>
               <?php 
                  /*echo "<pre>";
                  print_r($rp->getE());
                  echo "</pre>";*/
                  
                      $exequery = $rp->queryEnquery();
                      $sum =0;
                      $searchtype = " ";
                      if (isset($_GET['cusid'])) 
                      {
                        $searchtype = "all";
                       $exequery = $rp->queryEnquery($_GET['cusid']);
                      }
                      if (isset($_POST['filter'])) 
                       {
                           if ($_POST['is_type'] == "default") 
                           {
                            $searchtype = "all";
                                if (!empty($_POST['customerid']) && (empty($_POST['start']) && empty($_POST['to']))) 
                               {
                  $exequery = $rp->queryEnquery($_POST['customerid']);
                               }
                             
                            if (!empty($_POST['customerid'])&& (!empty($_POST['start']) && empty($_POST['to'])))
                               {
                             $exequery = $rp->queryEnquery($_POST['customerid'],$_POST['start']);
                               }
                  
                          if (!empty($_POST['customerid'])&& (!empty($_POST['start']) && !empty($_POST['to'])))
                               {
                             $exequery = $rp->queryEnquery($_POST['customerid'],$_POST['start'],$_POST['to']);
                               }
                           }
                           else if ($_POST['is_type'] == "payment") 
                           {
                            $searchtype = "pay";
                            $exequery = $rp->getCustomerPaymentList();
                                if (!empty($_POST['customerid']) && (empty($_POST['start']) && empty($_POST['to']))) 
                               {
                  $exequery = $rp->getCustomerPaymentList($_POST['customerid']);
                               }
                             
                            if (!empty($_POST['customerid'])&& (!empty($_POST['start']) && empty($_POST['to'])))
                               {
                             $exequery = $rp->getCustomerPaymentList($_POST['customerid'],$_POST['start']);
                               }
                  
                          if (!empty($_POST['customerid'])&& (!empty($_POST['start']) && !empty($_POST['to'])))
                               {
                             $exequery = $rp->getCustomerPaymentList($_POST['customerid'],$_POST['start'],$_POST['to']);
                               }
                           }
                           else if ($_POST['is_type'] == "proudct") 
                           {
                            $searchtype = "pro";
                             $exequery = $rp->getCustomerProductList();
                             if (!empty($_POST['customerid']) && (empty($_POST['start']) && empty($_POST['to']))) 
                               {
                  $exequery = $rp->getCustomerProductList($_POST['customerid']);
                               } 
                  
                            if (!empty($_POST['customerid'])&& (!empty($_POST['start']) && empty($_POST['to'])))
                               {
                             $exequery = $rp->getCustomerProductList($_POST['customerid'],$_POST['start']);
                               }
                  
                          if (!empty($_POST['customerid'])&& (!empty($_POST['start']) && !empty($_POST['to'])))
                               {
                             $exequery = $rp->getCustomerProductList($_POST['customerid'],$_POST['start'],$_POST['to']);
                               } 
                           }
                            
                  
                  if (isset($_POST['customCheck']) && $_POST['customCheck'] == "Yes")
                  {
                  $sum = $fn->userOpeningBalance($_POST['customerid']);
                  }
                  else
                  {
                  $sum = 0;
                  }
                  
                              
                       }
                      /* echo "<pre>";
                      print_r($exequery);
                      echo "</pre>";*/
                                  $data = $db->joinQuery($exequery)->fetchAll();
                                   /*echo "<pre>";
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
                    if (!empty($_POST['customerid'])) 
                    {
                      echo ' <address style="margin-left: 44px;">'.$dm->getUserFullDetails($_POST['customerid']).' </address>';
                    }
                       
                  }
                  if (isset($_GET['cusid'])) 
                  {
                    echo ' <address style="margin-left: 44px;">'.$dm->getUserFullDetails($_GET['cusid']).' </address>';
                  }
                  ?> 
               <div class="table-responsive">
                  <table border="1" id="datatable-buttons">
                     <thead>
                        <tr>
                           <th>#</th>
                           <th>Date</th>
                           <th>Description</th>
                           <th>Sell Amount</th>
                           <th>Sell Return Amount</th>
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
                           $str = $rp->getCustomerToken($tkn,$amount,trim($val['paytk']));
                           $payment    = $str['payamount'];
                           $sellamount = $str['sellamount'];
                           $return     = $str['sellreturn'];
                           $desc       = $str['descrip'];
                           
                           if ($sellamount != 0 && $payment !=0 ) 
                           {
                                            if ($searchtype == "pay") 
                                                      {
                                                        $sellamount = 0;
                                                        $sum += (float)$payment;
                                                        $paymentsum += (float)$payment;
                                                      }
                                                      else if ($searchtype == "pro") 
                                                      {
                                                        $payment = 0;
                                                        $sum += (float)$sellamount;
                                                        $purchasesum += (float)$sellamount;
                                                      }
                                                      else if ($searchtype == "all") 
                                                      {
                                                       $purchasesum += (float)$sellamount;
                                                       $paymentsum  += (float)$payment;
                                                        $sum += (float)$sellamount-(float)$payment;
                                                      }
                            
                           }
                           else if ($sellamount != 0 && $payment ==0) 
                           {
                                           if ($searchtype == "pay") 
                                                      {
                                                        $payment = 0;
                                                        $sellamount = 0;
                                                        continue;
                                                       // $sum += (float)$puramount;
                                                      }
                                                      else if ($searchtype == "pro") 
                                                      {
                                                        $payment = 0;
                                                        $sum += (float)$sellamount;
                                                        $purchasesum += (float)$sellamount;
                                                      }
                                                      else if ($searchtype == "all") 
                                                      {
                                                       $purchasesum += (float)$sellamount;
                                                       $paymentsum  += (float)$payment;
                                                        $sum += (float)$sellamount-(float)$payment;
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
                                                         $purchasesum += (float)$sellamount;
                                                         
                                                      }
                                                      else if ($searchtype == "all") 
                                                      {
                                                         $sum -= (float)$payment;
                                                         $purchasesum += (float)$sellamount;
                                                         $paymentsum   += (float)$payment;
                                                      }
                            
                           }
                            
                           
                            ?>
                        <tr>
                           <td><?=$i?></td>
                           <td><?=$val['selldate']?></td>
                           <td><?=$desc?></td>
                           <td><?=($sellamount==0)?" ":$sellamount?></td>
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