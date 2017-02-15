<?php
	require_once('views/home_header.php');
    session_unset();  
    session_destroy();
?>

<style>
body {
background-image:url("/THESOCIALS/uploads/images/try.jpg");
background-repeat: no-repeat;
background-attachment: fixed;

  /*font-family: 'Droid Arabic Kufi', sans-serif;*/
}
</style>


<div class="col-xs-4 col-xs-offset-4 cont" style="margin-top:15%" >
	<h1 class="home_h1">Already Registered ?</h1>
	<form  id="myForm_login" method="post" enctype="multipart/form-data">
		<div class="form-group">
			<label for="LuserName" class="labels-1">E-mail</label>
			<input type="text" class="form-control inputs" name="LuserName" id="LuserName" placeholder="john@example.com">
			<span id="LnameSpan" class="spans"></span>
		</div>	 		
		<div class="form-group" >
		<label for="password" class="labels-1">Password</label>
		<input type="password" class="form-control inputs" name="Lpass" placeholder="password" 
				           id="Lpass">
		<span id="LpassSpan" class="spans"></span>
		</div>    
		<input type="submit" class="form-control" name="sub" id="subb" value="log-in">       
	</form>
	<div class="">
		<div style="padding:0px;" class="col-xs-6"><p style="font-size:18px;line-height:45px;margin-bottom:0px!important;">Not a member ?</p></div>
		<div style="padding:0px;" class="col-xs-6"><button type="button" class="btn btn-primary btn-lg" data-toggle="modal" style="width:100%;" data-target="#myModal">Sign up !</button></div>
	</div>
</div>

	
     	<!-- Trigger the modal with a button -->
	<div class="col-xs-offset-4 col-xs-4 ">
		<div class="modal fade " id="myModal" role="dialog">
		<div class="modal-dialog  ">         
				<div class="modal-content">
				<div class="modal-header">
  	            	<button type="button" class="close" data-dismiss="modal">&times;</button>
  					<h4 class="modal-title home_h1">Sign-up !</h4>
				</div>
				<div class="modal-body">
  					<div class="">
						<div class="col-sm-12" >
						 <form  id="myForm_signup" enctype="multipart/form-data">
							<div class="form-group col-sm-6" style="padding-left:0px;">
								<label for="firstName" class="labels">FirstName</label>
								<input type="text" class="form-control inputs" name="firstName" id="firstName">
								<span id="fNameSpan" class="spans"></span>
							</div>
							<div class="form-group col-sm-6" style="padding-right:0px;">
								<label for="lastName" class="labels">LastName</label>
								<input type="text" class="form-control inputs" name="lastName" id="lastName" >
								<span id="lNameSpan" class="spans"></span>
							</div>		
        					<div class="form-group" class="col-sm-6">
								<label for="mail" class="labels">E-mail</label>
								<input type="text" class="form-control inputs" name="mail" 
				       			placeholder="john@example.com" id="mail">
								<span id="mailSpan" class="spans" ></span>        
							</div>	
							<div class="form-group" class="col-sm-6">
								<label for="date" class="labels">Date OF Birth</label>
								<input type="date" class="form-control inputs" name="date" id="date">
								<span id="dateSpan" class="spans" ></span>        
							</div>	
							<div class="form-group" class="col-sm-6">
								<label for="password" class="labels">Password</label>
								<input type="password" class="form-control inputs" name="pass" placeholder="password" 
			           			       id="pass">
			    				<span id="passSpan" class="spans"></span>       
							</div>	
        					<div class="form-group" class="col-sm-6">
								<label for="confPassword" class="labels">Confirm-Password</label>
								<input type="password" class="form-control inputs" name="confPassw" id="confPass">
			    				<span id="confPassSpan" class="spans"></span>
							</div>
							<div class="form-group">
							    <label for="imageUpload" class="labels">Profile Picture </label>
							    <input name="profilepic" type="file" class="form-control profilepic" id="imageUpload">
						  	</div>
							<div class="form-group " class="col-sm-6 class-offset-sm-4">
								<input type="radio" name="gender" value="1">
								<label class="labels">Male</label>
								</br>
								<input type="radio" name="gender" value="0">
								<label class="labels">Female</label>
								</br>  	
								<span id="genderSpan" class="spans"></span>
							</div>
    					 </form>
    					</div>    	
					</div>
					<div class="modal-footer">  
						<div class="btn-group" style="width:100%;">
							<button style="width:70%" type="submit" class="btn btn-success formSubmitter" name="sub" >Sign-up</button>
  							<button style="width:30%" type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
						</div>
					</div>
	 				</div>
  			</div>
			</div>
		</div>
</div>
	

  <script type="text/javascript">
      $(document).ready(function(){
        $(".profilepic,.website_logo").fileinput({
          showPreview: false,
          maxFileCount: 10,
          allowedFileExtensions: ["jpg", "jpeg", "png"]
        });
      	$(".fileinput-upload").hide();
      });
  </script>

<?php
	require_once('views/site_footer.php');
?>
