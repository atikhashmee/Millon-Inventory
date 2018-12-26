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
                           <input id="treansferdate" class="form-control" name="treansferdate"  required="required" type="date">
                        </div>
                     </div>
                     <div class="col">
                        <div class="form-group">
                          <label  for="name">From  <span class="required">*</span>
                           </label>
                           <select class="form-control" name="from">
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
                     <div class="col">
                        <div class="form-group">
                           <label  for="name">To <span class="required">*</span>
                           </label>
                           <select class="form-control" name="to">
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
                        <div class="form-group">
                          <label for="name">Amount <span class="required">*</span>
                           </label>
                           <input id="amount" class="form-control" name="amount"  required="required" type="number">
                        </div>
                     </div>
                     <div class="col">
                        <div class="form-group">
                           <label  for="name">Carrier
                           </label>
                           <input id="carrier" class="form-control" name="carrier"  type="text">
                        </div>
                     </div>
                     <div class="col">
                        <div class="form-group" style="position: relative; top:20px">
                           <div class="custom-control custom-radio">
                              <input type="radio" id="customRadio1" name="customRadio" value="no" onchange="chequeoptioncheck()" class="custom-control-input" checked="">
                              <label class="custom-control-label" for="customRadio1">Cash</label>
                           </div>
                           <div class="custom-control custom-radio">
                              <input type="radio" id="customRadio2" name="customRadio" value="yes" onchange="chequeoptioncheck()" class="custom-control-input">
                              <label class="custom-control-label" for="customRadio2">Cheque</label>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div id="chequeoption" style="display: none;">
                     <div class="row">
                        <div class="col">
                           <div class=" form-group">
                              <label  for="name"> Cheque  No
                              </label>
                              <input id="chequeno" class="form-control" name="chequeno"   type="text">
                           </div>
                        </div>
                        <div class="col">
                           <div class="form-group">
                              <label  for="name"> Issue Date
                              </label>
                              <input id="issuedate" class="form-control" name="issuedate"  type="date">
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     
                        <button type="submit" class="btn btn-outline-danger ">Cancel <i class="fa fa-times"></i></button>
                        <button id="savetransfer" name="savetransfer" type="submit" class="btn btn-outline-primary">Save <i class="fa fa-floppy-o"></i> </button>
                    
                  </div>
               </form>
            </div>
         </div>
         <?php 
            if (isset($_POST['savetransfer'])) {


               //validation start from here
              if (empty($_POST['treansferdate'])) {
                 echo "<h1 style='color:red'>Date field can not be empty</h1>";
              }else if (empty($_POST['from'])) {
                echo "<h1 style='color:red'>From field can not be empty</h1>";
              }else if (empty($_POST['to'])) {
                echo "<h1 style='color:red'>to field can not be empty</h1>";
              }else if (empty($_POST['amount'])) {
                echo "<h1 style='color:red'>Amount ID field can not be empty</h1>";
              }else if (empty($_POST['carrier'])) {
                echo "<h1 style='color:red'>Carrier ID field can not be empty</h1>";
              }else {


               if ($_POST['customRadio']=="yes") {
                  $chquedata = array(
                    'accountno' =>$_POST['chequeno'],
                    'bankname' => $_POST['from'],
                    'expiredate' => $_POST['issuedate'],
                    'amount' => $_POST['amount'],
                    'userid' => $_SESSION['u_id'],
                    'fromtable' => "default"
                  );
                  if ($db->insert("cheque",$chquedata)) {
                   echo "<h1 style='color:blue'>Cheque has been saved</h1>";
                 }
                  
                }

            $chequecash = ($_POST['customRadio']=="yes")?"Cheque":"Cash";
                 $data = array(
                   'transerdate' => $_POST['treansferdate'], 
                   'to' => $_POST['to'], 
                   'from' => $_POST['from'], 
                   'amounts' => $_POST['amount'], 
                   'carreier' => $_POST['carrier'],
                   'addedby' => $_SESSION['u_id'],
                   'bycashcheque' => "ct_".$chequecash."_".$_POST['from']."_".$_POST['to']

                 );
            
                 if ($db->insert("banktransfer",$data)) {
            
                   echo "<h1 style='color:blue'> Money has been transferrrd</h1>";
                   
                 }else {
                   echo "<h1 style='color:red'> There is a problem</h1>";
                 }
                    /* echo "<pre>";
                      print_r($data);
                     echo "</pre>";*/
                   }
            
                   
            }
            
            
            ?>
      </div>
   </div>
   <div class="row" style="margin-top: 22px;">
      <div class="col">
        <div class="card card-body">
         <table class="table table-bordered table-striped" id="datatable">
            <thead>
               <tr>
                  <th>SL</th>
                  <th>Transfar Date</th>
                  <th>To</th>
                  <th>From</th>
                  <th>Amount</th>
                  
                  <th>Carriar</th>
                  
                  <th>Action</th>
               </tr>
            </thead>
            <tbody>
               <?php 
                  $recdata =  $db->selectAll("banktransfer")->fetchAll();
                    $i=0;
                    foreach ($recdata as $val) {  $i++; ?>
               <tr>
                  <th><?=$i?></th>
                  <td><?=$val['transerdate']?></td>
                  <td><?=$fn->Chartsaccounta($val['to'])?></td>
                  <td><?=$fn->Chartsaccounta($val['from'])?></td>
                  <td><?=$val['amounts']?></td>
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
         </table>
         </div>
      </div>
   </div>
</div>
<?php include 'files/footer.php'; ?>
<script>
   // check the radio button to show the cheque payment method
   /*function chequeoptioncheck(){
     var divid  = document.getElementById('chequeoption');
    var radio  =  document.getElementById('customRadio2');
     if (radio.checked === true){
       divid.style.display = 'inline-block';
     }else {
       divid.style.display = 'none';
     }
   
   }*/
</script>