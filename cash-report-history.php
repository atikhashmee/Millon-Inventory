<?php include 'files/header.php'; ?>
<?php include 'files/menu.php';
 ?>
 <style>
 /* description in the table column */
   .description{
    font-size: 16px;
    padding: 5px;
   }
 </style>
<div class="container">
   <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="btn-group pull-right">
                                <ol class="breadcrumb hide-phone p-0 m-0">
                                  <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                                  <li class="breadcrumb-item"><a href="#">Report</a></li>
                                  <li class="breadcrumb-item active">Bank statement</li>
                                </ol>
                            </div>
                            <h4 class="page-title"> Bank Statement</h4>
                            
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->
     <div class="row">
       <div class="col">
         <div class="card card-body">
          <form action="" method="post">
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label for="">Select a start Date</label>
                  <input type="text" class="form-control" name="startdate" id="startdate">
                </div>
              </div>
              <div class="col">
                <div class="form-group">
                  <label for="">Select an end Date</label>
                <input type="text" class="form-control" name="endate" id="endate">
                </div>
              </div>
              <div class="col">
                <div class="form-group">
          <div class="custom-control custom-checkbox" style="top: 30px;">
            <input type="checkbox" class="custom-control-input"  id="customCheck"
              value="Yes" name="customCheck">
              <label class="custom-control-label" for="customCheck">
                Include Cash Opening Balance
               </label>
               </div>
            </div>
              </div>
              <div class="col">
               
                  <button type="submit" name="datesearch" style="position: absolute; top: 29px;"  class="btn btn-outline-primary">  Search <i class="fa fa-search"></i> </button> 
               
                
              </div>
            </div>
          </form>
         </div>
       </div>
     </div>



<div class="row" style="margin-top: 20px;">

   <!-- users view section starts here -->

   <div class="col">
      <?php
      $sql  =  cashRawQuery();
       
      $opening_balance  =  $db->joinQuery("SELECT `opening_balance` FROM `charts_accounts` WHERE `chart_name`='Cash'")->fetch(PDO::FETCH_ASSOC);
       $sum = $opening_balance['opening_balance'];
         if (isset($_POST['datesearch'])) 
         {
             if (!empty($_POST['startdate']) && empty($_POST['endate'])) 
             {
                $sql  =  cashRawQuery($_POST['startdate']);
             }

             if (!empty($_POST['startdate']) && !empty($_POST['endate'])) 
             {
                $sql  =  cashRawQuery($_POST['startdate'],$_POST['endate']);
             }

             if (isset($_POST['customCheck']) && $_POST['customCheck'] == "Yes") 
             {
               $sum = $opening_balance['opening_balance'];
             }
             else
             {
               $sum = 0;
             }

         }
        
         $data = $db->joinQuery($sql)->fetchAll();

         
         ?>
       <div class="card card-body">
        <h4>Cash Statement</h4>
        <hr>
      <table class="table table-hover table-bordered" id="datatable-buttons" >
         <thead>
            <tr>
               <th>#</th>
               <th>Date</th>
               
               <th>Descrioption</th>
               <th>Credit</th>
               <th>Debit</th>
               <th>Total</th>
            </tr>
         </thead>
         <tbody>
           <tr>
             <td></td>
             <td></td>
             <td></td>
             <td></td>
             <td>Cash Start </td>
             <td><?=$sum?></td>
           </tr>
            <?php 
               $i=0;
              
                  foreach ($data as $val) {  $i++;
                    $i++;
                   
                     $tkn     =  trim($val['token']);
                     $amounts =  trim($val['payment_taka']);
                     $sign    =  getMoneyToken($tkn,$amounts);
                    
                     $td1     =  (substr($sign, 0,1)   !="-")?$amounts:" ";
                     $td2     =  (substr($sign, 0,1)   =="-")?$amounts:" ";

                     $detail  =  detailsOfAction($tkn,trim($val['customerid']));

                     $sum    +=  getMoneyToken($tkn,$amounts);
               
                    
                   ?>
            <tr>
               <td><?=$i?></td>
               <td><?=$val['selldate']?></td>
               <td><?=$detail?></td>
               <td><?=$td1?></td>
               <td><?=$td2?></td>
               <td><?=$sum?></td>
               </tr>
            <?php   }
               ?>
              
         </tbody>
            <tr>
               
               <td colspan="4" class="text-right"> <h5>Total Cash Balance</h5> </td>
               <td> <strong><?=number_format((float)$sum,2,'.',',')?></strong></td>
             </tr>
      </table>
      </div>
   </div>
</div>
</div>
<?php include 'files/footer.php'; ?>

                  <script>
                    jDate("#startdate");
                    jDate("#endate");
                 </script>