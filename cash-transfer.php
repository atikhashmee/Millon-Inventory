<?php include 'files/header.php'; ?>
<?php include 'files/menu.php'; 

 $rbas->setPageName(8)->run();

  // delete function 
  if (isset($_GET['del-id'])) {
             if ($db->delete("banktransfer","transferid='".$_GET['del-id']."'")) {?>
            <script> alert('Data has been deleted');
             window.location.href='cash-transfer.php'; </script>
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
                                  <li class="breadcrumb-item active">Cash Transfer</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Cash Transfar</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->
   <div class="row">
      <div class="col">
         <div class="card mb-3">
            <div class="card-body">
               <form class="form-horizontal form-label-left" method="post">
                  <div class="row">
                     <div class="col">
                        <div class="form-group">
                          <label  for="name"> Date <span class="required">*</span>
                           </label>
                           <input id="treansferdate" class="form-control mydate" name="treansferdate"  required="required" type="text">
                        </div>
                     </div>
                     <div class="col">
                       <div class="form-group">
                          <label for="">Transfar Type</label>
                          <select name="ttype" id="ttype" class="form-control">
                             <option value="out">----Out----</option>
                             <option value="in">----In----</option>
                          </select>
                       </div>
                     </div>
                     <div class="col">
                        <div class="form-group">
                          <label  for="name"> Bank Account <span class="required">*</span>
                           </label>
                           <select class="form-control" name="bankaccount">
                              <option value="">Choose option</option>
                               <?php    
                           $accounthead = $db->selectAll("charts_accounts","chart_name != 'Cash'")->fetchAll();
                           foreach ($accounthead as $ah) { ?>
                        <option value="<?=$ah['charts_id']?>"><?=$ah['chart_name']?></option>
                        <?php }
                           ?>

                           </select>
                        </div>
                     </div>
                     
                  </div>
                  <div class="row">
                     <div class="col">
                        <div class="form-group">
                          <label for="name">Amount <span class="required">*</span>
                           </label>
                           <input id="amount" class="form-control" name="amount"  required="required" type="number">
                        </div>
                     </div>
                     <div class="col">
                        <div class="form-group">
                           <label  for="name">Carrier  <span class="required">*</span>
                           </label>
                           <input id="carrier" class="form-control" name="carrier"  type="text">
                        </div>
                     </div>
                    
                  </div>
                  
                  <div class="form-group">
                     
                        <button type="submit" class="btn btn-outline-danger ">Cancel <i class="fa fa-times"></i></button>
                        <button id="savetransfer" name="savetransfer" type="submit" class="btn btn-outline-primary">Save <i class="fa fa-floppy-o"></i> </button>
                    
                  </div>
               </form>
               <?php 

                  

                      if (isset($_POST['savetransfer'])) 
                      {
                      
                      try{
                            $date        = $_POST['treansferdate'];
                            $bankaccount = $_POST['bankaccount'];
                            $ttype       = $_POST['ttype'];
                            $amnt        = $_POST['amount'];
                            $carrier     = $_POST['carrier'];

                              $from = $to = "";
                              if ($ttype == "out") 
                              {
                                 $from = "4";
                                 $to = $bankaccount;
                              }
                              else if($ttype == "in") 
                              {
                                  $to="4";
                                  $from = $bankaccount;
                              }

                              if (empty($from) || empty($to)) 
                                throw new Exception("Select Transfar Type", 1);
                             else if (empty($bankaccount)) 
                              throw new Exception("Account Field is required", 1);
                            else  if (empty($amnt))
                              throw new Exception("Amount field is required", 1);
                            else  if (empty($carrier))
                              throw new Exception("Carrier Field is required", 1);
                          else if (empty($date))
                              throw new Exception("Date Field is required", 1);
                            else
                            {

                                   $data = array(
                               'transerdate' => $date, 
                               'to_account' => $to, 
                               'from_account' => $from, 
                               'amounts' => $amnt, 
                               'carreier' => $carrier,
                               'addedby' => $_SESSION['u_id'],
                               'bycashcheque' => "ct_Cash_".$from."_".$to
                             );
                        $msg =  $ttype == "out" ? "withdrawn" : " Refill";
                             if ($db->insert("banktransfer",$data)) 
                             {

                                   
                               echo "<h6 style='color:blue'> Money has been {$msg} successfully</h6>";
                               
                             }else {
                               throw new Exception("Data saving problem", 1);
                               
                             }
                           }
                       }
                       catch(Exception $e)
                       {
                        echo "<h6 style='color:red'>Notice ! ".$e->getMessage()."</h6>";
                       }
                       
                      }

               ?>
            </div>
         </div>
         <?php 
            
            
            
            ?>
      </div>
   </div>
   <div class="row" style="margin-top: 22px;">
      <div class="col">
        <div class="card card-body">
          <form action="" method="POST" class="mb-5 ml-5">
                  <div class="row">
                     
                     <div class="col"><input type="text" class="form-control" name="start" id="start"></div>
                     <div class="col"><input type="text" class="form-control" name="to" id="to"></div>
                     <div class="col">
                        <button type="submit" name="filter" class="btn btn-outline-primary">Search <i class="fa fa-search"></i> </button>
                     </div>
                  </div>
               </form>
         <table class="table table-bordered table-striped" id="datatable">
            <thead>
               <tr>
                  <th>SL</th>
                  <th>Transfar Date</th>
                  <th>From</th>
                  <th>To</th>
                  <th>Amount</th>
                  
                  <th>Carriar</th>
                  
                  <th>Action</th>
               </tr>
            </thead>
            <tbody>
               <?php 
                  $sql = "SELECT * FROM `banktransfer`";
               if (isset($_POST['filter'])) 
               {
                
                   if (!empty($_POST['start']) && empty($_POST['to'])) 
                   {
                     $sql = "SELECT * FROM `banktransfer` WHERE `transerdate`='".$_POST['start']."'";
                   }

                   if (!empty($_POST['start']) && !empty($_POST['to'])) 
                   {
                     $sql = "SELECT * FROM `banktransfer` WHERE `transerdate`Between '".$_POST['start']."' AND '".$_POST['to']."'";
                   }
               }
               /*echo "<pre>";
               print_r($sql);
               echo "</pre>";*/
                  $recdata =  $db->joinQuery($sql)->fetchAll();
                    $i=0;
                    $sum =0;
                    foreach ($recdata as $val) 
                      { 
                        $sum += (int) $val['amounts'];
                       $i++; ?>
               <tr>
                  <th><?=$i?></th>
                  <td><?=$val['transerdate']?></td>
                  <td><?=$fn->Chartsaccounta($val['from_account'])?></td>
                  <td><?=$fn->Chartsaccounta($val['to_account'])?></td>
                  <td><?=number_format($val['amounts'])?></td>
                  <td><?=$val['carreier']?></td>
                 
                  <td> <div class="dropdown">
  <button type="button" class="btn btn-outline-primary dropdown-toggle" data-toggle="dropdown">
    <i class="fa fa-gear"></i>
  </button>
  <div class="dropdown-menu">
    <?php 
         if ($rbas->getView()) {
              echo '<a class="dropdown-item" href="#">View <i class="fa fa-eye"></i></a>';
         }
         if ($rbas->getUpdate()) {
              echo '<a class="dropdown-item" href="#">Edit <i class="fa fa-pencil"></i></a>';
         }
         if ($rbas->getDelete()) { ?>
              <a class="dropdown-item" href="cash-transfer.php?del-id=<?=$val['transferid']?>" onclick="return confirm('Are you sure?')">Delete <i class="fa fa-times"></i></a>
      <?php   }
         if ($rbas->getPrint()) {
              echo '<a class="dropdown-item" href="#">Print</a>';
         }
    ?>
    
    
  </div>
</div></td>
               </tr>
               <?php   }
                  ?>
            </tbody>
            <tr>
              <td colspan="3" class="text-right"><strong>Total</strong></td>
              <td><strong><?=number_format($sum)?></strong></td>
            </tr>
         </table>
         </div>
      </div>
   </div>
</div>
<?php include 'files/footer.php'; ?>