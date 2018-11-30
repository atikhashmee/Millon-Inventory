

<?php include 'files/header.php'; ?>
<?php include 'files/menu.php';

$rbas->setPageName(5)->run();
 ?>


   <div class="container">
     <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="btn-group pull-right">
                                <ol class="breadcrumb hide-phone p-0 m-0">
                                  <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                                  <li class="breadcrumb-item"><a href="#">Products</a></li>
                                  <li class="breadcrumb-item active">Sell Return History</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Sell Return History</h4>
                            
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->
     <div class="row">
       <div class="col">
          <?php 
            $sql =  "SELECT * FROM `sell_return`";
            $i =0;
            
            $data = $db->joinQuery($sql)->fetchAll();
            
            ?>
            <div class="card m-b-30">
               <div class="card-body">           
         <table class="table table-condensed table-bordered table-hover table-striped" id="datatable" >
            <thead>
               <tr>
                  <th>SL</th>
                  <th>memono</th>
                  <th>Product Name</th>
                  <th>Quantity</th>
                  <th>Price</th>
                  <th>Return Date</th>
                  <th>Action</th>
               </tr>
            </thead>
            <tbody>
               <?php 
                  foreach ($data as $val) {  $i++; ?>
               <tr>
                  <th scope="row"><?=$i?></th>
                  <td><?=$val['memono']?></td>
                  <td><?=$fn->getProductName(trim($val['productid']))?></td>
                  <td><?=$val['quntity']?></td>
                  <td><?=$val['price']?></td>
                  <td><?=$val['return_date']?></td>
                  <td><div class="dropdown">
  <button type="button" class="btn btn-outline-primary dropdown-toggle" data-toggle="dropdown">
    <i class="fa fa-gear"></i>
  </button>
  <div class="dropdown-menu">
    <?php 
         if ($rbas->getView()) {
              echo '<a class="dropdown-item" href="product-sale-return-view-details.php?invo='.$val['memono'].'">View <i class="fa fa-eye"></i></a>';
         }
         if ($rbas->getUpdate()) {
              echo '<a class="dropdown-item" href="product-sale-return-edit.php?invo='.$val['memono'].'">Edit <i class="fa fa-pencil"></i></a>';
         }
         if ($rbas->getDelete()) {
              echo '<a class="dropdown-item" href="#">Delete <i class="fa fa-times"></i></a>';
         }
         if ($rbas->getPrint()) {
              echo '<a class="dropdown-item" href="#">Print</a>';
         }
    ?>
  </div>
</div></td>
               </tr>
               <?php   }
                  ?>
            </tbody>
         </table>
       </div>
     </div>

       </div>
     </div>
   </div>

<?php include 'files/footer.php'; ?>
