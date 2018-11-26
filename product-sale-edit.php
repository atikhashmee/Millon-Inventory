<?php include 'files/header.php'; ?>
<?php include 'files/menu.php';


 ?>



<?php 
   if (isset($_GET['del-id'])) {
           if ($db->delete("sell","billchallan = '".$_GET['del-id']."'")) {?>
<script> alert('Data has been deleted'); window.location.href='sellproduct.php'; </script>
<?php   }
   }




   $salehistory = $db->joinQuery('SELECT DISTINCT`selldate`,`billchallan` FROM `sell` WHERE `billchallan`="'.$_GET['invo'].'"')->fetch(PDO::FETCH_ASSOC);

  /* echo "<pre>";
   print_r($salehistory);
   echo "</pre>";*/

   
   
   
   ?>
<div class="container">
   <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="btn-group pull-right">
                                <ol class="breadcrumb hide-phone p-0 m-0">
                                  <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                                  <li class="breadcrumb-item"><a href="#">Products</a></li>
                                  <li class="breadcrumb-item active">Products sale update</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Product Sale Update</h4>
                            
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->

         <div class="row">
                    <div class="col-12">
                        <div class="card m-b-30">
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-12">
                                        
                                        <div class="row">
                                            <div class="col-6">
                                                <address>
                                                    <strong>Customer Info:</strong><br>
                                                    John Smith<br>
                                                    1234 Main<br>
                                                    Apt. 4B<br>
                                                    Springfield, ST 54321
                                                </address>
                                            </div>
                                            <div class="col-6 text-right">
                                                <address>
                     <strong>Shipment Details:</strong>
                     <br>
                     Invoice No: <?=$salehistory['billchallan']?><br>
                     Sale Date :  <?=date("Y-M-d",strtotime($salehistory['selldate']))?>
                                                </address>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <div class="panel panel-default">
                                            <div class="p-2">
                                                <h3 class="panel-title font-20"><strong>Order summary</strong></h3>
                                            </div>
                                            <div class="row">
                                              <div class="col-md-2">
                                               <div class=" form-group">
                                 <label  for="name">Product Category<span class="required">*</span> </label>
                                 <select class="form-control" name="productcat" id="productcat" onchange="getProduct()">
                                    <option>Choose option</option>
                                    <?php 
                                       $cat  =  $db->joinQuery("SELECT * FROM `cateogory`")->fetchAll();
                                       foreach ($cat as $cater) { ?>
                                    <option value="<?=$cater['cat_id']?>"><?=$cater['cat_name']?></option>
                                    <?php
                                       }
                                       
                                       ?>
                                 </select>
                              </div>
                                              </div>
                                              <div class="col-md-2">
                                                 <div class="form-group">
                                 <label  for="name">Product<span class="required">*</span>
                                 </label>
                                 <select class="form-control" name="product" id="product">
                                 </select>
                              </div>
                                              </div>
                                              <div class="col-md-2">
                                                <div class="form-group">
                                 <label  for="name">Price <span class="required">*</span></label>
                                 <input id="price" class="form-control"  name="price"  id="price"  type="text">
                              </div>
                                              </div>
                                              <div class="col-md-2">
                                                <div class="form-group">
                                 <label  for="name">Quantity<span class="required">*</span> </label>
                                 <input id="quntity" class="form-control"  name="quntity" id="quntity"  onblur="gettotalpric()"  type="text">
                              </div>
                                              </div>
                                              <div class="col-md-2">
                                                <div class="form-group">
                                 <label for="name">Total <span class="required">*</span>
                                 </label>
                                 <input id="totallprice" class="form-control"  name="totallprice" type="text">
                              </div>
                                              </div>
                                              <div class="col-md-2">
                                                <button type="button" onclick="addtocart()" class="btn btn-outline-primary" style="position: absolute; top: 30px;">Add to list</button>
                                              </div>
                                            </div>
                                            <div class="">
                       <div class="table-responsive">
                      <table class="table">
                      <thead>
                      <tr>
                    <td><strong>Item</strong></td>
              <td class="text-center"><strong>Price</strong></td>
            <td class="text-center"><strong>Quantity</strong></td>
            <td class="text-right"><strong>Totals</strong></td>
                </tr>
                                                        </thead>
                       <tbody id="mycartlists">
                          <?php 
                          $invoiceinfo = $db->selectAll('sell','`billchallan`= "'.$_GET['invo'].'"')->fetchAll();
                          /*echo "<pre>";
                          print_r($invoiceinfo);
                          echo "</pre>";*/
                          $sum =0;
                          $weight = 0;
                          $transport = 0;
                          $vat = 0;
                          $comision = 0;
                          $discount =  0;


                            foreach ($invoiceinfo as $inv) {
                              $sum += ($inv['price']*$inv['quantity']);
                              $weight = $inv['weight'];
                              $transport = $inv['transport'];
                              $vat = $inv['vat'];
                              $comision = $inv['comission'];
                              $discount = $inv['discount'];
                              ?>
                              <tr>
                                <td contenteditable="true">
                                  <?=$inv['productid']?>
                                </td> 
                                <td class="text-center" contenteditable="true">
                                  <?=$inv['price']?>
                                </td>
                                <td class="text-center" contenteditable="true">
                                  <?=$inv['quantity']?>
                                </td>
                                <td class="text-right" >
                                  <?=($inv['price']*$inv['quantity'])?>
                                </td>
                                <td class="text-right">
                                    <button class="btn btn-dark">X</button>
                                </td>
                              </tr>
                        
                              <?php
                            }

                          ?>  
                                          
                       </tbody>
                                                    </table>
                                                </div>

                                                  <div class="row">
                     <!-- Use accounts sections  -->
                     <div class="col">
                        
                        
                     </div>
                     
                    
                     <div class="col">
                        <div class="form-group">
                           <label for="">Total</label>
                           <input type="text" class="form-control" id="subtotalbeforecommsion" name="subtotalbeforecommsion" value="0">
                        </div>
                        <div class="row">
                           <div class="col">
                              <div class="form-group">
                                 <label for="">Commission (%)</label>
                                 <input type="text" class="form-control" id="comision" name="comision" onblur="getcomsiondeducted()" value="<?=$comision?>">
                              </div>
                              <div class="form-group">
                                 <label for="">Discount</label>
                                 <input type="text" class="form-control" id="discount" name="discount" onblur="getpricediscounted()" value="<?=$discount?>">
                              </div>
                           </div>
                           <div class="col">
                              <div class="form-group">
                                 <label for="">Weight</label>
                                 <input type="text" class="form-control" id="weght" name="weght" onblur="getValueF()" value="<?=$weight?>">
                              </div>
                              <div class="form-group">
                                 <label for="">Transport</label>
                                 <input type="text" class="form-control" id="transport" name="transport" onblur="getValueF()" value="<?=$transport?>">
                              </div>
                              <div class="form-group">
                                 <label for="">Vat (%)</label>
                                 <input type="text" class="form-control" id="vat" name="vat" onblur="getValueF()" value="<?=$vat?>">
                              </div>
                           </div>
                        </div>
                        <div class="form-group">
                           <label for="">Grand Total</label>
                           <input type="text" class="form-control" id="grandtotalaftercommision">
                        </div>
                        
                     </div>
                      </div>
                  </div>


        <div style="padding-left:  750px;">
        
        <button type="button" onclick="savePurchaseinfo()"   class="btn btn-outline-dark">Update and Save </button>
        
                                                   
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div> <!-- end row -->

                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->
  
</div>



<?php include 'files/footer.php'; ?>
<script>
  function getcomsiondeducted(){  // when the user is using commission for deduction
    var com =  $("#comision").val();
     var totalprice =  $("#subtotalbeforecommsion").val();
     $("#grandtotalaftercommision").val(  totalprice - ((com/100)*totalprice) );
   }
  function getpricediscounted(){ // when user is using direct money to be deducted
        var com =  $("#discount").val();
     var totalprice =  $("#subtotalbeforecommsion").val();
     $("#grandtotalaftercommision").val(  totalprice - com );
    }
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


     function gettotalpric(){  // get the product price tlst after putting the quntoty and producdt price
       $("#totallprice").val(parseInt($("#quntity").val()) * parseInt($("#price").val()))
   }


 var productobj = function(sname,pname,quntity,price){ //declaring the object to design all the item in the cart 
   this.name = sname;
   //this.pcat = pcat;
   this.pname = pname;
   this.quntity = quntity;
   this.price  =  price;
   }


function ifExist(pid){  //to check the cart , whether a product is exist in the cart or not
   for(var j =0; j<purchaseitem.length; j++){
   if( purchaseitem[j].pname === pid)
     return 1;
   }
   return 0;
   }


 var  purchaseitem  = [];
 var totalsum = 0;

  //add existdatas information
  var dg = <?=json_encode($invoiceinfo);?>;
   //console.log(dg);
   for (var i = 0; i < dg.length; i++) {
       purchaseitem.push(new productobj(dg[i].customerid,dg[i].productid,dg[i].quantity,dg[i].price));
       totalsum += parseInt((dg[i].price*dg[i].quantity));
   }
   $("#subtotalbeforecommsion").val(totalsum);
   
   console.log(purchaseitem);
  function addtocart(){
   
   var cutomername = $("#cutomername").val();
   var pcategory = $("#productcat").val();
   var pname = $("#product").val();
   var quantity =  $("#quntity").val();
   var price =  $("#price").val();
   
     if (ifExist(pname)===0) {
       $("#productnameid").val(pname);
       $("#productqunatityhidden").val(quantity);
       $("#productpricehideen").val(price);
       purchaseitem.push(new productobj(cutomername,pname,quantity,price)); //pushing every item to the cart so that i can retrive and modified in the cart 
     $("#mycartlists").append('<tr> <td>'+prod[pname]+'</td> <td class="text-center">'+price+'</td>  <td class="text-center">'+quantity+'</td>    <td class="totatlbalnceshow text-right">'+price*quantity+'</td> <td class="text-right"><button class="btn btn-dark">X</button></td></tr>');
       totalsum += parseInt((price*quantity));
     $("#subtotalbeforecommsion").val(totalsum); // value gets updated everytime a new item get added to the cart
   }else {
     alert("This product is already in the cart");
   }
     
   }

   function getValueF() {
     var vat = ($("#vat").val().length !==0 )?parseInt($("#vat").val()):0;
     var transport = ($("#transport").val().length !== 0)? parseInt($("#transport").val()):0;
     var wight =  ($("#weght").val().length !== 0) ?  parseInt($("#weght").val()):0;
     var totalprice =   parseInt($("#subtotalbeforecommsion").val());
     var percent = ((vat/100)*totalprice)+totalprice;
     var sum = percent + transport + wight;
     $("#grandtotalaftercommision").val( sum );
   }


     function savePurchaseinfo(){
      
        var tex = confirm("Are you sure ?");
       if (tex ===  true) {
            $.ajax({
            url: 'ajax/addnewsellinfo.php?item='+JSON.stringify(purchaseitem)+"&allinfo="+$("#allotherinfo").serialize(),
            type: 'GET',
          
          })
          .done(function(res) {
            console.log(res);
          //  alert('res');
            alert("Product has been sold out ");
            window.location.href="sellproduct.php";
          })
          .fail(function() {
            console.log("error");
          })
          .always(function() {
            console.log("complete");
          });
       }else{
         alert("You discard the sale ");
       }
   
     
   
   
     
   
         
           //console.log(purchaseitem+"= "+$("#allinfo").serialize())
   
     }
   
</script>