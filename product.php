<?php include 'files/header.php'; ?>
<?php include 'files/menu.php'; ?>

  
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
                                  <li class="breadcrumb-item active">Add new products</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Add new product</h4>
                            
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->
        
       </div>
     </div>
   


    



        <div class="row">
               <div class="col-4">
                 <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
               </div>
                    <div class="col-8">
                        <div class="card m-b-30">
                            <div class="card-body">
                <form action="" method="post">
                                <h4 class="mt-0 header-title">Add New Product</h4>
                                <p class="text-muted m-b-30 font-14">Here are examples of <code
                                        class="highlighter-rouge">.form-control</code> applied to each
                                    textual HTML5 <code class="highlighter-rouge">&lt;input&gt;</code> <code
                                            class="highlighter-rouge">type</code>.</p>

                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-4 col-form-label">Product ID: </label>
                                    <div class="col-sm-8">
                                        <input id="productid" class="form-control" name="productid"  required="required" type="text">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-search-input" class="col-sm-4 col-form-label">Product Category</label>
                                    <div class="col-sm-6">
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
                                    <div class="col-md-2">
                                      <a href="category.php" class="btn btn-info"><i class="fa fa-plus-circle" style="f    font-size: 19px;
    color: black;"></i></a>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-email-input" class="col-sm-4 col-form-label">Product Brand</label>
                                    <div class="col-sm-6">
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
                                    <div class="col-md-2">
                                      <a href="brand.php" class="btn btn-info"><i class="fa fa-plus-circle" style="f    font-size: 19px;
    color: black;"></i></a>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-url-input" class="col-sm-4  col-form-label">Product Size</label>
                                    <div class="col-sm-6">
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
                                    <div class="col-md-2">
                                      <a href="size.php" class="btn btn-info"><i class="fa fa-plus-circle" style="f    font-size: 19px;
    color: black;"></i></a>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-tel-input" class="col-sm-4  col-form-label">Opening Stock(Quantity)</label>
                                    <div class="col-sm-8">
                                        <input id="openingstock" class="form-control"  name="openingstock"  required="required" type="text">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-password-input" class="col-sm-4  col-form-label">Unit</label>
                                    <div class="col-sm-8">
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
                                       <input id="purchasingprice" class="form-control" name="purchasingprice"  required="required" type="text">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="sellingprice" class="col-sm-4 col-form-label">Selling Price</label>
                                    <div class="col-sm-8">
                                        <input id="sellingprice" class="form-control"  name="sellingprice"  required="required" type="text">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-date-input" class="col-sm-4 col-form-label">Re-Order Warning</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" name="re-order-warning" id="re-order-warning">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="description" class="col-sm-4 col-form-label">Description </label>
                                    <div class="col-sm-8">
                                        <textarea id="description"  name="description" class="form-control col-md-12 col-xs-12"></textarea>
                                    </div>
                                </div>
                               
                                 <div class="form-group row">
                                  <div class="col-md-4"></div>
                     <div class="col-md-8 col-md-offset-3">
                        <button type="submit" class="btn btn-primary">Cancel</button>
                        <button id="saveusers" name="saveproduct" type="submit" class="btn btn-success">Submit</button>
                     </div>
                  </div>
                                
                              
                                
                              
                                
                                
                               </form>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->
         <?php 
            if (isset($_POST['saveproduct'])) {



                  $alredythere = $db->joinQuery("SELECT COUNT(*) as existalready FROM `product_info` WHERE `pro_id`='".$_POST['productid']."'")->fetch(PDO::FETCH_ASSOC);
                if ($alredythere['existalready']>0) {
                    ?>
                        <script> alert("Name is already there try different Product ID") </script>
                 <?php
                   exit();
                }
            
                 $data = array(
                  'pro_id' => $_POST['productid'], 
                  'product_cat' => $_POST['category'], 
                  'brand_id' => $_POST['brand'], 
                  'size_id' => $_POST['size'], 
                  'unit' => $_POST['unit'],
                  'opening_stock' => $_POST['openingstock'],
                  'purchase_price' => $_POST['purchasingprice'],
                  'selling_price' => $_POST['sellingprice'],
                  're_order_warning' => $_POST['re-order-warning'],
                  'description' => $_POST['description'],
                  'created_at' => date("Y-m-d") 
                );
                if (!empty($_POST['productid'])) {
                    if ($db->insert("product_info",$data)) {
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