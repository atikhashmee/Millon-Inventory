<?php include 'files/header.php'; ?>
<?php include 'files/menu.php';
 ?>
<div class="container">
   <div class="row">
       <div class="col">
         <div class="bg-light card card-body" style=" background: #b4c6d8 !important">
          <h1 style="text-align: center;">Bank Statement</h1>
         </div>
       </div>
     </div>
     <div class="row">
       <div class="col">
         <div class="bg-light card card-body" style=" background: #060202 !important;">
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
              <div class="col"><input type="submit" class="btn btn-default"></div>
            </div>
          </form>
         </div>
       </div>
     </div>



<div class="row" style="margin-top: 22px;">

   <!-- users view section starts here -->
   <div class="col">
      <?php 
         $sql =  "SELECT `selldate`, `customerid`, `payment_taka`, `token` FROM `sell` WHERE `payment_taka` IS NOT NULL AND TRIM(`payment_taka`) <> ''
UNION 
SELECT `recievedate`, `cusotmer_id`, `amounts`, `bycashcheque` FROM `recevecollection`
UNION 
SELECT `expiredate`, `customerid`, `amount`, `fromtable` FROM `cheque` WHERE `approve`='1'";
         
         
           //echo $sql;
         $data = $db->joinQuery($sql)->fetchAll();
         $opening_balance  =  $db->joinQuery("SELECT `opening_balance` FROM `charts_accounts` WHERE `chart_name`='Cash'")->fetch(PDO::FETCH_ASSOC);
         echo "<h1 style='color:blue'> Account type = Cash </h1>";
         echo "<h1 style='color:blue'> Opening Balance = ".$opening_balance['opening_balance']."</h1>";
         
         ?>
      <table class="table table-hover table-striped table-bordered" id="myTable" >
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
                    if ($val['token'] == "s") {
                      echo 'Product sold out';
                    }else if ($val['token'] == "add") {
                      echo 'Cheque withdrawn';
                    }else if ($val['token'] == "Cash") {
                      echo 'Collection';
                    }else if ($val['token'] == "minus") {
                      echo 'Payment';
                    }
               ?></td>
               <td><?=$val['payment_taka']?></td>
               <td>
                 <?php 
                    if ($val['token'] == "s") {
                      echo $sum += $val['payment_taka']; 
                    }else if ($val['token'] == "add") {
                      echo $sum += $val['payment_taka']; 
                    }else if ($val['token'] == "Cash") {
                      echo $sum += $val['payment_taka']; 
                    }else if ($val['token'] == "minus") {
                      echo $sum -= $val['payment_taka']; 
                    }
               ?>
               </td>
               </tr>
            <?php   }
               ?>
               
         </tbody>
      </table>
      <tr>
                 <td>Total Cash Balance</td>
                 <td> <h1><b><?=number_format((float)$sum,2,'.',',')?></b></h1> </td>
               </tr>
   </div>
</div>
</div>
<?php include 'files/footer.php'; ?>