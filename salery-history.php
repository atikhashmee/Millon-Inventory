<?php include 'files/header.php'; ?>
<?php include 'files/menu.php'; ?>
<?php 
            if (isset($_GET['del-id'])) {
                    
                     $del = $db->joinQuery("DELETE FROM `e_payment_salery` WHERE `payment_id`='".$_GET['del-id']."'");
                     if ($del) {
                       ?>
                       <script>
                         window.location.href='pay_salery.php?eid='+<?=$_GET['eid']?>;
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
                                  <li class="breadcrumb-item"><a href="#">Settings</a></li>
                                  <li class="breadcrumb-item active">Employee Salery Option</li>
                                </ol>
                            </div>
                            <h4 class="page-title">  Salery History</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->



   <div class="row" style="margin-top: 20px;">
     <div class="col">
       <div class="card">
         <div class="card-body">
          <button class="btn btn-primary" type="button" onclick="window.location.href='pay_salery.php?eid='+<?=$_GET['eid']?>">
            <i class="fa fa-arrow-right"></i> Go to Payment</button>
           <table class="table table-bordered">
               <thead>
                 <tr>
                   <th>#SL</th>
                   <th>Date</th>
                   <th>Amount</th>
                   <th>Action</th>
                 </tr>
               </thead>
               <tbody>
                <?php 

                    $allsaleries = $db->joinQuery("SELECT * FROM `e_payment_salery` WHERE `employeeid`='".$_GET['eid']."'")->fetchAll();
                    /*echo "<pre>";
                    print_r($allsaleries);
                    echo "</pre>";*/
                    $i=0;
                    $sum = 0;
                    foreach ($allsaleries as $eachsalery) {
                      $i++;
                      $sum += doubleval($eachsalery['amount_pay']);
                             ?>
                              <tr>
                   <td><?=$i?></td>
                   <td><?=$eachsalery['payment_date']?></td>
                   <td><?=$eachsalery['amount_pay']?></td>
                   <td> <a href="pay_salery.php?eid=<?=$_GET['eid']?>&del-id=<?=$eachsalery['payment_id']?>"> <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?');" type="button"><i class="fa fa-times"></i></button></a> </td>
                 </tr>
                             <?php
                    }
                ?>
                <tr>
                  <td colspan="2" class="text-right">Total</td>
                  <td colspan="2" class="text-left"><?=$sum?></td>
                </tr>

               </tbody>
           </table>
         </div>
       </div>
     </div>
   </div>
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