<?php include 'files/header.php'; ?>
<?php include 'files/menu.php';
$rbas->setPageName(9)->run();

if (isset($_GET['del-id'])) {
             if ($db->delete("expenditure","expenseid='".$_GET['del-id']."'")) {?>
            <script> alert('Data has been deleted');
             window.location.href='expenditure.php'; </script>
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
                                  <li class="breadcrumb-item"><a href="#">Accounce</a></li>
                                  <li class="breadcrumb-item active">Expenditure</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Expense Collection</h4>
                            
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->
                <div class="card card-body">
   <form class="form-horizontal form-label-left" method="post" >
      <div class="row">
         <div class="col">
            <div class=" form-group">
               <label  for="name"> Date <span class="required">*</span>
               </label>
               <input id="expensedate" class="form-control" name="expensedate"  required="required" type="date">
            </div>
         </div>
         <div class="col">
            <div class="form-group">
               <label for="name">Select a category  <span class="required">*</span>
               </label>
               <select class="form-control" name="expensecate">
                  <option value="">Choose option</option>
                  <?php 
                     $cat  =  $db->selectAll("expensecategory")->fetchAll();
                     foreach ($cat as $cater) { ?>
                  <option value="<?=$cater['excate_id']?>"><?=$cater['name']?></option>
                  <?php
                     }
                     
                     ?>
               </select>
            </div>
         </div>
         <div class="col">
            <div class="form-group">
               <label  for="name">Accounts  <span class="required">*</span>
               </label>
               <select class="form-control" name="accountsid">
                  <option value="">Choose option</option>
                  <?php 
                     $cat  =  $db->joinQuery("SELECT * FROM `charts_accounts`")->fetchAll();
                     foreach ($cat as $cater) { ?>
                  <option value="<?=$cater['charts_id']?>"><?=$cater['chart_name']?></option>
                  <?php
                     }
                     
                     ?>
               </select>
            </div>
         </div>
      </div>
      <div class="row">
         <div class="col">
            <div class="form-group" style="position: relative; top:20px; text-align: center;">
    <div class="custom-control custom-radio">
      <input type="radio" id="customRadio1" name="islabor" value="no" class="custom-control-input" checked="">
      <label class="custom-control-label" for="customRadio1">Others</label>
    </div>

    <div class="custom-control custom-radio">
      <input type="radio" id="customRadio2" name="islabor" value="yes"class="custom-control-input">
      <label class="custom-control-label" for="customRadio2">Labour</label>
    </div>
   
  </div>
         </div>
         <div class="col">
            <div class="form-group">
               <label  for="name"> Amount <span class="required">*</span>
               </label>
               <input id="amount" class="form-control"  name="amount"  required="required" type="text">
            </div>
         </div>
         <div class="col">
            <div class="form-group">
               <label  for="name">Employee Name  <span class="required">*</span>
               </label>
               <select class="form-control" name="employeeid">
                  <option value="">Choose option</option>
                  <?php 
                     $cat  =  $db->joinQuery("SELECT * FROM `users` WHERE `user_role` ='4'")->fetchAll();
                     foreach ($cat as $cater) { ?>
                  <option value="<?=$cater['u_id']?>"><?=$cater['name']?></option>
                  <?php
                     }
                     
                     ?>
               </select>
            </div>
         </div>
      </div>
      <div class="form-group">
         <div class="col-md-6 col-md-offset-3">
            <button type="submit" class="btn btn-primary">Cancel</button>
            <button id="saveexpenditure" name="saveexpenditure" type="submit" class="btn btn-success">Submit</button>
         </div>
      </div>
   </form>
   </div>
   <?php 
      if (isset($_POST['saveexpenditure'])) {
      
        /*  echo "<pre>";
          print_r($_POST);
          echo "</pre>";*/
      
      
            $data = array(
              'expendituredate' =>$_POST['expensedate'],
              'expensecatid' =>$_POST['expensecate'],
              'accountsid' =>$_POST['accountsid'],
              'amount' =>$_POST['amount'],
              'employeeid' =>$_POST['employeeid'],
              'islabor' =>$_POST['islabor'],
              'addedby' => $_SESSION['u_id']
               );
            
          if (!empty($_POST['expensedate'])) {
              if ($db->insert("expenditure",$data)) {
                  echo "<h1 style='color:blue'>Data has been saved</h1>";
              } else {
                echo "<h1 style='color:red'>Data has not been saved</h1>";
              }
          }else{
              echo "<h1 style='color:red'>Fields are empty</h1>";
          }
      }
      
      
      ?>
      
   <div class="row">
      <!-- users view section starts here -->
      <div class="col">
         
         <div class="card card-body bg-primary">
          <form action="" method="post">
            <div class="row">
              <div class="col">
                <select class="form-control" name="ecategory">
                   <option value="">Choose option</option>
                  <?php 
                     $cat  =  $db->selectAll("expensecategory")->fetchAll();
                     foreach ($cat as $cater) { ?>
                  <option value="<?=$cater['excate_id']?>"><?=$cater['name']?></option>
                  <?php
                     }
                     
                     ?>
                </select>
              </div>
              <div class="col"><input type="date" class="form-control" name="start"></div>
              <div class="col"><input type="date" class="form-control" name="to"></div>
              <div class="col"><input type="submit" value="Search" name="search" class="btn btn-default"></div>
            </div>
          </form>
          <?php 
            $sql =  "SELECT * FROM `expenditure`";
            $i =0;

            if (isset($_POST['search'])) {

                  if (!empty($_POST['ecategory'])) {

                        $sql = "SELECT * FROM `expenditure` WHERE `expensecatid`='".$_POST['ecategory']."'";
                     }



                     if (!empty($_POST['start']) && !empty($_POST['to'])) {
                        $sql = "SELECT * FROM `expenditure` WHERE `expendituredate` BETWEEN '".$_POST['start']."' AND '".$_POST['to']."'";
                     }


                     if (!empty($_POST['start']) && !empty($_POST['to']) &&  !empty($_POST['ecategory'])) {

                          $sql = "SELECT * FROM `expenditure` WHERE `expensecatid`='".$_POST['ecategory']."' AND  `expendituredate` BETWEEN '".$_POST['start']."' AND '".$_POST['to']."'";
                     }

                      /*echo "<pre>";
                      echo $sql;
                      echo "</pre>";*/

                   }
            
            $data = $db->joinQuery($sql)->fetchAll();
            
            ?>
            </div>

            <div class="card card-body">
         <table class="table table-condensed table-bordered table-hover table-striped" id="datatable" >
            <thead>
               <tr>
                  <th>#</th>
                  <th>Date</th>
                  <th>Expense Category</th>
                  <th>Accounts Name</th>
                  <th>Amount</th>
                  <th>Action</th>
               </tr>
            </thead>
            <tbody>
               <?php 
                  foreach ($data as $val) {  $i++; ?>
               <tr>
                  <th scope="row"><?=$i?></th>
                  <td><?=$val['expendituredate']?></td>
                  <td><?=$fn->expenseCategory($val['expensecatid'])?></td>
                  <td><?=$fn->Chartsaccounta($val['accountsid'])?></td>
                  <td><?=$val['amount']?></td>
                  <td>
    <div class="dropdown">
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
         if ($rbas->getDelete()) { ?>
             <a class="dropdown-item" href="expenditure.php?del-id=<?=$val['expenseid']?>" onclick="return confirm('Are you sure?')">Delete</a>
         <?php }
         if ($rbas->getPrint()) {
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
<?php include 'files/footer.php'; ?>