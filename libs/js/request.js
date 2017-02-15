$('document').ready(function(){

 var friendOneId;
 var friendTwoId;

 $.get('http://localhost/THESOCIALS/user/getSession', function(sessionData) {
              friendOneId=sessionData;        
            });

 $.get('http://localhost/THESOCIALS/profile/getId', function(sessionData) {
              friendTwoId=sessionData;
            });
 
$('#addFriend').click(function(){
      
     $.post("http://localhost/THESOCIALS/user/sendRequest",{friendOne:friendOneId,friendTwo:friendTwoId},function(){
			swal({title:"",text:"Friend request sent",type:"success"},function(){
                  window.location.replace("http://localhost/THESOCIALS/profile/view/"+friendTwoId);    
			});
      });
});




$('.accept').click(function(){
    
    var id=$(this).attr('id');
                       
    $.post("http://localhost/THESOCIALS/user/acceptRequest",{friendTwo:id},function(){
			swal({title:"",text:"Friend request accepted",type:"success"});   
			
    });    

});


$('.reject').click(function(){

    var id=$(this).attr('id');
      
                     
    $.post("http://localhost/THESOCIALS/user/rejectRequest",{friendTwo:id},function(){
      swal({title:"",text:"Friend request rejected",type:"success"});   
      
    });            
        
});





});