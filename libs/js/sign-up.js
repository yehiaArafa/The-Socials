$('document').ready(function(){

$('.formSubmitter').click(function(e){
  var flag=true;    
   
    initial();
      
 if($('#firstName').val()==""){
    $('#firstName').removeClass("inputs");
    $('#firstName').addClass("alert-danger wrongInputs ");
    $('#fNameSpan').html('*required input');
    flag=false;   
  }
 
  if($('#lastName').val()==""){
    $('#lastName').removeClass("inputs");
    $('#lasttName').addClass("alert-danger wrongInputs ");
    $('#lNameSpan').html('*required input');
    flag=false;   
  }

  if($('#date').val()==""){
    $('#date').removeClass("inputs");
    $('#date').addClass("alert-danger wrongInputs ");
    $('#dateSpan').html('*required input');
    flag=false;   
  }
   
  if(!isOneChecked()){
    $('#genderSpan').html('*required input please choose your gender');
     flag=false;
  }
   
  if($('#mail').val()=="" ){
    $('#mail').removeClass("inputs");
    $('#mail').addClass("alert-danger wrongInputs");
    $('#mailSpan').html('*required input');
    flag=false;
  }
  else if(!checkEmail($('#mail').val())){
    $('#mail').removeClass("inputs");
    $('#mail').addClass("alert-danger wrongInputs");
    $('#mailSpan').html('*wrong inputs');
    flag=false;
  } 
  
  if($('#pass').val()==""){
    $('#pass').removeClass("inputs");
    $('#pass').addClass("alert-danger wrongInputs");
    $('#passSpan').html('*required input');
    flag=false;
  }
  
  if($('#confPass').val()==""){
    $('#confPass').removeClass("inputs");
    $('#confPass').addClass("alert-danger wrongInputs");
    $('#confPassSpan').html('*required input');
    flag=false;
  }
  
  if(!checkPass($('#pass').val(),$('#confPass').val())){
      $('#pass').removeClass("inputs");
      $('#pass').addClass("alert-danger wrongInputs");
      $('#confPass').removeClass("inputs");
      $('#confPass').addClass("alert-danger wrongInputs");
      $('#passSpan').html('*Password didn`t match');
      $('#confPassSpan').html('*Password didn`t match');
      flag=false; 
  }	

   if(flag){
    
    e.preventDefault(); 
  
  var fData = new FormData($('#myForm_signup')[0]);
   $.ajax({
    url:"http://localhost/THESOCIALS/user/addUser/",
    type:"POST",
    data: fData,
    cache: false,
    processData: false,
    contentType: false,
    async: false,
    success:function(){
      swal({
        title: "Congrats " + $('#firstName').val(),
        text: "Your profile has been submitted successfully !",
        type: "success"
      },function(){
        window.location.replace("http://localhost/THESOCIALS/timeline");  
      })
    //
    // alert('success');     
    }
  });

     

  //return true;
}
   else 
   return false;
 

	});

function initial(){
  $('#nameSpan').html('');
  $('#mailSpan').html('');
  $('#passSpan').html('');
  $('#confPassSpan').html('');
  $('#userName').removeClass("alert-danger wrongInputs");
  $('#userName').addClass("inputs");
  $('#mail').removeClass("alert-danger wrongInputs");
  $('#mail').addClass("inputs");
  $('#pass').removeClass("alert-danger wrongInputs");
  $('#pass').addClass("inputs");
  $('#confPass').removeClass("alert-danger wrongInputs");
  $('#confPass').addClass("inputs");
  
}

function checkEmail(email){
var pattern=/^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;
if(email.match(pattern)){
  return true;
}else return false;

}

function checkPass(pass,checkedPass){
  if(pass==checkedPass)return true;
  else return false;  
}

function isOneChecked() {
  var chx =$('input');
  for (var i=0; i<chx.length; i++) {
    if (chx[i].type == 'radio' && chx[i].checked) {
      return true;
    } 
  }
  return false;
}



});