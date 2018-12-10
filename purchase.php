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
      <form class="form-horizontal form-label-left" method="post" 
         name="allotherinfo" id="allotherinfo">
         <input type="hidden" name="atik">
         <div class="row">
            <div class="col">
               <div class="form-group">
                <label for="name">supplierName<span class="required">*</span></label>
                  <select class="form-control" name="suppliername" id="suppliername">
                     <option value="">Choose option</option>
                     <?=$dm->getUsersByRole(2)?>
                  </select>
               </div>
            </div>
            <div class="col"></div>
            <div class="col">
               <div class="form-group row">
                  <label for="">Bill/challan No</label>
                  <input type="text" class="form-control col-md-10" name="billchallan" id="billchallan" placeholder="click on the button" required>
                  <button type="button" id="generateinvoice" class="btn btn-outline-info col-md-2"><i class="fa fa-hashtag"></i></button>
               </div>
               <div class="form-group row">
                  
                  <label  for="name">Date of Purchase <span class="required">*</span></label>
                  <input type="text"  name="datepurchase" id="datepurchase"  class="form-control col-md-10">
               </div>
            </div>
         </div>
         <!-- product start -->
         <div class="row">
            <div class="col">
               <div class="form-group">
                  <label  for="name">Product Category<span class="required">*</span></label>
                  <select class="form-control" name="productcat" id="productcat">
                     <option value="">Choose option</option>
                     <?php $dm->getCategories();?>
                  </select>
               </div>
            </div>
            <div class="col">
               <div class="form-group">
                <label  for="name">Product<span class="required">*</span></label>
                  <select class="form-control" name="product" id="product">
                    <option value="">Select a product</option>
                  </select>
               </div>
            </div>
            <div class="col">
               <div class="form-group">
                  <label  for="name">Quantity<span class="required">*</span>
                  </label>
                  <input id="quntity" class="form-control"  name="quntity" id="quntity"  type="text">
               </div>
            </div>
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
            <div class="col">
               <button id="pushtocard" type="button" style="position: absolute;    top: 30px;" class="btn btn-outline-primary" onclick="addtocart()">Add to list <i class="fa fa-list"></i> </button>
            </div>
         </div>
         <!-- product ends -->
         <!-- table start -->
         <div class="row">
            <div class="col">
               <table class="table table-bordered">
                  <thead>
                     <tr>
                        <th>Item name</th>
                        <th>Quantity</th>
                        <th>price</th>
                        <th>Total Price</th>
                        <th>Action</th>
                     </tr>
                  </thead>
                  <tbody id="mycartlists">
                  </tbody>
               </table>
            </div>
         </div>
         <!-- table end -->
         <div class="row">
            <div class="col">
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
            <div class="col" >
               <div class="form-group">
                  <label for="">Total</label>
                  <input type="text" class="form-control" id="subtotalbeforecommsion" name="subtotalbeforecommsion" value="0" readonly>
               </div>
               <div class="row" id="calculatepart">
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
         <button class="btn btn-lg btn-outline-primary">Print Invoice <i class="fa fa-print"></i></button>
      </form>
   </div>
</div>
<?php include 'files/footer.php'; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- jquery datepicker -->
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="assets/js/productbasic.js"></script>
<script src="assets/js/product.js"></script>
<script src="assets/js/purchase.js"></script>
<script>
  $( function() {
    $( "#datepurchase" ).datepicker({
  dateFormat: "yy-mm-dd"
}).datepicker("setDate", new Date());
 });
  
  </script>
  <link href="assets/plugins/alertify/css/alertify.css" rel="stylesheet" type="text/css">
<script src="assets/plugins/alertify/js/alertify.js"></script>
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

        $("#savepurchaseinfo").on("blur",defaultModule.savePurchaseinfo);
   
         document.getElementById("productcat").addEventListener("change",(event)=>{
        if (event.target.value.length !== 0) 
        {
            
            var xyz = products();
            xyz.then((obj) =>
            {
              //console.log(obj);
              var text = "<option value=''>Select a product</option>";
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
   var incr = 0;
    function addtocart (){
   var suppliername = $("#suppliername").val();
   var pcategory = $("#productcat").val();
   var pname =     $("#product").val();
   var quantity =  $("#quntity").val();
   var price =  $("#price").val();
   if (getValue("productcat").length === 0) 
   {
    alert("Select a product")
   }
   else 
   {
         if (ifExist(pname)===0) {
          incr++;
       
       purchaseitem.push(new productobj(suppliername,pcategory,pname,quantity,price)); //pushing every item to the cart so that i can retrive and modified in the cart 
     $("#mycartlists").append('<tr id="trcontent_'+incr+'"> <td>'+prod[pname]+'</td>  <td>'+quantity+'</td>   <td>'+price+'</td> <td class="totatlbalnceshow">'+price*quantity+'</td>  <td><button type="button" data-pr="'+pname+'" data-inc="'+incr+'" class="btn btn-outline-danger" onclick="removeitem(this)">X</button></td> </tr>');
       totalsum += parseInt((price*quantity));
     $("#subtotalbeforecommsion").val(totalsum); // value gets updated everytime a new item get added to the cart
       }
       else 
       {
         alert("This product is already in the cart");
       }

   }
   
    
     
   }
     function  savePurchaseinfo(){
   
      if ($("#billchallan").val().length === 0) 
       {
            alert('Bill/challan no. is empty');
       }
       else if(getValue("suppliername").length===0)
       {
           alert('Select a suppliername');
       }
       else 
       {
   
     var tex = confirm("Are you sure ? ");
       if (tex ===  true) {
           console.log($("#allotherinfo").serialize());
            $.ajax({
            url:'ajax/add_new_purchase_info.php?item='+JSON.stringify(defaultModule.purchaseitem)+"&allotherinfo="+$("#allotherinfo").serialize(),
            type: 'GET',
          
          })
          .done(function(res) {
            console.log(res);
            alert("Product Purchase Has been done");
           // window.location.href="purchase.php";
   
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
                  sum  +=  wight;
                  sum  += valu;
                  sum  += ((vat/100)  * totalprice);
                  sum  -= ((comssion/100) * totalprice);
           }
           else if (event.target.id === "vat") 
           {
             
              
                  sum  -= disc;
                  sum  +=  wight;
                  sum  += tranport;
                  sum += ((valu/100)*totalprice);
                  sum  -= ((comssion/100) * totalprice);
           }
           $("#grandtotalaftercommision").val(sum);


     },true);
     /*remove the element as they are removed from the list*/
     function removeitem(obj) {
         var proid = obj.getAttribute("data-pr");
         var rowid = obj.getAttribute("data-inc");
         purchaseitem.splice(purchaseitem.map(el => el.pname).indexOf(proid),1);
         var element = document.getElementById('trcontent_'+rowid);
         element.style.display = 'none';
      }

      /*supplier balance calculation here*/
      var supplier = <?=json_encode($suppliersb);?>;
      document.getElementById("suppliername").addEventListener("change",function(ev){
           alertify.alert("<h3 class='font-18'>Supplier due</h3><hr><p> "+supplier[ev.target.value]+"</p>");
      });

      /*update product quantity*/
      var prodd = <?=json_encode($prod);?>;
      document.getElementById("product").addEventListener("change",function(e)
      {
        
         document.getElementById("quntity").value = prodd[e.target.value];
      });
   
</script>