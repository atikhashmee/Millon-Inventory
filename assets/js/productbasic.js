
  console.log('Hello world from new js files');

     var defaultModule = (function(){
            
            var brands = [];
            var sizes = [];
            var prod = [];
           
            DefaultModule = function(bra,siz,pro){
              //console.log(bra);
               brands =  bra;
               sizes  =  siz;
               prod   =  pro;
            } 
            getBrands = function() {
               return brands;
            }
             // check the radio button to show the cheque payment method
              cashCheckVariation = function (event){
               
                var divid       = document.getElementById('chequeoption');
                var cashoption  = document.getElementById('cashoption');
                if (event.target.checked === true && event.target.id=== "customRadio2"){
                  divid.style.display = 'inline-block';
                  cashoption.style.display  = 'none';
                }else {
                  divid.style.display = 'none';
                   cashoption.style.display  = 'inline-block';
                }

              }


              

            gBCN = function () {
               var d =  new Date();
              $("#billchallan").val(d.getFullYear()+""+ parseInt(d.getMonth()+1)+""+d.getDate()+""+d.getHours() +""+d.getMinutes()+""+d.getSeconds());
            }

           gettotalpric =  function (){  // get the product price tlst after putting the quntoty and producdt price
                 $("#totallprice").val(parseInt($("#quntity").val()) * parseInt($("#price").val()))
                }



                 nowwpayment =  function (){   //billl payment after calculating the total
                     $("#billbalance").val( $("#grandtotalaftercommision").val() - $("#nowpayment").val() )
                 }



      getcomsiondeducted = function (){  // when the user is using commission for deduction
    var com =  $("#comision").val();
     var totalprice =  $("#subtotalbeforecommsion").val();
     $("#grandtotalaftercommision").val(  totalprice - ((com/100)*totalprice) );
   }
   
   
     getpricediscounted = function (){ // when user is using direct money to be deducted
        var com =  $("#discount").val();
     var totalprice =  $("#subtotalbeforecommsion").val();
     $("#grandtotalaftercommision").val(  totalprice - com );
    }



   productobj = function(sname,pcat,pname,quntity,price){ //declaring the object to design all the item in the cart 
   this.name = sname;
   this.pcat = pcat;
   this.pname = pname;
   this.quntity = quntity;
   this.price  =  price;
   }
   


    


     

     getValueF = function() {
     var vat = ($("#vat").val().length !==0 )?parseInt($("#vat").val()):0;
     var transport = ($("#transport").val().length !== 0)? parseInt($("#transport").val()):0;
     var wight =  ($("#weght").val().length !== 0) ?  parseInt($("#weght").val()):0;
     var totalprice =   parseInt($("#subtotalbeforecommsion").val());
     var percent = ((vat/100)*totalprice)+totalprice;
     var sum = percent + transport + wight;
     $("#grandtotalaftercommision").val( sum );
   }  




     



           

            return this;
     })();



