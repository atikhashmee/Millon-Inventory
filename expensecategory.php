<?php include 'files/header.php'; ?>
<?php include 'files/menu.php';
$rbas->setPageName(18)->run();
$pagetitle = (isset($_GET['edit-id']))?"Update":"Add";

if (isset($_GET['del-id'])) {
             if ($db->delete("expensecategory","excate_id='".$_GET['del-id']."'")) {?>
            <script> alert('Data has been deleted');
             window.location.href='expensecategory.php'; </script>
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
                            <h4 class="page-title"> Expense Category <?=$pagetitle?></h4>
                            
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->
   <div class="row">
      <div class="col">
          <?php 

            if (isset($_GET['edit-id'])) { 
              //fetch the values for the update
$datas = $db->selectAll("expensecategory","excate_id='".$_GET['edit-id']."'")->fetch(PDO::FETCH_ASSOC);
              ?>
            <div class="card card-body">
               <form class="form-horizontal form-label-left" method="post" >
                  <div class="form-group">
                     <label for="name"> catgory Name <span class="required">*</span>
                     </label>
                     <input id="catname" class="form-control"  name="catname"  required="required" type="text" value="<?=$datas['name']?>">
                  </div>
                  <div class="form-group">
                     <div class="col-md-6 col-md-offset-3">
                        <button type="submit" class="btn btn-danger">Cancel</button>
                        <button id="updatecat" name="updatecat" type="submit" class="btn btn-warning">Update</button>
                     </div>
                  </div>
               </form>
            </div>
            <?php    } else { ?>
              <div class="card card-body">
               <form class="form-horizontal form-label-left" method="post" >
                  <div class="form-group">
                     <label for="name"> catgory Name <span class="required">*</span>
                     </label>
                     <input id="catname" class="form-control"  name="catname"  required="required" type="text">
                  </div>
                  <div class="form-group">
                     <div class="col-md-6 col-md-offset-3">
                        <button type="submit" class="btn btn-primary">Cancel</button>
                        <button id="catsave" name="catsave" type="submit" class="btn btn-success">Submit</button>
                     </div>
                  </div>
               </form>
            </div>
          <?php } ?>
       
         <?php 
         //udpate information
            if (isset($_POST['updatecat'])) {
            
                 $data = array(
                  'name' => $_POST['catname'], 
                  
                  'created_at' => date("Y-m-d") 
                );
                if (!empty($_POST['catname'])) {
                    if ($db->update("expensecategory",$data,"excate_id='".$_GET['edit-id']."'")) {
                         ?>
                        <script> alert("Data has been Updated") </script>
                 <?php
                    } else {
                       ?>
                        <script> alert("Data has not been Updated") </script>
                 <?php
                    }
                }else{
                     ?>
                        <script> alert("Fields are empty") </script>
                 <?php
                }
            }
              //save information

            if (isset($_POST['catsave'])) {
            
                 $data = array(
                  'name' => $_POST['catname'], 
                  
                  'created_at' => date("Y-m-d") 
                );
                if (!empty($_POST['catname'])) {
                    if ($db->insert("expensecategory",$data)) {
                         ?>
                        <script> alert("Data has been saved") </script>
                 <?php
                    } else {
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
         <?php 
            $sql =  "SELECT * FROM `expensecategory`";
            $i =0;
            
            $data = $db->joinQuery($sql)->fetchAll();
            
            ?>
            <div class="card card-body">
         <table class="table table-striped  table-bordered table-hover table-condensed" id="datatable" >
            <thead>
               <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Created at</th>
                  <th>Action</th>
               </tr>
            </thead>
            <tbody>
               <?php 
                  foreach ($data as $val) {  $i++; ?>
               <tr>
                  <th scope="row"><?=$i?></th>
                  <td><?=$val['name']?></td>
                  <td><?=$val['created_at']?></td>
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
              echo '<a class="dropdown-item" href="expensecategory.php?edit-id='.$val['excate_id'].'">Edit</a>';
         }
         if ($rbas->getDelete()) {
             ?>
              <a class="dropdown-item" href="expensecategory.php?del-id=<?=$val['excate_id']?>" onclick="return confirm('Are you sure?')">Delete</a>
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