<?php include 'files/header.php'; ?>
<?php include 'files/menu.php';

$rbas->setPageName(7)->run();
$pagetitle = (isset($_GET['edit-id']))?"Update":"Add";


if (isset($_GET['del-id'])) {

            $getstatus = $db->selectAll('supplierpayment',"pay_id='".$_GET['del-id']."'")->fetch(PDO::FETCH_ASSOC);
            if ($getstatus['status'] == 'Cheque') {
                 $db->delete("cheque","parent_table_id='pts_".$_GET['del-id']."'");
            }
           
     if ($db->delete("supplierpayment","pay_id='".$_GET['del-id']."'")) {?>
            <script> alert('Data has been deleted');
             window.location.href='payment-to-supplier.php'; </script>
            <?php   }
               }


 ?>
<div class="container">
   <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="btn-group pull-right">
                                <ol class="breadcrumb hide-phone p-0 m-0">
                                  <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                                  <li class="breadcrumb-item"><a href="#">Accounce</a></li>
                                  <li class="breadcrumb-item active">Payment to Supplier</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Payment To Supplier <?=$pagetitle?></h4>
                            
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->
   <div class="row">
      <div class="col">
         <div class="card">
            
            <div class="card-body">
               <form class="form-horizontal form-label-left" method="post">
                  <div class="row">
                     <div class="col">
                        <div class="form-group">
                           <label  for="name"> Date <span class="required">*</span>
                           </label>
                           <input id="paymentdat" class="form-control" name="paymentdat"  required="required" type="date">
                        </div>
                     </div>
                     <div class="col">
                        <div class="form-group">
                           <label for="name">Accounts  <span class="required">*</span>
                           </label>
                           <select class="form-control" name="accounts_id">
                              <option value="">Choose option</option>
                              <?php 
                                 $cat  =  $db->joinQuery("SELECT * FROM `charts_accounts`")->fetchAll();
                                 foreach ($cat as $cater) { ?>
                              <option value="<?=$cater['charts_id']?>"><?=$cater['chart_name']?></option>
                              <?php
                                 }
                                 
                                 ?>
                           </select>
                        </div>
                     </div>
                     <div class="col">
                        <div class="form-group">
                           <label for="name">Supplier  Name  <span class="required">*</span>
                           </label>
                           <select class="form-control" name="suppliername">
                              <option value="">Choose option</option>
                              <?php 
                                 $cat  =  $db->joinQuery("SELECT * FROM `users` WHERE `user_role` ='3' OR user_role = '2'")->fetchAll();
                                 foreach ($cat as $cater) { ?>
                              <option value="<?=$cater['u_id']?>"><?=$cater['name']?></option>
                              <?php
                                 }
                                 
                                 ?>
                           </select>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col">
                        <div class="form-group">
                           <label  for="name">Amount <span class="required">*</span>
                           </label>
                           <input id="amount" class="form-control" name="amount"  required="required" type="number">
                        </div>
                     </div>
                     <div class="col">
                        <div class="form-group">
                           <label  for="name">Carrier
                           </label>
                           <input id="carrier" class="form-control" name="carrier"   type="text">
                        </div>
                     </div>
                     <div class="col">
                        <div class="form-group" style="position: relative; top:20px">
                           <div class="custom-control custom-radio">
                              <input type="radio" id="customRadio1" name="customRadio" value="no" onchange="chequeoptioncheck()" class="custom-control-input" checked="">
                              <label class="custom-control-label" for="customRadio1">Cash</label>
                           </div>
                           <div class="custom-control custom-radio">
                              <input type="radio" id="customRadio2" name="customRadio" value="yes" onchange="chequeoptioncheck()" class="custom-control-input">
                              <label class="custom-control-label" for="customRadio2">Cheque</label>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div id="chequeoption" style="display: none;">
                     <div class="row">
                        <div class="col">
                           <div class="form-group">
                              <label  for="name"> Cheque  No
                              </label>
                              <input id="chequeno" class="form-control" name="chequeno"   type="text">
                           </div>
                        </div>
                        <div class="col">
                           <div class="form-group">
                              <label for="">Account</label>
                              <select class="form-control" name="accounts" id="accounts">
                                 <option value="">Select a bank</option>
                                 <option>AB Bank Limited</option>
                                 <option>Agrani Bank Limited</option>
                                 <option>Al-Arafah Islami Bank Limited</option>
                                 <option>Bangladesh Commerce Bank Limited</option>
                                 <option>Bangladesh Development Bank Limited</option>
                                 <option>Bangladesh Krishi Bank</option>
                                 <option>Bank Al-Falah Limited</option>
                                 <option>Bank Asia Limited</option>
                                 <option>BASIC Bank Limited</option>
                                 <option>BRAC Bank Limited</option>
                                 <option>Citibank N.A</option>
                                 <option>Commercial Bank of Ceylon Limited</option>
                              </select>
                           </div>
                        </div>
                        <div class="col">
                           <div class="form-group">
                              <label  for="name"> Issue Date
                              </label>
                              <input id="issuedate" class="form-control" name="issuedate"   type="date">
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <div class="col-md-6 col-md-offset-3">
                        <button type="submit" class="btn btn-primary">Cancel</button>
                        <button id="savepayument" name="savepayument" type="submit" class="btn btn-success">Submit</button>
                     </div>
                  </div>
               </form>
            </div>
         </div>
         <?php 
            if (isset($_POST['savepayument'])) {

              //validation start from here
              if (empty($_POST['paymentdat'])) {
                 echo "<h1 style='color:red'>Date field can not be empty</h1>";
              }else if (empty($_POST['suppliername'])) {
                echo "<h1 style='color:red'>Supplier ID field can not be empty</h1>";
              }else if (empty($_POST['accounts_id'])) {
                echo "<h1 style='color:red'>Accounts ID field can not be empty</h1>";
              }else if (empty($_POST['amount'])) {
                echo "<h1 style='color:red'>Amount ID field can not be empty</h1>";
              }else if (empty($_POST['carrier'])) {
                echo "<h1 style='color:red'>Carrier ID field can not be empty</h1>";
              }else {



             
            
                $chequecash = ($_POST['customRadio']=="yes")?"Cheque":"Cash";
            
                             $data = array(
                              'pay_date' => $_POST['paymentdat'],
                              'sup_id' => $_POST['suppliername'],
                              'amnts' => $_POST['amount'],
                              'carier' =>$_POST['carrier'],
                              'inputby' => $_SESSION['u_id'],
                              'status' =>  $chequecash
                               );
                              $parentid = 0;
                                         if ($db->insert("supplierpayment",$data)) {
                          $parentid = $db->getInsertId('pay_id');
                        
                                    echo "<h1 style='color:blue'> Money has been Paid</h1>";
                                    
                                  }else {
                                      echo 'there is guniounly a problem';
                                    echo "<h1 style='color:red'> There is a problem</h1>";
                                  }



                                     if ($_POST['customRadio']=="yes") {
                  $chquedata = array(
                    'parent_table_id' => "pts_".$parentid,
                    'accountno' => $_POST['chequeno'],
                    'customerid' => $_POST['suppliername'],
                    'bankname' => $_POST['accounts'],
                    'expiredate' => $_POST['issuedate'],
                    'amount' => $_POST['amount'],
                    'carrier' => $_POST['carrier'],
                    'userid' => $_SESSION['u_id'],
                    'fromtable' => "minus"
                  );
                  if ($db->insert("cheque",$chquedata)) {
                   echo "<h1 style='color:blue'>Cheque has been saved</h1>";
                 }
                  
                }

                    }
             
            
            
            }
            
            
            
            ?>
      </div>
   </div>
   <div class="row" style="margin-top: 22px">
      <div class="col">
        <div class="card card-body">
         <table class="table table-bordered table-striped" id="datatable">
            <thead>
               <tr>
                  <th>#SL</th>
                  <th>Payment Date</th>
                  <th>Supplier</th>
                  <th>Amount</th>
                  <th>Carriar</th>
                  <th>By</th>
                  
                  
                  <th>Action</th>
               </tr>
            </thead>
            <tbody>
               <?php 
                  $recdata =  $db->selectAll("supplierpayment")->fetchAll();
                    $i=0;
                    foreach ($recdata as $val) {  $i++; ?>
               <tr>
                  <th><?=$i?></th>
                  <td><?=$val['pay_date']?></td>
                  <td><?=$fn->getUserName($val['sup_id'])?></td>
                  <td><?=$val['amnts']?></td>
                  <td><?=$val['carier']?></td>
                  <td><?=$val['status']?></td>
                  
                  
                  <td>
                      <div class="dropdown">
  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
    options
  </button>
  <div class="dropdown-menu">
    <?php 
         if ($rbas->getView()) {
              echo '<a class="dropdown-item" href="#">View</a>';
         }
         if ($rbas->getUpdate()) {
              echo '<a class="dropdown-item" href="#">Edit</a>';
         }
         if ($rbas->getDelete()) { ?>
              <a class="dropdown-item" href="payment-to-supplier.php?del-id=<?=$val['pay_id']?>" onclick="return confirm('Are you sure?')">Delete</a>
      <?php   }
         if ($rbas->getPrint()) {
              echo '<a class="dropdown-item" href="#">Print</a>';
         }
    ?>
    
    
  </div>
</div>
                  </td>
               </tr>
               <?php   }
                  ?>
            </tbody>
         </table>
         </div>
      </div>
   </div>
</div>
<?php include 'files/footer.php'; ?>
<script>
   // check the radio button to show the cheque payment method
   function chequeoptioncheck(){
     var divid  = document.getElementById('chequeoption');
    var radio  =  document.getElementById('customRadio2');
     if (radio.checked === true){
       divid.style.display = 'inline-block';
     }else {
       divid.style.display = 'none';
     }
   
   }
</script>