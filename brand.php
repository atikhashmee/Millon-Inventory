<?php include 'files/header.php'; ?>
<?php include 'files/menu.php';
  $rbas->setPageName(11)->run();
  $pagetitle = (isset($_GET['edit-id']))?"Update":"Add";

       if (isset($_GET['del-id']))
        {
             if ($db->delete("p_brand","brand_id='".$_GET['del-id']."'")) 
              {
                 ?>
                 <script> alert('Data has been deleted');
                 window.location.href='brand.php'; </script>
                <?php  
              }
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
                            <h4 class="page-title"> Brand <?=$pagetitle?></h4>
                            
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->
   <div class="row" style="margin-top: 20px">
      <div class="col">
          <?php 

            if (isset($_GET['edit-id']))
             { 
              //fetch the values for the update
$datas = $db->selectAll("p_brand","brand_id='".$_GET['edit-id']."'")->fetch(PDO::FETCH_ASSOC);
              ?>
            <div class="card card-body">
               <form class="form-horizontal form-label-left" method="post" >
                  <div class="form-group">
                     <label for="name"> Name <span class="required">*</span>
                     </label>
                     <input id="brandname" class="form-control"  name="brandname"  required="required" type="text" value="<?=$datas['brand_name']?>">
                  </div>
                  <div class="form-group">
                     <button type="submit" class="btn btn-outline-danger">Cancel</button>
                     <button id="updatebrand" name="updatebrand" type="submit" class="btn btn-outline-warning">Update <i class="fa fa-floppy-o"></i></button>
                  </div>
               </form>
            </div>
             <?php    } else { ?>

              <div class="card card-body">
               <form class="form-horizontal form-label-left" method="post" >
                  <div class="form-group">
                     <label for="name"> Name <span class="required">*</span>
                     </label>
                     <input id="brandname" class="form-control"  name="brandname"  required="required" type="text">
                  </div>
                  <div class="form-group">
                     <button type="submit" class="btn btn-outline-danger">Cancel</button>
                     <button id="savebrand" name="savebrand" type="submit" class="btn btn-outline-primary">Save <i class="fa fa-floppy-o"></i> </button>
                  </div>
               </form>
            </div>
              <?php   } ?>
        
         <?php 
            if (isset($_POST['savebrand'])) {

                $alredythere = $db->joinQuery("SELECT COUNT(*) as existalready FROM `p_brand` WHERE `brand_name`='".$_POST['brandname']."'")->fetch(PDO::FETCH_ASSOC);
                if ($alredythere['existalready']>0) {
                   ?>
                        <script> alert("This name is already there try different name") </script>
                 <?php
                   exit();
                }
                  
                 $data = array(
                  'brand_name' => $_POST['brandname']
                );
                if (!empty($_POST['brandname'])) {
                    if ($db->insert("p_brand",$data)) {
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
                        <script> alert("Fields are empty") </script>
                 <?php
                }
            }


             if (isset($_POST['updatebrand'])) {

                
                  
                 $data = array(
                  'brand_name' => $_POST['brandname']
                );
                if (!empty($_POST['brandname'])) {
                    if ($db->update("p_brand",$data,"brand_id='".$_GET['edit-id']."'")) {
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
            $sql =  "SELECT * FROM `p_brand`";
            $i =0;
            
            $data = $db->joinQuery($sql)->fetchAll();
            
            ?>
            <div class="card card-body">
         <table class="table table-bordered table-condensed table-striped table-hover" id="datatable" >
            <thead>
               <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Action</th>
               </tr>
            </thead>
            <tbody>
               <?php 
                  foreach ($data as $val) {  $i++; ?>
               <tr>
                  <th scope="row"><?=$i?></th>
                  <td><?=$val['brand_name']?></td>
                 
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
              echo '<a class="dropdown-item" href="brand.php?edit-id='.$val['brand_id'].'">Edit <i class="fa fa-pencil"></i></a>';
         }
         if ($rbas->getDelete()) { ?>
              <a class="dropdown-item" href="brand.php?del-id=<?=$val['brand_id']?>" onclick="return confirm('Are you sure?')">Delete <i class="fa fa-times"></i></a>
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