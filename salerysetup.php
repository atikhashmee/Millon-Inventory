<?php include 'files/header.php'; ?>
<?php include 'files/menu.php'; ?>
<?php 
  


       // check if the users data is already exist

       $prevlist  =  $db->joinQuery("SELECT * FROM `employeesalerlist` WHERE `employeeid`='".$_GET['eid']."'");
       $dataexist = $prevlist->rowCount();

       $inforlist = $prevlist->fetch(PDO::FETCH_ASSOC);


       // check what are the basic fund has been taken by the employee 
       $usersalerykeys  =  $db->joinQuery("SELECT * FROM `employeesalerlist` WHERE `employeeid`='".$_GET['eid']."'")->fetchAll();

    /*   echo "<pre>";
       print_r($usersalerykeys);
       echo "</pre>";*/




       function ifkeyexist($setupkeys){
            foreach ($GLOBALS['usersalerykeys'] as $skkb) {
               if ($skkb['skeysids'] == $setupkeys) {
                  return 0;
                  break;
               }
            }
          return 1;
       }



       // fetch data to show on the input field display

       function ikSV($setupkeys){
            foreach ($GLOBALS['usersalerykeys'] as $skkb) {
               if ($skkb['skeysids'] == $setupkeys) {
                  return $skkb['amount'];
                  break;
               }
            }
          return 0;
       }


   
   ?>
<div class="container">
  <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="btn-group pull-right">
                                <ol class="breadcrumb hide-phone p-0 m-0">
                                  <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                                  <li class="breadcrumb-item"><a href="#">Settings</a></li>
                                  <li class="breadcrumb-item active">Employee Salery Option</li>
                                </ol>
                            </div>
                            <h4 class="page-title"> Set Up Salery For Employee </h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->

   <div class="row">
    <div class="col-md-3"></div>
      <div class="col-md-7">
         

         <?php 

            if ($dataexist>0) {
              ?>
            <div class="card card-body">
            <form class="form-horizontal form-label-left" method="post" >
              <div class="form-group">
                <label for=""><h3>Employee Name</h3></label>
              <input type="text" class="form-control" value="<?=$fn->getUserName($_GET['eid'])?>" readonly>
            </div>
            <div class="form-group">
               <label  for="name"> Bank Name 
               </label>
               <input type="hidden" name="dbbankname" value="<?=$inforlist['bankname']?>">
               <select class="form-control" name="banksname" id="banksname">
                <option value="">Select a bank</option>
                <option>AB Bank Limited</option>
                <option>Agrani Bank Limited</option>
                <option>Al-Arafah Islami Bank Limited</option>
                <option>Bangladesh Commerce Bank Limited</option>
                <option>Bangladesh Development Bank Limited</option>
                <option>Bangladesh Krishi Bank</option>
                <option>Bank Al-Falah Limited</option>
                <option>Bank Asia Limited</option>
                <option>BASIC Bank Limited</option>
                <option>BRAC Bank Limited</option>
                <option>Citibank N.A</option>
                <option>Commercial Bank of Ceylon Limited</option>
                </select>
     
            </div>
            <div class="form-group">
               <label  for="name"> Account No 
               </label>
  <input id="accountno" class="form-control" name="accountno"  type="text" value="<?=$inforlist['accountno']?>">
            </div>
            <table class="table table-bordered" >
               <thead>
                  <tr>
                     <th>Check</th>
                     <th>Salery key Name</th>
                     <th>Moneys</th>
                  </tr>
               </thead>
               <?php 
                  $sql =  "SELECT * FROM `e_salerykeys`";
                  $i =0;
                  
                  $data = $db->joinQuery($sql)->fetchAll();
                  
                  ?>
               <tbody>
                  <?php 
                     foreach ($data as $val) {  $i++;
                      ?>
                  <tr>
                     <th scope="row">
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" id="customCheck_<?=$i?>" class="custom-control-input" value="<?=$val['salery_key_id']?>" name="checkbox[]" 
                        <?=(ifkeyexist($val['salery_key_id'])==1)?" ":"checked";?>>
                        <label class="custom-control-label" for="customCheck_<?=$i?>">
               </label>
                        </div>
                     </th>
                     <td><?=$val['keysname']?></td>
                     <td>
                      <?php $amountvalue = (ikSV($val['salery_key_id'])!=0)?ikSV($val['salery_key_id']):"0";?>
            <input type="text" name="keyamount[<?=$val['salery_key_id']?>][]" id="keyamount" class="amountke" value='<?=$amountvalue?>'></td>
                  </tr>
                  <?php   }
                     ?>
               </tbody>
            </table>
            
            <div class="ln_solid"></div>
            <div class="form-group">
               <div class="col-md-6 col-md-offset-3">
                  <button type="submit" class="btn btn-outline-danger">Cancel</button>
                  <button id="updatesalerysetup" name="updatesalerysetup" type="submit" class="btn btn-outline-warning">Update</button>
               </div>
            </div>
         </form>
         </div>
              <?php 
              
            } 
            else
            { ?>
              <div class="card card-body">
                <form class="form-horizontal form-label-left" method="post" >
                  <div class="form-group">
                <label for=""><h3>Employee Name</h3></label>
              <input type="text" class="form-control" value="<?=$fn->getUserName($_GET['eid'])?>" readonly>
            </div>
            <div class="form-group">
               <label  for="name"> Bank Name <span class="required">*</span>
               </label>
               <select class="form-control" name="banksname" id="banksname">
                <option value="">Select a bank</option>
                <option>AB Bank Limited</option>
                <option>Agrani Bank Limited</option>
                <option>Al-Arafah Islami Bank Limited</option>
                <option>Bangladesh Commerce Bank Limited</option>
                <option>Bangladesh Development Bank Limited</option>
                <option>Bangladesh Krishi Bank</option>
                <option>Bank Al-Falah Limited</option>
                <option>Bank Asia Limited</option>
                <option>BASIC Bank Limited</option>
                <option>BRAC Bank Limited</option>
                <option>Citibank N.A</option>
                <option>Commercial Bank of Ceylon Limited</option>
                </select>
     
            </div>
            <div class="form-group">
               <label  for="name"> Account No <span class="required">*</span>
               </label>
               <input id="accountno" class="form-control" name="accountno"  required="required" type="text">
            </div>
            <table class="table table-bordered" id="myTable">
               <thead>
                  <tr>
                     <th>Check</th>
                     <th>Salery key Name</th>
                     <th>Moneys</th>
                  </tr>
               </thead>
               <?php 
                  $sql =  "SELECT * FROM `e_salerykeys`";
                  $i =0;
                  
                  $data = $db->joinQuery($sql)->fetchAll();
                  
                  ?>
               <tbody>
                  <?php 
                     foreach ($data as $val) {  $i++; ?>
                  <tr>
                     <th scope="row">
                      <div class="custom-control custom-checkbox">

                        <input type="checkbox" class="custom-control-input chebocs" id="customCheck_<?=$i?>"
              value="<?=$val['salery_key_id']?>" name="checkbox[]">

            <label class="custom-control-label" for="customCheck_<?=$i?>">
               </label>
          </div>

                      
                     </th>
                     <td><?=$val['keysname']?></td>
                     <td><input type="text" name="keyamount[]" id="keyamount" class="amountke"></td>
                  </tr>
                  <?php   }
                     ?>
               </tbody>
            </table>
            
            <div class="ln_solid"></div>
            <div class="form-group">
               <div class="col-md-6 col-md-offset-3">
                  <button type="submit" class="btn btn-outline-danger">Cancel</button>
                  <button id="savesalerysetup" name="savesalerysetup" type="submit" class="btn btn-outline-primary">Submit</button>
               </div>
            </div>
         </form>
         </div>
           <?php  }
         ?>
         
         <?php 
            if (isset($_POST['updatesalerysetup'])) {
              $db->joinQuery("DELETE FROM `employeesalerlist` WHERE employeeid ='".$_GET['eid']."'");
                $cnnt = 0;
               for ($i=0; $i <count($_POST['checkbox']) ; $i++) { 
                    $data = array(
                  'skeysids' => $_POST['checkbox'][$i],
                  'amount' => $_POST['keyamount'][$_POST['checkbox'][$i]][0],
                  'employeeid' => $_GET['eid'],
                  'bankname' => empty($_POST['banksname'])?$_POST['dbbankname']:$_POST['banksname'],
                  'accountno' => $_POST['accountno']
                   );
            
                    if ($db->insert("employeesalerlist",$data)) {
                      $cnnt++;
                    }
                    /* echo "<pre>";
                print_r($data);
                
                echo "</pre>";*/
               }
            
               if ($cnnt == count($_POST['checkbox']))
               {
                   ?>
                   <script> alert("Data has been Updated") </script>
                    <?php 
               }
               else
               {
                     ?>
                   <script> alert("Data has not been Updated") </script>
                    <?php 
               }
                
               
            }


            if (isset($_POST['savesalerysetup'])) {
                $cnnt = 0;
               for ($i=0; $i <count($_POST['checkbox']) ; $i++) { 
                    $data = array(
                  'skeysids' => $_POST['checkbox'][$i],
                  'amount' => $_POST['keyamount'][$i],
                  'employeeid' => $_GET['eid'],
                  'bankname' => $_POST['banksname'],
                  'accountno' => $_POST['accountno']
                   );
            
                    if ($db->insert("employeesalerlist",$data)) {
                      $cnnt++;
                    }
                    /* echo "<pre>";
                print_r($data);
                echo "</pre>";*/
               }
            
               if ($cnnt == count($_POST['checkbox']))
                {     ?>
                   <script> alert("Data has been saved") </script>
                    <?php  
               }
               else
               {
                    ?>
                   <script> alert("Data has not been saved") </script>
                   <?php 
               }
                
               
            }
            
            ?>
      </div>
      <div class="col-md-2"></div>
   </div>
</div>
<?php include 'files/footer.php'; ?>
