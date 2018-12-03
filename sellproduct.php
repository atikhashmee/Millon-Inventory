<?php include 'files/header.php'; ?>
<?php include 'files/menu.php';

$rbas->setPageName(3)->run();
   

 ?>
<link href='https://fonts.googleapis.com/css?family=Trykker' rel='stylesheet'>
<style>
body {
    font-family: 'Trykker';
}
</style>
<div class="container">
   <div class="row">
      <div class="col-sm-12">
         <div class="page-title-box">
            <div class="btn-group pull-right">
               <ol class="breadcrumb hide-phone p-0 m-0">
                  <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                  <li class="breadcrumb-item"><a href="#">Products</a></li>
                  <li class="breadcrumb-item active">Products sale</li>
               </ol>
            </div>
            <h4 class="page-title">Product Sale</h4>
         </div>
      </div>
   </div>
   <!-- end page title end breadcrumb -->
   <div class="row">
      <div class="col">
         <form class="form-horizontal form-label-left" method="post"  name="allotherinfo" id="allotherinfo">
            <div class="card m-b-30">
               <div class="card-body">
                  <div class="row">
                     <div class="col">
                              <div class="form-group">
                                 <label for="name">Sell by<span class="required">*</span></label>
                              <select class="form-control" name="sellby" id="sellby">
                                    <option>Choose option</option>
                                    <?=$dm->getUsersByRole(4)?>
                                 </select>
                              </div>
                              <div class="form-group">
                                 <label  for="name">Customer Name<span class="required">*</span>
                                 </label>
                                 <select class="form-control" name="cutomername" id="cutomername" onchange="checkTheCurrenDue()">
                                    <option value="">Choose option</option>
                                    <?=$dm->getUsersByRole(1)?>
                                 </select>
                              </div>
                     </div>
                     <div class="col"></div>
                     <div class="col">
                        <div class="form-group row">
                           <label for="">Bill/challan No</label>
                       <input type="text" class="form-control col-md-10" name="billchallan" id="billchallan" placeholder="click on the button" required>
                           <button type="button" onclick="gBCN()" class="btn btn-outline-info col-md-2"><i class="fa fa-hashtag"></i></button>
                        </div>
                         
                              <input type="hidden" id="atik" name="atik" class="form-control">
                              <div class="form-group row">
                              <label for="name">Date of Sell <span class="required">*</span></label>
                                 <input type="text" id="datesell" name="datesell" class="form-control col-md-10">
                              </div>
                           
                        <!-- <ul class="list-group" id="listgroup">
                           </ul> -->
                        <!--         <input type="hidden" name="productnameid[]" id="productnameid">
                           <input type="hidden" name="productqunatityhidden[]" id="productqunatityhidden">
                           <input type="hidden" name="productpricehideen[]" id="productpricehideen"> -->
                       
                     </div>
                  </div>

                  <!-- start product info -->
                  <div class="row">
                           <div class="col">
                              <div class=" form-group">
                                 <label  for="name">Product Category<span class="required">*</span> </label>
                                 <select class="form-control" name="productcat" id="productcat" onchange="getProduct()">
                                    <option value="">Choose option</option>
                                        <?php $dm->getCategories();?>
                                 </select>
                              </div>
                           </div>

                            <div class="col">
                              <div class="form-group">
                                 <label  for="name">Product<span class="required">*</span>
                                 </label>
                                 <select class="form-control" name="product" id="product">
                                 </select>
                              </div>
                           </div>

                           <div class="col">
                              <div class="form-group">
                                 <label  for="name">Quantity<span class="required">*</span> </label>
                                 <input id="quntity" class="form-control"  name="quntity" id="quntity"  type="text">
                              </div>
                           </div>

                           <div class="col">
                              <div class="form-group">
                                 <label  for="name">Price <span class="required">*</span></label>
                                 <input id="price" class="form-control"  name="price" onblur="gettotalpric()" id="price"  type="text">
                              </div>
                           </div>

                           <div class="col">
                              <div class="form-group">
                                 <label for="name">Total <span class="required">*</span>
                                 </label>
                                 <input id="totallprice" class="form-control"  name="totallprice" type="text">
                              </div>
                           </div>

                           <div class="col">
                               <button id="saveusers" style="position: absolute;    top: 30px;" type="button" onclick="addtocart()" class="btn btn-outline-primary">Add to list <i class="fa fa-list"></i> </button>
                           </div>


                  </div>
                  <!-- end product info -->

                  <!-- start table list -->
                  <div class="row">
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
                           <tbody id="mycartlists"></tbody>
                        </table>
                     </div>
                  </div>
                  <!-- end table list -->
                  <div class="row">
                     <!-- Use accounts sections  -->
                     <div class="col">
                        
                        <div id="chequeoption"  style="display: none;">
                           <div class="form-group">
                              <label for="">Cheque No</label>
                              <input type="text" class="form-control" name="chequeno" id="chequeno">
                           </div>
                           <div class="form-group">
                              <label for="">Account</label>
                              <select class="form-control" name="accounts" id="accounts">
                                 <!-- <?php    
                                    $accounthead = $db->selectAll("charts_accounts")->fetchAll();
                                    foreach ($accounthead as $ah) { ?>
                                    <option value="<?=$ah['charts_id']?>"><?=$ah['chart_name']?></option>
                                    <?php }
                                       ?> -->
                                 <option value="">Select a bank</option>
                                 <option>AB Bank Limited</option>
                                 <option>Agrani Bank Limited</option>
                                 <option>Al-Arafah Islami Bank Limited</option>
                                 <option>Bangladesh Commerce Bank Limited</option>
                                 <option>Bangladesh Development Bank Limited</option>
                                 <option>Bangladesh Krishi Bank</option>
                                 <option>Bank Al-Falah Limited</option>
                                 <option>Bank Asia Limited</option>
                                 <option>BASIC Bank Limited</option>
                                 <option>BRAC Bank Limited</option>
                                 <option>Citibank N.A</option>
                                 <option>Commercial Bank of Ceylon Limited</option>
                              </select>
                           </div>
                           <div class="form-group">
                              <label for="">Amount</label>
                              <input type="text" class="form-control" id="chequeamount" name="chequeamount" value="0">
                           </div>
                           <div class="form-group">
                              <label for="">Expire date</label>
                              <input type="date" class="form-control" name="expredate" id="expredate">
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
                              <label for="">Due Balance</label>
                              <input type="text" class="form-control" name="billbalance" id="billbalance">
                           </div>
                        </div>
                     </div>
                     <div class="col">
                        <div class="form-group">
                           <label for="">Total</label>
                           <input type="text" class="form-control" id="subtotalbeforecommsion" name="subtotalbeforecommsion" value="0">
                        </div>
                        <div class="row" id="calculatepart">
                           <div class="col">
                              <div class="form-group">
                                 <label for="">Commission (%)</label>
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
                        <button type="button" class="btn btn-lg btn-outline-primary" name="savepurchaseinfo" onclick="savePurchaseinfo()">Save <i class="fa fa-floppy-o"></i> </button>
            <button class="btn btn-lg btn-outline-primary">Print Invoice <i class="fa fa-print"></i></button>
                     </div>
                  </div>
               </div>
            </div>
         </form>
      </div>
   </div>
</div>
<?php include 'files/footer.php'; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- jquery datepicker -->
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
  $( function() {
    $( "#datesell" ).datepicker({
  dateFormat: "yy-mm-dd"
}).datepicker("setDate", new Date());
 });
  
  </script>
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
    /*console.log("All the product list"+sizzz);
    console.log("All the product list"+prod);*/
   
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
   var cutomername =  $("#cutomername").val();
   var pcategory   =  $("#productcat").val();
   var pname       =  $("#product").val();
   var quantity    =  $("#quntity").val();
   var price       =  $("#price").val();

   if (getValue("productcat").length === 0) 
   {
      alert("select a product ");
   }
   else 
   {
      if (ifExist(pname)===0) {
       $("#productnameid").val(pname);
       $("#productqunatityhidden").val(quantity);
       $("#productpricehideen").val(price);
       purchaseitem.push(new productobj(cutomername,pcategory,pname,quantity,price)); //pushing every item to the cart so that i can retrive and modified in the cart 
     $("#mycartlists").append('<tr> <td>'+prod[pname]+'</td>  <td>'+quantity+'</td>   <td>'+price+'</td> <td class="totatlbalnceshow">'+price*quantity+'</td> </tr>');
       totalsum += parseInt((price*quantity));
     $("#subtotalbeforecommsion").val(totalsum); // value gets updated everytime a new item get added to the cart
   }else {
     alert("This product is already in the cart");
   }

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
   
   
  
   
   
   
     function nowwpayment(){   //billl payment after calculating the total
         $("#billbalance").val( $("#grandtotalaftercommision").val() - $("#nowpayment").val() )
     }
   
   
   
   
   
   
     function savePurchaseinfo(){
   
       if ($("#billchallan").val().length === 0) {
            alert('Bill/challan no is empty');
       }
       else if (getValue("cutomername").length === 0) 
       {
           alert("Select a customer");
       }
       else 
       {
   
        var tex = confirm("Are you sure ? ");
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
         alert("You discard the purchase ");
       }
   
       }
   
   
   
     
   
         
           //console.log(purchaseitem+"= "+$("#allinfo").serialize())
   
     }
   
   
   
   
     // check the ccustomer due 
   
     function checkTheCurrenDue(){
       var cusid  =  document.getElementById('cutomername').value;
   
           $.ajax({
             url: 'ajax/checkcurrentdue.php?custom_id='+cusid,
             type: 'POST',
            
           })
           .done(function(res) {
             document.getElementById('cuduemoney').value = res;
             console.log("success");
           })
           .fail(function() {
             console.log("error");
           })
           .always(function() {
             console.log("complete");
           });
           
   
   
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
   

   
   function gBCN() {
     var d =  new Date();
   $("#billchallan").val(d.getFullYear()+""+ parseInt(d.getMonth()+1)+""+d.getDate()+""+d.getHours() +""+d.getMinutes()+""+d.getSeconds());
   }
   
   
     function getValue(id) {
      return document.getElementById(id).value;
    }
   document.getElementById("calculatepart").addEventListener("keyup",event=>{
          var totalprice =  parseFloat(getValue("subtotalbeforecommsion"));
          var sum = totalprice;
         
          var valu        = parseFloat(event.target.value) || 0;
             var disc     = parseFloat(getValue("discount"))  || 0,
                 wight    = parseFloat(getValue("weght"))  || 0,
                 tranport = parseFloat(getValue("transport"))  || 0,
                    vat   = parseFloat(getValue("vat"))  || 0,
                 comssion = parseFloat(getValue("comision"))  || 0;

          if (event.target.id === "comision")
           {      sum  -=  disc;
                  sum  +=  wight;
                  sum  +=  tranport;
                  sum  += ((vat/100)  * totalprice);
                  sum  -= ((valu/100) * totalprice);
           }
           else if (event.target.id === "discount")
           {
                  sum  -= valu;
                  sum  +=  wight;
                  sum  +=  tranport;
                  sum  += ((vat/100)  * totalprice);
                  sum  -= ((comssion/100) * totalprice);
           }
           else if (event.target.id === "weght") 
           {
                
                  sum  -= disc;
                  sum  +=  valu;
                  sum  +=  tranport;
                  sum  += ((vat/100)  * totalprice);
                  sum  -= ((comssion/100) * totalprice);
           }
           else if (event.target.id === "transport") 
           {
             

                  sum  -= disc;
                  sum  += wight;
                  sum  += valu;
                  sum  += ((vat/100)  * totalprice);
                  sum  -= ((comssion/100) * totalprice);
           }
           else if (event.target.id === "vat") 
           {
             
              
                  sum  -= disc;
                  sum  +=  wight;
                  sum  += tranport;
                  sum  += ((valu/100)*totalprice);
                  sum  -= ((comssion/100) * totalprice);
           }
           $("#grandtotalaftercommision").val(sum);

     },true);


   
</script>