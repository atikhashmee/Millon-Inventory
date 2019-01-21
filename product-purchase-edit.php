<?php include 'files/header.php'; ?>
<?php include 'files/menu.php';

   $salehistory = $db->joinQuery('SELECT DISTINCT `billchallan`, `purchasedate`, `payment_taka`,  `purchaseentryby`,`supplier`,`token` FROM `purchase` WHERE `billchallan`="'.$_GET['invo'].'"')->fetch(PDO::FETCH_ASSOC);
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
                          <form method="post" id="allotherinfo">
                            <input type="hidden" name="atik">
                          <div class="form-group">
                            <input type="text" class="form-control" name="billchallan" value="<?=$salehistory['billchallan']?>" readonly>

                        </div>
                           <div class="form-group">
                            <select class="form-control" name="suppliername" id="suppliername">
                              <option value="<?=$salehistory['supplier']?>">Select a supplier</option>
                              <?=$dm->getUsersByRole(2)?>
                           </select>
                        </div>
                        <div class="form-group">
                            <input type="date" class="form-control" name="datepurchase" value="<?=$salehistory['purchasedate']?>">
                        </div>
                      </div>
                        <div class="col-6 text-right">
                           <address>
                              <strong>Shipment Details:</strong>
                              <br>
                              Invoice No: <?=$salehistory['billchallan']?><br>
                              Sale Date :  <?=date("Y-M-d",strtotime($salehistory['purchasedate']))?> </br>
                              Supplier Name :  <?=$fn->getUserName($salehistory['supplier'])?>
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
                                 <select class="form-control" name="product" id="product" >
                                 </select>
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
                                 <label  for="name">Price <span class="required">*</span></label>
                                 <input id="price" class="form-control"  name="price"  onblur="gettotalpric()"  type="text">
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
                                       $invoiceinfo = $db->selectAll('purchase','`billchallan`= "'.$_GET['invo'].'"')->fetchAll();
                                       /*echo "<pre>";
                                       print_r($invoiceinfo);
                                       echo "</pre>";*/
                                       $sum =0;
                                       $weight = 0;
                                       $transport = 0;
                                       $vat = 0;
                                       $comision = 0;
                                       $discount =  0;
                                       
                                       $i=0;
                                         foreach ($invoiceinfo as $inv) { $i++;
                                           $sum += ($inv['price']*$inv['quantity']);
                                           $weight = $inv['weight'];
                                           $transport = $inv['transport'];
                                           $vat = $inv['vat'];
                                           $comision = $inv['comission'];
                                           $discount = $inv['discount'];
                                           ?>
                                    <tr id="trcontent_<?=$i?>">
                                       <td contenteditable="true">
                                          <?=$fn->getProductName($inv['productid'])?>
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
                                          <button type="button" data-pr="<?=$inv['productid']?>" data-inc="<?=$i?>" onclick="removeitem(this)" class="btn btn-outline-danger">X</button>
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
                    <?php 
                                $divstyle = "display: none;";
                                $bankname = "";
                                $accountnum = "";
                                $expiredate = "";
                                $amount  ="";
                                $cascheque = "false";
                                $quantity = 0;
                         if (trim($salehistory['token']) == "p_Cheque" ) 
                         {
                                  $cascheque ="true";
                                   $divstyle = "display: inline-block;"; 
                                   $cheque = $db->selectAll('cheque','parent_table_id="p_'.$_GET['invo'].'"');
                                   $chequeval  = $cheque->fetch(PDO::FETCH_ASSOC);

                                    $quantity = $cheque->rowCount();
                                   $bankname = $chequeval['bankname'];
                                   $accountnum = $chequeval['accountno'];
                                   $expiredate = $chequeval['expiredate'];
                                   $amount = $chequeval['amount'];


                          }
                                ?>
               <div id="chequeoption"  style="<?=$divstyle?>">
                  <?php 
                            if ($quantity<=0) {
                              echo "<small style='color:red'>(No bank Information found)</small>";
                            }
                          ?>
                  <div class="form-group">
                     <label for="">Chose Account</label>
                     <select class="form-control" name="accounts" id="accounts"  >
                      <option value="<?=$bankname?>"><?=$fn->Chartsaccounta($bankname)?></option>
                        <?php    
                           $accounthead = $db->selectAll("charts_accounts","chart_name != 'Cash'")->fetchAll();
                           foreach ($accounthead as $ah) { ?>
                        <option value="<?=$ah['charts_id']?>"><?=$ah['chart_name']?></option>
                        <?php }
                           ?>
                     </select>
                  </div>
                  <div class="form-group">
                     <label for="">Cheque No</label>
                     <input type="text" class="form-control" name="chequeno" id="chequeno" value="<?=$accountnum?>">
                  </div>
                  <div class="form-group">
                     <label for="">Expire date</label>
                     <input type="date" class="form-control" name="expredate" id="expredate" value="<?=$expiredate?>">
                  </div>
                  <div class="form-group">
                     <label for="">Amount</label>
                     <input type="text" class="form-control" name="cheqamount" id="cheqamount" value="<?=$amount?>">
                  </div>
               </div>
            </div>
            <div class="col">
               <div class="form-group" style="position: relative; top:20px; text-align: center;">
                  <div class="custom-control custom-radio">
                     <input type="radio" id="customRadio1" name="cashcheque" value="no" class="custom-control-input" onchange="chequeoptioncheck()" <?=($cascheque=="true")?"":"checked"?>  >
                     <label class="custom-control-label" for="customRadio1">Cash</label>
                  </div>
                  <div class="custom-control custom-radio">
                     <input type="radio" id="customRadio2" name="cashcheque" value="yes" class="custom-control-input" onchange="chequeoptioncheck()" <?=($cascheque=="true")?"checked":""?>>
                     <label class="custom-control-label" for="customRadio2">Cheque</label>
                  </div>
               </div>
               <div id="cashoption">
                  <div class="form-group">
                     <label for="">Paid</label>
                     <input type="text" class="form-control" id="nowpayment" name="nowpayment" value="<?=$salehistory['payment_taka']?>">
                  </div>
                  <div class="form-group">
                     <label for="">Bill Balance</label>
                     <input type="text" class="form-control" name="billbalance" id="billbalance">
                  </div>
               </div>
            </div>
                              
                              
                                 
                                
                                 <div class="col">
                                   <input type="hidden" name="sellby" value="<?=$salehistory['purchaseentryby']?>">
                                 
                                    <div class="form-group">
                                       <label for="">Total</label>
                                       <input type="text" class="form-control" id="subtotalbeforecommsion" name="subtotalbeforecommsion" value="0">
                                    </div>
                                    <div class="row" id="calculatepart">
                                       <div class="col">
                                          <div class="form-group">
                                             <label for="">Commission (%)</label>
                                             <input type="text" class="form-control" id="comision" name="comision" value="<?=$comision?>">
                                          </div>
                                          <div class="form-group">
                                             <label for="">Discount</label>
                                             <input type="text" class="form-control" id="discount" name="discount"  value="<?=$discount?>">
                                          </div>
                                       </div>
                                       <div class="col">
                                          <div class="form-group">
                                             <label for="">Weight</label>
                                             <input type="text" class="form-control" id="weght" name="weght" value="<?=$weight?>">
                                          </div>
                                          <div class="form-group">
                                             <label for="">Transport</label>
                                             <input type="text" class="form-control" id="transport" name="transport"  value="<?=$transport?>">
                                          </div>
                                          <div class="form-group">
                                             <label for="">Vat (%)</label>
                                             <input type="text" class="form-control" id="vat" name="vat" value="<?=$vat?>">
                                          </div>
                                       </div>
                                    </div>
                                    <div class="form-group">
                                       <label for="">Grand Total</label>
                                       <input type="text" class="form-control" id="grandtotalaftercommision">
                                    </div>
                                    <button type="button" onclick="savePurchaseinfo()"   class="btn btn-outline-primary">Update and Save <i class="fa fa-floppy-o"></i> </button>
                                 </div>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <!-- end row -->
         </div>
      </div>
   </div>
   <!-- end col -->
</div>
<!-- end row -->
</div>
<?php include 'files/footer.php'; ?>
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
    var text = "<option value=''>Select Product</option>";
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
        $("#totallprice").val( ( parseInt($("#quntity").val()) || 1 ) * (parseInt($("#price").val()) ||1 ));
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
      return j;
    }
    return 0;
    }
   
   
   var  purchaseitem  = [];
   var totalsum = 0;
   
   //add existdatas information
   var dg = <?=json_encode($invoiceinfo);?>;
    //console.log(dg);
    var i;
    for ( i=0; i < dg.length; i++) {
        purchaseitem.push(new productobj(dg[i].customerid,dg[i].productid,dg[i].quantity,dg[i].price));
        totalsum += parseInt((dg[i].price*dg[i].quantity));
    }
    $("#subtotalbeforecommsion").val(totalsum);
    
    console.log(purchaseitem);
    var incr = i;


   function addtocart(){
    incr++;
    var cutomername = $("#suppliername").val();
    var pcategory = $("#productcat").val();
    var pname = $("#product").val();
    var quantity =  $("#quntity").val();
    var price =  $("#price").val();

    if ( getValue("product").length == 0) 
   {
    msg("Select a product",'al');
   }
   else 
   {
    
      if (ifExist(pname)===0) {
        $("#productnameid").val(pname);
        $("#productqunatityhidden").val(quantity);
        $("#productpricehideen").val(price);
        purchaseitem.push(new productobj(cutomername,pname,quantity,price)); //pushing every item to the cart so that i can retrive and modified in the cart 
      $("#mycartlists").append('<tr id="trcontent_'+incr+'"> <td>'+prod[pname]+'</td> <td class="text-center">'+price+'</td>  <td class="text-center">'+quantity+'</td>    <td class="totatlbalnceshow text-right">'+price*quantity+'</td> <td class="text-right"><button type="button" data-pr="'+pname+'" data-inc="'+incr+'" onclick="removeitem(this)" class="btn btn-outline-danger">X</button></td></tr>');
        totalsum += parseInt((price*quantity));
      $("#subtotalbeforecommsion").val(totalsum); // value gets updated everytime a new item get added to the cart
    }else {
      msg("This product is already in the cart",'al');
    }
  }
      
    }
   
    
   
   
      function savePurchaseinfo()
      {
        alertify.confirm("Are you sure?",function(ev){
          ev.preventDefault();

           /* console.log(JSON.stringify(purchaseitem));
            console.log($("#allotherinfo").serialize());*/


          $.ajax({
             url:'ajax/add_new_purchase_info.php?item='+JSON.stringify(purchaseitem)+"&allotherinfo="+$("#allotherinfo").serialize()+'&editdata=true',
             type: 'GET',
             dataType:'json'
           
           })
           .done(function(res) 
           {
             console.log(res);
           // var res = JSON.parse(res);
             res.forEach(function(item)
            { 
              
               if (Object.keys(item)[0]  === "success") 
               {
                  msg(Object.values(item)[0],'su',1);
                  //window.location.reload();
               }
               else if (Object.keys(item)[0] === "err") 
               {
                  msg(Object.values(item)[0],'err',1);

               }
               else if (Object.keys(item)[0]  === "check") 
               {
                  msg(Object.values(item)[0],'su',1);
                  //window.location.reload();
               }
            });
           })
           .fail(function() {
             console.log("error");
           })
           .always(function() {
             console.log("complete");
           });
        },function(ev){
          ev.preventDefault();
          msg("You've canceled it",'err');
        })
       
         
    
      
    
    
      
    
          
            //console.log(purchaseitem+"= "+$("#allinfo").serialize())
    
      }


   
   
      function removeitem(obj) {
         var proid = obj.getAttribute("data-pr");
         var rowid = obj.getAttribute("data-inc");

            if (purchaseitem.length !== 1) 
            {
              var index = ifExist(proid);
              purchaseitem.splice(index,1);
              var element = document.getElementById('trcontent_'+rowid);
              element.style.display = 'none';
            }
            else 
            {
              alert("Sorry !! You can't empty the list");
            }
            
            console.log(purchaseitem);
            
            //alert(index);
      }


         function getValue(id) {
      return document.getElementById(id).value;
    }
     

     
     document.getElementById("calculatepart").addEventListener("blur",event=>{
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
                  sum  += ((valu/100)*totalprice);
                  sum  -= ((comssion/100) * totalprice);
           }
           $("#grandtotalaftercommision").val(sum);


     },true);


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
   
     
    
</script>