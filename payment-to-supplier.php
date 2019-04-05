<?php include 'files/header.php'; ?>
<?php include 'files/menu.php';

$rbas->setPageName(7)->run();
$pagetitle = (isset($_GET['edit-id']))?"Update":"Add";

if (isset($_GET['del-id'])) 
{

        $getstatus = $db->selectAll('supplierpayment',"pay_id='".$_GET['del-id']."'")->fetch(PDO::FETCH_ASSOC);
        if ($getstatus['status'] == 'Cheque')
         {
               $db->delete("cheque","parent_table_id='pts_".$_GET['del-id']."'");
         }
           
       if ($db->delete("supplierpayment","pay_id='".$_GET['del-id']."'"))
        {  
             ?>
             <script> alert('Data has been deleted');
             window.location.href='payment-to-supplier.php'; </script>
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
                                  <li class="breadcrumb-item"><a href="#">Accounce</a></li>
                                  <li class="breadcrumb-item active">Payment to Supplier</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Payment To Supplier <?=$pagetitle?></h4>
                            
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->
   <div class="row">
      <div class="col">
         <div class="card">
            
            <div class="card-body">
               <form class="form-horizontal form-label-left" method="post">
                  <div class="row">
                     <div class="col">
                        <div class="form-group">
                          <label  for="name"> Date <span class="required">*</span>
                           </label>
                           <input id="paymentdat" class="form-control mydate" name="paymentdat"  required="required" type="text">
                        </div>
                     </div>
                     <div class="col">
                       <div class="form-group">
                                 <label  for="name">Supplier Name <span class="required">*</span>
                                    <input type="hidden" name="suppliername" id="suppliername">
                                 <input type="text" class="form-control" id="suppliernnname" name="suppliernnname">
                              </div>

                      
                     </div>
                     <div class="col">
                        <div class="form-group">
                           <label  for="name">Amount <span class="required">*</span>
                           </label>
                           <input id="amount" class="form-control" name="amount"  required="required" type="number">
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     
                     <div class="col">
                        <div class="form-group">
                           <label  for="name">Carrier
                           </label>
                           <input id="carrier" class="form-control" name="carrier"   type="text">
                        </div>
                     </div>
                      
                     <div class="col">
                        <div class="form-group" id="payoption" style="position: relative; top:20px;">
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
                        <div class="form-group">
                           <label for="name">Accounts <span class="required">*</span>
                           </label>
                           <select class="form-control" name="accounts_id" onchange="chageCashOption(this)">
                              <option value="" selected disabled hidden>Choose option</option>
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
                              <label  for="name"> Cheque Number
                             
                              </label>
                              <input id="chequeno" class="form-control" name="chequeno"   type="text">
                           </div>
                        </div>
                        
                        <div class="col">
                           <div class="form-group">
                              <label  for="name"> Issue Date 
                              </label>
                              <input id="issuedate" class="form-control" name="issuedate" type="date">
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     
                        <button type="submit" class="btn btn-outline-danger">Cancel</button>
                        <button id="savepayument" name="savepayument" type="submit" class="btn btn-outline-primary">Saved <i class="fa fa-floppy-o"></i></button>
                    
                  </div>
               </form>
            </div>
         </div>
         <?php 
            if (isset($_POST['savepayument'])) 
            {

              //validation start from here
              if (empty($_POST['paymentdat'])) 
              {
                 echo "<h1 style='color:red'>Date field can not be empty</h1>";
              }
              else if (empty($_POST['suppliername'])) 
              {
                echo "<h1 style='color:red'>Supplier ID field can not be empty</h1>";
              }
              else if  ( (isset($_POST['customRadio']) && $_POST['customRadio'] =="yes") && empty($_POST['accounts_id'])) 
              {
                echo "<h1 style='color:red'>Accounts ID field can not be empty</h1>";
              }
              else if (empty($_POST['amount'])) 
              {
                echo "<h1 style='color:red'>Amount ID field can not be empty</h1>";
              }
              else if (empty($_POST['carrier']))
              {
                echo "<h1 style='color:red'>Carrier ID field can not be empty</h1>";
              }
              else
              {
                    $chequecash = ($_POST['customRadio']=="yes")?"Cheque":"Cash";
            
                             $data = array(
                              'pay_date' => $_POST['paymentdat'],
                              'sup_id'   => $_POST['suppliername'],
                              'amnts'    => $_POST['amount'],
                              'carier'   => $_POST['carrier'],
                              'inputby'  => $_SESSION['u_id'],
                              'status'   => "pts_".$chequecash
                               );
                     $parentid = 0;
                     if ($db->insert("supplierpayment",$data)) 
                     {
                           $parentid = $db->getInsertId('pay_id');
                        
                                    ?>
                                   <script> alert('Money Has been paid');
                                    </script>
                                   <?php
                                    
                      }
                      else
                     {
                                      ?>
                                     <script> alert('Error Occured');
                                     </script>
                                    <?php
                     }



                     if ($_POST['customRadio']=="yes") 
                     {
                          $chquedata = array(
                            'parent_table_id' => "pts_".$parentid,
                            'accountno' => $_POST['chequeno'],
                            'customerid' => $_POST['suppliername'],
                            'bankname' => $_POST['accounts_id'],
                            'expiredate' => $_POST['issuedate'],
                            'amount' => $_POST['amount'],
                            'carrier' => $_POST['carrier'],
                            'userid' => $_SESSION['u_id'],
                            'fromtable' => "minus"
                          );
                      if ($db->insert("cheque",$chquedata)) 
                        {
                                    ?>
                                     <script> alert('Cheque Information saved');
                                     </script>
                                    <?php
                        }
                  
                     }

              }
             
            
            
            }
            
            
            
            ?>
      </div>
   </div>
   <div class="row" style="margin-top: 22px">
      <div class="col">
        <div class="card card-body">
          <form action="" method="POST" style="margin-left: 40px">
                  <div class="row">
                     <div class="col">
                        <label for="">Supplier Name</label>
                        <input type="hidden" name="supplierid" id="supplierid">
                        <input type="text" class="form-control" id="supplier" placeholder="type out supplier name">
                     </div>
                     <div class="col">
                        <label for="">Date-From</label>
                        <input type="text" class="form-control" name="start" id="start">
                     </div>
                     <div class="col">
                        <label for="">Date-To</label>
                        <input type="text" class="form-control" name="to" id="to">
                     </div>
                   
                     <div class="col">
                        <button type="submit" name="filter" style="position: absolute;top: 29px;" class="btn btn-outline-primary">Search <i class="fa fa-search"></i> </button>
                     </div>
                  </div>
               </form>
             </div>
             <div class="card card-body">
         <table class="table table-bordered table-striped" id="datatable">
            <thead>
               <tr>
                  <th>#SL</th>
                  <th>Payment Date</th>
                  <th>Supplier</th>
                  <th>Amount</th>
                  <th>Carriar</th>
                  <th>Action</th>
               </tr>
            </thead>
            <tbody>
               <?php 
               $sql = "SELECT * FROM `supplierpayment`";
               if (isset($_POST['filter'])) 
               {
                   if (!empty($_POST['supplierid']) && (empty($_POST['start']) && empty($_POST['to']))) 
                   {
                     $sql = "SELECT * FROM `supplierpayment` WHERE `sup_id`='".$_POST['supplierid']."'";
                   }


                   if (!empty($_POST['start']) && empty($_POST['to'])) 
                   {
                     $sql = "SELECT * FROM `supplierpayment` WHERE `pay_date`='".$_POST['start']."'";
                   }

                   if (!empty($_POST['start']) && !empty($_POST['to'])) 
                   {
                     $sql = "SELECT * FROM `supplierpayment` WHERE `pay_date`Between '".$_POST['start']."' AND '".$_POST['to']."'";
                   }
               }

                  $recdata =  $db->joinQuery($sql)->fetchAll();
                    $i=0;
                    $sum =0;
                    foreach ($recdata as $val) { 
                     $i++; 
                     $sum += (int) $val['amnts'];
                     ?>
               <tr>
                  <th><?=$i?></th>
                  <td><?=$val['pay_date']?></td>
                  <td><?=$fn->getUserName($val['sup_id'])?></td>
                  <td><?=number_format($val['amnts'])?></td>
                  <td><?=$val['carier']?></td>
                  <td>
                      <div class="dropdown">
  <button type="button" class="btn btn-outline-primary dropdown-toggle" data-toggle="dropdown">
    <i class="fa fa-gear"></i>
  </button>
  <div class="dropdown-menu">
    <?php 
         if ($rbas->getView())
          {
              echo '<a class="dropdown-item" href="#">View <i class="fa fa-eye"></i></a>';
          }
         if ($rbas->getUpdate())
         {
              echo '<a class="dropdown-item" href="#">Edit<i class="fa fa-pencil"></i></a>';
         }
         if ($rbas->getDelete()) { ?>
              <a class="dropdown-item" href="payment-to-supplier.php?del-id=<?=$val['pay_id']?>" onclick="return confirm('Are you sure?')">Delete<i class="fa fa-times"></i></a>
      <?php   }
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
            <tr>
              <td colspan="3" class="text-right"> <strong>Total</strong> </td>
              <td> <strong><?=number_format($sum)?></strong> </td>
            </tr>
         </table>
         </div>
      </div>
   </div>
</div>
<?php include 'files/footer.php'; ?>
<link href="assets/plugins/alertify/css/alertify.css" rel="stylesheet" type="text/css">

<script src="assets/plugins/alertify/js/alertify.js"></script>


<script>
 
      
 
 
   // check the radio button to show the cheque payment method
   function chequeoptioncheck(){
     var divid  = document.getElementById('chequeoption');
    var radio  =  document.getElementById('customRadio2');
     if (radio.checked === true){
       divid.style.display = 'inline-block';
     }else {
       divid.style.display = 'none';
     }
   
   }

    


       /*fetching customer dues by their ID */
       var suppliers = <?=json_encode($dm->getUsersByR(2));?>;
   var sup = <?=json_encode($suppliersb);?>;
   $("#suppliernnname").autocomplete({
      source : suppliers,
      change : function(event,ui)
      {
         document.getElementById(event.target.id).value = ui.item.label;
         document.getElementById('suppliername').value = ui.item.value;
           alertify.alert("<h3 class='font-18'>Customer due</h3><hr><p> "+sup[ui.item.value]+"</p>");
      }
   });
   /*end of autocomplete */

      
</script>