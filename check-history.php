<?php include 'files/header.php'; ?>
<?php include 'files/menu.php';


    if (isset($_GET['str']) && isset($_GET['id'])) 
      {
        $id = $_GET['id'];

         if ($_GET['str'] == "honer") 
         {
            
          $data = [
            'approve' => 1
             ];
         }
         else if ($_GET['str'] == "dishoner") 
         {
          $data = [
            'approve' =>2
             ];
         }
     else if ($_GET['str'] == "default") 
        {
          $data = [
            'approve' =>0
             ];
         }


         if ($db->update("cheque",$data,"chequeno='".$id."'"))
         {
            ?>
            <script>
              alert("Data has been updated");
              window.location.href='check-history.php';
            </script>
            <?php 
         }
         
        
        

      
      }


?>
<div class="container">
   <div class="row">
      <div class="col-sm-12">
         <div class="page-title-box">
            <div class="btn-group pull-right">
               <ol class="breadcrumb hide-phone p-0 m-0">
                  <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                  <li class="breadcrumb-item"><a href="#">Report</a></li>
                  <li class="breadcrumb-item active">Cheque History</li>
               </ol>
            </div>
            <h4 class="page-title">Cheque History</h4>
         </div>
      </div>
   </div>
   <!-- end page title end breadcrumb -->
   <div class="row">
      <div class="col-xl-12">
         <div class="card m-b-30">
            <div class="card-body">
               <form action="" method="POST">
                  <div class="row">
                     
                     <div class="col"><input type="text" class="form-control" name="start" id="start"></div>
                     <div class="col"><input type="text" class="form-control" name="to" id="to"></div>
                     <div class="col">
                        <div class="form-group">
                           <select class="form-control" name="is_type">
                              <option value="all">--ALL--</option>
                              <option value="untouched">untouched</option>
                              <option value="honored">honored</option>
                              <option value="dishonored">dishonored</option>
                           </select>
                        </div>
                     </div>
                     
                     <div class="col">
                        <button type="submit" name="filter" class="btn btn-outline-primary">Search <i class="fa fa-search"></i> </button>
                     </div>
                  </div>
               </form>
               <?php 
                  /*echo "<pre>";
                  print_r($rp->getE());
                  echo "</pre>";*/
                  
                      $exequery ="SELECT * FROM `cheque`";
                      $sum =0;
                     
                      
                      if (isset($_POST['filter'])) 
                       {
                           if ($_POST['is_type'] == "untouched") 
                           {
                            
                              $exequery ="SELECT * FROM `cheque` WHERE approve='0'";
                            if (!empty($_POST['start']) && empty($_POST['to']))
                               {
                             $exequery = "SELECT * FROM `cheque` WHERE `expiredate`='".$_POST['start']."' AND approve='0'";
                               }
                  
                          if ((!empty($_POST['start']) && !empty($_POST['to'])))
                               {
                             $exequery = "SELECT * FROM `cheque` WHERE `expiredate`BETWEEN '".$_POST['start']."' AND '".$_POST['to']."'  AND approve='0'";
                               }
                           }
                           else if ($_POST['is_type'] == "honored") 
                           {
                           $exequery ="SELECT * FROM `cheque` WHERE approve='1'";
                           
                             if (!empty($_POST['start']) && empty($_POST['to']))
                               {
                             $exequery = "SELECT * FROM `cheque` WHERE `expiredate`='".$_POST['start']."' AND approve='1'";
                               }
                  
                          if ((!empty($_POST['start']) && !empty($_POST['to'])))
                               {
                             $exequery = "SELECT * FROM `cheque` WHERE `expiredate`BETWEEN '".$_POST['start']."' AND '".$_POST['to']."'  AND approve='1'";
                               }
                           }
                           else if ($_POST['is_type'] == "dishonored") 
                           {
                            $exequery ="SELECT * FROM `cheque` WHERE approve='2'";
                           if (!empty($_POST['start']) && empty($_POST['to']))
                               {
                             $exequery = "SELECT * FROM `cheque` WHERE `expiredate`='".$_POST['start']."' AND approve='2'";
                               }
                  
                          if ((!empty($_POST['start']) && !empty($_POST['to'])))
                               {
                             $exequery = "SELECT * FROM `cheque` WHERE `expiredate`BETWEEN '".$_POST['start']."' AND '".$_POST['to']."'  AND approve='2'";
                               }
                           }else if ($_POST['is_type'] == "all") 
                           {
                            
                           if (!empty($_POST['start']) && empty($_POST['to']))
                               {
                             $exequery = "SELECT * FROM `cheque` WHERE `expiredate`='".$_POST['start']."'";
                               }
                  
                          if ((!empty($_POST['start']) && !empty($_POST['to'])))
                               {
                             $exequery = "SELECT * FROM `cheque` WHERE `expiredate`BETWEEN '".$_POST['start']."' AND '".$_POST['to']."'";
                               }
                           }
                            
                  
                  
                              
                       }
                       /*echo "<pre>";
                      print_r($exequery);
                      echo "</pre>";*/
                                  $data = $db->joinQuery($exequery)->fetchAll();
                                   /*echo "<pre>";
                      print_r($data);
                      echo "</pre>";*/
                                 ?> 
            </div>
         </div>
         <div class="card m-b-30">
            <div class="card-body">
               <div class="table-responsive">
               <table border="1" style="width: 100%" id="datatable-buttons">
                 <thead>
                    <tr>
                       <th>#</th>
                       <th>Date</th>
                       <th>Bank Name</th>
                       <th>Account Number</th>
                       <th>Status</th>
                       <th>Amount</th>
                       <th>Balance</th>
                    </tr>
                 </thead>
                 <tbody>
                   
                    <?php
                       $i=0;
                       $purchasesum = 0;
                           $untouched = 0;
                           $honored =0;
                           $dishonored = 0;
                       foreach ($data as $val) 
                       {  
                        $i++;
                       

                        if ($val['approve'] == 0) 
                        {
                          $untouched += (int)$val['amount'];
                           $sum += (int)$val['amount'];
                           $des = '<div class="dropdown">
  <button type="button" class="btn btn-outline-default dropdown-toggle" data-toggle="dropdown">
    Untouched <i class="fa fa-eye"></i>
  </button>
  <div class="dropdown-menu">
         <a class="dropdown-item" href="check-history.php?str=honer&id='.$val['chequeno'].'">Honor <i class="fa fa-check"></i></a>
        <a class="dropdown-item" href="check-history.php?str=dishoner&id='.$val['chequeno'].'">Dishonor <i class="fa fa-times"></i></a>
  </div>
</div>';
                        }
                        else if ($val['approve'] == 1) 
                        {
                          $honored =(int)$val['amount'];
                           $sum += (int)$val['amount'];
                          
                              $des = '<div class="dropdown">
  <button type="button" class="btn btn-outline-primary dropdown-toggle" data-toggle="dropdown">
    Honored <i class="fa fa-check"></i>
  </button>
  <div class="dropdown-menu">
         <a class="dropdown-item" href="check-history.php?str=default&id='.$val['chequeno'].'">Untouched <i class="fa fa-eye"></i></a>
        <a class="dropdown-item" href="check-history.php?str=dishoner&id='.$val['chequeno'].'">Dishonor <i class="fa fa-times"></i></a>
  </div>
</div>';
                        }
                        else if ($val['approve'] == 2) 
                        {
                          $dishonored =(int)$val['amount'];
                           $sum += (int)$val['amount'];
                              $des = '<div class="dropdown">
  <button type="button" class="btn btn-outline-danger dropdown-toggle" data-toggle="dropdown">
    untouched <i class="fa fa-times"></i>
  </button>
  <div class="dropdown-menu">
         <a class="dropdown-item" href="check-history.php?str=default&id='.$val['chequeno'].'">Untouched <i class="fa fa-eye"></i></a>
        <a class="dropdown-item" href="check-history.php?str=honer&id='.$val['chequeno'].'">Honor <i class="fa fa-check"></i></a>
  </div>
</div>';
                        }
                           
                        ?>
                    <tr>
                       <td><?=$i?></td>
                       <td><?=$val['expiredate']?></td>
                       <td><?=$val['bankname']?></td>
                       <td><?=$val['accountno']?></td>
                       <td><?=$des?></td>
                       <td><?=$val['amount']?></td>
                       <td><?=$sum?></td>
                    </tr>
                    <?php 
                       }
                       
                       ?>
                 </tbody>
                 <tr>
                    <td rowspan="4" colspan="5"></td>
                    <td class="text-right">Untouched</td>
                    <td ><?=$untouched?></td>
                 </tr>
                 <tr>
                    <td  class="text-right">Honored</td>
                    <td ><?=$honored?></td>
                 </tr>
                 <tr>
                    <td  class="text-right">Dishonored</td>
                    <td ><?=$dishonored?></td>
                 </tr>
                
              </table> 
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
<?php include 'files/footer.php';?>