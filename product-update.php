<?php include 'files/header.php'; ?>
<?php include 'files/menu.php';

      $proinfo = $db->selectAll('product_info','pro_id="'.$_GET['edit-id'].'"')->fetch(PDO::FETCH_ASSOC);
 ?>

  
<div class="container">
  <div class="row">
       <div class="col">
        <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="btn-group pull-right">
                                <ol class="breadcrumb hide-phone p-0 m-0">
                                  <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                                  <li class="breadcrumb-item"><a href="#">Products</a></li>
                                  <li class="breadcrumb-item active">Update products</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Update Products</h4>
                            
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->
        
       </div>
     </div>
   


    



        <div class="row">
               <div class="col-4">
                 <!-- write something else in this place -->
               </div>
                    <div class="col-8">
                        <div class="card m-b-30">
                            <div class="card-body">
                <form action="" method="post">
                               

                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-4 col-form-label">Product ID: </label>
                                    <div class="col-sm-8">
                                        <input id="productid" class="form-control" name="productid"  readonly="true" required="required" type="text" value="<?=$proinfo['pro_id']?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-search-input" class="col-sm-4 col-form-label">Product Category</label>
                                    <div class="col-sm-8">
                                      <input type="hidden" name="catupdate" value="<?=$proinfo['product_cat']?>">
                                        <select class="form-control" name="category">
                              <option value="">Select a category</option>
                              <?php 
                                 $cat  =  $db->joinQuery("SELECT * FROM `cateogory`")->fetchAll();
                                 foreach ($cat as $cater) { ?>
                              <option value="<?=$cater['cat_id']?>"><?=$cater['cat_name']?></option>
                              <?php   }
                                 ?>
                           </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-email-input" class="col-sm-4 col-form-label">Product Brand</label>
                                    <div class="col-sm-8">
                                      <input type="hidden" name="brandupdate" value="<?=$proinfo['brand_id']?>">
                                        <select class="form-control" name="brand">
                              <option value="">Select a brand</option>
                              <?php 
                                 $brand  =  $db->joinQuery("SELECT * FROM `p_brand`")->fetchAll();
                                 foreach ($brand as $bran) { ?>
                              <option value="<?=$bran['brand_id']?>"><?=$bran['brand_name']?></option>
                              <?php   }
                                 ?>
                           </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-url-input" class="col-sm-4  col-form-label">Product Size</label>
                                    <div class="col-sm-8">
                                      <input type="hidden" name="sizeupdate" value="<?=$proinfo['size_id']?>">
                                         <select class="form-control" name="size">
                              <option value="">Select A Product size</option>
                              <?php 
                                 $siz  =  $db->joinQuery("SELECT * FROM `p_size`")->fetchAll();
                                 foreach ($siz as $size) { ?>
                              <option value="<?=$size['pro_size_id']?>"><?=$size['pro_size_name']?></option>
                              <?php   }
                                 ?>
                           </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-tel-input" class="col-sm-4  col-form-label">Opening Stock(Quantity)</label>
                                    <div class="col-sm-8">
                                        <input id="openingstock" class="form-control"  name="openingstock"  required="required" type="text" value="<?=$proinfo['opening_stock']?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-password-input" class="col-sm-4  col-form-label">Unit</label>
                                    <div class="col-sm-8">
                                      <input type="hidden" name="uintupdate" value="<?=$proinfo['unit']?>">
                                        <select class="form-control" name="unit">
                              <option value="">Select a unit</option>
                              <?php 
                                 $unit = $db->selectAll("units")->fetchAll();
                                   foreach ($unit as $u) {  ?>
                              <option value="<?=$u['unit_id']?>"><?=$u['unit_name']?></option>
                              <?php   }
                                 ?>
                           </select>
                           <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add new unit</button>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-number-input" class="col-sm-4  col-form-label">Purchasing Price</label>
                                    <div class="col-sm-8">
                                       <input id="purchasingprice" class="form-control" name="purchasingprice"  required="required" type="text" value="<?=$proinfo['purchase_price']?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="sellingprice" class="col-sm-4 col-form-label">Selling Price</label>
                                    <div class="col-sm-8">
                                        <input id="sellingprice" class="form-control"  name="sellingprice"  required="required" type="text" value="<?=$proinfo['selling_price']?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-date-input" class="col-sm-4 col-form-label">Re-Order Warning</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" name="re-order-warning" id="re-order-warning" value="<?=$proinfo['re_order_warning']?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="description" class="col-sm-4 col-form-label">Description </label>
                                    <div class="col-sm-8">
                                        <textarea id="description"  name="description" class="form-control col-md-12 col-xs-12"><?=$proinfo['description']?></textarea>
                                    </div>
                                </div>
                               
                                 <div class="form-group row">
                                  <div class="col-md-4"></div>
                     <div class="col-md-8 col-md-offset-3">
                        <button type="submit" class="btn btn-danger">Cancel</button>
                        <button id="updateproduct" name="updateproduct" type="submit" class="btn btn-warning">Update</button>
                     </div>
                  </div>
                                
                              
                                
                              
                                
                                
                               </form>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->
         <?php 
            if (isset($_POST['updateproduct'])) {



                /*  $alredythere = $db->joinQuery("SELECT COUNT(*) as existalready FROM `product_info` WHERE `pro_id`='".$_POST['productid']."'")->fetch(PDO::FETCH_ASSOC);
                if ($alredythere['existalready']>0) {
                   echo "<h3 style='color:red'>This name is already there, try different name</h3>";
                   exit();
                }*/
            
                 $data = array(
                  'pro_id' => $_POST['productid'], 
                  'product_cat' => empty($_POST['category'])?$_POST['catupdate']:$_POST['category'],  
                  'brand_id' => empty($_POST['brand'])?$_POST['brandupdate']:$_POST['brand'], 
                  'size_id' => empty($_POST['size'])?$_POST['sizeupdate']:$_POST['size'], 
                  'unit' => empty($_POST['unit'])?$_POST['uintupdate']:$_POST['unit'],
                  'opening_stock' => $_POST['openingstock'],
                  'purchase_price' => $_POST['purchasingprice'],
                  'selling_price' => $_POST['sellingprice'],
                  're_order_warning' => $_POST['re-order-warning'],
                  'description' => $_POST['description'],
                  'created_at' => date("Y-m-d") 
                );
                 /*echo "<pre>";
                 print_r($data);
                 echo "</pre>";*/
                if (!empty($_POST['productid'])) {
                    if ($db->update("product_info",$data,'pro_id="'.$_GET['edit-id'].'"')) {
                         ?>
                        <script> alert("Data has been Updated") </script>
                 <?php
                        echo "<a href='product-view.php'>Go back</a>";
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
            ?>
      


 


</div>
</div>
<?php include 'files/footer.php'; ?>
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
   <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Add all the units</h4>
         </div>
         <div class="modal-body">
            <form action="" class="form" method="post">
               <div class="form-group"><label for="">Unit Name</label>
                  <input type="text" class="form-control" name="unitname">
               </div>
               <div class="form-group"><label for="">Unit Description</label>
                  <textarea class="form-control" name="description"></textarea>
               </div>
               <button type="submit" name="unitssave"  class="btn btn-primary">Save</button>
            </form>
            <?php 
               if (isset($_POST['unitssave'])) {
                       
                   $data = array(
                     'unit_name' => $_POST['unitname'], 
                     'unit_description' => $_POST['description']
                   );
               
                   if (!empty($_POST['unitname'])) {
                      if ($db->insert("units",$data)) {
                          echo "<h2 style='color:blue'> Unit Saved <h2>";
                     }else {
                           echo "<h2 style='color:red'> Unit is not saved <h2>";
                     }
                   }else {
                     echo "<h2 style='color:red'> Fields are empty <h2>";
                   }
               
                    
               
               }
               ?>
            <table class="table">
               <tr>
                  <th>SL</th>
                  <th>Name</th>
                  <th>Description</th>
                  <th>Actions</th>
               </tr>
               <?php 
                  $i=0;
                  $data = $db->selectAll("units")->fetchAll();
                  foreach ($data as $d) { $i++; ?> 
               <tr>
                  <td><?=$i?></td>
                  <td><?=$d['unit_name']?></td>
                  <td><?=$d['unit_description']?></td>
                  <td><a href="product.php?del-id=<?=$d['unit_id']?>" onclick="return confirm('Are you sure?')">Delete</a></td>
               </tr>
               <?php  }
                  ?>
            </table>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         </div>
      </div>
   </div>


</div>