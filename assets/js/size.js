



     

   function size()
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
           xhr.open("GET","ajax/getsize.php",true);
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

 document.getElementById("brands").addEventListener("change",(event)=>{

        if (event.target.value.length !== 0) 
        {
        	  
        		var xyz= size();
        		xyz.then((obj) =>
        		{
        			console.log(obj);
        			var text = "<option value=''>Select Size</option>";
        			  obj.forEach((element)=>{
        			  	  if (element.brandid === event.target.value)
        			  	   {
        			  	   	text += "<option value='"+element.pro_size_id+"'>"+element.pro_size_name+"</option>";
        			  	   }
        			  });
					document.getElementById("sizeid").innerHTML = text;
				});
        }
 });

 

