<?php include 'files/header.php'; ?>
<?php include 'files/menu.php';
   ?>
<div class="container">
   <div class="row">
      <div class="col-sm-12">
         <div class="page-title-box">
            <div class="btn-group pull-right">
               <ol class="breadcrumb hide-phone p-0 m-0">
                  <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                  <li class="breadcrumb-item"><a href="#">Report</a></li>
                  <li class="breadcrumb-item active">Customer Payments</li>
               </ol>
            </div>
            <h4 class="page-title"> Customer Payment Report</h4>
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
                     <input type="hidden" name="customerid" id="customerid">
                     <input type="text" class="form-control" id="customer" placeholder="type out a customer name">
                  </div>
                  <div class="col">
                     <input type="text" class="form-control" name="start" id="start">
                  </div>
                  <div class="col">
                     <input type="text" class="form-control" name="to" id="to">
                  </div>
                  <div class="col">
                     <button type="submit"  name="filter" class="btn btn-outline-primary">
                     Search <i class="fa fa-search"></i>
                     </button>
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
            $exequery =  $rp->getCustomerPaymentList();
            if (isset($_POST['filter'])) 
            {
                 if (!empty($_POST['customerid']) && (empty($_POST['start']) && empty($_POST['to']))) 
                                    {
                    $exequery = $rp->getCustomerPaymentList($_POST['customerid']);
                                    }
                                  
                   if (!empty($_POST['customerid'])&& (!empty($_POST['start']) && empty($_POST['to'])))
                     {
                          $exequery = $rp->getCustomerPaymentList($_POST['customerid'],$_POST['start']);
                      }
            
                      if (!empty($_POST['customerid'])&& (!empty($_POST['start']) && !empty($_POST['to'])))
                         {
                                  $exequery = $rp->getCustomerPaymentList($_POST['customerid'],$_POST['start'],$_POST['to']);
                          }
                
                
            }
            
            $data = $db->joinQuery($exequery)->fetchAll();
            
            ?>
         <div class="card card-body">

          <table class="table table-hover table-bordered" id="datatable-buttons" >
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
                        foreach ($data as $val) 
                        {  
                          $i++;

                        

                          $tkn = trim($val['bycashcheque']);
                          $amount = trim($val['amounts']);
                          $pay = 0;
                      $str = $rp->getCustomerToken($tkn,$amount,trim($val['others']));
      if ($str['payamount'] !=0 ) 
        {
          $sum += (float)$str['payamount'];
          $pay = (float)$str['payamount'];
        }
        else 
        {
          $sum += (float)$str['payamount'];
          $pay  = (float)$str['payamount'];
        }

       ?>
                  <tr>
                     <th scope="row"><?=$i?></th>
                     <td><?=$val['recievedate']?></td>
                     <td><?=$str['descrip']?></td>
                     <td><?=$pay?></td>
                     <td><?=$sum?></td>
                  </tr>
                  <?php   }
                     ?>
               </tbody>
               <tr>
                  <td colspan="4" class="text-right"> Total Paid </td>
                  <td><?=$sum?></td>
               </tr>
            </table>
         </div>
      </div>
   </div>
</div>
<?php include 'files/footer.php'; ?>