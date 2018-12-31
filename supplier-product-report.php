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
                     <option value="">Select a supplier</option>
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



     <div class="row">
       <div class="col">
         <div class="card card-body">
         <!--  <table  style="width: 100%; height: 200px; font-size: 0.8em;" border="1px">
               <tr>
                   <td rowspan="4">2019-12-23</td> 
                   <td rowspan="3">201812123420</td>
                   <td>P209</td>
                   <td>34</td>
                   <td>567</td>
                   <td rowspan="3">230</td>
                   
               </tr>
         
               <tr>
                      
                      <td>P202</td> 
                      <td>12</td> 
                      <td>124</td> 
               </tr> 
                <tr>
                      
                      <td>P202</td> 
                      <td>12</td> 
                      <td>124</td> 
               </tr> 
               <tr>
                      
                      <td>201812123420</td>
                      <td>P202</td> 
                      <td>12</td> 
                      <td>124</td> 
                      <td>130</td> 
               </tr>
             
         
              
         </table> -->
           <table border="1" id="datatable-buttons">
            <thead>
            <tr>
              <th rowspan="2">Dates</th>
              <th rowspan="2">Invoices</th>
              <th rowspan="2">Products</th>
              <th rowspan="2">Quantity</th>
              <th rowspan="2">Price</th>
              <th rowspan="2">Total</th>
              <th rowspan="2">Subtotal</th>
              <th colspan="5">Extra</th>
              <th rowspan="2">Grandtotal</th>
              <th rowspan="2">Balance</th>

            </tr>
            <tr>
              <th>wg</th>
              <th>tr</th>
              <th>vat</th>
              <th>com</th>
              <th>Dis</th>
            </tr>
            </thead>
            <tbody>
              <?php

              function productCountByDate($date)
              {
                   $productcount = $GLOBALS['db']->joinQuery("SELECT COUNT( `productid`) as totalproduct FROM `purchase` WHERE `purchasedate`='{$date}'")->fetch(PDO::FETCH_ASSOC);
                   return  $productcount['totalproduct'];
              } 
              function productCountByInvoice($invoice)
              {
                   $productcount = $GLOBALS['db']->joinQuery("SELECT COUNT( `productid`) as totalproduct FROM `purchase` WHERE `billchallan`='{$invoice}'")->fetch(PDO::FETCH_ASSOC);
                   return  $productcount['totalproduct'];
              }
              $myquery = "SELECT DISTINCT`purchasedate` FROM `purchase`";
                if (isset($_POST['filter'])) 
                {
                    if (!empty($_POST['suppliername'])) 
                    {
                       $myquery = "SELECT DISTINCT`purchasedate` FROM `purchase` WHERE `supplier`='".$_POST['suppliername']."'";
                    }
                      //search by name and product name
            /*  if (!empty($_POST['suppliername']) && !empty($_POST['product'])) {
                $sql ="SELECT `purchasedate`,`billchallan`, `productid`, `quantity`, `price`, `weight`, `transport`, `vat`,`comission`, `discount`, `token` FROM `purchase` WHERE supplier='".$_POST['suppliername']."' AND productid='".$_POST['product']."'
                 UNION 
                 SELECT `return_date`, `memono`, `productid`, `quntity`, `price`, `weight`, `transport`, `vat`,`comission`, `discount`, `token` FROM `purchase_return` WHERE supplierId ='".$_POST['suppliername']."' AND productid='".$_POST['product']."' ORDER by purchasedate";
              }*/

              //search by customer name ,  and date

               if (!empty($_POST['suppliername']) &&  !empty($_POST['start']) && !empty($_POST['to']) ) 
               {
                  
                  $myquery = "SELECT DISTINCT`purchasedate` FROM `purchase` WHERE `supplier`='".$_POST['suppliername']."' AND purchasedate='".$_POST['start']."'";
              }

                //search by customer name , product name , and date

                if (!empty($_POST['cutomername']) &&  !empty($_POST['start']) && !empty($_POST['to']) ) 
                {
                  $myquery = "SELECT DISTINCT`purchasedate` FROM `purchase` WHERE `supplier`='".$_POST['suppliername']."' AND purchasedate BETWEEN '".$_POST['start']."' AND '".$_POST['to']."'";
                }  

              


             
              ?>
              
                <address><?php  echo $dm->getUserFullDetails($_POST['suppliername']); ?></address>
                
             
              <?php 


                }
          
                $dates = $db->joinQuery($myquery)->fetchAll();
                $daycount = count($dates);
                $sum = 0;
                foreach ($dates as $date) 
                {
                     $invoices = $db->joinQuery("SELECT DISTINCT `billchallan`,`weight`,`transport`,`vat`,`comission`,`discount` FROM `purchase` WHERE `purchasedate`='".$date['purchasedate']."'")->fetchAll();
                     $daterowspan = productCountByDate($date['purchasedate']);
                    
                    
                     $j=0;
                     foreach ($invoices as $invoice) 
                     {
                         $products = $db->joinQuery("SELECT * FROM `purchase` WHERE `billchallan`='".$invoice['billchallan']."'")->fetchAll();
                         $totalsum = $db->joinQuery("SELECT SUM(`quantity`*`price`) as sumas FROM `purchase` WHERE `billchallan`='".$invoice['billchallan']."'")->fetch(PDO::FETCH_ASSOC);
                         $invoicerowspan =productCountByInvoice($invoice['billchallan']);
                         $grandsum = $rp->invoiceAmount($invoice['billchallan'],"p");

                        $sum += $grandsum;
                         $i=0;
                         foreach ($products as $product) 
                         {
                          
                           if ($i==0 && $j==0) 
                           {
                             ?>
                              <tr>
                                <td rowspan="<?=$daterowspan?>"><?=$date['purchasedate']?></td>
                                <td rowspan="<?=$invoicerowspan?>"><?=$invoice['billchallan']?></td>
                                <td><?=$fn->getProductName($product['productid'])?></td>
                                <td><?=$product['quantity']?></td>
                                <td><?=$product['price']?></td>
                                <td><?=($product['quantity']*$product['price'])?></td>
                                <td rowspan="<?=$invoicerowspan?>"><?=$totalsum['sumas']?></td>
                                <td><?=$invoice['weight']?></td>
                                <td><?=$invoice['transport']?></td>
                                <td><?=$invoice['vat']?></td>
                                <td><?=$invoice['comission']?></td>
                                <td><?=$invoice['discount']?></td>
                          <td rowspan="<?=$invoicerowspan?>"><?=$grandsum?></td>
                      <td rowspan="<?=$invoicerowspan?>"><?=$sum?></td>
                              </tr>
                             <?php
                           }
                           else if ($i==0 && $j!=0) 
                           {
                              ?>
                              <tr>
                                <td rowspan="<?=$invoicerowspan?>"><?=$invoice['billchallan']?></td>
                                <td><?=$fn->getProductName($product['productid'])?></td>
                                <td><?=$product['quantity']?></td>
                                <td><?=$product['price']?></td>
                                <td><?=($product['quantity']*$product['price'])?></td>
                               <td rowspan="<?=$invoicerowspan?>"><?=$totalsum['sumas']?></td>
                                <td><?=$invoice['weight']?></td>
                                <td><?=$invoice['transport']?></td>
                                <td><?=$invoice['vat']?></td>
                                <td><?=$invoice['comission']?></td>
                                <td><?=$invoice['discount']?></td>

                            <td rowspan="<?=$invoicerowspan?>"><?=$grandsum?></td>
                        <td rowspan="<?=$invoicerowspan?>"><?=$sum?></td>
                              </tr>
                             <?php
                           }
                           else 
                           {
                              ?>
                              <tr>
                                <td><?=$fn->getProductName($product['productid'])?></td>
                                <td><?=$product['quantity']?></td>
                                <td><?=$product['price']?></td>
                                <td><?=($product['quantity']*$product['price'])?></td>

                              </tr>
                             <?php
                           }


                           $i++;
                            
                         }
                         $j++;
                     }
                }
          
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