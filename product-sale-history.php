<?php include 'files/header.php'; ?>
<?php include 'files/menu.php';
$rbas->setPageName(4)->run();

 ?>



<?php 
   if (isset($_GET['del-id'])) 
   {
    /*  delete the sale return history also if they are exist */
        $sr_dat = $db->joinQuery("SELECT COUNT(*) as totalnumber FROM `sell_return` WHERE `memono` = '".$_GET['del-id']."'")->fetch(PDO::FETCH_ASSOC);
        if ($sr_dat>0) 
        {
          $db->delete("sell_return","`memono` = '".$_GET['del-id']."'");
        }

        /*
          if the invoice has cheque information in the record
        */

         $sql = "SELECT COUNT(*) as yes FROM `sell` WHERE `billchallan`='".$_GET['del-id']."' AND `token` ='s_Cheque'";
         $qry =  $db->joinQuery($sql)->fetch(PDO::FETCH_ASSOC);
         if ($qry['yes'] > 0) 
         {
           $db->delete("cheque","parent_table_id='s_".$_GET['del-id']."'");
         }

           if ($db->delete("sell","billchallan = '".$_GET['del-id']."'")) {?>
<script>
 //msg("Records has been deleted",'su',1); 
  alert('Data has been deleted'); 

window.location.href='product-sale-history.php'; </script>
<?php   }
   }
   
   ?>
  

<div class="container">
   <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="btn-group pull-right">
                                <ol class="breadcrumb hide-phone p-0 m-0">
                                  <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                                  <li class="breadcrumb-item"><a href="#">Products</a></li>
                                  <li class="breadcrumb-item active">Products sale History</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Product Sale History</h4>
                            
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->


  <div class="row">
    <div class="col">
      <div class="card m-b-30">
                            <div class="card-body">

                   <form action="" method="POST">
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
                   
                 <?php 
                    /*echo "<pre>";
                    print_r($rp->getE());
                    echo "</pre>";*/
                 
                        $exequery = $rp->saleHistory();
                        $sum =0;
                        if (isset($_POST['filter'])) 
                         {
                              if (!empty($_POST['customerid']) && (empty($_POST['start']) && empty($_POST['to']))) 
                                 {
                  $exequery = $rp->saleHistory($_POST['customerid']);
                                 }
                               
                              if (!empty($_POST['customerid'])&& (!empty($_POST['start']) && empty($_POST['to'])))
                                 {
                               $exequery = $rp->saleHistory($_POST['customerid'],$_POST['start']);
                                 }

                            if (!empty($_POST['customerid'])&& (!empty($_POST['start']) && !empty($_POST['to'])))
                                 {
                               $exequery = $rp->saleHistory($_POST['customerid'],$_POST['start'],$_POST['to']);
                                 }

              
                                
                         }
                        /* echo "<pre>";
                    print_r($exequery);
                    echo "</pre>";*/
                                    $data = $db->joinQuery($exequery)->fetchAll();
                                   ?> 
                               </div>
                           </div>
      <div class="card m-b-30">
        <div class="card-body"> 
          
        

      <table class="table table-bordered table-condensed  table-striped" id="datatable">
        <thead>
          <tr>
            <th>Sl</th>
            <th>sell Date</th>
            <th>Bill/challan</th>
            <th>Customer</th>
            <th>Amount</th>
            <th>Marketing</th>
            <th>Entryby</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php 
            
            $i=0;
           
            foreach ($data as $sel) 
              {  
                $i++; 
                ?>
                  <tr>
                    <td><?=$i?></td>
                    <td><?=$sel['selldate']?></td>
                    <td><a href='sale_invoice_info.php?invo=<?=$sel['billchallan']?>'><?=$sel['billchallan']?></a></td>
                    <td><a href='customer-history.php?cusid=<?=$sel['customerid']?>'><?=$fn->getUserName($sel['customerid'])?></a></td>
                    <td><?=$sel['total_taka']?></td>
                    <td><?=$fn->getUserName($sel['sellby'])?></td>
                    <td><?=$fn->getUserName($sel['entryby'])?></td>
                    <td><div class="dropdown">
  <button type="button" class="btn btn-outline-primary dropdown-toggle" data-toggle="dropdown">
   <i class="fa fa-gear"></i>
  </button>
  <div class="dropdown-menu">
    <?php 
         if ($rbas->getView()) {
              echo '<a class="dropdown-item" href="product-sale-view-details.php?invo='.$sel['billchallan'].'">View <i class="fa fa-eye"></i></a>';
         }
         if ($rbas->getUpdate()) {
              echo '<a class="dropdown-item" href="product-sale-edit.php?invo='.$sel['billchallan'].'">Edit <i class="fa fa-pencil"></i></a>';
         }
         if ($rbas->getDelete()) {
             ?>
              <a class="dropdown-item" href="#" onclick="deleteItem('product-sale-history','<?=$sel['billchallan']?>')">Delete <i class="fa fa-times"></i></a>
           <?php 
         }
         if ($rbas->getPrint()) 
         {
              ?>
              <a class="dropdown-item" href="#" >Print</a>
              <?php
         }
    ?>
    
    
  </div>
</div></td>
                  </tr>

           <?php  }

          ?>
        </tbody>
      </table>
    </div>
  </div>
    </div>
  </div>
</div>



<?php include 'files/footer.php'; ?>
