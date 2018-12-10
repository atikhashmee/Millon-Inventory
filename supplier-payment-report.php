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
                                  <li class="breadcrumb-item active">Supplier Payment report</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Supplier Payment Report</h4>
                            
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->

     <div class="row">
       <div class="col">
         <div class="card card-body">
          <form action="" method="POST">
            <div class="row">
               <div class="col">
                <select class="form-control" name="suppliername" id="suppliername">
                     <option>Select a Supplier</option>
                     <?=$dm->getUsersByRole(2)?>
                  </select>
                </div>
              
                 
              <div class="col"><input type="date" class="form-control" name="start"></div>
              <div class="col"><input type="date" class="form-control" name="to"></div>
              <div class="col">
                <button type="submit" name="filter" class="btn btn-outline-primary">Search <i class="fa fa-search"></i> </button>
              </div>
            </div>
          </form>
         </div>
       </div>

     </div>



<div class="row" style="margin-top: 22px;">
   <!-- users view section starts here -->
   <div class="col">
   <?php 
   
         $sql =  "SELECT `pay_date`, `sup_id`, `amnts`, `carier`, `status` FROM `supplierpayment` WHERE `status`='Cash' 
           UNION 
          SELECT `expiredate`,`customerid`, `amount`, `fromtable`,`carrier` FROM `cheque` WHERE fromtable='minus' AND approve ='1'
           UNION 
           SELECT  `purchasedate`, `supplier`,  `payment_taka`, `token`,`purchaseentryby` FROM `purchase` WHERE TRIM(payment_taka) <> ''";

           $duebalance = 0;
         if (isset($_POST['filter'])) {

              //search by only name
              if (!empty($_POST['suppliername'])) {

                $sql ="SELECT `pay_date`, `sup_id`, `amnts`, `carier`, `status` FROM `supplierpayment` WHERE `status`='Cash'  AND `sup_id`='".$_POST['suppliername']."'
             UNION
        SELECT `expiredate`,`customerid`, `amount`, `fromtable`,`carrier` FROM `cheque` WHERE fromtable='minus' AND approve ='1' AND`customerid`='".$_POST['suppliername']."'
        UNION 
           SELECT  `purchasedate`, `supplier`,  `payment_taka`, `token`,`purchaseentryby` FROM `purchase` WHERE TRIM(payment_taka) <> '' AND `supplier`='".$_POST['suppliername']."'";
              }


             
              // fetching customer opening balnce to add up the total transaction
              $customers_opening = $db->joinQuery("SELECT `opening_balance` FROM `users` WHERE `u_id`='".$_POST['suppliername']."'")->fetch(PDO::FETCH_ASSOC);
              $opening = $customers_opening['opening_balance'];
              $duebalance = $fn->getSupllierdueby($_POST['suppliername']);
          
              ?>
              <div class="bg-light card card-body" style=" background: #060202 !important;">
                <h4 style="color: white">Supplier Name : <?php  echo $fn->getUserName($_POST['suppliername']); ?></h4>
                <p>Opening Balance : <?=$opening?></p>
                
              </div>
              <?php 
         }
         
         
         
         $data = $db->joinQuery($sql)->fetchAll();

         
         ?>

  
     <div class="card card-body">
      <table class="table table-hover table-bordered" id="datatable-buttons" >
         <thead>
            <tr>
               <th>#</th>
               <th>Date</th>
               <th>Amount</th>
               
               <th>Carrier/Purchased by</th>
               <th>Status</th>
               
            </tr>
         </thead>
         <tbody>
         
            <?php 
               $i=0;
               $sum = 0;
                  foreach ($data as $val) {  $i++;
                    $sum += (int)$val['amnts'];  
                   ?>
            <tr>
               <th scope="row"><?=$i?></th>
               <td><?=$val['pay_date']?></td>
               <td><?=$val['amnts']?></td>
               
                <td><?=$val['carier']?></td>
                <td><?php 
                 if ($val['status']=="minus") {
                     echo "Cheque Collection";
                  } else if ($val['status']=="p") {
                    echo "Payment on purchase";
                  } else {
                    echo "Cash Collection";
                  }
                ?></td>
   
               </tr>
            <?php   }
               ?>

               <tr>
                 <td></td>
                 <td></td>
                 <td>Total due</td>
                 <td><?=$duebalance?></td>
                 <td></td>
                 <td></td>
               </tr> 
               <tr>
                 <td></td>
                 <td></td>
                 <td> Total Paid </td>
                 <td><?=$sum?></td>
                 <td></td>
                 <td></td>
               </tr> 
               <tr>
                 <td></td>
                 <td></td>
                 <td> Balance </td>
                 <td><?=$duebalance-$sum?></td>
                 <td></td>
                 <td></td>
               </tr> 
               
               
         </tbody>
      </table>
        </div>
      
   </div>
</div>
</div>
<?php include 'files/footer.php'; ?>
