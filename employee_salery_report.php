<?php include 'files/header.php'; ?>
<?php include 'files/menu.php';?>
<div class="container">
   <div class="row">
      <div class="col-sm-12">
         <div class="page-title-box">
            <div class="btn-group pull-right">
               <ol class="breadcrumb hide-phone p-0 m-0">
                  <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                  <li class="breadcrumb-item"><a href="#">Report</a></li>
                  <li class="breadcrumb-item active">Salery Report</li>
               </ol>
            </div>
            <h4 class="page-title"> Employee Salery Report</h4>
         </div>
      </div>
   </div>
   <!-- end page title end breadcrumb -->
   <div class="row">
      <div class="col">
         <div class="card card-body">
            <form action="" method="POST">
               <div class="row">
                  <div class="col">
                     <select class="form-control" name="employeeid">
                        <option value="">Select an Employee</option>
                        <?$dm->getUsersByRole(4)?>
                     </select>
                  </div>
                  <div class="col"><input type="date" class="form-control" name="start"></div>
                  <div class="col"><input type="date" class="form-control" name="to"></div>
                  <div class="col"><button type="submit"  name="filter" class="btn btn-outline-primary">Search <i class="fa fa-search"></i> </button></div>
               </div>
            </form>
         </div>
      </div>
   </div>
   <div class="row" style="margin-top: 22px;">
      <!-- users view section starts here -->
      <div class="col">
         <?php 
            $sql =  "SELECT * FROM `e_payment_salery`";
            
            
            if (isset($_POST['filter'])) {
            
                //search by only name
            
                if (!empty($_POST['employeeid'])) {
                      $sql = "SELECT * FROM `e_payment_salery` WHERE `employeeid`='".$_POST['employeeid']."'";
                }
            if (!empty($_POST['start']) &&  !empty($_POST['to'])) {
            $sql ="SELECT * FROM `e_payment_salery` WHERE `payment_date` BETWEEN '".$_POST['start']."' AND '".$_POST['to']."'";
            
            }

            }
            
            
            //echo $sql;
            $data = $db->joinQuery($sql)->fetchAll();
            
            
            ?>
         <table class="table table-hover table-striped table-bordered" id="datatable-buttons" >
            <thead>
               <tr>
                  <th>#</th>
                  <th>Date</th>
                  <th>Employee</th>
                  <th>Amount</th>
                  <th>Due</th>
               </tr>
            </thead>
            <tbody>
               <?php 
                  $i=0;
                  $sum = 0;
                      foreach ($data as $val) {  $i++;
                        $sum += (int) $val['amount_pay'];
                      ?>
               <tr>
                  <th scope="row"><?=$i?></th>
                  <td><?=$val['payment_date']?></td>
                  <td><?=$fn->getUserName($val['employeeid'])?></td>
                  <td><?=$val['amount_pay']?></td>
                  <td><?=$val['payment_due']?></td>
               </tr>
               <?php   }
                  ?>
            </tbody>
            <tr>
               <td></td>
               <td><b>Total Amount</b></td>
               <td><?=number_format($sum)?></td>
            </tr>
         </table>
      </div>
   </div>
</div>
<?php include 'files/footer.php'; ?>