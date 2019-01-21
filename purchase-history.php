<?php include 'files/header.php'; ?>
<?php include 'files/menu.php'; 

    
    $rbas->setPageName(2)->run();

?>

<?php 
   if (isset($_GET['del-id'])) 
   {


          /*  delete the sale return history also if they are exist */
        $sr_dat = $db->joinQuery("SELECT COUNT(*) as totalnumber FROM `purchase_return` WHERE `memono`= '".$_GET['del-id']."'")->fetch(PDO::FETCH_ASSOC);
        if ($sr_dat>0) 
        {
          $db->delete("purchase_return","`memono`= '".$_GET['del-id']."'");
        }


        /*
          if the invoice has cheque information in the record
        */

         $sql = "SELECT COUNT(*) as yes FROM `purchase` WHERE `billchallan`='".$_GET['del-id']."' AND `token` ='p_Cheque'";
         $qry =  $db->joinQuery($sql)->fetch(PDO::FETCH_ASSOC);
         if ($qry['yes'] > 0) 
         {
           $db->delete("cheque","parent_table_id='p_".$_GET['del-id']."'");
         }

           if ($db->delete("purchase","billchallan = '".$_GET['del-id']."'")) 
            { 
               
              ?>
            <script> 
            alert('Data has been deleted'); 
            window.location.href='purchase-history.php'; 
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
                                  <li class="breadcrumb-item"><a href="#">Products</a></li>
                                  <li class="breadcrumb-item active">Products History</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Purchase History</h4>
                            
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->


   </div>

   <div class="container">
     <div class="row">
       <div class="col">
        <div class="card m-b-30">
                            <div class="card-body">

                   <form action="" method="POST">
            <div class="row">
               <div class="col">
                <input type="hidden" name="supplierid" id="supplierid">
                <input type="text" class="form-control" id="supplier" placeholder="type out supplier name">
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
                 
                        $exequery = $pr->purchaseHistory();
                        $sum =0;
                        if (isset($_POST['filter'])) 
                         {
                              if (!empty($_POST['supplierid']) && (empty($_POST['start']) && empty($_POST['to']))) 
                                 {
                  $exequery = $pr->purchaseHistory($_POST['supplierid']);
                                 }
                               
                              if (!empty($_POST['supplierid'])&& (!empty($_POST['start']) && empty($_POST['to'])))
                                 {
                               $exequery = $pr->purchaseHistory($_POST['supplierid'],$_POST['start']);
                                 }

                            if (!empty($_POST['supplierid'])&& (!empty($_POST['start']) && !empty($_POST['to'])))
                                 {
                               $exequery = $pr->purchaseHistory($_POST['supplierid'],$_POST['start'],$_POST['to']);
                                 }

              
                                
                         }
                         /*echo "<pre>";
                    print_r($exequery);
                    echo "</pre>";*/
                                  $data = $db->joinQuery($exequery)->fetchAll();
                                   ?> 
                               </div>
                           </div>
        <div class="card m-b-30">
                            <div class="card-body">

                               
     <table class="table table-bordered table-striped  table-condensed" id="datatable">
      <thead>
        <tr>
          <th>SL</th>
          <th>Date</th>
          <th>Invoice No</th>
          <th>Supplier</th>
          <th>Amount</th>
          <th>Entry By</th>
          <th>Payment As</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
       <?php 
           
       $i=0;
     
       foreach ($data as $pur) 
        {  $i++; ?>
             
             <tr>
               <td><?=$i?></td>
               <td><?=$pur['purchasedate']?></td>
               <td> <a href="pur_invoice_info.php?invo=<?=$pur['billchallan']?>"> <?=$pur['billchallan']?></a></td>
               <td><a href="supplier-history-1.php?supid=<?=$pur['supplier']?>"><?=$fn->getUserName($pur['supplier'])?></a></td>
               <td><?=$pur['total']?></td> 
               
               <td><?=$pur['purchasedate']?></td>
               <td><?=explode("_", trim($pur['token']))[1]?></td>
               <td><div class="dropdown">
      <button type="button" class="btn btn-outline-primary dropdown-toggle" data-toggle="dropdown">
        <i class="fa fa-gear"></i>
      </button>
      <div class="dropdown-menu">
        <?php 
    if ($rbas->getView()) {
         echo '<a class="dropdown-item" href="product-purchase-view-details.php?invo='.$pur['billchallan'].'">View <i class="fa fa-eye"></i></a>';
    }
    if ($rbas->getUpdate()) {
         echo '<a class="dropdown-item" href="product-purchase-edit.php?invo='.$pur['billchallan'].'">Edit <i class="fa fa-pencil"></i></a>';
    }
    if ($rbas->getDelete()) {
         ?>
         <a class="dropdown-item" href="#" onclick="deleteItem('purchase-history','<?=$pur['billchallan']?>')">Delete <i class="fa fa-times"></i></a>
          <?php
    }
    if ($rbas->getPrint()) {
         echo '<a class="dropdown-item" href="#">Print</a>';
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
