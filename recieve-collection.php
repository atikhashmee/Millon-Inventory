<?php include 'files/header.php'; ?>
<?php include 'files/menu.php'; 
$rbas->setPageName(6)->run();
$pagetitle = (isset($_GET['edit-id']))?"Update":"Add";


        if (isset($_GET['del-id']))
         {

             $getstatus = $db->selectAll('recevecollection',"recol_id='".$_GET['del-id']."'")->fetch(PDO::FETCH_ASSOC);
             if ($getstatus['bycashcheque'] == 'Cheque')
               {
                $db->delete("cheque","parent_table_id='rac_".$_GET['del-id']."'");
               }
             if ($db->delete("recevecollection","recol_id='".$_GET['del-id']."'") )
              {       
                  ?>
                  <script> alert('Data has been deleted');
                  window.location.href='recieve-collection.php'; </script>
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
                                  <li class="breadcrumb-item active">Recieve Money</li>
                                </ol>
                            </div>
                        <h4 class="page-title">Recieve And Collection <?=$pagetitle?></h4>
                            
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->
   <div class="row">
      <div class="col-md-12">
         <div class="card">
            
            <div class="card-body">
               <form class="form-horizontal form-label-left" method="post" novalidate>
                  <div class="row">
                     <div class="col">
                        <div class="form-group">
                           <label for="name"> Date <span class="required">*</span>
                           </label>
                           <input id="recievedate" class="form-control mydate" name="recievedate"  required="required" type="text">
                        </div>
                     </div>
                     <div class="col">
                      <div class="form-group">
                                 <label  for="name">Customer Name<span class="required">*</span>
                                    <input type="hidden" name="customerid" id="customerid">
                                 <input type="text" class="form-control" id="cusidnadname" name="cusidnadname">
                              </div>
                       
                     </div>
                     <div class="col">
                        <div class="form-group">
                           <label  for="name">Amount<span class="required">*</span>
                           </label>
                           <input id="amount" class="form-control" name="amount"  required="required" type="number">
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
                        <!-- <div class="form-group">
                           <div class="custom-control custom-checkbox">
                             <input type="checkbox" name="ischecq" class="custom-control-input" id="customCheck1">
                             <label class="custom-control-label" for="customCheck1">Cheque</label>
                           </div>
                           
                           </div> -->
                     </div>
                  </div>
                  <div id="chequeoption" style="display: none;">
                     <div class="row">
                      <div class="col">
                           <div class="form-group">
                              <label for="">Bank Name <small>(type Bank Names)</small></label>
                      <input type="text" class="form-control" name="accounts" id="accounts">
                           </div>
                        </div>
                        <div class="col">
                           <div class="form-group">
                              <label  for="name"> Cheque /account No
                                <p></p>
                              </label>
                              <input id="checkno" class="form-control" name="checkno"   type="text">
                           </div>
                        </div>
                        
                        <div class="col">
                           <div class="form-group">
                              <label  for="name"> Issue Date
                                <p></p>
                              </label>
                              <input id="issuedate" class="form-control" name="issuedate"  type="date">
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col">
                        <div class="form-group">
                           <label class="control-label" for="name">Carrier
                           </label>
                           <input id="carrier" class="form-control" name="carrier"  type="text">
                        </div>
                     </div>
                     <div class="col">
                        <div class="form-group">
                           <label class="control-label" for="name">Adjustment
                           </label>
                           <input id="adjustment" class="form-control" name="adjustment" type="text">
                        </div>
                     </div>
                  </div>
                  <div class="form-group">
                     <button type="submit" class="btn btn-outline-danger">Cancel</button>
                     <button id="savecategory" name="saverecieve" type="submit" class="btn btn-outline-primary">Save <i class="fa fa-floppy-o"></i></button>
                  </div>
               </form>
            </div>
         </div>
         <?php 
            if (isset($_POST['saverecieve']))
             {


                    if (empty($_POST['recievedate']))
                     {
                       echo "<h1 style='color:red'>Date field can not be empty</h1>";
                     }
                     else if (empty($_POST['customerid']))
                     {
                      echo "<h1 style='color:red'>Customer ID field can not be empty</h1>";
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
                         'recievedate' => $_POST['recievedate'], 
                         'cusotmer_id' => $_POST['customerid'], 
                         'amounts'     => $_POST['amount'],
                         'carreier'    => $_POST['carrier'], 
                         'adjustment'  => $_POST['adjustment'],
                         'addedby'     => $_SESSION['u_id'],
                         'bycashcheque'=> "rac_".$chequecash
                          );
                      $parentid = 0;
                       if ($db->insert("recevecollection",$data)) 
                       {
                           $parentid = $db->getInsertId('recol_id');

                           ?>
                           <script>
                            alert("Money Has been Collected");
                         </script>
                           <?php 
                         
                       }
                       else
                       {
                            ?>
                           <script>alert("Error occured")</script>
                           <?php 
                       }

                        if ($_POST['customRadio']=="yes") 
                        {

                         $chquedata = array(
                          'parent_table_id' => "rac_".$parentid,
                          'accountno' => $_POST['checkno'],
                          'customerid' => $_POST['customerid'],
                          'bankname' => $_POST['accounts'],
                          'expiredate' => $_POST['issuedate'],
                          'amount' => $_POST['amount'],
                          'carrier' => $_POST['carrier'],
                          'userid' => $_SESSION['u_id'],
                          'fromtable' => "add"
                          );
                        if ($db->insert("cheque",$chquedata)) 
                        {
                           ?>
                           <script>alert("Check Information Saved")</script>
                           <?php 
                        }
                        
                      }

                       ?> <script>
                           window.location.href='money-reciept.php?item-id='+<?=$parentid?>;
                       </script> <?php 

                    }
                   
            }
            
            
            ?>
      </div>
      <div class="col-md-12"   style="margin-top: 22px;" >
         <div class="card card-body">
          <form action="" method="POST" class="mb-5 ml-5">
                  <div class="row">
                     <div class="col">
                        <input type="hidden" name="customerid" id="customerid">
                        <input type="text" class="form-control" id="customer" placeholder="type out customer name">
                     </div>
                     <div class="col"><input type="text" class="form-control" name="start" id="start"></div>
                     <div class="col"><input type="text" class="form-control" name="to" id="to"></div>
                     <div class="col">
                        <button type="submit" name="filter" class="btn btn-outline-primary">Search <i class="fa fa-search"></i> </button>
                     </div>
                  </div>
               </form>

            <table class="table table-striped table-bordered table-striped" id="datatable">
               <thead>
                  <tr>
                     <th>#SL</th>
                     <th>Recieve Date</th>
                     <th>Customer</th>
                     <th>Amount</th>
                     <th>Carriar</th>
                    
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody>
                  <?php 
                  $sql = "SELECT * FROM `recevecollection`";
               if (isset($_POST['filter'])) 
               {
                if (!empty($_POST['customerid']) && (empty($_POST['start']) && empty($_POST['to']))) 
                   {
                     $sql = "SELECT * FROM `recevecollection` WHERE `cusotmer_id`='".$_POST['customerid']."'";
                   }


                   if (!empty($_POST['start']) && empty($_POST['to'])) 
                   {
                     $sql = "SELECT * FROM `recevecollection` WHERE `recievedate`='".$_POST['start']."'";
                   }

                   if (!empty($_POST['start']) && !empty($_POST['to'])) 
                   {
                     $sql = "SELECT * FROM `recevecollection` WHERE `recievedate`Between '".$_POST['start']."' AND '".$_POST['to']."'";
                   }
               }
              /*echo "<pre>";
              print_r($sql);
              echo "</pre>";*/
                     $recdata =  $db->joinQuery($sql)->fetchAll();
                       $i=0;
                       $sum = 0;
                       foreach ($recdata as $val) 
                       {  
                        $sum += (int) $val['amounts'];
                        $i++; ?>
                  <tr>
                     <th><?=$i?></th>
                     <td><?=$val['recievedate']?></td>
                     <td><?=$fn->getUserName($val['cusotmer_id'])?></td>
                     <td><?=number_format($val['amounts'])?></td>
                     <td><?=$val['carreier']?></td>
                     
                     <td> <div class="dropdown">
  <button type="button" class="btn btn-outline-primary dropdown-toggle" data-toggle="dropdown">
    <i class="fa fa-gear"></i>
  </button>
  <div class="dropdown-menu">
       <a href="money-reciept.php?item-id=<?=$val['recol_id']?>" class="dropdown-item"> Print <i class="fa fa-print"></i>  </a>
    <?php 
         if ($rbas->getView()) {
              echo '<a class="dropdown-item" href="#">View <i class="fa fa-eye"></i></a>';
         }
         if ($rbas->getUpdate()) {
              echo '<a class="dropdown-item" href="#">Edit <i class="fa fa-pencil"></i></a>';
         }
         if ($rbas->getDelete()) { ?>
              <a class="dropdown-item" href="recieve-collection.php?del-id=<?=$val['recol_id']?>" onclick="return confirm('Are you sure?')">Delete <i class="fa fa-times"></i></a>
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
                 <td colspan="3" class="text-right"><strong>Total</strong></td>
                 <td><?=number_format($sum)?></td>
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
   var cus = <?=json_encode($customersb);?>;
    var customers = <?=json_encode($dm->getUsersByR(1));?>;
   $("#cusidnadname").autocomplete({
      source : customers,
      change : function(event,ui)
      {
         document.getElementById(event.target.id).value = ui.item.label;
         document.getElementById('customerid').value = ui.item.value;
           alertify.alert("<h3 class='font-18'>Customer due</h3><hr><p> "+cus[ui.item.value]+"</p>");
      }
   });
   /*end of autocomplete */
   
</script>