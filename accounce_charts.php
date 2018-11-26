<?php include 'files/header.php'; ?>
<?php include 'files/menu.php';

$rbas->setPageName(17)->run();
$pagetitle = (isset($_GET['edit-id']))?"Update":"Add";
  function getHeadName($idno)  
  {
     $allheads =  $GLOBALS['db']->joinQuery("SELECT * FROM `acccount_category` WHERE `category_id`='{$idno}'")->fetch(PDO::FETCH_ASSOC);
     echo $allheads['name'];
  }

  // delete function 
  if (isset($_GET['del-id'])) {
             if ($db->delete("charts_accounts","charts_id='".$_GET['del-id']."'")) {?>
            <script> alert('Data has been deleted');
             window.location.href='accounce_charts.php'; </script>
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
                                  <li class="breadcrumb-item"><a href="#">Settings</a></li>
                                  <li class="breadcrumb-item active">Accounts</li>
                                </ol>
                            </div>
                            <h4 class="page-title"> Account  <?=$pagetitle?></h4>
                            
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->


<div class="row" style="margin-top: 22px;">
   <div class="col-md-4">
  <?php 

            if (isset($_GET['edit-id'])) { 
              //fetch the values for the update
$datas = $db->selectAll("charts_accounts","charts_id='".$_GET['edit-id']."'")->fetch(PDO::FETCH_ASSOC);
              ?>
  <div class="card card-body">
    <form class="form-horizontal form-label-left" method="post">
         <div class="form-group">
            <label  for="name">Select a  type <span class="required">*</span>
            </label>
            <select class="form-control" name="catid">
               <option value="">Choose option</option>
               <?php 
                  $cat  =  $db->joinQuery("SELECT * FROM `acccount_category`")->fetchAll();
                  foreach ($cat as $cater) { ?>
               <option value="<?=$cater['category_id']?>"><?=$cater['name']?></option>
               <?php
                  }
                  
                  ?>
            </select>
         </div>
         <div class="form-group">
            <label  for="name"> Name <span class="required">*</span>
            </label>
            <input id="name" class="form-control" name="name"  required="required" type="text" value="<?=$datas['chart_name']?>">
         </div>
         <div class="form-group">
            <label  for="name"> Bank Account No 
            </label>
            <input id="name" class="form-control" name="accountno" type="text" value="<?=$datas['accountno']?>">
         </div>
         <div class="form-group">
            <label  for="name"> Contact person 
            </label>
 <input id="name" class="form-control" name="contactperson"  type="text" value="<?=$datas['contactperson']?>">
         </div>
         <div class="form-group">
            <label  for="name"> Contact Number 
            </label>
            <input id="name" class="form-control" name="contactnumber"   type="text" value="<?=$datas['contactnumber']?>">
         </div>
         <div class="form-group">
            <label  for="name"> E-Mail 
            </label>
            <input id="name" class="form-control" name="mail"   type="text" value="<?=$datas['email']?>">
         </div>
         <div class="form-group">
            <label  for="name"> Address 
            </label>
            <input id="name" class="form-control" name="adrs"   type="text" value="<?=$datas['address']?>">
         </div>
         <div class="form-group">
            <label  for="name"> Opening Balance <span class="required">*</span>
            </label>
            <input id="opening_balance" class="form-control" name="opening_balance"  required="required" type="text" value="<?=$datas['opening_balance']?>">
         </div>
         <div class="form-group">
            <div class="col-md-6 col-md-offset-3">
               <button type="submit" class="btn btn-danger">Cancel</button>
               <button id="udpatecategory" name="udpatecategory" type="submit" class="btn btn-warning">Update</button>
            </div>
         </div>
      </form>
  </div>
<?php    } else { ?>
  <div class="card card-body">
    <form class="form-horizontal form-label-left" method="post">
         <div class="form-group">
            <label  for="name">Select a  type <span class="required">*</span>
            </label>
            <select class="form-control" name="catid">
               <option value="">Choose option</option>
               <?php 
                  $cat  =  $db->joinQuery("SELECT * FROM `acccount_category`")->fetchAll();
                  foreach ($cat as $cater) { ?>
               <option value="<?=$cater['category_id']?>"><?=$cater['name']?></option>
               <?php
                  }
                  
                  ?>
            </select>
         </div>
         <div class="form-group">
            <label  for="name"> Name <span class="required">*</span>
            </label>
            <input id="name" class="form-control" name="name"  required="required" type="text">
         </div>
         <div class="form-group">
            <label  for="name"> Bank Account No 
            </label>
            <input id="name" class="form-control" name="accountno"   type="text">
         </div>
         <div class="form-group">
            <label  for="name"> Contact person 
            </label>
            <input id="name" class="form-control" name="contactperson"  type="text">
         </div>
         <div class="form-group">
            <label  for="name"> Contact Number 
            </label>
            <input id="name" class="form-control" name="contactnumber"   type="text">
         </div>
         <div class="form-group">
            <label  for="name"> E-Mail 
            </label>
            <input id="name" class="form-control" name="mail"   type="text">
         </div>
         <div class="form-group">
            <label  for="name"> Address 
            </label>
            <input id="name" class="form-control" name="adrs"   type="text">
         </div>
         <div class="form-group">
            <label  for="name"> Opening Balance <span class="required">*</span>
            </label>
            <input id="opening_balance" class="form-control" name="opening_balance"  required="required" type="text">
         </div>
         <div class="form-group">
            <div class="col-md-6 col-md-offset-3">
               <button type="submit" class="btn btn-primary">Cancel</button>
               <button id="savecategory" name="savecategory" type="submit" class="btn btn-success">Submit</button>
            </div>
         </div>
      </form>
  </div>
<?php } ?>
      
      <?php 
      //update information
         if (isset($_POST['udpatecategory'])) {
              
         
              $data = array(
               'main_cat_id' => $_POST['catid'], 
               'chart_name' => $_POST['name'],
               'accountno' => $_POST['accountno'],
               'contactperson' => $_POST['contactperson'],
               'contactnumber' => $_POST['contactnumber'],
               'email' => $_POST['mail'],
               'address' => $_POST['adrs'],
               'opening_balance' => $_POST['opening_balance'],
               'created_at' => date("Y-m-d") 
             );
             if (!empty($_POST['name'])) {
                 if ($db->update("charts_accounts",$data,"charts_id='".$_GET['edit-id']."'")) {
                     echo "<h1 style='color:blue'>Data has been updated</h1>";
                 }else{
                   echo "<h1 style='color:red'>Data has not been updated</h1>";
                 }
             }else{
                 echo "<h1 style='color:red'>Fields are empty</h1>";
             }
         }  
         //ssave information
          if (isset($_POST['savecategory'])) {
              
         
              $data = array(
               'main_cat_id' => $_POST['catid'], 
               'chart_name' => $_POST['name'],
               'accountno' => $_POST['accountno'],
               'contactperson' => $_POST['contactperson'],
               'contactnumber' => $_POST['contactnumber'],
               'email' => $_POST['mail'],
               'address' => $_POST['adrs'],
               'opening_balance' => $_POST['opening_balance'],
               'created_at' => date("Y-m-d") 
             );
             if (!empty($_POST['name'])) {
                 if ($db->insert("charts_accounts",$data)) {
                     echo "<h1 style='color:blue'>Data has been saved</h1>";
                 }else{
                   echo "<h1 style='color:red'>Data has not been saved</h1>";
                 }
             }else{
                 echo "<h1 style='color:red'>Fields are empty</h1>";
             }
         }
         
         
         ?>
   </div>
   <!-- users view section starts here -->
   <div class="col">
      <?php 
         $sql =  "SELECT * FROM `charts_accounts`";
         
         if (isset($_POST['searchuser'])) {
            $sql .=" WHERE `main_cat_id`='".$_POST['usertypeforsearch']."'";
            
         }
         $sql .="ORDER BY `main_cat_id` DESC";
           //echo $sql;
         $data = $db->joinQuery($sql)->fetchAll();
         
         ?>
         <div class="card card-body">
      <table class="table  table-hover table-striped table-bordered" id="datatable" >
         <thead>
            <tr>
               <th>#</th>
               <th>Head Name</th>
               <th>chart Name</th>
               <th>opening Balance</th>
               <th>Action</th>
            </tr>
         </thead>
         <tbody>
            <?php 
               $i=0;
                  foreach ($data as $val) {  $i++; ?>
            <tr>
               <th scope="row"><?=$i?></th>
               <td><?=getHeadName($val['main_cat_id'])?></td>
               <td><?=$val['chart_name']?></td>
               <td><?=$val['opening_balance']?></td>
               <td><div class="dropdown">
  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
    options
  </button>
  <div class="dropdown-menu">
    <?php 
         if ($rbas->getView()) {
              echo '<a class="dropdown-item" href="#">View</a>';
         }
         if ($rbas->getUpdate()) {
              echo '<a class="dropdown-item" href="accounce_charts.php?edit-id='.$val['charts_id'].'">Edit</a>';
         }
         if ($rbas->getDelete()) {
             ?>
              <a class="dropdown-item" href="accounce_charts.php?del-id=<?=$val['charts_id']?>" onclick="return confirm('Are you sure?')">Delete</a>
      <?php 
         }
         if ($rbas->getPrint()) {
              echo '<a class="dropdown-item" href="#">Print</a>';
         }
    ?>
    
    
  </div>
</div></td>
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