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
                                  <li class="breadcrumb-item active">Customerwise report</li>
                                </ol>
                            </div>
                            <h4 class="page-title"> Customerwise Report</h4>
                            
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->
     <div class="row">
       <div class="col">
         <div class="card card-body">
          <form action="" method="POST">
            <div class="row">
              <!-- <div class="col">
                <select class="form-control" name="filtertype" id="filtertype">
                     <option>Select a type</option>
                      <option value="Payment">Payment Statement</option>
                      <option value="Stock">Stock</option>
                  </select>
                </div> -->
               <div class="col">
                <select class="form-control" name="cutomername" id="cutomername">
                     <option>Select a Customer</option>
                      <?=$dm->getUsersByRole(1)?>
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
              <div class="col"><button type="submit" name="filter" class="btn btn-outline-primary"> Search <i class="fa fa-search"></i> </button></div>
            </div>
          </form>
         </div>
       </div>

     </div>



<div class="row" style="margin-top: 22px;">
   <!-- users view section starts here -->
   <div class="col">
   <?php 
         $sql =  "SELECT `selldate`, `billchallan`, `productid`, `quantity`, `price`,`weight`,`transport`,`vat`,`discount`,`comission`,`token` FROM `sell` UNION SELECT `return_date`, `memono`, `productid`, `quntity`, `price`, `weight`, `transport`, `vat`, `discount`,`comission`, `token` FROM `sell_return` ORDER by selldate";
                  $opening = 0;
         if (isset($_POST['filter'])) {
              //search by only name
              if (!empty($_POST['cutomername'])) {
                $sql ="SELECT `selldate`, `billchallan`, `productid`, `quantity`, `price`,`weight`,`transport`,`vat`,`discount`,`comission`,`token` FROM `sell` WHERE `customerid`='".$_POST['cutomername']."'
             UNION
              SELECT `return_date`, `memono`, `productid`, `quntity`, `price`, `weight`, `transport`, `vat`, `discount`,`comission`, `token` FROM `sell_return` WHERE `customerid`='".$_POST['cutomername']."' ORDER by selldate";
              }
                //search by name and product name
              if (!empty($_POST['cutomername']) && !empty($_POST['product'])) {
                $sql ="SELECT `selldate`, `billchallan`, `productid`, `quantity`, `price`,`weight`,`transport`,`vat`,`discount`,`comission`,`token` FROM `sell` WHERE sell.customerid='".$_POST['cutomername']."' AND sell.productid='".$_POST['product']."'
                 UNION 
                 SELECT `return_date`, `memono`, `productid`, `quntity`, `price`, `weight`, `transport`, `vat`, `discount`,`comission`, `token` FROM `sell_return` WHERE sell_return.customerid='".$_POST['cutomername']."' AND sell_return.productid='".$_POST['product']."' ORDER by selldate";
              }
              //search by customer name ,  and date
               if (!empty($_POST['cutomername']) &&  !empty($_POST['start']) && !empty($_POST['to']) ) {
                $sql ="SELECT `selldate`, `billchallan`, `productid`, `quantity`, `price`,`weight`,`transport`,`vat`,`discount`,`comission`,`token` FROM `sell` WHERE sell.customerid='".$_POST['cutomername']."'  AND sell.selldate BETWEEN '".$_POST['start']."' AND '".$_POST['to']."'
                 UNION 
                 SELECT `return_date`, `memono`, `productid`, `quntity`, `price`, `weight`, `transport`, `vat`, `discount`,`comission`, `token` FROM `sell_return` WHERE sell_return.customerid='".$_POST['cutomername']."' AND sell_return.return_date BETWEEN '".$_POST['start']."' AND '".$_POST['to']."' ORDER by selldate";
              }
                //search by customer name , product name , and date
                if (!empty($_POST['cutomername']) && !empty($_POST['product']) && !empty($_POST['start']) && !empty($_POST['to']) ) {
                $sql ="SELECT `selldate`, `billchallan`, `productid`, `quantity`, `price`,`weight`,`transport`,`vat`,`discount`,`comission`,`token` FROM `sell` WHERE sell.customerid='".$_POST['cutomername']."' AND sell.productid='".$_POST['product']."' AND sell.selldate BETWEEN '".$_POST['start']."' AND '".$_POST['to']."'
                 UNION 
                 SELECT `return_date`, `memono`, `productid`, `quntity`, `price`, `weight`, `transport`, `vat`, `discount`,`comission`, `token` FROM `sell_return` WHERE sell_return.customerid='".$_POST['cutomername']."' AND sell_return.productid='".$_POST['product']."' AND sell_return.return_date BETWEEN '".$_POST['start']."' AND '".$_POST['to']."' ORDER by selldate";
              }  
              
             
              // fetching customer opening balnce to add up the total transaction
              $customers_opening = $db->joinQuery("SELECT `opening_balance` FROM `users` WHERE `u_id`='".$_POST['cutomername']."'")->fetch(PDO::FETCH_ASSOC);
              $opening = $customers_opening['opening_balance'];
              ?>
              <div class="bg-light card card-body" style=" background: #060202 !important;">
                <h4 style="color: white">Customer Name : <?php  echo $fn->getUserName($_POST['cutomername']); ?></h4>
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
               <td><?=$val['selldate']?></td>
               <td><?=$val['billchallan']?></td>
               
               
               <td>
                <p style="margin: 0px; padding: 0px" ><?=$fn->getProductName($val['productid'])?></p> 
                <?=$val['quantity']?>@
                <?=$val['price']?>--
                <?=$val['weight']?>--
                <?=$val['transport']?>--
                <?=$val['vat']?>--<?=$val['discount']?>
                 <p style="margin: 0px; padding: 0px">Status = <?php 
                    if ($val['token']=="sr") {
                        echo "Product returned";
                    }else if(substr(trim($val['token']),0,1)=="s"){
                       echo "Product Purchesed";
                    }
               ?></p> </td>
               
               <td><?php 
                      if ($val['token']=="sr") {
                        echo "-".$bc->getResult();;
                    }else if(substr(trim($val['token']),0,1)=="s"){
                       echo "+".$bc->getResult();;
                    }
               ?></td>
               <td><?php 
                      if ($val['token']=="sr") {
                        echo $sum -= $bc->getResult();;
                    }else if(substr(trim($val['token']),0,1)=="s"){
                       echo $sum += $bc->getResult();;
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