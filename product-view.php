<?php include 'files/header.php'; ?>
<?php include 'files/menu.php'; 
    
    $rbas->setPageName(1)->run();


         if (isset($_GET['del-id']))
          {

            // delete information from purchase
            $db->delete("purchase","productid='".$_GET['del-id']."'");
            // delete the purchase return information
            $db->delete("purchase_return","productid='".$_GET['del-id']."'");
            // delete information from the sell 
           $db->delete("sell","productid='".$_GET['del-id']."'");

           // delete sell return
           $db->delete("sell_return","productid='".$_GET['del-id']."'");



             if ($db->delete("product_info","pro_id='".$_GET['del-id']."'"))
              {
                 ?>
                 <script> 
                 alert('Data has been deleted');
                 window.location.href='product-view.php'; 
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
                                  <li class="breadcrumb-item active">View All Products</li>
                                </ol>
                            </div>
                            <h4 class="page-title">View Products</h4>
                            
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->
       
      
   


    


   <!-- users view section starts here -->
   <div class="row">
      <div class="col">
         <?php 
            $sql =  "SELECT * FROM `product_info`";
            $i =0;
            
            $data = $db->joinQuery($sql)->fetchAll();
            
            ?>
            <div class="card m-b-30">
            <div class="card-body">
          
          <table class="table table-condensed table-bordered" id="datatable" >
            <thead>
               <tr>
                  <th>#</th>
                  <th>ProductID</th>
                  <th>Product Name</th>
                  <th>Purchase Price</th>
                  
                  <th>Sale Price</th>
                 
                  <th>Action</th>
               </tr>
            </thead>
            <tbody>
               <?php 
                  foreach ($data as $val) {  $i++; 
                     ?>
               <tr>
                  <th scope="row"><?=$i?></th>
                  <td><?=$val['pro_id']?></td>
                  <td><?=$fn->getProductName($val['pro_id'])?></td>
                  
                  <td><?=$val['purchase_price']?></td>
                  <td><?=$val['selling_price']?></td>
                  <td>
                    
 <div class="dropdown">
  <button type="button" class="btn btn-outline-primary dropdown-toggle" data-toggle="dropdown">
    <i class="fa fa-gear"></i>
  </button>
  <div class="dropdown-menu">
    <?php 
         if ($rbas->getView()) {
              echo '<a class="dropdown-item" href="#">View <i class="fa fa-eye"></i></a>';
         }
         if ($rbas->getUpdate()) {
              echo '<a class="dropdown-item" href="product-update.php?edit-id='.$val['pro_id'].'">Edit <i class="fa fa-pencil"></i></a>';
         }
         if ($rbas->getDelete()) {
              ?>
              <a class="dropdown-item" href="#" onclick="deleteItem('product-view','<?=$val['pro_id']?>')">Delete <i class="fa fa-times"></i></a>
      <?php
         }
         if ($rbas->getPrint()) {
              echo '<a class="dropdown-item" href="#">Print</a>';
         }
    ?>
    
    
  </div>
</div>
  
                  </td>
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
</div>
<?php include 'files/footer.php'; ?>
