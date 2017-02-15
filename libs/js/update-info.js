$('document').ready(function(){
              
  var id;

      $.get('http://localhost/THESOCIALS/user/getSession', function(sessionData) {
              id=sessionData;        
            });

      $(".btnsubmit").click(function(){
      
          var fData = new FormData($('#myForm_update-info')[0]);
          $.ajax({
               url:"http://localhost/THESOCIALS/user/updateInfo/",
               type:"POST",
               data: fData,
               cache: false,
               processData: false,
               contentType: false,
               async: false,
               success:function(){  
                swal({title:"Congrats!",text:"Info updated successfully!",type:"success"},function(){
                  window.location.replace("http://localhost/THESOCIALS/profile/view/"+id)});
                }
            });
        

        });
});