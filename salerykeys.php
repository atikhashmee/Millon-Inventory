<?php include 'files/header.php'; ?>
<?php include 'files/menu.php';
$rbas->setPageName(13)->run();

$pagetitle = (isset($_GET['edit-id']))?"Update":"Add";

          if (isset($_GET['del-id'])) {
             if ($db->delete("e_salerykeys","salery_key_id='".$_GET['del-id']."'")) {?>
            <script> alert('Data has been deleted');
             window.location.href='salerykeys.php'; </script>
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
                                  <li class="breadcrumb-item active">Brand</li>
                                </ol>
                            </div>
                            <h4 class="page-title"> Salery Keys <?=$pagetitle?></h4>
                            
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->
   <div class="row" style="margin-top: 20px">
      <div class="col-md-4">
  <?php 

            if (isset($_GET['edit-id'])) { 
              //fetch the values for the update
$datas = $db->selectAll("e_salerykeys","salery_key_id='".$_GET['edit-id']."'")->fetch(PDO::FETCH_ASSOC);
              ?>
  <div class="card card-body">
    <form class="form-horizontal form-label-left" method="post">
            <div class=" form-group">
               <label  for="name"> key Name <span class="required">*</span>
               </label>
               <input id="keysname" class="form-control" name="keysname"  required="required" type="text" value="<?=$datas['keysname']?>">
            </div>
            <div class="form-group">
                  <button type="submit" class="btn btn-danger">Cancel</button>
                  <button id="updatekeys" name="updatekeys" type="submit" class="btn btn-warning">Update</button>
            </div>
         </form>
  </div>
  <?php    } else { ?>
     <div class="card card-body">
    <form class="form-horizontal form-label-left" method="post">
            <div class=" form-group">
               <label  for="name"> key Name <span class="required">*</span>
               </label>
               <input id="keysname" class="form-control" name="keysname"  required="required" type="text">
            </div>
            <div class="form-group">
                  <button type="submit" class="btn btn-primary">Cancel</button>
                  <button id="savekeys" name="savekeys" type="submit" class="btn btn-success">Submit</button>
            </div>
         </form>
  </div>
   <?php   } ?>

         
         <?php 
            if (isset($_POST['savekeys'])) {
                 $data = array(
                  'keysname' => $_POST['keysname']
                );
                if (!empty($_POST['keysname'])) {
                    if ($db->insert("e_salerykeys",$data)) {
                        echo "<h1 style='color:blue'>Data has been saved</h1>";
                    } else {
                      echo "<h1 style='color:red'>Data has not been saved</h1>";
                    }
                }else{
                    echo "<h1 style='color:red'>Fields are empty</h1>";
                }
            }

             if (isset($_POST['updatekeys'])) {
                 $data = array(
                  'keysname' => $_POST['keysname']
                );
                if (!empty($_POST['keysname'])) {
                    if ($db->update("e_salerykeys",$data,"salery_key_id='".$_GET['edit-id']."'")) {
                        echo "<h1 style='color:blue'>Data has been updated</h1>";
                    } else {
                      echo "<h1 style='color:red'>Data has not been updated</h1>";
                    }
                }else{
                    echo "<h1 style='color:red'>Fields are empty</h1>";
                }
            }
            
            
            ?>
      </div>
      <!-- users view section starts here -->
      <div class="col">
        
  <div class=" card card-body">
         <?php 
            $sql =  "SELECT * FROM `e_salerykeys`";
            $i =0;
            
            $data = $db->joinQuery($sql)->fetchAll();
            
            ?> 
         <table class="table table-hover table-bordered table-striped" id="datatable" >
            <thead>
               <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Created at</th>
               </tr>
            </thead>
            <tbody>
               <?php 
                  foreach ($data as $val) {  $i++; ?>
               <tr>
                  <th scope="row"><?=$i?></th>
                  <td><?=$val['keysname']?></td>
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
              echo '<a class="dropdown-item" href="salerykeys.php?edit-id='.$val['salery_key_id'].'">Edit</a>';
         }
         if ($rbas->getDelete()) {
              ?>
              <a class="dropdown-item" href="salerykeys.php?del-id=<?=$val['salery_key_id']?>" onclick="return confirm('Are you sure?')">Delete</a>
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