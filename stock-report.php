<?php include 'files/header.php'; ?>
<?php include 'files/menu.php'; ?>

<div class="container">
   <div class="row">
       <div class="col">
         <div class="bg-light card card-body" style=" background: #060202 !important;">
          <form action="" method="POST">
            <div class="row">
               <div class="col">
                <select name="productcat" id="productcat" class="form-control" onchange="getProduct()" >
                   <option value="">Select A Product category</option>
                    <?php 
                                 $cat  =  $db->joinQuery("SELECT * FROM `cateogory`")->fetchAll();
                                 foreach ($cat as $cater) { ?>
                              <option value="<?=$cater['cat_id']?>"><?=$cater['cat_name']?></option>
                              <?php
                                 }
                                 ?>
                </select>
                </div>
              <div class="col">
                <select name="product" id="product" class="form-control" >
                   
                </select>
              </div>
              <div class="col"><input type="date" class="form-control" name="start"></div>
              <div class="col"><input type="date" class="form-control" name="to"></div>
              <div class="col"><input type="submit" name="btnsearch" class="btn btn-default"></div>
            </div>
          </form>
         </div>
       </div>
     </div>
   <div class="row ">
      <div class="col-md-12"   style="margin-top: 22px;" id="formtobefolded">
         <div class="bg-light">
          <?php 
            $query = "";
            $total = 0;
            $sql = "SELECT `billchallan`,`selldate`, `token`, `productid`, `quantity` FROM `sell`  
UNION 
SELECT `billchallan`, `purchasedate`,`token`,`productid`,`quantity` FROM `purchase`
UNION
SELECT `memono`, `return_date`, `token`,`productid`,`quntity` FROM `sell_return` 
UNION
SELECT `memono`, `return_date`,`token`,`productid`,`quntity`  FROM `purchase_return`";
                if (isset($_POST['btnsearch'])) {
                  
                  if (!empty($_POST['start']) && !empty($_POST['to']) ) {
                    $sql = "
                    SELECT `billchallan`,`selldate`, `token`, `productid`, `quantity` 
                    FROM `sell` WHERE `productid`='".$_POST['product']."' AND sell.selldate BETWEEN '".$_POST['start']."' AND '".$_POST['to']."'
                    UNION
                    SELECT `billchallan`, `purchasedate`,`token`,`productid`, `quantity` 
                    FROM `purchase` WHERE `productid`='".$_POST['product']."' AND purchase.purchasedate BETWEEN '".$_POST['start']."' AND '".$_POST['to']."'
                    UNION
                    SELECT `memono`, `return_date`, `token`,`productid`,`quntity` 
                    FROM `sell_return` WHERE `productid`='".$_POST['product']."' AND sell_return.return_date BETWEEN '".$_POST['start']."' AND '".$_POST['to']."'
                    UNION
                    SELECT `memono`, `return_date`,`token`,`productid`,`quntity`  
                    FROM `purchase_return` WHERE `productid`='".$_POST['product']."' AND purchase_return.return_date BETWEEN '".$_POST['start']."' AND '".$_POST['to']."'";
                       
                  
                  }else {
                         $sql  = "
SELECT `billchallan`,`selldate`, `token`, `productid`, `quantity` FROM `sell` WHERE `productid`='".$_POST['product']."' 
UNION
SELECT `billchallan`, `purchasedate`,`token`,`productid`, `quantity` FROM `purchase` WHERE `productid`='".$_POST['product']."'
UNION
SELECT `memono`, `return_date`, `token`,`productid`,`quntity` FROM `sell_return` WHERE `productid`='".$_POST['product']."'
UNION
SELECT `memono`, `return_date`,`token`,`productid`,`quntity`  FROM `purchase_return` WHERE `productid`='".$_POST['product']."'";
                  }
                     $query =  $db->joinQuery($sql)->fetchAll();
                     // product opening stock fetching
                     $openini = $db->joinQuery("SELECT `opening_stock` FROM `product_info` WHERE `pro_id`='".$_POST['product']."'")->fetch(PDO::FETCH_ASSOC);
                     echo "<h1 style='color:blue'>Product = ".$_POST['product']."</h1>";
                     echo "<h1 style='color:blue'>Opening Stock = ".$openini['opening_stock']."</h1>";
                  $total = $openini['opening_stock'];
                    /*echo "<pre>";
                    print_r($_POST);
                    echo "</pre>";*/
                }
                $query =  $db->joinQuery($sql)->fetchAll();
          ?>
            <table class="table table-striped table-bordered table-striped" id="myTable">
               <thead>
                  <tr>
                     <th>#SL</th>
                     <th>Bill/challan </th>
                     <th>Date</th>
                     <th>Product Id</th>
                     <th>Description</th>
                     <th>Quantity</th>
                     <th>Stock</th>
                  </tr>
               </thead>
               <tbody>
                  <?php 
                          $i=0;
                          foreach ($query as $qu) {  $i++; ?>
                          <tr>
                          <th><?=$i?></th>
                          <td><?=$qu['billchallan']?></td>
                          <td><?=$qu['selldate']?></td>
                          <td><?=$qu['productid']?></td>

                          <td><?php if ($qu['token']=="p") {
                               echo "Product is purchased";
                          }else if ($qu['token']=="s") {
                             echo "Product is sold out";
                          }else if ($qu['token']=="sr") {
                             echo "Sell Return";
                          }else if ($qu['token']=="pr") {
                             echo "Purchase Return";
                          } ?></td>
                          <td><?=$qu['quantity']?></td>
                          <td><?php 
                             if ($qu['token']=="p") {
                              echo  $total+= $qu['quantity'];
                          }else if ($qu['token']=="s") {
                             echo  $total-= $qu['quantity'];
                          } else if ($qu['token']=="sr") {
                             echo  $total+= $qu['quantity'];
                          }else if ($qu['token']=="pr") {
                             echo  $total-= $qu['quantity'];
                          }
                          ?></td>
                          
                        
                          </tr>
                          <?php   }
                        ?>
               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>
<?php include 'files/footer.php'; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
  <?php 
      $brand = $db->selectAll("p_brand");
      $sizes = $db->selectAll("p_size");
      $pro = $db->selectAll("product_info");
       $branddd = [];
       $sizsesss =  [];
       $products =  [];
      
      while ($br = $brand->fetch(PDO::FETCH_ASSOC)) {
       $branddd[$br['brand_id']] = $br['brand_name'];
      }
      
      
      while ($si = $sizes->fetch(PDO::FETCH_ASSOC)) {
       $sizsesss[$si['pro_size_id']] = $si['pro_size_name'];
      }
      while ($prlist = $pro->fetch(PDO::FETCH_ASSOC)) {
                           $productname = '';
                              if (!empty($prlist['size_id'])) {
                                 $productname .= $fn->getBrandName($prlist['brand_id'])."-". $fn->getSizeName($prlist['size_id']);
                              }else {
                                 $productname .=$fn->getBrandName($prlist['brand_id']);
                              }
       $products[$prlist['pro_id']] = $productname;
      }
      ?>
   
   var brnds = <?php echo json_encode($branddd);?>;
   var sizzz = <?php echo json_encode($sizsesss);?>;
   var prod = <?php echo json_encode($products);?>;
    function  getProduct() {
   var id = document.getElementById("productcat").value;
   $.ajax({
   url: 'ajax/getProductByCategory.php',
   type: 'POST',
   data: {
     id: id },
   })
   .done(function(res) {
   var text = "";
   var data = JSON.parse(res);
   var dll = "";
   for(var j = 0; j < data.length; j++){
    dll = "";
    if (data[j].size_id.length !== 0) {
       dll =  sizzz[data[j].size_id];
    }
   text +="<option value='"+data[j].pro_id+"'>"+brnds[data[j].brand_id]+"-"+ dll +"</option>";
   }
   $("#product").html(text);
   // console.log(data[0].p_id);
   $("#cuquntity").val("6");
   })
   .fail(function() {
   console.log("error");
   })
   .always(function() {
   console.log("complete");
   });
   
   
   }
</script>