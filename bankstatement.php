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
       <div class="col-xl-12">
         <div class="card card-body">
          <form action="" method="post">
            <div class="row">
              <div class="col">
                <div class="form-group">
                  <label for="">Accounts Name</label>
                    <select name="banknames" id="banknames" class="form-control">
                      <option value="">Select an Option</option>
                        <?php    
                           $accounthead = $db->selectAll("charts_accounts","chart_name != 'Cash'")->fetchAll();
                           foreach ($accounthead as $ah) { ?>
                        <option value="<?=$ah['charts_id']?>"><?=$ah['chart_name']?></option>
                        <?php }
                           ?>
                    </select>
                </div>
                </div>
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
               <small>Include Cash Opening Balance</small> 
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
      $sql  =  "SELECT * FROM `banktransfer`";
      $sum = 0;

      $bname = "";
       
        
         if (isset($_POST['datesearch'])) 
         {
            $bankname   = $_POST['banknames'];
            $startdate  = $_POST['startdate'];
            $endate     = $_POST['endate'];
           
             if (!empty($bankname) && empty($startdate) && empty($endate)) 
             {
                $sql  .=  "where from_account ='{$bankname}' OR to_account ='{$bankname}'";
                $bname = $bankname;
             }

             if (!empty($bankname) && !empty($_POST['startdate']) && !empty($_POST['endate'])) 
             {
               $sql  .= " where  ( from_account='{$bankname}' OR to_account ='{$bankname}' )  AND transerdate Between '{$startdate}' AND '{$endate}'";
               $bname = $bankname;
             }
           if (isset($_POST['customCheck'])) 
             {  
                if (trim($_POST['customCheck'])=="Yes" && !empty($bankname)) {
                 

                   $opening_balance  =  $db->joinQuery("SELECT `opening_balance` FROM `charts_accounts` WHERE `charts_id`='{$bankname}'")->fetch(PDO::FETCH_ASSOC);
                   
                   $sum = intval($opening_balance['opening_balance']);
               }
               else{
                echo "Sorry you have not chosen any bank Name";
               }
             }
              
             
               
             
             

         }
        /* echo "<pre>";
         echo $sql;
         echo "</pre>";*/
        
         $data = $db->joinQuery($sql)->fetchAll();

         
         ?>
       <div class="card card-body">
        <h4>Statements <?=$bname?> </h4>
        <small>(default data in the table may not be appropriate, to get the exact data you have to select a bank name at least)</small>
        <hr>
      <table class="table table-hover table-bordered" id="datatable-buttons" >
         <thead>
            <tr>
               <th>#</th>
               <th>Date</th>
               <th>Descrioption</th>
               <th>Debit</th>
               <th>Credit</th>
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
                      $td1 = " ";
                      $td2 = " ";

                      $token =  explode("_", $val['bycashcheque']);
                      $details  = "";
                      if ($token[2] == $bname ) 
                      {
                        $details = "Transfarred to  <a href='#'>".$fn->Chartsaccounta($token[3])."</a>";
                        $td1  =  $val['amounts'];
                        $sum -= intval($val['amounts']);
                      }
                      else if($token[3] == $bname)
                      {
                        $details = "Deposited from <a href='#'>".$fn->Chartsaccounta($token[2])."</a>";
                         $td2  =  $val['amounts'];
                         $sum += intval($val['amounts']);
                      }
                      
               
                    
                   ?>
            <tr>
               <td><?=$i?></td>
               <td><?=$val['transerdate']?></td>
               <td><?=$details?></td>
               <td><?=$td1?></td>
               <td><?=$td2?></td>
               <td><?=$sum?></td>
               </tr>
            <?php   }
               ?>
              
         </tbody>
            <tr>
               
               <td colspan="4" class="text-right"> <h5>Total Account  Balance</h5> </td>
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