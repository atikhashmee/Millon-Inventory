


<?php include 'files/header.php'; ?>
<?php include 'files/menu.php';
 $targetdata = $db->selectAll("target","autoid='".$_GET['edit-id']."'")->fetch(PDO::FETCH_ASSOC);

?>

		



     <div class="container">
     <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="btn-group pull-right">
                                <ol class="breadcrumb hide-phone p-0 m-0">
                                  <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                                  <li class="breadcrumb-item"><a href="#">Settings</a></li>
                                  <li class="breadcrumb-item active">Employee Target Update</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Employee Target Update </h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->

      <div class="row" style="margin-top: 20px">
              <div class="col">
               
  <div class="card card-body">
     <form class="" action="#" method="post" id="addform">
          <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-7">
               <div class="form-group">
              
               <input type="text" name="employeename" class="form-control" readonly value="<?=$fn->getUserName($targetdata['employee_id'])?>">
            </div>
            </div>
            <div class="col-md-2">
              <!-- any design could be written later -->
            </div>
          </div>

            
            
               <div class="row">
                <div class="col-md-3">
                     
                  </div>
                  <div class="col-md-7">
                     <div class="form-group">
                        <label  for="exampleInputEmail3">Product </label>
                        <input type="hidden" name="dbbrandname" value="<?=$targetdata['brandid']?>">
                        <select class="form-control" name="brandname" id="brandname" >
                           <option value="">Select an Option</option>
                           <?php
                              $query = $db->joinQuery("SELECT  `pro_id` FROM `product_info`");
                              while($row=$query->fetch())
                              { ?>
                           <option value="<?=$row['pro_id']?>"> <?=$fn->getProductName($row['pro_id'])?></option>
                           <?php } ?>
                        </select>
                     </div>

                     <div class="form-group">
                        <label  for="exampleInputPassword3">Quantity</label>
                        <input type="number"  name="quantity" id="quantity"  class="form-control" value="<?=$targetdata['quantity']?>" >
                     </div>

                     <div class="form-group">
                        <label  for="exampleInputPassword3">Unit</label>
                        <input type="hidden" name="dbunit" value="<?=$targetdata['unit']?>">
                    <select class="form-control" name="unit" id="unit" >
                           <option value="">Choose option</option>
                            <?php 
                            $unit = $db->selectAll("units")->fetchAll();
                              foreach ($unit as $u) {  ?>
                                 <option value="<?=$u['unit_id']?>"><?=$u['unit_name']?></option>
                            <?php   }
                            ?>
                        </select>
                     </div>

                     <div class="form-group">
                        <label  for="exampleInputPassword3">Commission </label>
                        <input type="number"  name="comission" id="comission"  class="form-control" value="<?=$targetdata['commsion']?>">
                     </div>

                     <div class="form-group">
                        <label  for="exampleInputPassword3"> Start Date</label>
                        <input type="date" name="startdate" id="startdate" value="<?=$targetdata['startdate']?>" class="form-control">
                     </div>
                      
                      <div class="form-group">
                        <label  for="exampleInputPassword3">End Date</label>
                        <input type="date"  name="enddate" id="enddate" value="<?=$targetdata['enddate']?>"  class="form-control">
                     </div>


                     <div class="form-group"><button type="submit" name="updateinfo" class="btn btn-outline-warning btn-lg">Update <i class="fa fa-floppy-o"></i></button></div>

                  </div>
                  
                 
                  
                  <div class="col-md-2">
                     
                  </div>

               </div>
            
            
         </form>

  </div>
                    
                    <?php 
                        if (isset($_POST['updateinfo'])) {
                                  
                                 
                 $data = array(
                'employee_id' => $_POST['employeename'], 
                'brandid' => empty($_POST['brandname'])? $_POST['dbbrandname']: $_POST['brandname'], 
                'quantity' => $_POST['quantity'], 
                'unit' => empty($_POST['unit'])?$_POST['dbunit']:$_POST['unit'], 
                'commsion' => $_POST['comission'], 
                'startdate' => $_POST['startdate'], 
                  'enddate' => $_POST['enddate']
                  );

            if ($db->update("target",$data,"autoid='".$_GET['edit-id']."'"))
             {
                        ?>
                        <script>
                          alert("Data has been updated");
                        </script>
                        <?php                     
             }
             else 
             {
                        ?>
                        <script>
                          alert("Data has not been updated");
                        </script>
                        <?php 
             }
                                
          }

                    ?>
                  </div>
                </div>

                

                
                
                
                
              </div>
           
<?php include 'files/footer.php'; ?>
