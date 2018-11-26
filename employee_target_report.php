


<?php include 'files/header.php'; ?>
<?php include 'files/menu.php';

      /**  get the quantity of the product selled by the employee  */
      function gettropsale($proid,$employeid,$sdate,$enddate)
      {
           $sql = "SELECT  SUM(`quantity`) as totalquantity FROM `sell` WHERE `productid`='{$proid}' AND `sellby`='{$employeid}' AND `selldate` BETWEEN '{$sdate}' AND '{$enddate}'";
           $targetquantity = $GLOBALS['db']->joinQuery($sql)->fetch(PDO::FETCH_ASSOC);
           $sql1 = "SELECT  SUM(`quntity`) as returntotal FROM `sell_return` WHERE `productid`='{$proid}' AND `takenby` = '{$employeid}' AND `return_date` BETWEEN '{$sdate}' AND '{$enddate}'";
           $returnquantity =  $GLOBALS['db']->joinQuery($sql1)->fetch(PDO::FETCH_ASSOC);
           return $targetquantity['totalquantity']-$returnquantity['returntotal'];
      }
      /** get the total day between two days */
      function gettheday($sdate,$edate)
      {
          $date1 = new DateTime($sdate);
          $date2 = new DateTime($edate);
          $days  = $date2->diff($date1)->format('%a');
          return $days+1;
      }

?>

 <style>
   .divdesign{
      border-right: 2px solid #000;
      color: #000;
      font-size: 16px;
      width: auto;
   }

 </style>
     <div class="container">
      <div class="row ">
      <div class="col">
         <div class="bg-light card card-body header-wrapper" style=" background: #b4c6d8 !important">
            <h1 style="text-align: center;">Target Report</h1>
         </div>
      </div>
  
   </div>

      
                <!-- table start -->
                <div class="row">
       <div class="col">
         <div class="bg-light card card-body" style=" background: #060202 !important;">
.,ল বয বrm action="" method="post">
            <div class="row">
              <div class="col">
                <select class="form-control" name="employeeid">
                   <option value="">Select an Employee</option>
                  <?php 
                    //fetching only users who are given target
                  $ids = [];
                     $cat  =  $db->joinQuery("SELECT  `employee_id` FROM `target`")->fetchAll();
                     foreach ($cat as $c) {
                         array_push($ids, $c['employee_id']);
                     }
                $dd =  array_unique($ids); //removing duplicate value from the table
                      foreach ($dd as $k => $v) { ?>
                       <option value="<?=$v?>"><?=$fn->getUserName($v)?></option>
                   <?php  }
                    
                     ?>
                </select>
              </div>
              <div class="col"><input type="date" class="form-control" name="start"></div>
              <div class="col"><input type="date" class="form-control" name="to"></div>
              <div class="col"><input type="submit" value="Search" name="search" class="btn btn-default"></div>
            </div>
          </form>
         </div>
       </div>
     </div>

                <div class="row" style="margin-top:30px">
                 <div class="col-xl-12">
                  <ul class="list-group">

                    <?php 
                        if (isset($_POST['search'])) {
                            $i=0;
                            $dataid = $db->joinQuery('SELECT * FROM `target` WHERE `employee_id`="'.$_POST['employeeid'].'"')->fetchAll();
                            foreach ($dataid as $did) { $i++; 
            $totalday = gettheday($did['startdate'],$did['enddate']);
            $qunt =  gettropsale($did['brandid'],$did['employee_id'],$did['startdate'],$did['enddate']);
            $parcantage  = ($qunt/$did['quantity'])*100;
                              ?>
                              
  <li class="list-group-item list-group-item-default" style="margin-bottom: 5px;">
    
        <div class="row" >
          <div class="col-md-2"><h4><?=$i?></h4></div>
          <div class="col">
             <div class="progress">
            <div class="progress-bar bg-success" style="width:<?=$parcantage?>%">
             <?=$parcantage?>%
            </div>
            </div>
               <div class="row" style="margin-top: 5px;">
          <div  class="col divdesign"><p>Product Name: <?=$did['brandid']?></p></div>
          <div  class="col divdesign"><p>Target Quantity:<?=$did['quantity']?> </p></div>
          <div  class="col divdesign"><p>Fullfilled (%): <?=$parcantage?>%
             </p>
            <p>Quantity : <?=$qunt?></p>
           </div>
          <div  class="col divdesign"><p>Amount: <?=$did['commsion']?></p>
      <p>Employee gets : <?=($did['commsion']/$did['quantity'])*$qunt?></p>
          </div>
                </div>
          </div>
          
        </div>
  </li>
  


                           
  
                           <?php  }
                        }

                    ?>
                    </ul>
                 </div>
                </div>
                
                
                
              </div>
           
<?php include 'files/footer.php'; ?>
