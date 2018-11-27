<?php include 'files/header.php'; ?>
<?php include 'files/menu.php'; 
$rbas->setPageName(10)->run();
$pagetitle = (isset($_GET['edit-id']))?"Update":"Add";

// delete the item
if (isset($_GET['del-id'])) {
                       if ($db->delete("cateogory","cat_id = '".$_GET['del-id']."'")) {?>
            <script> alert('Data has been deleted'); window.location.href='category.php'; </script>
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
                                  <li class="breadcrumb-item active">Category</li>
                                </ol>
                            </div>
                            <h4 class="page-title"> Category <?=$pagetitle?></h4>
                            
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->
   <div class="row" style="margin-top: 20px">
      <div class="col">
         <?php 

            if (isset($_GET['edit-id'])) { 
              //fetch the values for the update
$datas = $db->selectAll("cateogory","cat_id='".$_GET['edit-id']."'")->fetch(PDO::FETCH_ASSOC);
              ?>

              <div class="card card-body">
               <form class="form-horizontal form-label-left" method="post" >
                  <div class="form-group">
                     <label for="name"> Name <span class="required">*</span>
                     </label>
                     <input id="cat_name" class="form-control"  name="cat_name"  required="required" type="text" value="<?=$datas['cat_name']?>">
                  </div>
                  <div class="form-group">
                     <label  for="textarea">Description 
                     </label>
                     <textarea id="description"  name="description" class="form-control"><?=$datas['cat_description']?> </textarea>
                  </div>
                  <div class="form-group">
                     <div class="col-md-6 col-md-offset-3">
                        <button type="submit" class="btn btn-primary">Cancel</button>
                        <button id="updatecate" name="updatecate" type="submit" class="btn btn-warning">Update</button>
                     </div>
                  </div>
               </form>
            </div>
         <?php    } else { ?>
                  <div class="card card-body">
               <form class="form-horizontal form-label-left" method="post" >
                  <div class="form-group">
                     <label for="name"> Name <span class="required">*</span>
                     </label>
                     <input id="cat_name" class="form-control"  name="cat_name"  required="required" type="text">
                  </div>
                  <div class="form-group">
                     <label  for="textarea">Description 
                     </label>
                     <textarea id="description"  name="description" class="form-control"></textarea>
                  </div>
                  <div class="form-group">
                     <div class="col-md-6 col-md-offset-3">
                        <button type="submit" class="btn btn-primary">Cancel</button>
                        <button id="saveusers" name="savecat" type="submit" class="btn btn-success">Submit</button>
                     </div>
                  </div>
               </form>
            </div>
      <?php    }

         ?>
            
         

         <?php 
            if (isset($_POST['savecat'])) {
            
                 $data = array(
                  'cat_name' => $_POST['cat_name'], 
                  'cat_description' => $_POST['description'],
                  'cat_created_at' => date("Y-m-d") 
                );
                if (!empty($_POST['cat_name'])) {
                    if ($db->insert("cateogory",$data)) { ?>
                        <script> alert("Data has been saved") </script>
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
                  'cat_name' => $_POST['cat_name'], 
                  'cat_description' => $_POST['description'],
                  'cat_created_at' => date("Y-m-d") 
                );
                if (!empty($_POST['cat_name'])) {
                    if ($db->update("cateogory",$data,"cat_id='".$_GET['edit-id']."'")) {
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
            $sql =  "SELECT * FROM `cateogory`";
            $i =0;
            
            $data = $db->joinQuery($sql)->fetchAll();
            
            ?>
            <div class="card card-body">
         <table class="table table-striped table-condensed table-bordered" id="datatable">
            <thead>
               <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Description</th>
                  <th>Action</th>
               </tr>
            </thead>
            <tbody>
               <?php 
                  foreach ($data as $val) {  $i++;

                   ?>
               <tr>
                  <th scope="row"><?=$i?></th>
                  <td><?=$val['cat_name']?></td>
                  <td><?=$val['cat_description']?></td>
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
              echo '<a class="dropdown-item"
               href="category.php?edit-id='.$val['cat_id'].'">Edit</a>';
         }
         if ($rbas->getDelete()) { ?>
              <a class="dropdown-item" href="category.php?del-id=<?=$val['cat_id']?>" onclick="return confirm('Are you sure?')">Delete</a>
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