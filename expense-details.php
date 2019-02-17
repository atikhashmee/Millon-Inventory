<?php include 'files/header.php'; ?>
<?php include 'files/menu.php';
$rbas->setPageName(9)->run();

            $sql = "";
            if (isset($_GET['cat'])) 
            {
               $catid = $_GET['cat'];
                 $sql = "SELECT  `expendituredate`, `expensecatid`,  `amount`, `token` FROM `expenditure` WHERE `expensecatid`='{$catid}'";
            }
            if (isset($_GET['em'])) 
            {
              $emid = $_GET['em'];
             $sql = "SELECT  `expendituredate`, `expensecatid`,  `amount`, `token` FROM `expenditure` WHERE `employeeid`='{$emid}'";
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
                                  <li class="breadcrumb-item active">Expenditure</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Expense History</h4>
                            
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->

   
      
  <div class="row" style="margin-top: 20px;">
    
     <div class="col">
        <div class="card card-body">
         <form action="" method="post">
           <div class="row">
           
             <div class="col"><input type="text" class="form-control mydate" name="start"></div>
             <div class="col"><input type="text" class="form-control mydate" name="to"></div>
             <div class="col">
         <button type="submit"  name="search" class="btn btn-outline-primary btn-lg">
           Search <i class="fa fa-search"></i>
         </button>
       </div>
           </div>
         </form>
           </div>
         </div>
       </div>

            <div class="row" style="margin-top: 20px;">
      <!-- users view section starts here -->
      <div class="col">

            <div class="card card-body">
              <?php 

                  if (empty($sql)) 
                  {
                     echo "<p style='color:red'> url path is not properly directed, <a href=''>go back</a> </p> ";
                  }
                  else
                  {
                    $lists = $db->joinQuery($sql)->fetchAll();
                    
                    ?>
                    <table style="width: 100%" border="1" id="datatable" >
            <thead>
               <tr>
                  <th>#</th>
                  <th>Date</th>
                  
                  <th>Amount</th>
                  <th>Action</th>
               </tr>
            </thead>
            <tbody>
               <?php 
               $i=0;
                $sum = 0;
                
                  foreach ($lists as $list) 
                    {  
                       $sum += intval($list['amount']);
                      $i++;
                      ?>
               <tr>
                  <th scope="row"><?=$i?></th>
                  <td><?=$list['expendituredate']?></td>
                  
                  <td><?=$list['amount']?></td>
                  <td>
                      <button class="btn btn-outline-danger" type="button" onclick="javascript:alert('No functionality is used yet')">X</button>
                  </td>
               </tr>
               <?php   }
                  ?>
            </tbody>
            <tr>
              <td colspan="2" class="text-right"> <strong>Total</strong> </td>
              <td colspan="2"><strong><?=$sum?></strong></td>
            </tr>
         </table>
                    <?php
                  }

              ?>
         
         </div>
      </div>
   </div>
</div>
<?php include 'files/footer.php'; ?>
<script>
  function chequeoptioncheck(){
        var divid  = document.getElementById('chequeoption');
       var radio  =  document.getElementById('customRadio2');
        if (radio.checked === true){
          divid.style.display = 'inline-block';
        }else {
          divid.style.display = 'none';
        }
   
      }

        /*fetch employee according to their type*/
      var etype = <?=json_encode($emptype);?>;
      
      function getEmployeebytype() {
        var va = document.getElementById("employeetypeid").value;
        
        var text = "<option value=''>Employee Name</option>";
        etype[va].forEach((item)=>{
            text += "<option value='"+Object.keys(item)+"'>"+Object.values(item)+"</option>";
        });

        document.getElementById("employeeid").innerHTML=text;
      }


</script>
