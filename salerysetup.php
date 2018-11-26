<?php include 'files/header.php'; ?>
<?php include 'files/menu.php'; ?>
<?php 
   $namearray = array();
       $names  = $db->selectAll("users")->fetchAll();
       foreach ($names as  $val) {
         $namearray[$val['u_id']] = $val['name'];
       }



       // check if the users data is already exist

       $dataexist  =  $db->joinQuery("SELECT COUNT(*) as exst FROM `employeesalerlist` WHERE `employeeid`='".$_GET['eid']."'")->fetch(PDO::FETCH_ASSOC);


       // check what are the basic fund has been taken by the employee 
       $usersalerykeys  =  $db->joinQuery("SELECT * FROM `employeesalerlist` WHERE `employeeid`='".$_GET['eid']."'")->fetchAll();




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
      <div class="col">
         <h1><strong>Employee Name</strong> <?php echo $namearray[$_GET['eid']];?> </h1>

         <?php 

            if ($dataexist['exst']>0) {
              ?>

                  <form class="form-horizontal form-label-left" method="post" >
            <div class="form-group">
               <label  for="name"> Bank Name 
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
               <label  for="name"> Account No 
               </label>
  <input id="accountno" class="form-control" name="accountno"  type="text">
            </div>
            <table class="table table-bordered table-responsive table-striped table-hover" id="myTable">
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
                        <input type="checkbox" value="<?=$val['salery_key_id']?>" name="checkbox[]" 
                        <?=(ifkeyexist($val['salery_key_id'])==1)?" ":"checked";?>>
                     </th>
                     <td><?=$val['keysname']?></td>
                     <td>
                      <?php $amountvalue = (ikSV($val['salery_key_id'])!=0)?ikSV($val['salery_key_id']):"0";?>
            <input type="text" name="keyamount[]" id="keyamount" class="amountke" value='<?=$amountvalue?>'></td>
                  </tr>
                  <?php   }
                     ?>
               </tbody>
            </table>
            
            <div class="ln_solid"></div>
            <div class="form-group">
               <div class="col-md-6 col-md-offset-3">
                  <button type="submit" class="btn btn-primary">Cancel</button>
                  <button id="updatesalerysetup" name="updatesalerysetup" type="submit" class="btn btn-success">Update</button>
               </div>
            </div>
         </form>
              <?php 
              
            } else { ?>
                <form class="form-horizontal form-label-left" method="post" >
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
               <input id="accountno" class="form-control col-md-7 col-xs-12" name="accountno"  required="required" type="text">
            </div>
            <table class="table table-bordered table-responsive table-striped table-hover" id="myTable">
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
                        <input type="checkbox" value="<?=$val['salery_key_id']?>" name="checkbox[]">
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
                  <button type="submit" class="btn btn-primary">Cancel</button>
                  <button id="savesalerysetup" name="savesalerysetup" type="submit" class="btn btn-success">Submit</button>
               </div>
            </div>
         </form>
           <?php  }
         ?>
         
         <?php 
            if (isset($_POST['updatesalerysetup'])) {

              $db->joinQuery("DELETE FROM `employeesalerlist` WHERE employeeid ='".$_GET['eid']."'");
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
            
               if ($cnnt == count($_POST['checkbox'])) {
                   echo "<h1 style='color:blue'> Data has been updated </h1>";
               }else {
                echo "<h1 style='color:red'> Data has not been Updated </h1>";
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
            
               if ($cnnt == count($_POST['checkbox'])) {
                   echo "<h1 style='color:blue'> Data has been saved </h1>";
               }else {
                echo "<h1 style='color:red'> Data has not been saved </h1>";
               }
                
               
            }
            
            ?>
      </div>
   </div>
</div>
<?php include 'files/footer.php'; ?>
<script type="text/javascript">
   var d =  $(".amountke");
   
    $(d).each(function(index, el) {
        
    });
   
   
</script>