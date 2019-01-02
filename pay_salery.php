<?php include 'files/header.php'; ?>
<?php include 'files/menu.php'; ?>
<?php 
   
   
   
   
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
                            <h4 class="page-title"> Pay Employee Salery </h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->

  <div class="card card-body">
  <form class="form-horizontal form-label-left" method="post">

    <div class="row">
      <div class="col">
         <h5>Employee Salery Comprise</h5>
          <small> <p>Check the checkbox to update salery rate. Want to change the salery? <a href='salerysetup.php?eid=<?=$_GET['eid']?>'>click here</a> </p> </small>
          <small>  </small>
          <?php 
            if (count($usersalerykeys) == 0)
             {
                echo "<p style='color:red'>No salery has been set yet. <a href='salerysetup.php?eid=".$_GET['eid']."'>Set up now</a> </p>";
             }
          ?>
         <table class="table table-bordered">
           
         
        
        <?php 
               $j=0;
               foreach ($usersalerykeys as $setsalekey) { $j++; ?>
                <tr>
        
            <td style="text-align: center;">
              <div class="form-group">
          <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input chebocs" id="customCheck_<?=$j?>"
              value="<?=$setsalekey['amount']?>" checked="">
              <label class="custom-control-label" for="customCheck_<?=$j?>">
               </label>
               </div>
            </div>
            </td>
            <td>
              
               <?=$ssalerykeys[$setsalekey['skeysids']]?>
            </td>
            <td>
              <strong class="moneytobesum">
                <?=$setsalekey['amount']?></strong>
              </td>
            
          
        </tr>
        <?php 		}
               ?>
               </table>
        <div class="form-group">
         

            <button type="button" class="btn btn-outline-warning" onclick="updatesum()">Update Salery</button>
          
        </div>



      </div>
      <div class="col">
        <div class="form-group">
          <label for="">Employee Name</label>
          <input type="text" class="form-control" value="<?=$fn->getUserName($_GET['eid'])?>" readonly>
        </div>
        <div class="form-group">
          <label for="name"> Date <span class="required">*</span>
          </label>
          <input id="paydate" class="form-control mydate"  name="paydate" type="date" required>
        </div>
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
        
        <div class="form-group">
          
            <button type="submit" class="btn btn-outline-danger">Cancel</button>
            <button id="paymentsalery" name="paymentsalery" type="submit" class="btn btn-outline-primary">Pay Salery</button>
          
        </div>
      </div>
    </div>
  </form>
  </div>
  <?php

   		if (isset($_POST['paymentsalery']))
       {
          if (empty($_POST['paydate'])) 
          { //if the date is empty
            echo "Date can not be empty";
            exit();
          }
        
   			 $data = array(
   				'payment_date' => $_POST['paydate'],
   				'amount_pay'   => $_POST['payamount'],
   				'payment_due'  => $_POST['due'],
          'employeeid'   => $_GET['eid'],
   				'token'        => "salerypayment"
   				 );
   		if ($db->insert("e_payment_salery",$data)) 
         {     ?>
              <script>
              alert("Payment has been successfully done");
              </script>
              <?php
        }
     else
       {     
             ?> 
             <script>
             alert("Payment has not been successfully done");
             </script>
             <?php

      }
   		}

   ?>
</div>
<?php include 'files/footer.php'; ?>

<script>
  var amounts = document.getElementsByClassName('moneytobesum');
  var sum = 0;
  for (var j = 0; j < amounts.length; j++) 
  {
    sum += parseInt(amounts[j].innerHTML);
  }
    document.getElementById('totalsum').value = sum;
    document.getElementById('payamount').value = sum;
  function updatesum() 
  {
    var againsum = 0;
    var ddd = document.getElementsByClassName("chebocs");
    for (var j = 0; j < ddd.length; j++)
     {
        if (ddd[j].checked) 
        {
          againsum += parseInt(ddd[j].value);
          //alert(ddd[j].value);
        }
     }
    document.getElementById('totalsum').value = againsum;
    document.getElementById('payamount').value = againsum;


  }


  function updatedue() 
  {
    var totalsum = document.getElementById('totalsum').value;
    var paid = document.getElementById('payamount').value;
    document.getElementById('due').value = totalsum - paid;
  }
</script>