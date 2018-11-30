			

 function generate()
  {
    var d = new Date();
      document.getElementById('productid').value = "P"+d.getDate()+""+d.getSeconds();
  }


   function products()
   {
   var result= {};
   var cbs=[];
   var call = function (obj) {
       cbs.forEach(element => {
           element(obj);
       });
   };

   var obj = {
   	  
       then: function(cb) {
           cbs.push(cb);
           return this;
       },
       send:function () {
           var that=this;
           var prob={};
           var xhr =  new XMLHttpRequest();
           xhr.open("GET","ajax/getproducts.php",true);
           xhr.onload = function(){
              
               if (this.readyState === 4 && this.status === 200) {

                   var data = JSON.parse(this.response);
                        call(data);
                    /*data.forEach((element)=>{
                        if (element.cate_id == id) {
                        	that.result =  element;
                        	call(that.result);
                        }
                    });*/
                  
               }
           }
           xhr.send();
           return this;
       }    

   }
   return obj.send();
 }




 



