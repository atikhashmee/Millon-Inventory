<?php include 'files/header.php'; ?>
<?php include 'files/menu.php';
   require_once("php/employee-history-report.php");
$es = new EmployeeHistoryReport();
?>
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
                        <option value="">--Employee--</option>
                        <?=$dm->getUsersByRole(4)?>
                     </select>
                  </div>
                  <div class="col">
                     <input type="text" class="form-control" id="start" name="start">
                  </div>
                  <div class="col">
                     <input type="text" id="to" class="form-control" name="to">
                  </div>
                  <div class="col">
                     <button type="submit"  name="filter" class="btn btn-outline-primary">Search <i class="fa fa-search"></i> </button>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
   <div class="row" style="margin-top: 22px;">
      <!-- users view section starts here -->
      <div class="col">
         <?php 
            $sql =  $es->reportQuery();

             if (isset($_GET['e_id']) && !isset($_POST['filter'])) 
             {
               $sql =  $es->reportQuery($_GET['e_id']);
             }
            
            
            if (isset($_POST['filter']) && !isset($_GET['e_id'])) 
            {
            
                //search by only name
            
                if (!empty($_POST['employeeid']) && (empty($_POST['start']) && empty($_POST['to']))) 
                {
                      $sql =  $es->reportQuery($_POST['employeeid']);
                }

              if (!empty($_POST['employeeid']) && !empty($_POST['start']) &&  empty($_POST['to'])) 
               {
                   $sql =  $es->reportQuery($_POST['employeeid'],$_POST['start']);
            
              }

              if (!empty($_POST['employeeid']) && (!empty($_POST['start']) &&  !empty($_POST['to']))) 
               {
                    $sql =  $es->reportQuery($_POST['employeeid'],$_POST['start'],$_POST['to']);
            
              }

            }
            
            /*echo "<pre>";
            print_r($sql);
            echo "</pre>";*/
            //echo $sql;
            $data = $db->joinQuery($sql)->fetchAll();
            /* echo "<pre>";
            print_r($data);
            echo "</pre>";*/
            
            
            ?>
            <div class="card card-body">
             <?php 
                  if (isset($_POST['filter'])) 
                  {
                    if (!empty($_POST['employeeid'])) 
                    {
                      echo ' <address style="margin-left: 44px;">'.$dm->getUserFullDetails($_POST['employeeid']).' </address>';
                    }
                       
                  }
                  if (isset($_GET['e_id'])) 
                  {
                    echo ' <address style="margin-left: 44px;">'.$dm->getUserFullDetails($_GET['e_id']).' </address>';
                  }
                  ?> 
        <table class="table table-hover table-striped table-bordered" id="datatable-buttons" >
           <thead>
              <tr>
                 <th>#</th>
                 <th>Date</th>
                 <th>Description</th>
                 <th>Amount</th>
                 <th>Balance</th>
              </tr>
           </thead>
           <tbody>
              <?php 
                 $i=0;
                 $sum = 0;
                     foreach ($data as $val) {  $i++;
                       
                       $tkn = trim($val['token']);
                      $amount = trim($val['amount']);
                      $str =   $es->getEmployeeToken($tkn,$amount,new Functions(),$val['accountsid']);
                      $des = $str['descrip'];
                      $amnt = $str['amount'];
                      $sum += (int)$amnt;
                     ?>
              <tr>
                 <th scope="row"><?=$i?></th>
                 <td><?=$val['expendituredate']?></td>
                 <td><?=$des?></td>
                 <td><?=$amnt?></td>
                 <td><?=$sum?></td>
              </tr>
              <?php   }
                 ?>
           </tbody>
           <tr>
            
              <td colspan="4" class="text-right"> <b>Total Amount</b></td>
              <td><?=number_format($sum)?></td>
           </tr>
        </table>
        </div>
      </div>
   </div>
</div>
<?php include 'files/footer.php'; ?>