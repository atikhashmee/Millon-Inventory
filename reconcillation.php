<?php include 'files/header.php'; ?>
<?php include 'files/menu.php';?>

  
  <style>
    .dshborad{
      width: 100%;
      height: 345px;
      background-color: #ddd;
      padding: 20px;
    }
    .listcontainer{
      width: 100%;
      height: 100%;
      background-color: black;
      padding: 10px;
       position: relative;
    }
    .buttons{
    position:absolute;
    left:37%;
    top:50%;
    margin-top:-50px;
    margin-left:-50px;
    display: block;
    }

  </style>
 


<div class="container">

   <div class="row">
       <div class="col">
         <div class="bg-light card card-body" style=" background: #b4c6d8 !important">
          <h1 style="text-align: center;">Bank Reconcillation</h1>
         </div>
       </div>
     </div>
     <div class="row">
       <div class="col">
         <div class="bg-light card card-body" style=" background: #060202 !important;">
            <form action="">
              <div class="row">
                <div class="col-4"><div class="form-group"><input type="date"></div></div>
                <div class="col-4"><input type="submit"></div>
              </div>
            </form>
         </div>
       </div>
     </div>
<!-- list of all the cheque  -->
     <div class="row">
      
       <div class="col-8">
         <div class="dshborad">
             <div class="listcontainer">
               <ul class="list-group" style="overflow-y:  scroll;">
                <?php 
                  $i=0;
                  $dd =  $db->joinQuery("SELECT * FROM `cheque` WHERE `expiredate`=CURRENT_DATE() AND approve = 0")->fetchAll();
                  foreach ($dd as $val) { $i++; ?>
                    <li class="list-group-item"> <div class="form-group">
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" name="myche" value="<?=$val['chequeno']?>" class="custom-control-input chekbox" id="customCheck<?=$i?>" checked="">
                  <label class="custom-control-label" for="customCheck<?=$i?>">
                    <table border="1px"> <tr>
                      <td><?=$val['accountno']?></td>
                      <td><?=$val['bankname']?></td>
                      <td><?=$val['amount']?></td>
                    </tr></table>
                  </label>
                </div>
              </div> </li>
                <?php   }
                ?>
              </ul>
             </div>
         </div>
       </div>
       <div class="col-4">
         <div class="dshborad">
           <div class="listcontainer">
                <div class="buttons">
          <button class="btn btn-default" type="button" name="honercheque" onclick="honorecheque()">Honer</button>
               <button class="btn btn-default" type="button" onclick="dishonercheque()">Dishoner</button>
                </div>
           </div>
         </div>
       </div>
       
       
     </div>

  <!-- only honored cheque  -->
 <div class="row">
       <div class="col-8">
         <div class="dshborad">
             <div class="listcontainer">
                <ul class="list-group" style="overflow-y:  scroll;">
                <?php 
                  $j=0;
                  $dd =  $db->joinQuery("SELECT * FROM `cheque` WHERE `expiredate`=CURRENT_DATE() AND approve = 1")->fetchAll();
                  foreach ($dd as $val) { $j++; ?>
                    <li class="list-group-item"> <div class="form-group">
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" name="myche" value="<?=$val['chequeno']?>" class="custom-control-input chekbox" id="customChk<?=$j?>" checked="">
                  <label class="custom-control-label" for="customChk<?=$j?>">
                    <table border="1px"> <tr>
                      <td><?=$val['accountno']?></td>
                      <td><?=$val['bankname']?></td>
                      <td><?=$val['amount']?></td>
                    </tr></table>
                  </label>
                </div>
              </div> </li>
                <?php   }
                ?>
              </ul>

             </div>
         </div>
       </div>
       <div class="col-4">
         <div class="dshborad">
           <div class="listcontainer">
                <div class="buttons">
                  <button class="btn btn-default" onclick="defaultcondition()">Dishoner</button>
              
                </div>
           </div>
         </div>
       </div>
     </div> 
<!-- and only dishonored cheque -->
     <div class="row">
       <div class="col-8">
         <div class="dshborad">
             <div class="listcontainer">
                <ul class="list-group" style="overflow-y:  scroll;">
                <?php 
                  $k=0;
                  $dd =  $db->joinQuery("SELECT * FROM `cheque` WHERE `expiredate`=CURRENT_DATE() AND approve = 2")->fetchAll();
                  foreach ($dd as $val) { $k++; ?>
                    <li class="list-group-item"> <div class="form-group">
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" name="myche" value="<?=$val['chequeno']?>" class="custom-control-input chekbox" id="customChec<?=$k?>" checked="">
                  <label class="custom-control-label" for="customChec<?=$k?>">
                    <table border="1px"> <tr>
                      <td><?=$val['accountno']?></td>
                      <td><?=$val['bankname']?></td>
                      <td><?=$val['amount']?></td>
                    </tr></table>
                  </label>
                </div>
              </div> </li>
                <?php   }
                ?>
              </ul>
             </div>
         </div>
       </div>
       <div class="col-4">
         <div class="dshborad">
           <div class="listcontainer">
                <div class="buttons">
                  <button class="btn btn-default" onclick="defaultcondition() ">Honer</button>
                   
                </div>
           </div>
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