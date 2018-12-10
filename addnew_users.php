<?php include 'files/header.php'; ?>
<?php include 'files/menu.php';
   $rbas->setPageName(19)->run();
   ?>
<?php 
   if (isset($_GET['del-id'])) {
           if ($db->delete("users","u_id = '".$_GET['del-id']."'")) {?>
<script> alert('Data has been deleted'); window.location.href='addnew_users.php'; </script>
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
                  <li class="breadcrumb-item active">Users </li>
               </ol>
            </div>
            <h4 class="page-title">Users</h4>
         </div>
      </div>
   </div>
   <!-- end page title end breadcrumb -->
   <div class="row">
      <div class="col">
         <div class="card card-body card-default">
            <form action="" method="post">
               <div class="row">
                  <div class="col">
                     <button type="button" class="btn btn-outline-info" onclick="fadeoutFun(this)">Add New</button>
                  </div>
                  <div class="col">
                  </div>
                  
                  <div class="col">
                     <div class="row">
                        <div class="col">
                           <div class="form-group">
                            <select class="form-control" name="usertypeforsearch">
                                 <option value="">Chose a user type</option>
                                 <option value="1">Customer</option>
                                 <option value="2">Supplier</option>
                                 <option value="3">Customer & supplier</option>
                                 <option value="4">Employee</option>
                              </select>
                           </div>
                        </div>
                        <div class="col-md-4">
                           <button class="btn btn-outline-info" name="searchuser">Search <i class="fa fa-search"></i></button>
                        </div>
                     </div>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
   <div class="row">
      <div class="col" id="formcolum" style="display: none;">
         <div class="card border-primary">
            <div class="card-header">Add new User</div>
            <div class="card-body">
               <form action="#" method="post">
                  <div class="form-group">
                     <label for="sel1">Select list:</label>
                     <select class="form-control" id="usertype" name="usertype" onchange="mynextdata()">
                        <option> Choose option</option>
                        <option value="1">Customer</option>
                        <option value="2">Supplier</option>
                        <option value="3">Customer & supplier</option>
                        <option value="4">Employee</option>
                     </select>
                  </div>
                  <div id="formshow" style="display: none;">
                    
                      
                     
                    <select class="form-control" name="emtype" id="emtype">
                        <option value="">Employee type</option>
                        <?=$dm->getEmployeeType()?>
                     </select>

                  
                  <a href="employee-type.php" class="btn btn-outline-info"><i class="fa fa-hashtag"></i></a>
                    
                   
                  </div>
                  
                  <div class="form-group">
                     <label for="email">Name:</label>
                     <input class="form-control" id="name" name="name" placeholder="both name(s) e.g Jon Doe" required="required" type="text">
                  </div>
                  <div class="form-group">
                     <label for="email">Email:</label>
                     <input class="form-control" id="email" name="email" required="required" type="email">
                  </div>
                  <div class="form-group">
                     <label for="email">Contact Number:</label>
                     <input class="form-control" data-role="tagsinput" id="number" name="number" required="required" type="text">
                  </div>
                  <div class="form-group">
                     <label for="email">Address:</label>
                     <textarea class="form-control" id="address" name="address" required="required"></textarea>
                  </div>
                  <div class="form-group" id="opendingforemployee">
                     <label for="email">Opening Balance:</label>
                     <input class="form-control" id="openingbalance" name="openingbalance"  type="number">
                  </div>
                  <button type="reset" class="btn btn-outline-danger">Cancel</button>
                  <button class="btn btn-outline-primary" id="saveusers" name="saveusers" type="submit">Save <i class="fa fa-floppy-o"></i> </button>
               </form>
            </div>
         </div>
         <?php 
            if (isset($_POST['saveusers'])) {
            
            $data = array(
            'user_role' =>$_POST['usertype'], 
            'name' => $_POST['name'], 
            'password' => md5("123456"), 
            'email' => $_POST['email'], 
            'contact_number' => $_POST['number'], 
            'address' => $_POST['address'], 
            'employeetype' => empty($_POST['emtype'])?0:$_POST['emtype'], 
            'opening_balance' => $_POST['openingbalance'], 
            'created_at' => date("Y-m-d") 
            );
            if (!empty($_POST['usertype']) && !empty($_POST['name'])) {
            if ($db->insert("users",$data)) {
            echo "<h1 style='color:blue'>Data has been saved</h1>";
            }else{
            echo " <h1 style='color:red'>Data has not been saved</h1>";
            }
            }else{
            echo "<h1 style='color:red'>Fields are empty</h1>";
            }
            }
            
            ?>
      </div>
      <div class="col" id="formtobefolded">
         <div class="table-responsive">
            <?php 
               $sql =  "SELECT * FROM `users` where user_role <> 0  ORDER BY `u_id` DESC";
               $i=0;
               if (isset($_POST['searchuser'])) {
                  $sql =" SELECT * FROM `users` where user_role <> 0 AND `user_role`='".$_POST['usertypeforsearch']."'";
               
               }
               
                
               $data = $db->joinQuery($sql)->fetchAll();
               
               ?>
            <div class="card card-body">
               <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                  <thead>
                     <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Contact Number</th>
                        <th>Address</th>
                        <th>Opening Balance</th>
                        <th>Date of Creation</th>
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php 
                        foreach ($data as $val) {  $i++; ?>
                     <tr>
                        <th scope="row"><?=$i?></th>
                        <td><?=$val['name']?></td>
                        <td><?=$val['email']?></td>
                        <td><?=$val['contact_number']?></td>
                        <td><?=$val['address']?></td>
                        <td><?=$val['opening_balance']?></td>
                        <td><?=$val['created_at']?></td>
                        <td>
                           <div class="dropdown">
                              <button type="button" class="btn btn-outline-primary dropdown-toggle" data-toggle="dropdown">
                              <i class="fa fa-gear"></i>
                              </button>
                              <div class="dropdown-menu">
                                 <?php 
                                    if ($rbas->getView()) 
                                    {
                                    echo 
                                    '<a class="dropdown-item" 
                                    href="user_details.php?detail='.$val['u_id'].'">View <i class="fa fa-eye"></i></a>';
                                    }
                                    if ($rbas->getUpdate())
                                    {
                                         echo '<a class="dropdown-item" href="edit-users.php?edit='.$val['u_id'].'">Edit <i class="fa fa-pencil"></i></a>';
                                    }
                                    if ($rbas->getDelete()) 
                                    { 
                                         ?>
                                         <a class="dropdown-item"
                                    href="addnew_users.php?del-id=<?=$val['u_id']?>" onclick="return confirm('Are you sure?')">Delete <i class="fa fa-times"></i></a>
                                 <?php 
                                    }
                                    if ($rbas->getPrint())
                                     {
                                         echo '<a class="dropdown-item" href="#">Print</a>';
                                     }
                                    ?>
                              </div>
                           </div>
                        </td>
                     </tr>
                     <?php   }
                        ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>
<?php include 'files/footer.php'; ?>
<script>
   function mynextdata() {
       var dd = document.getElementById('usertype').value;
       var ddd =  document.getElementById("opendingforemployee");
       var formshow = document.getElementById('formshow');
       if (dd === "4") {
           formshow.style.display = 'inline-block';
           ddd.style.display = "none";
       } else {
           formshow.style.display = 'none';
       }
   }
   
   function fadeoutFun(txt){
     var tt = txt.innerHTML;
   
      if (tt === "Add New") {
         const  fomtcol = document.getElementById('formcolum');
     fomtcol.className = "col-md-4";
     fomtcol.style.display = 'inline-block';
     var formtofold = document.getElementById('formtobefolded');
     formtofold.className = "col-md-8";
     txt.innerHTML = "close";
      }else if (tt === "close"){
         txt.innerHTML = "Add New";
       const  fomtcol = document.getElementById('formcolum');
     fomtcol.className = "col";
     fomtcol.style.display = 'none';
     var formtofold = document.getElementById('formtobefolded');
     formtofold.className = "col";
      }
   
     
   }
</script>