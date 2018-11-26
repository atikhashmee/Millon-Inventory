<?php include 'files/header.php'; ?>
<?php include 'files/menu.php'; ?>
<?php 
   $namearray = array();
       $names  = $db->selectAll("users")->fetchAll();
       foreach ($names as  $val) {
         $namearray[$val['u_id']] = $val['name'];
       }
   
   
   
       $ssalerykeys = array();
       $snames  = $db->selectAll("e_salerykeys")->fetchAll();
       foreach ($snames as  $vall) {
         $ssalerykeys[$vall['salery_key_id']] = $vall['keysname'];
       }
   
   
   
       // check if the users data is already exist
   
       $dataexist  =  $db->joinQuery("SELECT COUNT(*) as exst FROM `employeesalerlist` WHERE `employeeid`='".$_GET['eid']."'")->fetch(PDO::FETCH_ASSOC);
   
   
       // check what are the basic fund has been taken by the employee 
       $usersalerykeys  =  $db->joinQuery("SELECT * FROM `employeesalerlist` WHERE `employeeid`='".$_GET['eid']."'")->fetchAll();
   
   
   
   
   
   ?>
<div class="container">
  <h1><strong>Pay Salery for Employee</strong>
    <?php echo $namearray[$_GET['eid']];?>
  </h1>
  <form class="form-horizontal form-label-left" method="post">

    <div class="row">
      <div class="col">

        <div class="form-group">
          <label for="name"> Date <span class="required">*</span>
          </label>
          <input id="paydate" class="form-control" name="paydate" type="date" required>
        </div>
        <?php 
               $j=0;
               foreach ($usersalerykeys as $setsalekey) { $j++; ?>
        <div class="form-group">
          <div class="custom-control custom-checkbox"><input type="checkbox" class="custom-control-input chebocs" id="customCheck_<?=$j?>"
              value="<?=$setsalekey['amount']?>" checked="">
            <label class="custom-control-label" for="customCheck_<?=$j?>">
              <?=$ssalerykeys[$setsalekey['skeysids']]?>-> <strong class="moneytobesum">
                <?=$setsalekey['amount']?></strong> </label>
          </div>
        </div>
        <?php 		}
               ?>
        <div class="form-group">
          <div class="col-md-6 col-md-offset-3">

            <button type="button" class="btn btn-success" onclick="updatesum()">update sum</button>
          </div>
        </div>



      </div>
      <div class="col">
        <div class="form-group">
          <label for="">Total</label>
          <input type="text" class="form-control" id="totalsum" readonly>
        </div>

        <div class="form-group">
          <label for="">Pay</label>
          <input type="text" class="form-control" id="payamount" name="payamount" onblur="updatedue()">
        </div>
        <div class="form-group">
          <label for="">Due</label>
          <input type="text" class="form-control" id="due" name="due" min="0">
        </div>
        <div class="ln_solid"></div>
        <div class="form-group">
          <div class="col-md-6 col-md-offset-3">
            <button type="submit" class="btn btn-primary">Cancel</button>
            <button id="paymentsalery" name="paymentsalery" type="submit" class="btn btn-success">Pay</button>
          </div>
        </div>
      </div>
    </div>
  </form>
  <?php

   		if (isset($_POST['paymentsalery'])) {
        if (empty($_POST['paydate'])) { //if the date is empty
            echo "Date can not be empty";
            exit();
        }

        



        
   			$data = array(
   				'payment_date' => $_POST['paydate'],
   				'amount_pay' =>$_POST['payamount'],
   				'payment_due' => $_POST['due'],
   				'employeeid' => $_GET['eid']
   				 );
   			if ($db->insert("e_payment_salery",$data)) { ?>
  <script>
    alert("<p style='color:blue'>Payment has been successfully done</p>");
  </script>
  <?php } else {  ?>

   <script>
    alert("<p style='color:red'>Payment has not been successfully done</p>");
  </script>

 <?php  }
   		}

   ?>
</div>
<?php include 'files/footer.php'; ?>

<script>
  var amounts = document.getElementsByClassName('moneytobesum');
  var sum = 0;
  for (var j = 0; j < amounts.length; j++) {
    sum += parseInt(amounts[j].innerHTML);
  }
  document.getElementById('totalsum').value = sum;
  document.getElementById('payamount').value = sum;


  function updatesum() {
    var againsum = 0;
    var ddd = document.getElementsByClassName("chebocs");
    for (var j = 0; j < ddd.length; j++) {
      if (ddd[j].checked) {
        againsum += parseInt(ddd[j].value);
        //alert(ddd[j].value);
      }
    }
    document.getElementById('totalsum').value = againsum;
    document.getElementById('payamount').value = againsum;


  }


  function updatedue() {
    var totalsum = document.getElementById('totalsum').value;
    var paid = document.getElementById('payamount').value;
    document.getElementById('due').value = totalsum - paid;
  }
</script>