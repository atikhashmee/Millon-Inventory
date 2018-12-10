<?php include 'files/header.php'; ?>
<link href="assets/plugins/alertify/css/alertify.css" rel="stylesheet" type="text/css">
<script src="assets/plugins/alertify/js/alertify.js"></script>
<?php include 'files/menu.php'; 

$rbas->setPageName(10)->run();
$pagetitle = (isset($_GET['edit-id']))?"Update":"Add";

// delete the item
if (isset($_GET['del-id'])) {
                       if ($db->delete("employeetype","et_id = '".$_GET['del-id']."'")) {?>
            <script> alert('Data has been deleted'); window.location.href='employee-type.php'; </script>
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
                                  <li class="breadcrumb-item active">Employee Type</li>
                                </ol>
                            </div>
                            <h4 class="page-title"> Employee Type <?=$pagetitle?></h4>
                            
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->
   <div class="row" style="margin-top: 20px">
      <div class="col">
         <?php 

            if (isset($_GET['edit-id'])) { 
              //fetch the values for the update
$datas = $db->selectAll("employeetype","et_id='".$_GET['edit-id']."'")->fetch(PDO::FETCH_ASSOC);
              ?>

              <div class="card card-body">
               <form class="form-horizontal form-label-left" method="post" >
                  <div class="form-group">
                     <label for="name"> Name <span class="required">*</span>
                     </label>
                   <input id="etype_name" class="form-control"  name="etype_name"  required="required" type="text" value="<?=$datas['name']?>">
                  </div>
                
                  <div class="form-group">
                     
                        <button type="submit" class="btn btn-outline-danger">Cancel</button>
                        <button id="updatecate" name="updatecate" type="submit" class="btn btn-outline-warning">Update <i class="fa fa-floppy-o"></i></button>
                     
                  </div>
               </form>
            </div>
         <?php    } else { ?>
                  <div class="card card-body">
               <form class="form-horizontal form-label-left" method="post" >
                  <div class="form-group">
                     <label for="name"> Name <span class="required">*</span>
                     </label>
                     <input id="etype_name" class="form-control"  name="etype_name"  required="required" type="text">
                  </div>
                 
                  <div class="form-group">
                     
                        <button type="submit" class="btn btn-outline-danger">Cancel</button>
                        <button id="saveusers" name="savecat" type="submit" class="btn btn-outline-primary">Submit <i class="fa fa-floppy-o"></i> </button>
                     
                  </div>
               </form>
            </div>
      <?php    }

         ?>
            
         

         <?php 
            if (isset($_POST['savecat'])) {
            
                 $data = array(
                  'name' => $_POST['etype_name']
                );
                if (!empty($_POST['etype_name'])) {
                    if ($db->insert("employeetype",$data)) { ?>
                        <script> alertify.alert("Data has been saved") </script>
                 <?php    } else {
                      ?>
                        <script> alert("Data has not been saved") </script>
                 <?php
                    }
                }else{
                    ?>
                        <script> alert("Fields are empty")</script>
                 <?php
                }
            } 


             if (isset($_POST['updatecate'])) {
            
                 $data = array(
                  'name' => $_POST['etype_name']
                );
                if (!empty($_POST['etype_name'])) {
                    if ($db->update("employeetype",$data,"et_id='".$_GET['edit-id']."'")) {
                        ?>
                        <script> alert("Data has been Updated") </script>
                 <?php 
                    } else {
                      ?>
                        <script> alert("Data has been not Updated") </script>
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
            $sql =  "SELECT * FROM `employeetype`";
            $i =0;
            
            $data = $db->joinQuery($sql)->fetchAll();
            
            ?>
            <div class="card card-body">
         <table class="table table-striped table-condensed table-bordered" id="datatable">
            <thead>
               <tr>
                  <th>#</th>
                  <th>Name</th>
                  
                  <th>Action</th>
               </tr>
            </thead>
            <tbody>
               <?php 
                  foreach ($data as $val) {  $i++;

                   ?>
               <tr>
                  <th scope="row"><?=$i?></th>
                  <td><?=$val['name']?></td>
                  
                  <td><div class="dropdown">
  <button type="button" class="btn btn-outline-primary dropdown-toggle" data-toggle="dropdown">
    <i class="fa fa-gear"></i>
  </button>
  <div class="dropdown-menu">
    <?php 
         if ($rbas->getView()) {
              echo '<a class="dropdown-item" href="#">View <i class="fa fa-eye"></i> </a>';
         }
         if ($rbas->getUpdate()) {
              echo '<a class="dropdown-item"
               href="employee-type.php?edit-id='.$val['et_id'].'">Edit <i class="fa fa-pencil"></i></a>';
         }
         if ($rbas->getDelete()) { ?>
              <a class="dropdown-item" href="employee-type.php?del-id=<?=$val['et_id']?>" onclick="return confirm('Are you sure?')">Delete <i class="fa fa-times"></i></a>
      <?php   }
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