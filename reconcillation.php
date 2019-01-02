<?php include 'files/header.php'; ?>
<?php include 'files/menu.php';?>


<div class="container">

   <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="btn-group pull-right">
                                <ol class="breadcrumb hide-phone p-0 m-0">
                                  <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                                  <li class="breadcrumb-item"><a href="#">Settings</a></li>
                                  <li class="breadcrumb-item active">Accounts</li>
                                </ol>
                            </div>
                            <h4 class="page-title"> Bank Reconciliation  </h4>
                            
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->

     <div class="row">
       <div class="col">
         <div class="card card-body">
            <form action="" method="post">
              <div class="row">
                <div class="col-4"></div>
                <div class="col-4">
                  <div class="form-group">
                  <input type="text" class="form-control mydate" name="datename">
                    <small><strong>(Search cheque list by date)</strong> </small>
                  </div>
                </div>
                <div class="col-4">
                  <button  class="btn btn-outline-primary" name="searchcheque">Search <i class="fa fa-search"></i></button>
                  <a href="check-history.php" class="btn btn-outline-primary">GO to Table <i class="fa fa-arrow-right"></i></a>

                </div>

              </div>
            </form>

         </div>
       </div>
     </div>
<!-- list of all the cheque  -->
     <div class="row" style="margin-top: 20px; min-height: 200px;">
       <div class="col-8">
         
         <div class="card card-body" style="height: 100%;width: 100%;">
               <table class="table table-bordered">
                <?php 
                  $i=0;
                  $sql = "SELECT * FROM `cheque` WHERE `expiredate`=CURRENT_DATE() AND approve = 0";
                    if (isset($_POST['searchcheque'])) 
                    {

                       $sql .= " AND `expiredate` = '".$_POST['datename']."'";
                    }
                   // echo $sql;
                  $dd =  $db->joinQuery($sql)->fetchAll();
                  foreach ($dd as $val) { $i++; ?>
                    <tr>
                      <td style="text-align: center;">
                        <div class="form-group">
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" name="myche" value="<?=$val['chequeno']?>" class="custom-control-input chekbox" id="customCheck<?=$i?>" checked="">
                  <label class="custom-control-label" for="customCheck<?=$i?>">

                  </label>
               </div>
              </div> 
                      </td>
                     
                    
                      <td><?=$val['accountno']?></td>
                      <td><?=$val['bankname']?></td>
                      <td><?=$val['amount']?></td>
                   
                  
                
               </tr>
                <?php   }
                ?>
              </table>
              </div>
             
       </div>
       <div class="col-4">
         
           <div class="card card-body" style="height: 100%; width: 100%;">
                
          <button class="btn btn-outline-info" type="button" name="honercheque" onclick="honorecheque()">Honer</button>


               <button class="btn btn-outline-info" type="button" onclick="dishonercheque()">Dishoner</button>
                
           </div>
         
       </div>
       
       
     </div>

  <!-- only honored cheque  -->
 <div class="row" style="margin-top: 20px;min-height: 200px;">
       <div class="col-8">
        
             <div class="card card-body" style="height: 100%;width: 100%;">
                <table class="table table-bordered" style="overflow-y:  scroll;">
                <?php 
                  $j=0;
                  $dd =  $db->joinQuery("SELECT * FROM `cheque` WHERE `expiredate`=CURRENT_DATE() AND approve = 1")->fetchAll();
                  foreach ($dd as $val) { $j++; ?>
                    <tr>
                      <td>
                        <div class="form-group">
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" name="myche" value="<?=$val['chequeno']?>" class="custom-control-input chekbox" id="customChk<?=$j?>" checked="">
                  <label class="custom-control-label" for="customChk<?=$j?>">

                  </label>

                </div>
              </div> 
                      </td>
                     
              <td><?=$val['accountno']?></td>
                      <td><?=$val['bankname']?></td>
                      <td><?=$val['amount']?></td>
            </tr>
                <?php   }
                ?>
              </table>

             </div>
         
       </div>
       <div class="col-4">
        
           <div class="card card-body" style="height: 100%;width: 100%;">
                
                  <button class="btn btn-outline-info" onclick="defaultcondition()">Dishoner</button>
              
                
           </div>
         
       </div>
     </div> 
<!-- and only dishonored cheque -->
     <div class="row" style="margin-top: 20px;min-height: 200px;">
       <div class="col-8">
        
             <div class="card card-body" style="height: 100%; width: 100%;">
                <table class="table table-bordered" style="overflow-y:  scroll;">
                <?php 
                  $k=0;
                  $dd =  $db->joinQuery("SELECT * FROM `cheque` WHERE `expiredate`=CURRENT_DATE() AND approve = 2")->fetchAll();
                  foreach ($dd as $val) { $k++; ?>
                    <tr>
                      <td>
                        <div class="form-group">
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" name="myche" value="<?=$val['chequeno']?>" class="custom-control-input chekbox" id="customChec<?=$k?>" checked="">
                  <label class="custom-control-label" for="customChec<?=$k?>">
                  </label>
                </div>
              </div>
                      </td>
                      
              <td><?=$val['accountno']?></td>
                      <td><?=$val['bankname']?></td>
                      <td><?=$val['amount']?></td>
            </tr>
                <?php   }
                ?>
              </table>
             </div>
        
       </div>
       <div class="col-4">
         
           <div class="card card-body" style="height: 100%; width: 100%;">
                
                  <button class="btn btn-outline-info" onclick="defaultcondition() ">Honer</button>
                
           </div>
        
       </div>
     </div>




</div>

<?php include 'files/footer.php'; ?>
<script>
  function honorecheque() {
    var holder = [];
    var ddd = document.getElementsByClassName('chekbox');
    for(var j = 0; j < ddd.length; j++){
        if (ddd[j].checked) {
          holder.push(ddd[j].value);
        }
    }

    updatedata(holder,"honer");

  }

  function dishonercheque(){
    var holder = [];
    var ddd = document.getElementsByClassName('chekbox');
    for(var j = 0; j < ddd.length; j++){
        if (ddd[j].checked) {
          holder.push(ddd[j].value);
        }
    }

    updatedata(holder,"dishoner");
  }


  function defaultcondition(){
    var holder = [];
    var ddd = document.getElementsByClassName('chekbox');
    for(var j = 0; j < ddd.length; j++){
        if (ddd[j].checked) {
          holder.push(ddd[j].value);
        }
    }

    updatedata(holder,"default");
  }

   

  function updatedata(ids,str) {


    var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    alert("Data has been updated");
      window.location.href="reconcillation.php";
    }
  };
  xhttp.open("GET", "ajax/chequhonor.php?ids="+JSON.stringify(ids)+"&str="+str, true);
  xhttp.send();


   
    
    
  }
</script>