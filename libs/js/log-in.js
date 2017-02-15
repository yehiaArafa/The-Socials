$('document').ready(function(){
     
 $('#myForm_login').submit(function(e){
  
  var flag=true;    
     
   initial();
          
 if($('#LuserName').val()==""){
    $('#LuserName').removeClass("inputs");
    $('#LuserName').addClass("alert-danger wrongInputs ");
    $('#LnameSpan').html('*required input');
    flag=false;   
  }
 
 if($('#Lpass').val()==""){
    $('#Lpass').removeClass("inputs");
    $('#Lpass').addClass("alert-danger wrongInputs");
    $('#LpassSpan').html('*required input');
    flag=false;
  }
  
   if(flag){
     e.preventDefault();
       
  var fData = new FormData($('#myForm_login')[0]);
   $.ajax({
    url:"http://localhost/THESOCIALS/user/checkUser/",
    type:"POST",
    data: fData,
    cache: false,
    processData: false,
    contentType: false,
    async: false,
    success:function(response){
      if(response==1)  
         window.location.replace("http://localhost/THESOCIALS/timeline");
      else
         $('#LpassSpan').html("*check your mail or password is correct");     
    }
  });
     //return true
}
   else 
   return false;
 
	});

function initial(){
  $('#LnameSpan').html('');
  $('#LpassSpan').html('');
  $('#LuserName').removeClass("alert-danger wrongInputs");
  $('#LuserName').addClass("inputs");
  $('#Lpass').removeClass("alert-danger wrongInputs");
  $('#Lpass').addClass("inputs");
  
}

});