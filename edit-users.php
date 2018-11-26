<?php include 'files/header.php'; ?>
<?php include 'files/menu.php';



            $userdata =  $db->selectAll("users","u_id='".$_GET['edit']."'")->fetch(PDO::FETCH_ASSOC);

 ?>
<style>
.loader {
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite; /* Safari */
  animation: spin 2s linear infinite;
}

/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
</style>
<div class="container">
     <div class="row ">
       <div class="col">
         <h1>Update User</h1>
       </div>
     </div>
     
<div class="row">
 
  <div class="col">
     <div class="card border-primary">
  <div class="card-header">Update new User</div>
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
      <div class="form-group" id="formshow" style="display: none;">
        <label for="sel1">Select list:</label>
        <select class="form-control" name="emtype">
          <option> Choose option</option>
          <option value="acc1">Accounts</option>
          <option value="ss2">Sales Man</option>
        </select>
      </div>
      <div class="form-group">
        <label for="email">Name:</label>
        <input class="form-control" id="name" name="name" value="<?=$userdata['name']?>" required="required" type="text">
        </div>
        <div class="form-group">
          <label for="email">Email:</label>
          <input class="form-control" id="email" name="email" value="<?=$userdata['email']?>" required="required" type="email">
          </div>
          <div class="form-group">
            <label for="email">Contact Number:</label>
            <input class="form-control" id="number" name="number" required="required" value="<?=$userdata['contact_number']?>" type="number">
            </div>
            <div class="form-group">
              <label for="email">Address:</label>
              <textarea class="form-control" id="address" name="address" required="required"><?=$userdata['address']?></textarea>
            </div>
            <div class="form-group">
              <label for="email">Opening Balance:</label>
              <input class="form-control" id="openingbalance" name="openingbalance" required="required" type="number" value="<?=$userdata['opening_balance']?>">
              </div>
              <button class="btn btn-primary" id="saveusers" name="saveusers" type="submit">Update</button>
            </form>
            <div id="loader"></div>
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
                                      if ($db->update("users",$data,"u_id='".$_GET['edit']."'")) {
                                          echo "
            <h1 style='color:blue'>Data has been updated</h1> <a href='addnew_users.php'>Go to user list</a>";


                                      }else{
                                        echo "
            <h1 style='color:red'>Data has not been updated</h1>";
                                      }
                                  }else{
                                      echo "
            <h1 style='color:red'>Fields are empty</h1>";
                                  }
                              }

                          ?>
          </div>
          
        </div>
        </div>
        
        <?php include 'files/footer.php'; ?>

        <script>
            function mynextdata() {
                var dd = document.getElementById('usertype').value;
                var formshow = document.getElementById('formshow');
                if (dd === "4") {
                    formshow.style.display = 'inline-block';
                } else {
                    formshow.style.display = 'none';
                }
            }

          
        </script>