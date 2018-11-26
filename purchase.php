<?php include 'files/header.php'; ?>
<?php include 'files/menu.php'; ?>


<div class="container">
   
        <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="btn-group pull-right">
                                <ol class="breadcrumb hide-phone p-0 m-0">
                                  <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                                  <li class="breadcrumb-item"><a href="#">Products</a></li>
                                  <li class="breadcrumb-item active">Products Purchase</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Product Purchase</h4>
                            
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->
                <div class="card m-b-30">
               <div class="card-body">
                <form class="form-horizontal form-label-left" method="post"  name="allotherinfo" id="allotherinfo">
   <div class="row">
      <div class="col">
         

            <div class="row">
               <div class="col">
                  <div class="form-group">
                    <input type="hidden" name="atik">
                     <label  for="name">Date of Purchase <span class="required">*</span></label>
                     <input type="date"  name="datepurchase" id="datepurchase"  class="form-control">
                  </div>
               </div>
               <div class="col">
                  <div class=" form-group">
                     <label for="name">supplierName<span class="required">*</span></label>
                     <select class="form-control" name="suppliername" id="suppliername">
                        <option>Choose option</option>
                        <?php 
                           $cat  =  $db->joinQuery("SELECT * FROM `users` WHERE `user_role`='2'")->fetchAll();
                           foreach ($cat as $cater) { ?>
                        <option value="<?=$cater['u_id']?>"><?=$cater['name']?></option>
                        <?php } ?>
                     </select>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col">
                  <div class="form-group">
                     <label  for="name">Product Category<span class="required">*</span></label>
                     <select class="form-control" name="productcat" id="productcat" onchange="getProduct()">
                        <option>Choose option</option>
                        <?php 
                           $cat  =  $db->joinQuery("SELECT * FROM `cateogory`")->fetchAll();
                           foreach ($cat as $cater) { ?>
                        <option value="<?=$cater['cat_id']?>"><?=$cater['cat_name']?></option>
                        <?php } ?>
                     </select>
                  </div>
               </div>
               <div class="col">
                  <div class="form-group">
                     <label  for="name">Product<span class="required">*</span></label>
                     <select class="form-control" name="product" id="product">
                     </select>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col">
                  <div class="form-group">
                     <label  for="name">Current Quantity <span class="required">*</span>
                     </label>
                     <input id="cuquntity" class="form-control"  name="cuquntity"  type="text">
                  </div>
               </div>
               <div class="col">
                  <div class="form-group">
                     <label  for="name">Quantity<span class="required">*</span>
                     </label>
                     <input id="quntity" class="form-control"  name="quntity" id="quntity"  type="text">
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col">
                  <div class="form-group">
                     <label  for="name">Price <span class="required">*</span>
                     </label>
                     <input id="price" class="form-control"  name="price" onblur="gettotalpric()" id="price"  type="text">
                  </div>
               </div>
               <div class="col">
                  <div class=" form-group">
                     <label  for="name">Total <span class="required">*</span>
                     </label>
                     <input id="totallprice" class="form-control"  name="totallprice" type="text">
                  </div>
               </div>
            </div>
            <div class="form-group">
               <div class="col-md-6 col-md-offset-3">
                  <button type="submit" class="btn btn-primary">Cancel</button>
                  <button id="saveusers" type="button" onclick="addtocart()" class="btn btn-success">Add to list</button>
               </div>
            </div>
      </div>
      <div class="col">
      <table class="table">
      <thead>
      <tr>
      <th>Item name</th>
      <th>Quantity</th>
      <th>price</th>
      <th>Total Price</th>
      </tr>
      </thead>
      <tbody id="mycartlists">
      </tbody>
      </table>
      </div>
   </div>
   <!-- <ul class="list-group" id="listgroup">
      </ul> -->
   <!--         <input type="hidden" name="productnameid[]" id="productnameid">
      <input type="hidden" name="productqunatityhidden[]" id="productqunatityhidden">
      <input type="hidden" name="productpricehideen[]" id="productpricehideen"> -->
   <!-- Use accounts sections  -->
   <div class="row">
   <div class="col">
   <div class="form-group">
<label for="">Bill/challan No</label>
<input type="text" class="form-control" name="billchallan" id="billchallan" placeholder="click on the button" required>
 <button type="button" onclick="gBCN()" class="btn btn-danger">Generate No</button>
</div>
 <div id="chequeoption"  style="display: none;">
    <div class="form-group">
   <label for="">Account</label>
   <select class="form-control" name="accounts" id="accounts">
   <?php    
      $accounthead = $db->selectAll("charts_accounts")->fetchAll();
      foreach ($accounthead as $ah) { ?>
   <option value="<?=$ah['charts_id']?>"><?=$ah['chart_name']?></option>
   <?php }
      ?>
   </select>
   </div>
   <div class="form-group">
   <label for="">Cheque No</label>
   <input type="text" class="form-control" name="chequeno" id="chequeno">
   </div>
   <div class="form-group">
   <label for="">Expire date</label>
   <input type="date" class="form-control" name="expredate" id="expredate">
   </div>
   <div class="form-group">
   <label for="">Amount</label>
   <input type="text" class="form-control" name="cheqamount" id="cheqamount">
   </div>
  </div>
</div>

<div class="col">
<div class="form-group" style="position: relative; top:20px; text-align: center;">
    <div class="custom-control custom-radio">
      <input type="radio" id="customRadio1" name="cashcheque" value="no" onchange="chequeoptioncheck()" class="custom-control-input" checked="">
      <label class="custom-control-label" for="customRadio1">Cash</label>
    </div>

    <div class="custom-control custom-radio">
      <input type="radio" id="customRadio2" name="cashcheque" value="yes" onchange="chequeoptioncheck()" class="custom-control-input">
      <label class="custom-control-label" for="customRadio2">Cheque</label>
    </div>
   
  </div>
   <div id="cashoption">
   <div class="form-group">
   <label for="">Paid</label>
   <input type="text" class="form-control" id="nowpayment" name="nowpayment" onblur="nowwpayment()">
   </div>
   <div class="form-group">
   <label for="">Bill Balance</label>
   <input type="text" class="form-control" name="billbalance" id="billbalance">
   </div>
   </div>
   
   </div>
   <div class="col">
   
   <div class="form-group">
   <label for="">Total</label>
   <input type="text" class="form-control" id="subtotalbeforecommsion" name="subtotalbeforecommsion" value="0">
   </div>
   <div class="row">
     <div class="col">
       <div class="form-group">
   <label for="">commission (%)</label>
   <input type="text" class="form-control" id="comision" name="comision" onblur="getcomsiondeducted()">
   </div>
   <div class="form-group">
   <label for="">Discount</label>
   <input type="text" class="form-control" id="discount" name="discount" onblur="getpricediscounted()">
   </div>
     </div>
      <div class="col">
    <div class="form-group">
<label for="">Weight</label>
<input type="text" class="form-control" id="weght" name="weght" onblur="getValueF()">
</div>
<div class="form-group">
<label for="">Transport</label>
<input type="text" class="form-control" id="transport" name="transport" onblur="getValueF()">
</div>
<div class="form-group">
<label for="">Vat (%)</label>
<input type="text" class="form-control" id="vat" name="vat" onblur="getValueF()">
</div>
  </div>
   </div>
   
  
   <div class="form-group">
   <label for="">Grand Total</label>
   <input type="text" class="form-control" id="grandtotalaftercommision">
   </div>
   </div>
 </div>
 <div class="row">

<div class="col">

  </div>

   <div class="col">
  
   </div>
 </div>
   <button type="button" class="btn btn-lg btn-primary" name="savepurchaseinfo" onclick="savePurchaseinfo()">Save</button>
   <button class="btn btn-lg btn-primary">Print Invoice</button>
   </form>
   </div>
 </div>


<?php include 'files/footer.php'; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
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
    /*alert(brnds[1]);
    alert(sizzz[1]);*/
   
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
   
   var  purchaseitem  = [];
   var totalsum = 0;
   
   function addtocart(){
   
   var suppliername = $("#suppliername").val();
   var pcategory = $("#productcat").val();
   var pname = $("#product").val();
   var quantity =  $("#quntity").val();
   var price =  $("#price").val();
   
     if (ifExist(pname)===0) {
       
       purchaseitem.push(new productobj(suppliername,pcategory,pname,quantity,price)); //pushing every item to the cart so that i can retrive and modified in the cart 
     $("#mycartlists").append('<tr> <td>'+prod[pname]+'</td>  <td>'+quantity+'</td>   <td>'+price+'</td> <td class="totatlbalnceshow">'+price*quantity+'</td> </tr>');
       totalsum += parseInt((price*quantity));
     $("#subtotalbeforecommsion").val(totalsum); // value gets updated everytime a new item get added to the cart
   }else {
     alert("This product is already in the cart");
   }
     
   }
   
   var productobj = function(sname,pcat,pname,quntity,price){ //declaring the object to design all the item in the cart 
   this.name = sname;
   this.pcat = pcat;
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
   
   
   
   
   function gettotalpric(){  // get the product price tlst after putting the quntoty and producdt price
       $("#totallprice").val(parseInt($("#quntity").val()) * parseInt($("#price").val()))
   }
   
   
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
   
   
   
     function nowwpayment(){   //billl payment after calculating the total
         $("#billbalance").val( $("#grandtotalaftercommision").val() - $("#nowpayment").val() )
     }
   
   
   
   
   
   
     function savePurchaseinfo(){

      if ($("#billchallan").val().length === 0) {
            alert('Bill/challan no is empty');
       }else {
   
     var tex = confirm("Are you sure ? ");
       if (tex ===  true) {
            $.ajax({
            url:'ajax/add_new_purchase_info.php?item='+JSON.stringify(purchaseitem)+"&allotherinfo="+$("#allotherinfo").serialize(),
            type: 'GET',
          
          })
          .done(function(res) {
            console.log(res);
            window.location.href="purchase.php";
   
          })
          .fail(function() {
            console.log("error");
          })
          .always(function() {
            console.log("complete");
          });
       }else{
         alert("You discard the purchase ");
       }

     }
   
         
           //console.log(purchaseitem+"= "+$("#allinfo").serialize())
   
     }
   

   // check the radio button to show the cheque payment method
      function chequeoptioncheck(){
        var divid  = document.getElementById('chequeoption');
       var radio  =  document.getElementById('customRadio2');
       var cashoption = document.getElementById('cashoption');
        if (radio.checked === true){
          divid.style.display = 'inline-block';

          cashoption.style.display  = 'none';
          
        }else {
          divid.style.display = 'none';
           cashoption.style.display  = 'inline-block';
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
   
   
   
   
   
    function gBCN() {
     var d =  new Date();
    $("#billchallan").val(d.getFullYear()+""+ parseInt(d.getMonth()+1)+""+d.getDate()+""+d.getHours() +""+d.getMinutes()+""+d.getSeconds());
   }
   
   
   
   
   
   
</script>