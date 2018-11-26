<?php include 'files/header.php'; ?>
<?php include 'files/menu.php'; 
$rbas->setPageName(6)->run();
$pagetitle = (isset($_GET['edit-id']))?"Update":"Add";


if (isset($_GET['del-id'])) {

           $getstatus = $db->selectAll('recevecollection',"recol_id='".$_GET['del-id']."'")->fetch(PDO::FETCH_ASSOC);
            if ($getstatus['bycashcheque'] == 'Cheque') {
                 $db->delete("cheque","parent_table_id='rac_".$_GET['del-id']."'");
            }
             if ($db->delete("recevecollection","recol_id='".$_GET['del-id']."'") ) {?>
            <script> alert('Data has been deleted');
             window.location.href='recieve-collection.php'; </script>
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
                                  <li class="breadcrumb-item active">Recieve Money</li>
                                </ol>
                            </div>
                        <h4 class="page-title">Recieve And Collection <?=$pagetitle?></h4>
                            
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->
   <div class="row">
      <div class="col-md-12">
         <div class="card">
            
            <div class="card-body">
               <form class="form-horizontal form-label-left" method="post" novalidate>
                  <div class="row">
                     <div class="col">
                        <div class="form-group">
                           <label for="name"> Date <span class="required">*</span>
                           </label>
                           <input id="recievedate" class="form-control" name="recievedate"  required="required" type="date">
                        </div>
                     </div>
                     <div class="col">
                        <div class="form-group">
                           <label class="control-label" for="name">Customer Name  <span class="required">*</span>
                           </label>
                           <select class="form-control" name="customerid">
                              <option value="">Choose option</option>
                              <?php 
                                 $cat  =  $db->joinQuery("SELECT * FROM `users` WHERE `user_role` ='3' OR user_role = '1'")->fetchAll();
                                 foreach ($cat as $cater) { ?>
                              <option value="<?=$cater['u_id']?>"><?=$cater['name']?></option>
                              <?php
                                 }
                                 
                                 ?>
                           </select>
                        </div>
                     </div>
                     <div class="col">
                        <div class="form-group">
                           <label  for="name">Amount<span class="required">*</span>
                           </label>
                           <input id="amount" class="form-control" name="amount"  required="required" type="number">
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
                        <!-- <div class="form-group">
                           <div class="custom-control custom-checkbox">
                             <input type="checkbox" name="ischecq" class="custom-control-input" id="customCheck1">
                             <label class="custom-control-label" for="customCheck1">Cheque</label>
                           </div>
                           
                           </div> -->
                     </div>
                  </div>
                  <div id="chequeoption" style="display: none;">
                     <div class="row">
                        <div class="col">
                           <div class="form-group">
                              <label  for="name"> Cheque  No
                              </label>
                              <input id="checkno" class="form-control" name="checkno"   type="text">
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
                              <input id="issuedate" class="form-control" name="issuedate"  type="date">
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col">
                        <div class="form-group">
                           <label class="control-label" for="name">Carrier
                           </label>
                           <input id="carrier" class="form-control" name="carrier"  type="text">
                        </div>
                     </div>
                     <div class="col">
                        <div class="form-group">
                           <label class="control-label" for="name">Adjustment
                           </label>
                           <input id="adjustment" class="form-control" name="adjustment" type="text">
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <button type="submit" class="btn btn-primary">Cancel</button>
                     <button id="savecategory" name="saverecieve" type="submit" class="btn btn-success">Submit</button>
                  </div>
               </form>
            </div>
         </div>
         <?php 
            if (isset($_POST['saverecieve'])) {


              if (empty($_POST['recievedate'])) {
                 echo "<h1 style='color:red'>Date field can not be empty</h1>";
              }else if (empty($_POST['customerid'])) {
                echo "<h1 style='color:red'>Customer ID field can not be empty</h1>";
              }else if (empty($_POST['amount'])) {
                echo "<h1 style='color:red'>Amount ID field can not be empty</h1>";
              }else if (empty($_POST['carrier'])) {
                echo "<h1 style='color:red'>Carrier ID field can not be empty</h1>";
              }else {



                   

                $chequecash = ($_POST['customRadio']=="yes")?"Cheque":"Cash";
            
                 $data = array(
                   'recievedate' => $_POST['recievedate'], 
                   'cusotmer_id' => $_POST['customerid'], 
                   'amounts' => $_POST['amount'],
                   'carreier' => $_POST['carrier'], 
                   'adjustment' => $_POST['adjustment'],
                   'addedby' =>   $_SESSION['u_id'],
                   'bycashcheque' =>  $chequecash
                 );
                $parentid = 0;
                 if ($db->insert("recevecollection",$data)) {
                $parentid = $db->getInsertId('recol_id');
                   echo "<h1 style='color:blue'> Money has been collected</h1>";
                   
                 }else {
                   echo "<h1 style='color:red'> There is a problem</h1>";
                 }

                  if ($_POST['customRadio']=="yes") {
                  $chquedata = array(
                    'parent_table_id' => "rac_".$parentid,
                    'accountno' => $_POST['checkno'],
                    'customerid' => $_POST['customerid'],
                    'bankname' => $_POST['accounts'],
                    'expiredate' => $_POST['issuedate'],
                    'amount' => $_POST['amount'],
                    'carrier' => $_POST['carrier'],
                    'userid' => $_SESSION['u_id'],
                    'fromtable' => "add"
                  );
                  if ($db->insert("cheque",$chquedata)) {
                   echo "<h1 style='color:blue'>Cheque has been saved</h1>";
                 }
                  
                }
                    /* echo "<pre>";
                      print_r($data);
                     echo "</pre>";*/



                     

              }


                
            
                   
            }
            
            
            ?>
      </div>
      <div class="col-md-12"   style="margin-top: 22px;" >
         <div class="card card-body">
            <table class="table table-striped table-bordered table-striped" id="datatable">
               <thead>
                  <tr>
                     <th>#SL</th>
                     <th>Recieve Date</th>
                     <th>Customer</th>
                     <th>Amount</th>
                     <th>Carriar</th>
                     <th>By</th>
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody>
                  <?php 
                     $recdata =  $db->selectAll("recevecollection")->fetchAll();
                       $i=0;
                       foreach ($recdata as $val) {  $i++; ?>
                  <tr>
                     <th><?=$i?></th>
                     <td><?=$val['recievedate']?></td>
                     <td><?=$fn->getUserName($val['cusotmer_id'])?></td>
                     <td><?=$val['amounts']?></td>
                     <td><?=$val['carreier']?></td>
                     <td><?=$val['bycashcheque']?></td>
                     <td> <div class="dropdown">
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
              <a class="dropdown-item" href="recieve-collection.php?del-id=<?=$val['recol_id']?>" onclick="return confirm('Are you sure?')">Delete</a>
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