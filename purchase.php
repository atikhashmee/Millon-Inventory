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
                        <?=$dm->getUsersByRole(2)?>
                     </select>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col">
                  <div class="form-group">
                     <label  for="name">Product Category<span class="required">*</span></label>
                     <select class="form-control" name="productcat" id="productcat">
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
                 <input id="price" class="form-control"  name="price"  type="text">
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
                  <button type="submit" class="btn btn-outline-danger">Cancel</button>
                  <button id="pushtocard" type="button" class="btn btn-outline-primary">Add to list</button>
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
 <button type="button" id="generateinvoice" class="btn btn-outline-info"><i class="fa fa-hashtag"></i></button>
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
      <input type="radio" id="customRadio1" name="cashcheque" value="no"  class="custom-control-input" checked="">
      <label class="custom-control-label" for="customRadio1">Cash</label>
    </div>

    <div class="custom-control custom-radio">
      <input type="radio" id="customRadio2" name="cashcheque" value="yes" class="custom-control-input">
      <label class="custom-control-label" for="customRadio2">Cheque</label>
    </div>
   
  </div>
   <div id="cashoption">
   <div class="form-group">
   <label for="">Paid</label>
   <input type="text" class="form-control" id="nowpayment" name="nowpayment">
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
   <input type="text" class="form-control" id="comision" name="comision">
   </div>
   <div class="form-group">
   <label for="">Discount</label>
   <input type="text" class="form-control" id="discount" name="discount">
   </div>
     </div>
      <div class="col">
    <div class="form-group">
<label for="">Weight</label>
<input type="text" class="form-control" id="weght" name="weght">
</div>
<div class="form-group">
<label for="">Transport</label>
<input type="text" class="form-control" id="transport" name="transport">
</div>
<div class="form-group">
<label for="">Vat (%)</label>
<input type="text" class="form-control" id="vat" name="vat">
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
   <button type="button" class="btn btn-lg btn-outline-primary" id="savepurchaseinfo" name="savepurchaseinfo">Save <i class="fa fa-floppy-o"></i></button>
   <button class="btn btn-lg btn-primary">Print Invoice</button>
   </form>
   </div>
 </div>


<?php include 'files/footer.php'; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="assets/js/productbasic.js"></script>
<script src="assets/js/product.js"></script>
<script src="assets/js/purchase.js"></script>
<script type="text/javascript">
   
   var brnds = <?php echo  json_encode($dm->getBrandListByIds());?>;
   var sizzz = <?php echo  json_encode($dm->getSizeListByIds());?>;
   var prod =  <?php echo  json_encode($dm->getProListByIds());?>;

   /*console.log(prod);*/
    /*alert(brnds[1]);
    alert(sizzz[1]);*/
      new DefaultModule(brnds,sizzz,prod);
     console.log(defaultModule.getBrands());
       $("input[name^='cashcheque'").on("change",defaultModule.cashCheckVariation);



       //$("#productcat").on("change",defaultModule.getProduct);

       $("#price").on("blur",defaultModule.gettotalpric);

       $("#generateinvoice").on("click",defaultModule.gBCN);

       $("#nowpayment").on("blur",defaultModule.nowwpayment);

       $("#comision").on("blur",defaultModule.getcomsiondeducted);

       $("#discount").on("blur",defaultModule.getpricediscounted);
   
        $("#pushtocard").on("click",addtocart);

        $("#weght").on("blur",defaultModule.getValueF);
        $("#transport").on("blur",defaultModule.getValueF);
        $("#vat").on("blur",defaultModule.getValueF);



        $("#savepurchaseinfo").on("blur",defaultModule.savePurchaseinfo);

         document.getElementById("productcat").addEventListener("change",(event)=>{
        if (event.target.value.length !== 0) 
        {
            
            var xyz = products();
            xyz.then((obj) =>
            {
              console.log(obj);
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


   
         var  purchaseitem  = [];
            var totalsum = 0;

    function ifExist (pid){  //to check the cart , whether a product is exist in the cart or not
   for(var j =0; j<purchaseitem.length; j++){
   if( purchaseitem[j].pname === pid)
     return 1;
   }
   return 0;
   }

    function addtocart (){
   
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
     function  savePurchaseinfo(){

      if ($("#billchallan").val().length === 0) {
            alert('Bill/challan no. is empty');
       }else {
   
     var tex = confirm("Are you sure ? ");
       if (tex ===  true) {
            $.ajax({
            url:'ajax/add_new_purchase_info.php?item='+JSON.stringify(defaultModule.purchaseitem)+"&allotherinfo="+$("#allotherinfo").serialize(),
            type: 'GET',
          
          })
          .done(function(res) {
            console.log(res);
            alert("Product Purchase Has been done");
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


   


  
   

   
</script>