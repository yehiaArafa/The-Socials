<?php
	require_once('views/site_header.php');
	$url=explode('/',filter_var(rtrim($_GET['url'],'/'),FILTER_SANITIZE_URL));
	$userProfileID=$url[2];
?>

<style>
	.panel {
		padding:0px !important;
	}
</style>
 
<div class="container col-sm-12">
	  	<div id="demo" class="collapse">
	  		<div class="table-responsive col-xs-10 pull-right">          
	  			<table class="table">
	  				<?php
	  					foreach($info as $user) {
	  						$fName=$user->first_name;
	  						$lName=$user->last_name;
	  						$mail=$user->email;
	  						$bDate=$user->birthdate;
	  						$phNumber=$user->phone_number;
	  						$hmTown=$user->home_town;
	  						$gndr=$user->gender;
	  						$abMe=$user->about_me;
	  						$mStatus=$user->martial_status;
	  						$profpic=$user->profile_pic;	  						
	  				?>  				    
	    			<tbody>
				        <tr>
				        <td>FirstName:</td>
				        <td><?=$fName;?></td>
				        </tr>
				        
				        <tr>
				        <td>LastName:</td>
				        <td><?=$lName;?></td>
				        </tr>
				        
				        <tr>
				        <td>Email:</td>
				        <td><?=$mail;?></td>
				        </tr>
				        
				        <?php
				         if($isFriend=="Friends" || $isFriend=="Me"){
				         	?>
				        <tr>
				        <td>Date of birth:</td>
				        <td><?=$bDate;?></td>
				        </tr>
				        <tr>
				        <?php 
				        }
				        ?>
                        
                        <?php
                         if(!$phNumber==""){
                         ?>
                        <tr>
                        <td>Phone number:</td>
				        <td><?=$phNumber;?></td>
				        </tr>	
                         <?php
                          }?>

                          <?php
                         if(!$hmTown==""){
                         ?>
                        <tr>
				        <td>Home town:</td>
				        <td><?=$hmTown;?></td>
				        </tr>	
                         <?php
                          }?>
				        				        
				        
				        <tr>	
				        <td>Gender:</td>
				        <td><?php if($gndr==1)echo "Male";
				                   else echo "Female" ?> </td>
	    		  		</tr>
                        
                        <?php
                         if(!$mStatus==""){
                         ?>
                        <tr>
	    		  		<td>Martial Status:</td>
				        <td><?=$mStatus;?></td>
	    		  		</tr>	
                         <?php
                          }?>
	    		  		
	    		  		<?php

				         if($isFriend=="Friends" || $isFriend=="Me"){ 	
                          if(!$abMe==""){
                          ?>
                          <tr>
	    		  		  <td>About ME:</td>
				          <td><?=$abMe;?></td>
	    		  		  </tr>	
                         <?php
                          }
                         }?>

	    			</tbody>
	    			<?php
	    			}
	    		?>
	  			</table>
	  		</div>
	  		<div class="col-xs-2">
	  			<?php

	  				if($profpic==''){
	  					if(intval($user->gender)==1){
	  						?><center><i class="fa fa-male" style="font-size:70px; margin-top:90px"></i></center>
	  						<?php
	  						if($userProfileID==$_SESSION["log-in_user"]){
	  						?>	
	  						  <center><button class="btn btn-primary uploadPic" style="margin-top:5px;">upload-pic</button></center>
	  			    	      <form class="formPP" enctype="multipart/form-data">
	  			    	      <center class="showHide"><input name="changePP" type="file" class="changePP"></center>
	  			    	      </form>
	  			    	<?php
	  			     	}
	  			          }
	  			    	else{
	  			        	?>
	  			        	<center><i class="fa fa-female" style="font-size:70px; margin-top:90px"></i></center>  
	  			    	    <?php
	  						if($userProfileID==$_SESSION["log-in_user"]){
	  						?>
	  			    	    <center><button class="btn btn-primary uploadPic" style="margin-top:5px;">upload-pic</button></center>
	  			    	    <form class="formPP" enctype="multipart/form-data">
	  			    	    <center class="showHide"><input name="changePP" type="file" class="changePP"></center>
	  			    	    </form>
	  			    	<?php
	  			      	    }
	  			    	} 
	  			    }   
                    else{
	  			     	?>   
	  			     		<?php
	  						if($userProfileID==$_SESSION["log-in_user"]){
	  						?>
	  			     		<button class="btn btn-danger removePic"><i class="fa fa-times"></i></button>
	  			     		<?php
	  			     	    }?>

	  			     		<center><img class="img-responsive" src="http://localhost/THESOCIALS/uploads/user_images/<?=$profpic;?>"></center>	 		
	  			     		
                            <?php
	  						if($userProfileID==$_SESSION["log-in_user"]){
	  						?>
	  			     		<center><button class="btn btn-primary uploadPic" style="margin-top:5px;">upload-pic</button></center>
	  			     		<form class="formPP" enctype="multipart/form-data">
	  			     		<center class="showHide"><input name="changePP" type="file" class="changePP"></center>
	  			     		</form>
	  			     		<?php
	  			     	    }
	  			    	}
	  		    ?>
	  		</div>        
		</div>
	</div>



	<div class="col-sm-5 ">
		<div class="col-xs-offset-4 col-xs-4 ">
  			<div class="modal fade " id="myModal" role="dialog">
    			<div class="modal-dialog  ">         
      				<div class="modal-content">
        				<div class="modal-header">
          					<button type="button" class="close" data-dismiss="modal">&times;</button>
          					<h4 class="modal-title home_h1"> Update-Info!</h4>
        				</div>
        				<div class="modal-body">
          					<div class="container ">
								<div class="col-sm-4 col-sm-offset-1" >
									<form  id="myForm_update-info" enctype="multipart/form-data">
                					<div class="form-group" class="col-sm-6">
										<label for="number" class="labels">Mobile number</label>
										<input type="text" class="form-control inputs" name="number" 
						       			        <?php if($phNumber==""){
						       			               ?>placeholder="01-xxx-xxxxx"
						       			        <?php }else{ 
						       			              ?>placeholder="<?=$phNumber?>" 
						       			              <?php } ?>
						       			        id="number">          				       			                
									</div>
										
									<div class="form-group" class="col-sm-6">
										<label for="HomeTown" class="labels">Home Town</label>
										<input type="text" class="form-control inputs" name="homeTown"
					           			       <?php if($hmTown==""){
						       			               ?>placeholder=""
						       			        <?php }else{ 
						       			              ?>placeholder="<?=$hmTown?>" 
						       			              <?php } ?>
					           			       id="homeTown">       
									</div>	

                					<div class="form-group" class="col-sm-6">
										<label for="aboutMe" class="labels">About Me</label>
										<input type="text" class="form-control inputs" name="aboutMe" 
										       <?php if($abMe==""){
						       			               ?>placeholder=""
						       			        <?php }else{ 
						       			              ?>placeholder="<?=$abMe?>" 
						       			              <?php } ?>
										       id="aboutMe" >
									</div>
                                    
									<div class="form-group" class="col-sm-6">
										<label for="martial_status" class="labels">Martial Status</label>
										</br>
										<select class="selectpicker col-sm-12 inputs" id="martialStatus" name="martialStatus">
										  <option value=""></option>
										  <option value="Single">Single</option>
										  <option value="Engaged">Engaged</option>
										  <option value="Married">Married</option> 
										</select>								
									</div>
                                    
	       							
               						<input type="button" class="btnsubmit form-control" name="sub" id="sub" 
               						       value="update ">
            						</form>
            					</div>    	
        					</div>
        					<div class="modal-footer">    
          						<button type="button" class="btn btn-default " data-dismiss="modal">Close</button>
        					</div>
     	 				</div>
          			</div>
  				</div>
  			</div>
		</div>
	</div>


  <!--check if the required profile is of a logged in or not, user to post from the profile-->

  <?php 
      
     if($userProfileID==$_SESSION["log-in_user"]){
      ?>
	<form id="myForm_post_profile" method="post" enctype="multipart/form-data">
		<div class="form-group col-sm-12 " style="margin-top:15px;">
		  <textarea class="form-control" rows="3" id="myPosts" name="myPosts" 
		            placeholder="What's on your mind?"></textarea>
		  <input name="postImage" type="file" class="postImage" >
		  <button type="submit" class="btn btn-primary" style="margin-top:10px;">Post!</button>   
		  <select class="col-sm-5 selectpicker inputs" name="pp" style="margin-top:10px;">					
					<option value="1">Public</option>
					<option value="0">Private</option>
	   	  </select>
	   	
		</div>
	</form>
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Update info!</button>
    <?php
     }
     ?>
     
   <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#demo">MoreInfo!</button>
   

   <!--check for the add friend button-->
   
   <?php
   if($isFriend=="Not Friends")
    {
   	?>
   <button type="button" class="btn btn-primary" id="addFriend">Add Friend!</button>
   <?php
    }
   ?>
   

<!-- check for the private and public posts for firends and not firends--> 

<div class="container">
	<?php
		foreach($posts as $post) {
			$caption=$post->caption;
			$postImage=$post->image;
			$isPublic=$post->is_public;
			$postDate=$post->post_date;
			$postId=$post->post_id;
			$numberOfLikes=$post->numberOfLikes;
			
			if(!$isPublic){
			 if($isFriend=="Friends" || $isFriend=="Me"){

			?>
			<div class="row">	
				 <div class="panel panel-default col-sm-12">
				    <div class="panel-heading">
				      <?php 
                        if($profpic==''){
                              if(intval($user->gender)==1){
                               ?>
                               <i class="fa fa-male" style="font-size:20px;"></i>
                               <?php
                              }
                              else{
                              	?>
                               <i class="fa fa-female" style="font-size:20px;"></i>
                               <?php
                              }
                       }
                       else{
                       	?>
                          <img src="http://localhost/THESOCIALS/uploads/user_images/<?=$profpic?>" style="max-height:40px;"> 
                       <?php
                       }
                       ?>
                       
                       <?php
                       echo $user->first_name." ".$user->last_name;
				       ?>
				       
				      <div class="pull-right">
                       <?php
                       echo $postDate;
				       ?>
				      </div>	
				  	   
				     </div>
					 <div class="panel-body" >
					  <?php	
					   if($postImage==''){
                           ?><div class="em caption" style="margin-bottom:15px;">
                           <?php
                           echo $caption;
                           ?>
                           </div>
                           <?php 
					   }
					   else{
                         
                          ?><div class="em caption" style="margin-bottom:5px;">
                           <?php
                           echo $caption;
                           ?>
                           </div>
                           <?php
                          
                          ?>
                          <center><img src="http://localhost/THESOCIALS/uploads/user_images/<?=$postImage?>"  style="max-height:300px;margin-bottom:15px;"></center>  
                          
					   <?php }?>

					 </div>
					<div class="panel-footer">
						<div class="pull-right">
                         <?php
                          echo "Number of likes : ".$numberOfLikes;
                         ?>
                        </div>
			 		    <button type="submit" class="btn btn-primary like_profile" id="<?=$postId?>" style="margin-top:10px;">Like!</button>
				  </div>
				</div>
			</div>
			<?php 
		    } 
		      }
		    else{
              ?>
			<div class="row">	
				 <div class="panel panel-default col-sm-12">
				    <div class="panel-heading">
				      <?php 
                        if($profpic==''){
                              if(intval($user->gender)==1){
                               ?>
                               <i class="fa fa-male" style="font-size:20px;"></i>
                               <?php
                              }
                              else{
                              	?>
                               <i class="fa fa-female" style="font-size:20px;"></i>
                               <?php
                              }
                       }
                       else{
                       	?>
                          <img src="http://localhost/THESOCIALS/uploads/user_images/<?=$profpic?>" style="max-height:40px;"> 
                       <?php
                       }
                       ?>
                       
                       <?php
                       echo $user->first_name." ".$user->last_name;
				      ?>
				      <div class="pull-right">
                       <?php
                       echo $postDate;
				       ?>
				      </div>
				  	   
				     </div>
				     <div class="panel-body" >
					 <?php	
					   if($postImage==''){
                           ?><div class="em caption" style="margin-bottom:15px;">
                           <?php
                           echo $caption;
                           ?>
                           </div>
                           <?php 
					   }
					   else{
                           ?><div class="em caption" style="margin-bottom:5px;">
                           <?php
                           echo $caption;
                           ?>
                           </div>
                           <br>
                           <center><img src="http://localhost/THESOCIALS/uploads/user_images/<?=$postImage?>" style="max-height:300px;margin-bottom:15px;"></center>  
                          
					   <?php }?>

					 </div>
					<div class="panel-footer">
						<div class="pull-right">
                         <?php
                          echo "Number of likes : ".$numberOfLikes;
                          ?>
                        </div>
			 		<button type="submit" class="btn btn-primary like_profile" style="margin-top:10px;">Like!</button>
				  </div>
				</div>
			</div>
			<?php
	      	}
		}
	?>
</div>

<script type="text/javascript">
$(document).ready(function(){
       
    $(".postImage").fileinput({
        maxFileCount: 1,
        allowedFileExtensions: ["jpg", "jpeg", "png"]
    });
      	
    $(".fileinput-upload").hide();
       
    $(".changePP").fileinput({
        maxFileCount: 1,
        allowedFileExtensions: ["jpg", "jpeg", "png"]
    });
       
    $(".em").emotions();
});
</script>

<?php
    require_once('views/site_footer.php');
?>