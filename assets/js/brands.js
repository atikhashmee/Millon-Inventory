



     

   function brands(id)
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
           xhr.open("GET","ajax/getbrands.php",true);
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

 document.getElementById("catid").addEventListener("change",(event)=>{
        if (event.target.value.length !== 0) 
        {
        	  
        		var xyz= brands(event.target.value);
        		xyz.then((obj) =>
        		{
        			console.log(obj);
        			var text = "";
        			  obj.forEach((element)=>{
        			  	  if (element.cate_id === event.target.value)
        			  	   {
        			  	   	text += "<option value='"+element.brand_id+"'>"+element.brand_name+"</option>";
        			  	   }
        			  });
					document.getElementById("brands").innerHTML = text;
				});
        }
 });

 

