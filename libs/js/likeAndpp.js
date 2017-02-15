$('document').ready(function(){

 var profileId;
 
 $.get('http://localhost/THESOCIALS/profile/getId', function(sessionData) {
              profileId=sessionData;
 });
 

$('.like_timeline').click(function(){
  var isLiked;
  var id=$(this).attr('id');
    
  $.post("http://localhost/THESOCIALS/timeline/checkLike",{postId:id},function(data){
     isLiked=data;
     
  if(isLiked==0){
  $.post("http://localhost/THESOCIALS/timeline/likePost",{postId:id},function(){
      swal({title:"",text:"like",type:"success"},function(){
                  window.location.replace("http://localhost/THESOCIALS/timeline");
                });        
    });  
  }
  else{
    swal({
      title: "",
      text: "Your Already liked this post",
      type: "warning",   
      });
  }

  });
  
});


$('.like_profile').click(function(){
  var isLiked;
  var id=$(this).attr('id');
    
  $.post("http://localhost/THESOCIALS/timeline/checkLike",{postId:id},function(data){
     isLiked=data;
     
  if(isLiked==0){
  $.post("http://localhost/THESOCIALS/timeline/likePost",{postId:id},function(){
      swal({title:"",text:"like",type:"success"},function(){
                  window.location.replace("http://localhost/THESOCIALS/profile/view/"+profileId);
                });        
    });  
  }
  else{
    swal({
      title: "SORRY!",
      text: "Your Already liked this post",
      type: "warning",   
      });
  }

  });
  
});



 $('.removePic').click(function(){
   $.post("http://localhost/THESOCIALS/profile/removePP ",{},function(){
			swal({title:"",text:"You removed your profile pic",type:"success"},function(){
             window.location.replace("http://localhost/THESOCIALS/profile/view/"+profileId);
         });   			
    });     
 });

  
 $('.uploadPic').click(function(){
    $('.showHide').show();
 });

 $('.fileinput-upload').click(function(e){
           
      var fData = new FormData($('.formPP')[0]);
   	   			$.ajax({
    		    	 url:"http://localhost/THESOCIALS/profile/changePP",
    			     type:"POST",
    			     data: fData,
    			     cache: false,
    			     processData: false,
    			     contentType: false,
    			     async: false,
    			     success:function(){     				   
                 swal({title:"Congrats!",text:"You changed your Profile Pic successfully!",type:"success"},function(){
                  window.location.replace("http://localhost/THESOCIALS/profile/view/"+profileId);
                 });
    				    }
  				  });

        return false;  	
 }); 



});