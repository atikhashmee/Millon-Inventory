<?php include 'files/header.php'; ?>
<?php include 'files/menu.php'; ?>

<div class="container">
  <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="btn-group pull-right">
                                <ol class="breadcrumb hide-phone p-0 m-0">
                                  <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                                  <li class="breadcrumb-item"><a href="#">Report</a></li>
                                  <li class="breadcrumb-item active">Stock Report</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Stock Report</h4>
                            
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->
   <div class="row">
       <div class="col">
        <div class="card card-body">
          <form action="" method="POST">
            <div class="row">
               <div class="col">
                <select name="productcat" id="productcat" class="form-control">
                   <option value="">Select A Product category</option>
                     <?php $dm->getCategories();?>
                </select>
                </div>
              <div class="col">
                <select name="product" id="product" class="form-control" >
                   
                </select>
              </div>
              <div class="col">
                <input type="text" class="form-control" name="start" id="start">
              </div>
            <div class="col">
              <input type="text" class="form-control" name="to" id="to">
            </div>
              <div class="col"><button type="submit" name="btnsearch" class="btn btn-outline-primary"> Search <i class="fa fa-search"></i> </button></div>
            </div>
          </form>
         </div>
       </div>
     </div>
   <div class="row ">
      <div class="col-md-12 mt-2"  id="formtobefolded">
         <div class="card card-body">
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
                 if (isset($_GET['pro_id'])) 
                 {
                      $sql  = "
SELECT `billchallan`,`selldate`, `token`, `productid`, `quantity` FROM `sell` WHERE `productid`='".$_GET['pro_id']."' 
UNION
SELECT `billchallan`, `purchasedate`,`token`,`productid`, `quantity` FROM `purchase` WHERE `productid`='".$_GET['pro_id']."'
UNION
SELECT `memono`, `return_date`, `token`,`productid`,`quntity` FROM `sell_return` WHERE `productid`='".$_GET['pro_id']."'
UNION
SELECT `memono`, `return_date`,`token`,`productid`,`quntity`  FROM `purchase_return` WHERE `productid`='".$_GET['pro_id']."'";
                 }
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

                     echo "<h5>Product = ".$_POST['product']."</h5>";
                     echo "<h5>Opening Stock = ".$openini['opening_stock']."</h5>";
                  $total = $openini['opening_stock'];
                    /*echo "<pre>";
                    print_r($_POST);
                    echo "</pre>";*/
                }
                $query =  $db->joinQuery($sql)->fetchAll();
          ?>
            <table class="table table-striped table-bordered table-striped"
             id="datatable-buttons">
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

                          <td><?php 
                         if (trim($qu['token']) =="p_Cash" || trim($qu['token'])=="p_Cheque") 
                          {
                               echo "Product is purchased";
                          }
                          else if (trim($qu['token'])=="s_Cash" || trim($qu['token'])=="s_Cheque") 
                          {
                             echo "Product is sold out";
                          }
                          else if ( trim($qu['token']) =="sr") 
                          {
                             echo "Sell Return";
                          }
                          else if ( trim($qu['token']) =="pr") 
                          {
                             echo "Purchase Return";
                          } ?></td>
                          <td><?=$qu['quantity']?></td>
                          <td><?php 
                             if (trim($qu['token']) =="p_Cash" || trim($qu['token'])=="p_Cheque") 
                             {
                              echo  $total+= $qu['quantity'];
                          }
                          else if (trim($qu['token'])=="s_Cash" || trim($qu['token'])=="s_Cheque") 
                          {
                             echo  $total-= $qu['quantity'];
                          }
                           else if (trim($qu['token'])=="sr") 
                           {
                             echo  $total+= $qu['quantity'];
                          }
                          else if (trim($qu['token'])=="pr") 
                          {
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
<script src="assets/js/productbasic.js"></script>
<script src="assets/js/product.js"></script>
<script>

   
   var brnds = <?php echo  json_encode($dm->getBrandListByIds());?>;
   var sizzz = <?php echo  json_encode($dm->getSizeListByIds());?>;
   var prod =  <?php echo  json_encode($dm->getProListByIds());?>;

new DefaultModule(brnds,sizzz,prod);
   
     document.getElementById("productcat").addEventListener("change",(event)=>{
        if (event.target.value.length !== 0) 
        {
            
            var xyz = products();
            xyz.then((obj) =>
            {
              //console.log(obj);
              var text = "";
                obj.forEach((element)=>{
                    if (element.product_cat === event.target.value)
                     {
                      text += "<option value='"+element.pro_id+"'>"+defaultModule.prod[element.pro_id]+"</option>";
                     }
                });
          document.getElementById("product").innerHTML = text;
        });
        }
       });
  
</script>