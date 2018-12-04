<?php include 'files/header.php'; ?>
<?php include 'files/menu.php';
 ?>
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
         $sql =  "SELECT `selldate`, `customerid`, `payment_taka`, `token` FROM `sell` WHERE `payment_taka` IS NOT NULL AND TRIM(`payment_taka`) <> ''
UNION 
SELECT `recievedate`, `cusotmer_id`, `amounts`, `bycashcheque` FROM `recevecollection`
UNION 
SELECT `expiredate`, `customerid`, `amount`, `fromtable` FROM `cheque` WHERE `approve`='1'";
         
         
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