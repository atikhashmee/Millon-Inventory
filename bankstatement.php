<?php include 'files/header.php'; ?>
<?php include 'files/menu.php';
 ?>


 <style>
 /* description in the table column */
   .description{
    font-size: 16px;
    padding: 5px;

   }
 </style>
<div class="container">
   <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="btn-group pull-right">
                                <ol class="breadcrumb hide-phone p-0 m-0">
                                  <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                                  <li class="breadcrumb-item"><a href="#">Report</a></li>
                                  <li class="breadcrumb-item active">Bank statement</li>
                                </ol>
                            </div>
                            <h4 class="page-title"> Bank Statement</h4>
                            
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->
     <div class="row">
       <div class="col">
         <div class="card card-body">
          <form action="">
            <div class="row">
               <div class="col">
                <select name="" id="" class="form-control">
                   <option value="">Select A Bank Name</option>
                    <?php 
                                 $cat  =  $db->joinQuery("SELECT * FROM `charts_accounts`")->fetchAll();
                                 foreach ($cat as $cater) { ?>
                              <option value="<?=$cater['charts_id']?>"><?=$cater['chart_name']?></option>
                              <?php
                                 }
                                 ?>
                </select>
                </div>
              <div class="col"><input type="date" class="form-control" name="start"></div>
              <div class="col"><input type="date" class="form-control" name="to"></div>
              <div class="col"><button type="submit"  class="btn btn-outline-primary">  Search <i class="fa fa-search"></i> </button> </div>
            </div>
          </form>
         </div>
       </div>
     </div>



<div class="row" style="margin-top: 20px;">

   <!-- users view section starts here -->

   <div class="col">
      <?php 
         $sql = "SELECT `selldate`, `customerid`, `payment_taka`, `token` FROM `sell` WHERE `token` = 's_Cash'
          UNION 
         SELECT `recievedate`, `cusotmer_id`, `amounts`, `bycashcheque` FROM `recevecollection` WHERE `bycashcheque` = 'rac_Cash' 
         UNION 
         SELECT `pay_date`, `sup_id`, `amnts`, `status` FROM `supplierpayment` WHERE `status`='pts_Cash' 
         UNION 
         SELECT `expiredate`, `customerid`, `amount`, `fromtable` FROM `cheque` WHERE `approve`='1' 
         UNION 
         SELECT `expendituredate`, `accountsid`, `amount`, `token` FROM `expenditure` 
         UNION 
         SELECT `payment_date`, `employeeid`,`amount_pay`, `token` FROM `e_payment_salery` 
         UNION 
         SELECT `purchasedate`, `supplier`, `payment_taka`, `token` FROM `purchase` where `token` = 'p_Cash' ";
         
         
           //echo $sql;
         $data = $db->joinQuery($sql)->fetchAll();
         $opening_balance  =  $db->joinQuery("SELECT `opening_balance` FROM `charts_accounts` WHERE `chart_name`='Cash'")->fetch(PDO::FETCH_ASSOC);
         echo "<div class='card card-body'>";
         echo "<h5> Account type = Cash </h5>";
        echo "<h5> Opening Balance = ".$opening_balance['opening_balance']."</h5>";
         echo "</div>";
         
         ?>
       <div class="card card-body">
        <h4>Statement</h4>
        <hr>
      <table class="table table-hover table-bordered" id="datatable-buttons" >
         <thead>
            <tr>
               <th>#</th>
               <th>Date</th>
               <th>Customer</th>
               <th>Descrioption</th>
               <th>Taka</th>
               <th>Total</th>
            </tr>
         </thead>
         <tbody>
            <?php 
               $i=0;
               $sum = $opening_balance['opening_balance'];
                  foreach ($data as $val) {  $i++;
                   ?>
            <tr>
               <th scope="row"><?=$i?></th>
               <td><?=$val['selldate']?></td>
               <td><?=$fn->getUserName($val['customerid'])?></td>
               <td><?php 
               $tkn = trim($val['token']);
               //echo $tkn."</br>";
                  if ($tkn == "pts_Cash") 
                    {
                      echo '<p class="description">Payment Paid to supplier <a href="#">'.$fn->getUserName($val['customerid']).'</a></p>';
                    }
                    if ($tkn == "rac_Cash") 
                    {
                      echo '<p class="description">Payment collection from customer <a href="#">'.$fn->getUserName($val['customerid']).'</a> </p>';
                    }
                   else  if ($tkn == "s_Cash") 
                    {
                      echo '<p class="description">Product sold payment from customer <a href="#">'.$fn->getUserName($val['customerid']).'</a> </p>';
                    }
                    else if ($tkn == "p_Cash") 
                    {
                      echo '<p class="description">Purchase Payment to supplier <a href="#">'.$fn->getUserName($val['customerid']).'</a> </p>';
                    }
                    else if ($tkn == "add") 
                    {
                      echo '<p class="description">Cheque has been withdrawn from the customer <a href="#">'.$fn->getUserName($val['customerid']).'</a> </p>';
                    } 
                    else if (substr($tkn, 0,7) == "expense") 
                    {
                      $tkens = explode("_", $tkn);
                      echo '<p class="description">Bill paid for <a href="#">'.$fn->expenseCategory($tkens[1]).'</a> </p>';
                    }
                    else if (substr($tkn, 0,5) == "stuff") 
                    {
                      $tkens = explode("_", $tkn);
                      echo '<p class="description">Bill paid for <a href="#">'.$fn->expenseCategory($tkens[1]).'</a> to employee <a href="#">'.$fn->getUserName($tkens[2]).'</a> </p>';
                    }
                    
                    else if ($tkn == "minus") 
                    {
                      echo '<p class="description">Cheque Payment to supplier <a href="#">'.$fn->getUserName($val['customerid']).'</a> </p>';
                    }
                    else if ($tkn == "salerypayment") 
                    {
                      echo '<p class="description">Salery Payment to Employee <a href="#">'.$fn->getUserName($val['customerid']).'</a> </p>';
                    }
               ?></td>
               <td><?=$val['payment_taka']?></td>
               <td>
                 <?php 
                 $amounts = $val['payment_taka'];
                    if ($tkn == "pts_Cash") 
                    {
                      echo $sum -= $amounts;
                    }
                    if ($tkn == "rac_Cash") 
                    {
                      echo $sum += $amounts;
                    }
                   else  if ($tkn == "s_Cash") 
                    {
                      echo $sum += $amounts;
                    }
                    else if ($tkn== "p_Cash") 
                    {
                     echo $sum -= $amounts;
                    }
                    else if ($tkn == "add") 
                    {
                      echo $sum += $amounts;
                    } 
                    else if (substr($tkn, 0,7) == "expense") 
                    {
                      echo $sum -= $amounts;
                    }
                    else if (substr($tkn, 0,5) == "stuff") 
                    {
                      echo $sum -= $amounts;
                    }
                    
                    else if ($tkn == "minus") 
                    {
                      echo $sum -= $amounts;
                    }
                    else if ($tkn == "salerypayment") 
                    {
                      echo $sum -= $amounts;
                    }
               ?>
               </td>
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
<?php include 'files/footer.php'; ?>