


<?php include 'files/header.php'; ?>
<?php include 'files/menu.php';

$rbas->setPageName(14)->run();
?>

		



     <div class="container">
      <div class="row ">
      <div class="col">
         <div class="bg-light card card-body header-wrapper" style=" background: #b4c6d8 !important">
            <h1 style="text-align: center;">Set Employee Target</h1>
         </div>
      </div>
   </div>

      <div class="row" style="margin-top: 20px">
              <div class="col">
               <div class="card border-primary">
  <div class="card-header">Set Employee target</div>
  <div class="card-body">
     <form class="" action="#" method="post" id="addform">
          <div class="row">
            <div class="col-md-6">
               <div class="form-group">
               <label for="">Employee Name</label>
               <select class="form-control"  name="employeename" id="employeename">
                  <option value="">select an option</option>
                  <?php
                     $query1 = $db->joinQuery("SELECT * FROM `users` WHERE `user_role`='4'");
                     while($row=$query1->fetch())
                     { ?>
                  <option value="<?=$row['u_id']?>"><?=$row['name']?></option>
                  <?php  } ?>
               </select>
            </div>
            </div>
            <div class="col-md-6">
              <!-- any design could be written later -->
            </div>
          </div>

            <button type="button" class="btn btn-primary" onclick="addnew()">addnew</button>
            <div id="holder">
               <div class="row" id="rowholder">
                  <div class="col-sm-2">
                     <div class="form-group">
                        <label  for="exampleInputEmail3">Product </label>
                        <select class="form-control" name="brandname[]" id="brandname" >
                           <option value="">Select an Option</option>
                           <?php
                              $query = $db->joinQuery("SELECT  `pro_id` FROM `product_info`");
                              while($row=$query->fetch())
                              { ?>
                           <option value="<?=$row['pro_id']?>"> <?=$fn->getProductName($row['pro_id'])?></option>
                           <?php } ?>
                        </select>
                     </div>
                  </div>
                  <div class="col-sm-2">
                     <div class="form-group">
                        <label  for="exampleInputPassword3">Quantity</label>
                        <input type="number"  name="quantity[]" id="quantity"  class="form-control" placeholder="quantity">
                     </div>
                  </div>
                  <div class="col-sm-2">
                     <div class="form-group">
                        <label  for="exampleInputPassword3">Unit</label>
                          <select class="form-control" name="unit[]" id="unit" >
                           <option value="">Choose option</option>
                            <?php 
                            $unit = $db->selectAll("units")->fetchAll();
                              foreach ($unit as $u) {  ?>
                                 <option value="<?=$u['unit_id']?>"><?=$u['unit_name']?></option>
                            <?php   }
                            ?>
                        </select>
                     </div>
                  </div>
                  <div class="col-sm-2">
                     <div class="form-group">
                        <label  for="exampleInputPassword3">Commission </label>
                        <input type="number"  name="comission[]" id="comission"  class="form-control" placeholder="Taka">
                     </div>
                  </div>
                  <div class="col-sm-2">
                     <div class="form-group">
                        <label  for="exampleInputPassword3"> Start Date</label>
                        <input type="date" name="startdate[]" id="startdate" value="0"  class="form-control">
                     </div>
                  </div>
                  
                  <div class="col-sm-2">
                     <div class="form-group">
                        <label  for="exampleInputPassword3">End Date</label>
                        <input type="date"  name="enddate[]" id="enddate" value="0"  class="form-control"  placeholder="totall ">
                     </div>
                  </div>
               </div>
            </div>
            <div class="form-group"><button type="submit" name="saveinfo" class="btn btn-primary btn-lg">Save</button></div>

         </form>

  </div>
</div>
                    
                    <?php 


                        if (isset($_POST['saveinfo'])) {
                                  $cnt  = 0;
                                  if(empty($_POST['employeename'])){
                                    echo "<h1 style='color:red'>Select employee name</h1>";
                                    exit();
                                  }
                                for ($i=0; $i <count($_POST['brandname']) ; $i++) { 
                                        $data = array(
                                          'employee_id' => $_POST['employeename'], 
                                          'brandid' => $_POST['brandname'][$i], 
                                          'quantity' => $_POST['quantity'][$i], 
                                          'unit' => $_POST['unit'][$i], 
                                          'commsion' => $_POST['comission'][$i], 
                                          'startdate' => $_POST['startdate'][$i], 
                                          'enddate' => $_POST['enddate'][$i]
                                        );

                                        if ($db->insert("target",$data)) {
                                             $cnt++;
                                        }
                                }
                                if (count($_POST['brandname']) == $cnt ) {
                                    echo "<h1 style='color:blue'> Data has been saved</h1>";
                                }
                        }

                    ?>
                  </div>
                </div>

                <!-- table start -->
                <div class="row">
       <div class="col">
         <div class="bg-light card card-body" style=" background: #060202 !important;">
          <form action="" method="post">
            <div class="row">
              <div class="col">
                <select class="form-control" name="employeeid">
                   <option value="">Choose option</option>
                  <?php 
                    //fetching only users who are given target
                      $ids = [];
                     $cat  =  $db->joinQuery("SELECT  `employee_id` FROM `target`")->fetchAll();
                     foreach ($cat as $c) {
                         array_push($ids, $c['employee_id']);
                     }
                     $dd =  array_unique($ids); //removing duplicate value from the table
                     for ($i=0; $i <count($dd) ; $i++) {  ?>
                      <option value="<?=$dd[$i]?>"><?=$fn->getUserName($dd[$i])?></option>
                   <?php   }
                     
                     
                     ?>
                </select>
              </div>
              <div class="col"><input type="date" class="form-control" name="start"></div>
              <div class="col"><input type="date" class="form-control" name="to"></div>
              <div class="col"><input type="submit" value="Search" name="search" class="btn btn-default"></div>
            </div>
          </form>
         </div>
       </div>
     </div>

                <div class="row" style="margin-top:30px">
                 <div class="col-xl-12">
                    <table class="table table-hover" id="myTable">
                  <thead>
                    <tr>
                      <th>#SL</th>
                      <th>Employee Name</th>
                      <th>Product Name</th>
                      <th>Quantity</th>
                      <th>Commission Amount</th>
                      <th>Start Date</th>
                      <th>End Date</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $i=0;
                      $sql = "SELECT * FROM `target`";
                        if (isset($_POST['search'])) {
                            
                             if (!empty($_POST['employeeid'])) {
                                 $sql .= "WHERE employee_id='".$_POST['employeeid']."'";
                             }

                                  
                             if (!empty($_POST['employeeid']) && !empty($_POST['start']) && !empty($_POST['to'])) {
                                 $sql .= "WHERE employee_id='".$_POST['employeeid']."' AND startdate='".$_POST['start']."' AND enddate='".$_POST['to']."'";
                             }
                        }
                       // echo $sql;
                            
                        $targets = $db->joinQuery($sql)->fetchAll();
                        foreach ($targets as $tar) {  $i++; ?>
                          <tr>
                            <td><?=$i?></td>
                            <td><?=$fn->getUserName($tar['employee_id'])?></td>
                            <td><?=$fn->getProductName($tar['brandid'])?></td>
                            <td><?=$tar['quantity']?></td>
                            <td><?=$tar['commsion']?></td>
                            <td><?=$tar['startdate']?></td>
                            <td><?=$tar['enddate']?></td>
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
              echo '<a class="dropdown-item" href="#">Edit</a>';
         }
         if ($rbas->getDelete()) {
              echo '<a class="dropdown-item" href="#">Delete</a>';
         }
         if ($rbas->getPrint()) {
              echo '<a class="dropdown-item" href="#">Print</a>';
         }
    ?>
    
    
  </div>
</div></td>
                          </tr>
                      <?php  }
                    ?>
                  </tbody>
                </table>
                 </div>
                 
                </div>
                
                
                
              </div>
           
<?php include 'files/footer.php'; ?>
<script type="text/javascript">
  

    function addnew() {

       $("#holder").append('<div class="row" id="rowholder"><div class="col-sm-2"><div class="form-group"><label  for="exampleInputEmail3">Product </label><select class="form-control" name="brandname[]" id="brandname" ><option value="">Select an Option</option><?php
                              $query = $db->joinQuery("SELECT  `pro_id` FROM `product_info`");
                              while($row=$query->fetch())
                              { ?>
                           <option value="<?=$row['pro_id']?>"> <?=$fn->getProductName($row['pro_id'])?></option><?php } ?>
                        </select></div></div><div class="col-sm-2"><div class="form-group"><label  for="exampleInputPassword3">Quantity</label><input type="number"  name="quantity[]" id="qntity"  class="form-control" placeholder="quantity"></div></div><div class="col-sm-2"><div class="form-group"><label  for="exampleInputPassword3">Unit</label><select class="form-control" name="unit[]" id="unit" >option value="">Choose option</option><?php 
                            $unit = $db->selectAll("units")->fetchAll();
                              foreach ($unit as $u) {  ?>
                                 <option value="<?=$u['unit_id']?>"><?=$u['unit_name']?></option><?php   }
                            ?>
                        </select></div></div><div class="col-sm-2"><div class="form-group"><label  for="exampleInputPassword3">Commission </label><input type="number"  name="comission[]" id="comission"  class="form-control" placeholder="taka"> </div></div><div class="col-sm-2"><div class="form-group"><label  for="exampleInputPassword3"> Start Date</label><input type="date" name="startdate[]" id="startdate" value="0"  class="form-control"></div></div><div class="col-sm-2"><div class="form-group"><label  for="exampleInputPassword3">End Date</label><input type="date"  name="enddate[]" id="enddate" value="0"  class="form-control"  placeholder="totall "></div></div></div>');
      // body... 
    }
</script>