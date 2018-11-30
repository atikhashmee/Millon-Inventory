<?php include 'files/header.php'; ?>
<?php include 'files/menu.php';
   ?>
<?php 
   if (isset($_GET['del-id'])) {
           if ($db->delete("sell","billchallan = '".$_GET['del-id']."'")) {?>
<script> alert('Data has been deleted'); window.location.href='sellproduct.php'; </script>
<?php   }
   }
   
   
   
   
   $salehistory = $db->joinQuery('SELECT DISTINCT `memono`,`return_date`,`supplierId` FROM `purchase_return` WHERE `memono`="'.$_GET['invo'].'"')->fetch(PDO::FETCH_ASSOC);
   
   
   
   
    
   /*     echo "<pre>";
   print_r($returndata);
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
                  <li class="breadcrumb-item active">Products sale Return update</li>
               </ol>
            </div>
            <h4 class="page-title">Product Sale Return Update</h4>
         </div>
      </div>
   </div>
   <!-- end page title end breadcrumb -->
   <div class="row">
      <div class="col-12">
         <div class="card m-b-30">
            <div class="card-body">
              <!-- start of header information -->
               <div class="row">
                  <div class="col-12">
                     <div class="row">
                        <div class="col-6">
                           <address>
                             <p><strong>Supplier Info:</strong></p> 
                              <?=$dm->getUserFullDetails($salehistory['supplierId'])?>
                           </address>
                        </div>
                        <div class="col-6 text-right">
                           <address>
                              <strong>Shipment Details:</strong>
                              <br>
                              Invoice No: <?=$salehistory['memono']?><br>
                              <input type="hidden" name="memes" id="memes" value="<?=$salehistory['memono']?>">
                              Sale Date :  <?=date("Y-M-d",strtotime($salehistory['return_date']))?>
                              <input type="hidden" name="returndate" id="returndate" value="<?=$salehistory['return_date']?>">
                           </address>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- end of header information -->

               <!-- start of table content -->
               <div class="row">
                  <div class="col-12">
                     
                        <div class="p-2">
                           <h3 class="panel-title font-20"><strong>Order summary</strong></h3>
                        </div>
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
                                    $invoiceinfo = $db->selectAll('purchase_return','`memono`= "'.$_GET['invo'].'"')->fetchAll();
                                    /*echo "<pre>";
                                    print_r($invoiceinfo);
                                    echo "</pre>";*/
                                    $sum =0;
                                    $weight = 0;
                                    $transport = 0;
                                    $cus= "";
                                    
                                    
                                    $i=0;
                                      foreach ($invoiceinfo as $inv) { $i++;
                                        $sum += ((int)$inv['price']*(int)$inv['quntity']);
                                        $weight = $inv['weight'];
                                        $transport = $inv['transport'];
                                        $cus =  $inv['supplierId'];
                                        ?>
                                 <tr class="domclass">
                   <td contenteditable="true" id="proname" data-pro="<?=$inv['productid']?>">
                                      
                                   <?=$fn->getProductName(trim($inv['productid']))?>
                                    </td>
                                    <td class="text-center" contenteditable="true" id="price">
                                       <?=$inv['price']?>
                                    </td>
                                    <td class="text-center" contenteditable="true" id="quntity">
                                       <?=$inv['quntity']?>
                                    </td>
                                    <td class="text-right" >
                                       <?=((int)$inv['price']*(int)$inv['quntity'])?>
                                    </td>
                                 </tr>
                                 <?php
                                    }
                                    
                                    ?>  
                              </tbody>
                           </table>
                        </div>
                      </div>
                    </div>
                    <!-- ends of table content -->

                    <!-- starts of accounts section -->
                        <div class="row">
                           
                           <div class="col">
                           </div>
                           <div class="col">
                           <form method="post" id="allotherinfo">
                              
                                 <input type="hidden" name="custohiddenname" id="custohiddenname" value="<?=$cus?>">
                                 <div class="form-group">
                                    <label for="">Total</label>
                                    <input type="text" class="form-control" id="subtotalbeforecommsion" name="subtotalbeforecommsion" value="<?=$sum?>">
                                 </div>
                                 <div class="form-group">
                                    <label for="">Weight</label>
                                    <input type="text" class="form-control" id="weightamount" name="weightamount" onblur="getValueF()" value="<?=$weight?>">
                                 </div>
                                 <div class="form-group">
                                    <label for="">Transport</label>
                                    <input type="text" class="form-control" id="transportamount" name="transportamount" onblur="getValueF()" value="<?=$transport?>">
                                 </div>
                                 <div class="form-group">
                                    <label for="">Grand Total</label>
                                    <input type="text" class="form-control" id="grandtotalaftercommision">
                                 </div>
                                 <button type="button" onclick="savereturninfo()"   class="btn btn-outline-primary">Update and Save <i class="fa fa-floppy-o"></i> </button>
                                 </form>
                              </div>
                           
                        </div>
                        <!-- ends of accounts section -->
                    
                  </div>
               </div>
            </div>
            <!-- end row -->
         </div>
      </div>
   
<?php include 'files/footer.php'; ?>
<script type="text/javascript">
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
               alert("You have to add something to the list");
             }else {
   
   
                  $("tr.domclass").each(function(index, el) {
                         var memono  = $('#memes').val();
                         var product  = $(this).find('#proname').data("pro");
                         var quantity  = $(this).find('#quntity').text();
                         var price  = $(this).find('#price').text();
                         var returndate = $("#returndate").val();
                        confirmlist.push(new obj(memono.trim(),product,quantity.trim(),price.trim(),returndate.trim()));
                  });
   
   
                  console.log(confirmlist);
   
                  $.ajax({
                    url: 'ajax/insert-purchase-return.php?dclas='+JSON.stringify(confirmlist)+'&weight='+$("#weightamount").val()+'&transport='+$("#transportamount").val()+'&supplier='+$("#custohiddenname").val()+'&memo='+$("#memes").val()
                  })
                  .done(function(res) {
                    console.log(res);
                    alert(res);
                    window.location.href='purchase_return_history.php';
                    //$("#feedbacktext").text(res);
                  })
                  .fail(function() {
                    console.log("error");
                  })
                  .always(function() {
                    console.log("complete");
                  });
                  
                  
             }
   
   
   }
</script>