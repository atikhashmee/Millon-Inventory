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
                                  <li class="breadcrumb-item active">Customer Payments</li>
                                </ol>
                            </div>
                            <h4 class="page-title"> Customer Payment Report</h4>
                            
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
                <select class="form-control" name="cutomername" id="cutomername">
                     <option value="">Select a Customer</option>
                       <?=$dm->getUsersByRole(1)?>
                  </select>
                </div>
              
                 
              <div class="col"><input type="date" class="form-control" name="start"></div>
              <div class="col"><input type="date" class="form-control" name="to"></div>
              <div class="col">
                <button type="submit"  name="filter" class="btn btn-outline-primary">  Search <i class="fa fa-search"></i></button>
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
   
         $sql =  "SELECT `recievedate`, `cusotmer_id`, `amounts`,`bycashcheque`,`carreier` FROM `recevecollection` WHERE bycashcheque ='Cash' 
           UNION 
          SELECT `expiredate`,`customerid`, `amount`, `fromtable`,`carrier` FROM `cheque` WHERE fromtable='add' 
           UNION 
           SELECT `selldate`, `customerid`,`payment_taka`, `token`,`sellby` FROM `sell` WHERE TRIM(payment_taka) <> '' ";
           $duebalance = 0;
         if (isset($_POST['filter'])) {
              //search by only name
              if (!empty($_POST['cutomername'])) {
                $sql ="SELECT `recievedate`, `cusotmer_id`, `amounts`,`bycashcheque`,`carreier` FROM `recevecollection` WHERE bycashcheque ='Cash' AND `cusotmer_id`='".$_POST['cutomername']."'
             UNION
        SELECT `expiredate`,`customerid`, `amount`, `fromtable`,`carrier` FROM `cheque` WHERE fromtable='add' AND`customerid`='".$_POST['cutomername']."'
        UNION 
           SELECT `selldate`, `customerid`,`payment_taka`, `token`,`sellby` FROM `sell` WHERE TRIM(payment_taka) <> '' AND `customerid`='".$_POST['cutomername']."'";
              }
             
              // fetching customer opening balnce to add up the total transaction
              $customers_opening = $db->joinQuery("SELECT `opening_balance` FROM `users` WHERE `u_id`='".$_POST['cutomername']."'")->fetch(PDO::FETCH_ASSOC);
              $opening = $customers_opening['opening_balance'];
              $duebalance = $fn->getCustomerPurchasedAmount($_POST['cutomername']);
          
              ?>
              <div class="bg-light card card-body" style=" background: #060202 !important;">
                <h4 style="color: white">Customer Name : <?php  echo $fn->getUserName($_POST['cutomername']); ?></h4>
                <!-- <h5 style="color: white">Total due Balance : <?php echo $fn->getCustomerPurchasedAmount($_POST['cutomername']); ?> </h5> -->
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
               <th>Total</th>
               <th>Carrier/sell by</th>
               <th>Status</th>
               
            </tr>
         </thead>
         <tbody>
         
            <?php 
               $i=0;
               $sum = 0;
                  foreach ($data as $val) {  $i++;
                    $sum+= (int)$val['amounts'];  
                   ?>
            <tr>
               <th scope="row"><?=$i?></th>
               <td><?=$val['recievedate']?></td>
               <td><?=$val['amounts']?></td>
               <td><?=$sum?></td>
                <td><?=$val['carreier']?></td>
                <td><?php 
                 if ($val['bycashcheque']=="add") {
                     echo "Cheque Collection";
                  } else if ($val['bycashcheque']=="s") {
                    echo "Payment on purchase";
                  } else {
                    echo "Cash Collection";
                  }
                ?></td>
   
               </tr>
            <?php   }
               ?>

             
               
               
         </tbody>
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
      </table>

      </div>
   </div>
</div>
</div>
<?php include 'files/footer.php'; ?>
