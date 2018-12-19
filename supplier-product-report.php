<?php include 'files/header.php'; ?>
<?php include 'files/menu.php';

 ?>
<div class="container">

   <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="btn-group pull-right">
                                <ol class="breadcrumb hide-phone p-0 m-0">
                                  <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                                  <li class="breadcrumb-item"><a href="#">Report</a></li>
                                  <li class="breadcrumb-item active">Supplier Product Report</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Supplier Product Report</h4>
                            
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
                <select class="form-control" name="suppliername" id="suppliername">
                     <option value="">Select a Customer</option>
                     <?=$dm->getUsersByRole(2)?>
                  </select>
                </div>
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
              <div class="col"><input type="date" class="form-control" name="start"></div>
            <div class="col"><input type="date" class="form-control" name="to"></div>
              <div class="col">
                <button type="submit" name="filter" class="btn btn-outline-primary"> Search <i class="fa fa-search"></i>  </button>
              </div>
            </div>
          </form>
         </div>
       </div>

     </div>



<div class="row mt-2">
   <!-- users view section starts here -->
   <div class="col">
   <?php 
         $sql =  "SELECT `purchasedate`,`billchallan`, `productid`, `quantity`, `price`, `weight`, `transport`, `vat`,`comission`, `discount`, `token` FROM `purchase`
            UNION
           SELECT `return_date`, `memono`, `productid`, `quntity`, `price`, `weight`, `transport`, `vat`, `comission`,`discount`, `token` FROM `purchase_return` ORDER by purchasedate";

                  $opening = 0;

         if (isset($_POST['filter'])) {



              //search by only name


              if (!empty($_POST['suppliername'])) {

                $sql ="SELECT `purchasedate`,`billchallan`, `productid`, `quantity`, `price`, `weight`, `transport`, `vat`,`comission`, `discount`, `token` FROM `purchase` WHERE `supplier`='".$_POST['suppliername']."'
             UNION
              SELECT `return_date`, `memono`, `productid`, `quntity`, `price`, `weight`, `transport`, `vat`, `comission`, `discount`, `token` FROM `purchase_return` WHERE `supplierId`='".$_POST['suppliername']."' ORDER by purchasedate";

              }

                //search by name and product name
              if (!empty($_POST['suppliername']) && !empty($_POST['product'])) {
                $sql ="SELECT `purchasedate`,`billchallan`, `productid`, `quantity`, `price`, `weight`, `transport`, `vat`,`comission`, `discount`, `token` FROM `purchase` WHERE supplier='".$_POST['suppliername']."' AND productid='".$_POST['product']."'
                 UNION 
                 SELECT `return_date`, `memono`, `productid`, `quntity`, `price`, `weight`, `transport`, `vat`,`comission`, `discount`, `token` FROM `purchase_return` WHERE supplierId ='".$_POST['suppliername']."' AND productid='".$_POST['product']."' ORDER by purchasedate";
              }

              //search by customer name ,  and date

               if (!empty($_POST['suppliername']) &&  !empty($_POST['start']) && !empty($_POST['to']) ) {
                $sql ="SELECT `purchasedate`,`billchallan`, `productid`, `quantity`, `price`, `weight`, `transport`, `vat`,`comission`, `discount`, `token` FROM `purchase` WHERE supplier='".$_POST['suppliername']."'  AND purchasedate BETWEEN '".$_POST['start']."' AND '".$_POST['to']."'
                 UNION 
                 SELECT `return_date`, `memono`, `productid`, `quntity`, `price`, `weight`, `transport`, `vat`,`comission`, `discount`, `token` FROM `purchase_return` WHERE supplierId='".$_POST['suppliername']."' AND return_date BETWEEN '".$_POST['start']."' AND '".$_POST['to']."' ORDER by purchasedate";
              }

                //search by customer name , product name , and date

                if (!empty($_POST['cutomername']) && !empty($_POST['product']) && !empty($_POST['start']) && !empty($_POST['to']) ) {
                $sql ="SELECT `purchasedate`,`billchallan`, `productid`, `quantity`, `price`, `weight`, `transport`, `vat`,`comission`, `discount`, `token` FROM `purchase` WHERE sell.customerid='".$_POST['cutomername']."' AND sell.productid='".$_POST['product']."' AND sell.selldate BETWEEN '".$_POST['start']."' AND '".$_POST['to']."'
                 UNION 
                 SELECT `return_date`, `memono`, `productid`, `quntity`, `price`, `weight`, `transport`, `vat`, `comission`,`discount`, `token` FROM `purchase_return` WHERE sell_return.customerid='".$_POST['cutomername']."' AND sell_return.productid='".$_POST['product']."' AND sell_return.return_date BETWEEN '".$_POST['start']."' AND '".$_POST['to']."' ORDER by selldate";
              }  

              


             
              // fetching customer opening balnce to add up the total transaction
              $customers_opening = $db->joinQuery("SELECT `opening_balance` FROM `users` WHERE `u_id`='".$_POST['suppliername']."'")->fetch(PDO::FETCH_ASSOC);
              $opening = $customers_opening['opening_balance'];
              ?>
              <div class="bg-light card card-body" style=" background: #060202 !important;">
                <h4 style="color: white">Supplier Name : <?php  echo $fn->getUserName($_POST['suppliername']); ?></h4>
                <!-- <h5 style="color: white">Opening Balance : <?php echo $customers_opening['opening_balance']; ?> </h5> -->
              </div>
              <?php 
         }
                  
         $data = $db->joinQuery($sql)->fetchAll();
         
         ?>
     <div class="card card-body">
      <table class="table table-hover  table-bordered" id="datatable-buttons" >
         <thead>
            <tr>
               <th>#</th>
               <th>Date</th>
               <th>Bill/Challan</th>
               
               <th>Description</th>
               
               <th>Total</th>
               <th>Balance</th>
            </tr>
         </thead>
         <tbody>
          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>Opnening Balance</td>
            <td><?=$opening?></td>
          </tr>
            <?php 
               $i=0;
               $sum = $opening;
                  foreach ($data as $val) {  $i++;
                    $bc = new Bc();
                    $bc->setAmount(((int)$val['price'] * (int)$val['quantity']));
                    $bc->setWeight($val['weight']);
                    $bc->setTransport($val['transport']);
                    $bc->setVat($val['vat']);
                    $bc->setDiscount($val['discount']);
                    $bc->setComission($val['comission']);
                   ?>
            <tr>
               <th scope="row"><?=$i?></th>
               <td><?=$val['purchasedate']?></td>
               <td><?=$val['billchallan']?></td>
               <td>
                <p style="margin: 0px; padding: 0px" ><?=$fn->getProductName($val['productid'])?></p> 
                <?=$val['quantity']?>@
                <?=$val['price']?>--
                <?=$val['weight']?>--
                <?=$val['transport']?>--
                <?=$val['vat']?>--<?=$val['discount']?>--<?=$val['comission']?>
                 <p style="margin: 0px; padding: 0px">Status = <?php 
                    if (trim($val['token']) =="pr") {
                        echo "Product returned";
                    }else if(trim($val['token'])=="p_Cash" || trim($val['token'])=="p_Cheque"){
                       echo "Product Purchesed";
                    }
               ?></p> </td>
               
               <td><?php 

                      if ( trim($val['token']) =="pr") {
                        echo "-".$bc->getResult();
                    }else if(trim($val['token'])=="p_Cash" || trim($val['token'])=="p_Cheque"){
                       echo "+".$bc->getResult();
                    }

               ?></td>
               <td><?php 

                      if ($val['token']=="pr") {
                        echo $sum -= $bc->getResult();
                    }else if(trim($val['token'])=="p_Cash" || trim($val['token'])=="p_Cheque"){
                       echo $sum += $bc->getResult();
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
</script>