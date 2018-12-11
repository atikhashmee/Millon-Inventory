<?php include 'files/header.php'; ?>
<?php include 'files/menu.php';
$rbas->setPageName(4)->run();

 ?>



<?php 
   if (isset($_GET['del-id'])) {
           if ($db->delete("sell","billchallan = '".$_GET['del-id']."'")) {?>
<script> alert('Data has been deleted'); window.location.href='product-sale-history.php'; </script>
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

                               
      <table class="table table-bordered table-condensed  table-striped" id="datatable">
        <thead>
          <tr>
            <th>Sl</th>
            <th>Bill/challan</th>
            
            <th>Customer</th>
            <th>Product</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Total</th>
           
            <th>Grand Total</th>
            <th>sell Date</th>
            <th>sell By</th>
            <th>Action </th>
          </tr>
        </thead>
        <tbody>
          <?php 
        error_reporting(0);
            $i=0;
            $sellinfo = $db->selectAll("sell")->fetchAll();
            foreach ($sellinfo as $sel) {  $i++; ?>
                  <tr>
                    <td><?=$i?></td>
                    <td><?=$sel['billchallan']?></td>
                    <td><?=$fn->getUserName($sel['customerid'])?></td>
                    <td><?=$fn->getProductName($sel['productid'])?></td>
                    <td><?=$sel['quantity']?></td>
                    <td><?=$sel['price']?></td>
                    <td><?=$sel['quantity'] * $sel['price'] ?></td>
                    
                    <td><?=($sel['quantity'] * $sel['price']) - ($sel['comission']/100 * ($sel['quantity'] * $sel['price']))?></td>
                    <td><?=$sel['selldate']?></td>
                    <td><?=$fn->getUserName($sel['sellby'])?></td>
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
              <a class="dropdown-item" href="product-sale-history.php?del-id=<?=$val['brand_id']?>" onclick="return confirm('Are you sure?')">Delete <i class="fa fa-times"></i></a>
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
