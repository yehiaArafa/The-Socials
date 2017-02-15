$('document').ready(function(){
       
    var id;

    $.get('http://localhost/THESOCIALS/user/getSession', function(sessionData) {
              id=sessionData;        
            });


    $('#myForm_post_profile').submit(function(e){
           e.preventDefault();
          if($('#myPosts').val()==""){
                            
           }
         else{
            var fData = new FormData($('#myForm_post_profile')[0]);
   	   			$.ajax({
    		    	 url:"http://localhost/THESOCIALS/profile/addPost/",
    			     type:"POST",
    			     data: fData,
    			     cache: false,
    			     processData: false,
    			     contentType: false,
    			     async: false,
    			     success:function(){     				   
                 swal({title:"Congrats!",text:"You posted successfully!",type:"success"},function(){
                  window.location.replace("http://localhost/THESOCIALS/profile/view/"+id);
                 });
    				    }
  				  });
          }
       });
  
  $('#myForm_post_timeline').submit(function(e){
           e.preventDefault();
          if($('#myPosts').val()==""){
                            
           }
         else{
            var fData = new FormData($('#myForm_post_timeline')[0]);
            $.ajax({
               url:"http://localhost/THESOCIALS/profile/addPost/",
               type:"POST",
               data: fData,
               cache: false,
               processData: false,
               contentType: false,
               async: false,
               success:function(){
                 swal({title:"Congrats!",text:"You posted successfully!",type:"success"},function(){
                  window.location.replace("http://localhost/THESOCIALS/timeline");
                 });                    
                }
            });
          }
       });

  });
