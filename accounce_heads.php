<?php include 'files/header.php'; ?>
<?php include 'files/menu.php'; 
$rbas->setPageName(16)->run();
$pagetitle = (isset($_GET['edit-id']))?"Update":"Add";

          if (isset($_GET['del-id'])) {
             if ($db->delete("acccount_category","category_id='".$_GET['del-id']."'")) {?>
            <script> alert('Data has been deleted');
             window.location.href='accounce_heads.php'; </script>
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
                            <h4 class="page-title"> Account Category <?=$pagetitle?></h4>
                            
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->



<div class="row" style="margin-top: 22px;">
   <div class="col">
     <?php 

            if (isset($_GET['edit-id'])) { 
              //fetch the values for the update
$datas = $db->selectAll("acccount_category","category_id='".$_GET['edit-id']."'")->fetch(PDO::FETCH_ASSOC);
              ?>
  <div class="card card-body">
    <form class="form-horizontal" method="post">
         <div class="form-group">
            <label  for="name"> Name <span class="required">*</span>
            </label>
            <input id="name" class="form-control" name="name"  required="required" type="text" value="<?=$datas['name']?>">
         </div>
         <div class="form-group">
            <label for="name">Select a user type <span class="required">*</span>
            </label>
            <input type="hidden" name="dbtypename" value="<?=$datas['type']?>">
            <select class="form-control" name="headtype">
               <option value="">Choose option</option>
               <option value="Assets">Assets</option>
               <option value="liability">liability</option>
               <option value="Expenses">Expenses</option>
               <option value="Revenue">Revenue</option>
            </select>
         </div>
         <div class="form-group">
               <button type="submit" class="btn btn-outline-danger">Cancel</button>
               <button id="udpatecategory" name="udpatecategory" type="submit" class="btn btn-outline-warning">Update<i class="fa fa-floppy-o"></i></button>
           
         </div>
      </form>
  </div>
<?php    } else { ?>
  <div class="card card-body">
    <form class="form-horizontal" method="post">
         <div class="form-group">
            <label  for="name"> Name <span class="required">*</span>
            </label>
            <input id="name" class="form-control" name="name"  required="required" type="text">
         </div>
         <div class="form-group">
            <label for="name">Select a user type <span class="required">*</span>
            </label>
            <select class="form-control" name="headtype">
               <option value="">Choose option</option>
               <option value="Assets" >Assets</option>
               <option value="liability">liability</option>
               <option value="Expenses">Expenses</option>
               <option value="Revenue">Revenue</option>
            </select>
         </div>
         <div class="form-group">
            
               <button type="submit" class="btn btn-outline-danger">Cancel</button>
               <button id="savecategory" name="savecategory" type="submit" class="btn btn-outline-primary">Save <i class="fa fa-floppy-o"></i></button>
           
         </div>
      </form>
  </div>
    <?php   } ?>
      
      <?php 
         if (isset($_POST['udpatecategory'])) {
              
         
              $data = array(
               'name' => $_POST['name'], 
               'type' => (empty($_POST['headtype']))?$_POST['dbtypename']:$_POST['headtype'],
               'created_at' => date("Y-m-d") 
             );
             if (!empty($_POST['name'])) {
                 if ($db->update("acccount_category",$data,"category_id='".$_GET['edit-id']."'")) {
                     ?>
                        <script> alert("Data has been updated") </script>
                 <?php
                 }else{
                  ?>
                        <script> alert("Data has not been updated") </script>
                 <?php
                 }
             }else{
                 ?>
                        <script> alert("Fields are empty") </script>
                 <?php
             }
         } 

         if (isset($_POST['savecategory'])) {
              
         
              $data = array(
               'name' => $_POST['name'], 
               'type' => $_POST['headtype'],
               'created_at' => date("Y-m-d") 
             );
             if (!empty($_POST['name'])) {
                 if ($db->insert("acccount_category",$data)) {
                    ?>
                        <script> alert("Data has been saved") </script>
                 <?php
                 }else{
                   ?>
                        <script> alert("Data has not been saved") </script>
                 <?php
                 }
             }else{
                 ?>
                        <script> alert("Fields are empty") </script>
                 <?php
             }
         }
         
         
         ?>
   </div>
   <!-- users view section starts here -->
   <div class="col">
    
  <div class="card card-body">
   <?php 
         $sql =  "SELECT * FROM `acccount_category`";
         
           //echo $sql;
         $data = $db->joinQuery($sql)->fetchAll();
         
         ?>
      <table class="table table-condensed table-bordered table-hover table-responsive" id="datatable" >
         <thead>
            <tr>
               <th>#</th>
               <th>Name</th>
               <th>Type</th>
               <th>Action</th>
            </tr>
         </thead>
         <tbody>
            <?php 
               $i=0;
                  foreach ($data as $val) {  $i++; ?>
            <tr>
               <th scope="row"><?=$i?></th>
               <td><?=$val['name']?></td>
               <td><?=$val['type']?></td>
               <td><div class="dropdown">
  <button type="button" class="btn btn-outline-primary dropdown-toggle" data-toggle="dropdown">
    <i class="fa fa-gear"></i>
  </button>
  <div class="dropdown-menu">
    <?php 
         if ($rbas->getView()) {
              echo '<a class="dropdown-item" href="#">View <i class="fa fa-eye"></i></a>';
         }
         if ($rbas->getUpdate()) {
              echo '<a class="dropdown-item" href="accounce_heads.php?edit-id='.$val['category_id'].'">Edit <i class="fa fa-pencil"></i> </a>';
         }
         if ($rbas->getDelete()) {
              ?>
              <a class="dropdown-item" href="accounce_heads.php?del-id=<?=$val['category_id']?>" onclick="return confirm('Are you sure?')">Delete <i class="fa fa-times"></i></a>
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
   <!-- end of users view section -->
</div>
</div>
<?php include 'files/footer.php'; ?>