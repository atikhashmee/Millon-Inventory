<?php include 'files/header.php'; ?>
<?php include 'files/menu.php'; 

    
    $rbas->setPageName(2)->run();

?>

<?php 
   if (isset($_GET['del-id'])) {
           if ($db->delete("purchase","billchallan = '".$_GET['del-id']."'")) {?>
<script> alert('Data has been deleted'); window.location.href='purchase.php'; </script>
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

                               
         <table class="table table-bordered table-striped  table-condensed" id="datatable">
           <thead>
             <tr>
               <th>SL</th>
               <th>Bill/challan No</th>
               <th>Supplier</th>
               <th>Product</th>
               <th>Quantity</th>
               <th>Price</th>
               
              
               <th>Grand Total </th>
               
               <th>Purchase Date</th>
               <th>Action</th>
             </tr>
           </thead>
           <tbody>
            <?php 
        error_reporting(0);
            $i=0;
            $purchase = $db->selectAll("purchase")->fetchAll();
            foreach ($purchase as $pur) {  $i++; ?>
                  
                  <tr>
                    <td><?=$i?></td>
                    <td><?=$pur['billchallan']?></td>
                    <td><?=$fn->getUserName($pur['supplier'])?></td>
                    <td><?=$fn->getProductName($pur['productid'])?></td>
                    <td><?=$pur['quantity']?></td>
                    <td><?=$pur['price']?></td>
                  
                    
                    <td><?=($pur['quantity'] * $pur['price']) - ($pur['comdiscount']/100 * ($pur['quantity'] * $pur['price']))?></td>
                    
                    <td><?=$pur['purchasedate']?></td>
                    <td><div class="dropdown">
  <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
    options
  </button>
  <div class="dropdown-menu">
    <?php 
         if ($rbas->getView()) {
              echo '<a class="dropdown-item" href="#">View</a>';
         }
         if ($rbas->getUpdate()) {
              echo '<a class="dropdown-item" href="#">Edit</a>';
         }
         if ($rbas->getDelete()) {
              echo '<a class="dropdown-item" href="#">Delete</a>';
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
