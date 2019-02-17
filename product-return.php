<?php include 'files/header.php'; ?>
<?php include 'files/menu.php'; ?>

<style type="text/css">
    @import url('https://fonts.googleapis.com/css?family=PT+Serif');
   .product-return{
    font-family: 'PT Serif', serif;
   }
   address{
    line-height: 2px;
   }
</style>

<?php

     
        $elements = null;
        

        if (isset($_GET['isEnabled']) && $_GET['isEnabled'] == true)
        {

            if ($_GET['token'] == "purchase") {
                   $sql ="SELECT * FROM `purchase` WHERE `billchallan`='".$_GET['invoice']."'";
            }else if ($_GET['token'] == "sell") {
                 $sql ="SELECT * FROM `sell` WHERE `billchallan`='".$_GET['invoice']."'";
            }
                  
            $elements = $db->joinQuery($sql)->fetchAll();
            /*echo "<pre>";
             print_r($elements);
            echo "</pre>";*/
        }
        else
        {
            echo "You have not proper URL Redirected";
        }

        function getReturnedQ($bill,$proid)
      {
          $sql = "";
          if ($_GET['token']=="sell") 
          {
              $sql = "SELECT SUM(`quntity`) as alltoal  FROM `sell_return` WHERE `memono`='{$bill}' AND `productid`='{$proid}'";
          }
          else if ($_GET['token'] == "purchase")
          {
            $sql = "SELECT sum(`quntity`) as alltoal FROM `purchase_return` WHERE `memono` ='{$bill}' AND `productid` ='{$proid}'";
          }
        
        
        $selreturn = $GLOBALS['db']->joinQuery($sql)->fetch(PDO::FETCH_ASSOC);

        return $selreturn['alltoal'];
      }

 ?>
<div class="container">
    <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="btn-group pull-right">
                                <ol class="breadcrumb hide-phone p-0 m-0">
                                  <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                                  <li class="breadcrumb-item"><a href="#">Products</a></li>
                              <li class="breadcrumb-item active">Purchase Return</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Purchase Return</h4>
                            
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->
   <div class="row">
      <div class="col">
         <form class="form-horizontal form-label-left" method="post" name="allotherinfo" id="allotherinfo">
          <div class="card m-b-30">
               <div class="card-body">

                 <div class="row">
                 <div class="col">
                   <?php 

            if ($elements != null) { 

                   $date = "";
                   $invoice = "";
                   $vendorname = "";
                   $weight = "";
                   $transfort = "";

                    if ($_GET['token'] == "purchase") 
                        {
                             $date = $elements[0]['purchasedate'];
                             $invoice = $elements[0]['billchallan'];
                             $vendorname = $elements[0]['supplier'];
                             $weight = $elements[0]['weight'];
                             $transfort = $elements[0]['transport'];
                        }
                        else if ($_GET['token'] == "sell") {
                             $date = $elements[0]['selldate'];
                             $invoice = $elements[0]['billchallan'];
                             $vendorname = $elements[0]['customerid'];
                             $weight = $elements[0]['weight'];
                             $transfort = $elements[0]['transport'];
                        }
                      }

             ?>
                  <address>
                  <p> <strong> Order Date :  </strong> <?=$date?>  </p>
                  <p> <strong> Invoice No :  </strong> <?=$invoice?> </p>
                  <p> <strong> Vendor Name : </strong> <?=$vendorname?> </p>
                      </address>
                 </div>
              </div>
            
            <div class="row">
               <table class="table">
                  <thead>
                     <tr>
                        <th>#</th>
                        <th>Item name</th>
                        <th>Quantity</th>
                        <th>price</th>
                        <th>Amount</th>
                        <th>Actions</th>
                     </tr>
                  </thead>
                  <tbody>
                             <?php 
                             $i = 0;
                             $sum = 0;
                                 foreach ($elements as $ele) 
                                 {
                                  $i++;
                                  $sum += (int) ($ele['quantity']*$ele['price']);
                                    ?>
                                    <tr>
                                      <td scope="row"><?=$i?></td>
                                      <td id="proname_<?=$i?>"><?=$ele['productid']?></td>
                                      <td id="quntity_<?=$i?>"><?=$ele['quantity']-getReturnedQ($invoice,$ele['productid'])?> </td>
                                      <td id="price_<?=$i?>"><?=$ele['price']?></td>
                                      <td id="total_<?=$i?>"><?=($ele['quantity']*$ele['price'])?></td>
                                      <td>
                                <button type="button" class="btn btn-outline-secondary editbutton" onclick="dataedit(<?=$i?>)" id="<?=$i?>">Edit</button>
                                      </td>
                                      
                                   </tr>
                                    <?php
                                 }
                             ?>
                          </tbody>
                  <!-- <tbody id="datalist">
                  </tbody> -->
               </table>
            </div>
            <div class="row">
               <div class="col-md-6">
         <form class="form">
         <div class="form-group">
         <label for="">Product Name</label>
         <input type="hidden" name="memonofordbs" id="memonofordbs">
         <input type="text" class="form-control" id="productn" readonly>
         </div>
          <div class="row">
              <div class="col">
                <div class="form-group">
            <label for="">Total Quantity</label>
            <input type="text" class="form-control" id="totalquantity" readonly>
            </div>
              </div>
              <div class="col">
                <div class="form-group">
            <label for="">Total Amount</label>
            <input type="hidden" id="singleamount">
            <input type="text" class="form-control" id="Totalamount" readonly>
            </div>
              </div>
            </div>
          <div class="row">
              <div class="col">
                <div class="form-group">
            <label for="">Return Quantity</label>
            <input type="text" class="form-control" id="productq" onblur="updatetherate()">
            </div>
              </div>
              <div class="col">
                <div class="form-group">
            <label for="">Returned Amount</label>
            <input type="text" class="form-control" id="returnedamount" readonly>
            </div>
              </div>
            </div>
             <div class="row">
              <div class="col">
                <div class="form-group">
            <label for="">Update Quantity</label>
            <input type="text" class="form-control" id="updatequantity" readonly>
            </div>
              </div>
              <div class="col">
                <div class="form-group">
            <label for="">Update Amount</label>
            <input type="text" class="form-control" id="updateamount" readonly>
            </div>
              </div>
            </div>
         <div class="form-group">
         <button type="button" class="btn btn-outline-info" onclick="addtolists()" >Add to list <i class="fa fa-list"></i> </button>
         </div>
         </form>
         </div>
         <div class="col-md-6">
         <table class="table">
         <thead>
         <tr>
         <th>Memo No</th>
         <th>Item name</th>
         <th>Quantity</th>
         <th>price</th>
         <th>Amount</th>
         </tr>
         </thead>
         <tbody id="confirmdatalist">
         </tbody>
         </table>
         <form action="" class="form">
          <input type="hidden" id="tokentype" value="<?=$_GET['token']?>">
              <div class="form-group">
                <label for="">Total</label>
                <input type="text" class="form-control" id="tot" readonly>
              </div>
              <div class="form-group">
                <label for="">Return Date</label>
                <input type="text" class="form-control mydate" id="returndate">
              </div>
              <div class="form-group">
                <label for="">Weight</label>
                <input type="text" class="form-control" id="weightamount" onblur="updategrndtotal()">
              </div>
              <div class="form-group">
                <label for="">Transport</label>
                <input type="text" class="form-control" id="transportamount" onblur="updategrndtotal()">
              </div>
              <div class="form-group">
                <label for="">Grand Total</label>
                <input type="text" class="form-control" id="grndtot">
              </div>
              <div class="form-group">
                <button type="button" class="btn btn-outline-primary btn-lg" onclick="savereturninfo()" >Save <i class="fa fa-floppy-o"></i></button>
              </div>
               
            </form>

         </div>
         </div>
      </div>
   </div>
</div>

<?php include 'files/footer.php'; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- jquery datepicker -->
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


<script type="text/javascript">
 
  
   function dataedit(id) 
   { 


      if (parseInt($("#quntity_"+id).text()) === 0) 
      {
        msg("Sorry !! this product is already 0",'al');
      }
      else
      {
        $("#productn").val($("#proname_"+id).text());
        $("#totalquantity").val($("#quntity_"+id).text());
        $("#Totalamount").val( parseInt($("#price_"+id).text()) * parseInt($("#quntity_"+id).text()));
        $("#memonofordbs").val( <?=$invoice?> );
        //$("#totalamount").val(  parseInt($("#price_"+id).text()) * parseInt($("#quntity_"+id).text()));
        $("#singleamount").val(parseInt($("#price_"+id).text()));
      }
   }

    var sum = 0;
   
   function addtolists() {
        
        var productn =  $("#productn").val();
        if (productn.length === " ") {
            alert("product length is zero");
        }else {
            sum += parseInt($("#returnedamount").val());
            $("#tot").val(sum);

             $("#confirmdatalist").append("<tr class='domclass'> <td id='memes'>"+ $("#memonofordbs").val()+"</td> <td id='proname'>" + $("#productn").val() + "</td> <td id='quntity'>" + $("#productq").val() + "</td> <td id='price'>" + $("#singleamount").val() + "</td><td>" + $("#returnedamount").val() + "</td> </tr>");
        }

   }
   
   
   function savereturninfo(){
      
   
           var obj = function(memo,prod,quntity,price,date){
               this.memo =  memo;
               this.prod  = prod;
               this.quntity = quntity;
               this.price = price;
               this.date = date;
           }
   
   
               var confirmlist = [];
             var tr = document.getElementsByClassName("domclass");
             if (tr.length === 0) {
               msg("You have to add something to the list",'al');
             }
             else if ( $("#returndate").val() === "") 
             {
               msg("Please !! give a date",'al');
             }
             else
              {
                

                alertify.confirm("Are you sure ?",function(ev)
                   {
                    ev.preventDefault();
   
                  $("tr.domclass").each(function(index, el) {
                         var memono  = $(this).find('#memes').text();
                         var product  = $(this).find('#proname').text();
                         var quantity  = $(this).find('#quntity').text();
                         var price  = $(this).find('#price').text();
                         var returndate = $("#returndate").val();
                        confirmlist.push(new obj(memono.trim(),product.trim(),quantity.trim(),price.trim(),returndate.trim()));
                  });
   
   
                  console.log(confirmlist);
                  var url =  "";
                  var vendor =  <?=$vendorname?>;
                  var tok = $("#tokentype").val();
                  
                     if (tok == "sell") {
                        url = 'ajax/insert-sell-return.php?dclas='+JSON.stringify(confirmlist)+'&weight='+$("#weightamount").val()+'&transport='+$("#transportamount").val()+'&custo='+vendor
                     }else if (tok == "purchase") {

                        url = 'ajax/insert-purchase-return.php?dclas='+JSON.stringify(confirmlist)+'&weight='+$("#weightamount").val()+'&transport='+$("#transportamount").val()+'&supplier='+vendor
                     }

                  if (url.length !== 0) {
                    $.ajax({
                    url: url
                  })
                  .done(function(res) {
                    console.log(res);
                     var res = JSON.parse(res);
                    //console.log(res);
                    res.forEach(function(item)
                   { 
              
                     if (Object.keys(item)[0]  === "success") 
                     {
                        msg(Object.values(item)[0],'su',1);
                        //window.location.reload();
                     }
                     else if (Object.keys(item)[0] === "error") 
                     {
                        msg(Object.values(item)[0],'err',1);

                     }
               
                   });
                    
                  });

                  }
                  else{
                    msg("Sorry we could not specify the url",'al');
                  }
   
                  

                   },function(ev){
                    ev.preventDefault();
                    msg("You'v canceled",'err');
                   });
                  
                  
             }
   
   
   }

    // update the rate after changing the product quantity
   function updatetherate() 
   {
    $("#updatequantity").val( 
      $('#totalquantity').val() +" - " +$('#productq').val() +" = "+(parseInt($('#totalquantity').val()) - parseInt($('#productq').val())));
    var returnedcal  =(parseInt($("#singleamount").val()) || 1)  * (parseInt($("#productq").val()) ||1) ;
    $("#returnedamount").val(returnedcal);
      var updaamount = parseInt($("#Totalamount").val()) || 0 - returnedcal;
    $("#updateamount").val( $("#Totalamount").val() +" - "+returnedcal +" = "+updaamount );
      
   }

    function updategrndtotal() {
        var wa =  parseInt($("#weightamount").val());
        var ta =  parseInt( $("#transportamount").val());
        var to =  parseInt( $("#tot").val());
        $("#grndtot").val(wa  + ta  + to);
    }
</script>