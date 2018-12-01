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
                     <label for="name"> Category Name <span class="required">*</span>
                     </label>
                     <input id="dbcat" class="form-control"  name="dbcat" type="hidden" value="<?=$datas['cat_id']?>">
                     <select class="form-control" name="catid"  id="catid">
                       <option value="">Select a category</option>
                       <?php $dm->getCategories();?>
                     </select>
                  </div>
                  <div class="form-group">
                     <label for="name">Brand  Name <span class="required">*</span>
                     </label>
                     <input id="dbbrandid" class="form-control"  name="dbbrandid"  type="hidden" value="<?=$datas['brandid']?>">
                     <select class="form-control" name="brandid" id="brands">
                       <option value="">Select a Brand</option>
                       <?php $dm->getBrands();?>
                     </select>
                  </div>
                  <div class="form-group">
                     <label for="name"> Name <span class="required">*</span>
                     </label>
                     <input id="size_name" class="form-control"  name="size_name"  required="required" type="text" value="<?=$datas['pro_size_name']?>">
                  </div>
                  <div class="form-group">
                     
                        <button type="reset" class="btn btn-outline-danger">Cancel</button>
                        <button  name="updatesize" type="submit" class="btn btn-outline-warning">Update <i class="fa fa-floppy-o"></i></button>
                     
                  </div>
               </form>
            </div>
        <?php    } else { ?>
          <div class="card card-body">
               <form class="form-horizontal form-label-left" method="post" >
                  <div class="form-group">
                     <label for="name"> Category Name <span class="required">*</span>
                     </label>
                    
                     <select class="form-control" name="catid" id="catid">
                       <option value="">Select a category</option>
                       <?php $dm->getCategories();?>
                     </select>
                  </div>
                  <div class="form-group">
                     <label for="name">Brand  Name <span class="required">*</span>
                     </label>
                     
                     <select class="form-control" name="brandid" id="brands">
                       <option value="">Select a Brand</option>
                         
                     </select>
                  </div>
                  <div class="form-group">
                     <label for="name"> Name <span class="required">*</span>
                     </label>
                     <input id="size_name" class="form-control"  name="size_name"  required="required" type="text">
                  </div>
                  <div class="form-group">
                     
                        <button type="submit" class="btn btn-outline-danger">Cancel</button>
                        <button  name="savesize" type="submit" class="btn btn-outline-primary">Save <i class="fa fa-floppy-o"></i></button>
                    
                  </div>
               </form>
            </div>
             <?php   } ?>

         <?php 
            if (isset($_POST['savesize'])) {

              //validating duplicate vlaues
                $alredythere2 = $db->joinQuery("SELECT COUNT(*) as existalready FROM `p_size` WHERE `pro_size_name`='".$_POST['size_name']."' AND brandid= '".$_POST['brandid']."'  ")->fetch(PDO::FETCH_ASSOC);

                if ($alredythere2['existalready']>0) 
                {
                          ?>
                      <script> alert("The name is already there! try different name") </script>
                        <?php
                  
                }
                else if (empty($_POST['size_name']))
                {
                    ?>
                        <script> alert("Fields are empty ") </script>
                    <?php
                }
                else 
                {
                        $data = array(
                          'cat_id'        => $_POST['catid'],
                          'brandid'       => $_POST['brandid'],
                          'pro_size_name' => $_POST['size_name']
                        );
                 
                        if ($db->insert("p_size",$data)) 
                        {
                            ?>
                            <script> alert("Data has been saved") </script>
                           <?php
                        }
                       else
                        {
                            ?>
                            <script> alert("Data has been not saved") </script>
                            <?php
                        }
                }

            }
              
              if (isset($_POST['updatesize'])) {
              
            $alredythere2 = $db->joinQuery("SELECT COUNT(*) as existalready FROM `p_size` WHERE `pro_size_name`='".$_POST['size_name']."' AND brandid= '".$_POST['brandid']."'  ")->fetch(PDO::FETCH_ASSOC);

                if ($alredythere2['existalready']>0) 
                {
                          ?>
                      <script> alert("The name is already there! try different name") </script>
                        <?php
                  
                }
                else
                {
                  $data = array(
                  'cat_id'        => empty($_POST['catid'])?$_POST['dbcat']:$_POST['catid'],
                  'brandid'       => empty($_POST['brandid'])?$_POST['dbbrandid']:$_POST['brandid'],
                  'pro_size_name' => $_POST['size_name']
                  
                );
                if (!empty($_POST['size_name'])) 
                {
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
                 
            }
            
            
            ?>
      </div>
      <!-- users view section starts here -->
      <div class="col-md-8">
        <div class="card card-body">
         <table class="table table-bordered table-hover table-condensed" id="datatable">
            <thead>
               <tr>
                  <th>#</th>
                  <th>Cat Name</th>
                  <th>Brand Name</th>
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
                  <td><?=$fn->getCatName($val['cat_id'])?></td>
                  <td><?=$fn->getBrandName($val['brandid'])?></td>
                  <td><?=$val['pro_size_name']?></td>
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
              echo '<a class="dropdown-item" href="size.php?edit-id='.$val['pro_size_id'].'">Edit <i class="fa fa-pencil"></i></a>';
         }
         if ($rbas->getDelete()) { ?>
             <a class="dropdown-item" href="size.php?del-id=<?=$val['pro_size_id']?>" onclick="return confirm('Are you sure?')">Delete <i class="fa fa-times"></i></a>
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
<script src="assets/js/brands.js"></script>