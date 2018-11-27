<?php include 'files/header.php'; ?>
<?php include 'files/menu.php'; 
$rbas->setPageName(12)->run();
$pagetitle = (isset($_GET['edit-id']))?"Update":"Add";


if (isset($_GET['del-id'])) {
             if ($db->delete("p_size","pro_size_id='".$_GET['del-id']."'")) {?>
            <script> alert('Data has been deleted');
             window.location.href='size.php'; </script>
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
                            <h4 class="page-title"> Size <?=$pagetitle?></h4>
                            
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->
   <div class="row" style="margin-top: 20px">
      <div class="col">
         <?php 

            if (isset($_GET['edit-id'])) { 
              //fetch the values for the update
$datas = $db->selectAll("p_size","pro_size_id='".$_GET['edit-id']."'")->fetch(PDO::FETCH_ASSOC);
              ?>
            <div class="card card-body">
               <form class="form-horizontal form-label-left" method="post" >
                  <div class="form-group">
                     <label for="name"> Name <span class="required">*</span>
                     </label>
                     <input id="size_name" class="form-control"  name="size_name"  required="required" type="text" value="<?=$datas['pro_size_name']?>">
                  </div>
                  <div class="form-group">
                     <div class="col-md-6 col-md-offset-3">
                        <button type="submit" class="btn btn-danger">Cancel</button>
                        <button  name="updatesize" type="submit" class="btn btn-warning">Update</button>
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
                     <input id="size_name" class="form-control"  name="size_name"  required="required" type="text">
                  </div>
                  <div class="form-group">
                     <div class="col-md-6 col-md-offset-3">
                        <button type="submit" class="btn btn-primary">Cancel</button>
                        <button  name="savesize" type="submit" class="btn btn-success">Submit</button>
                     </div>
                  </div>
               </form>
            </div>
             <?php   } ?>

         <?php 
            if (isset($_POST['savesize'])) {
              $alredythere = $db->joinQuery("SELECT COUNT(*) as existalready FROM `p_size` WHERE `pro_size_name`='".$_POST['size_name']."'")->fetch(PDO::FETCH_ASSOC);
                if ($alredythere['existalready']>0) {
                  ?>
                        <script> alert("The name is already there! try different name") </script>
                 <?php
                   exit();
                }
            
                 $data = array(
                  'pro_size_name' => $_POST['size_name']
                  
                );
                if (!empty($_POST['size_name'])) {
                    if ($db->insert("p_size",$data)) {
                        ?>
                        <script> alert("Data has been saved") </script>
                 <?php
                    } else {
                     ?>
                        <script> alert("Data has been not saved") </script>
                 <?php
                    }
                }else{
                    ?>
                        <script> alert("Fields are empty ") </script>
                 <?php
                }
            }
              
              if (isset($_POST['updatesize'])) {
              
            
                 $data = array(
                  'pro_size_name' => $_POST['size_name']
                  
                );
                if (!empty($_POST['size_name'])) {
                    if ($db->update("p_size",$data,"pro_size_id='".$_GET['edit-id']."'")) {
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
        <div class="card card-body">
         <table class="table table-bordered table-hover table-condensed" id="datatable">
            <thead>
               <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Action</th>
               </tr>
            </thead>
            <tbody>
               <?php 
                  $sql =  "SELECT * FROM `p_size`";
                  $i = 0;
                  $data = $db->joinQuery($sql)->fetchAll();
                        foreach ($data as $val) {  $i++; ?>
               <tr>
                  <th scope="row"><?=$i?></th>
                  <td><?=$val['pro_size_name']?></td>
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
              echo '<a class="dropdown-item" href="size.php?edit-id='.$val['pro_size_id'].'">Edit</a>';
         }
         if ($rbas->getDelete()) { ?>
             <a class="dropdown-item" href="size.php?del-id=<?=$val['pro_size_id']?>" onclick="return confirm('Are you sure?')">Delete</a>
         <?php }
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