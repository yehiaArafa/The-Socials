<?php
	require_once('views/site_header.php');
?>


<!--TYPE DATA HERE-->
<div class="container">
	<form id="myForm_post_timeline" method="post" enctype="multipart/form-data">
 		<div class="form-group col-sm-5">
	  		<textarea class="form-control" rows="3" id="myPosts" name="myPosts" 
	       		     placeholder="What's on your mind ?"></textarea>
	       	<input name="postImage" type="file" class="postImageTimeline" >	     
	  		<button type="submit" class="btn btn-primary " style="margin-top:10px;">Post!</button>
		<select class="col-sm-5 selectpicker inputs"  name="pp" style="margin-top:10px;">					
					<option value="1">Public</option>
					<option value="0">Private</option>
		</select>
		</div>
	</form>
</div>

<div class="container">
       <?php
		foreach($friendsPosts as $post) {
			 $caption=$post->caption;
			 $postImage=$post->image;
       $postId=$post->post_id;
       $postDate=$post->post_date;
       $numberOfLikes=$post->numberOfLikes;
			?>
			<div class="row">	
				 <div class="panel panel-default col-sm-12">
				     <div class="panel-heading">
				      <?php 
                       $temp=$this->getName($post->user_id);
                       if(($temp[0]->profile_pic)==''){
                              if(intval($temp[0]->gender)==1){
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
                          <img src="uploads/user_images/<?=$temp[0]->profile_pic?>" style="max-height:40px;"> 
                       <?php
                       }
                       ?>
                        <a href="http://localhost/THESOCIALS/profile/view/<?=$temp[0]->user_id?>" style="margin-left:5px;" class="userName"><?= $temp[0]->first_name." ".$temp[0]->last_name;?></a>
				               <div class="pull-right">
                       <?php
                       echo $postDate;
                       ?>
                       </div>
             </div>
					 <div class="panel-body">

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
					 <div class="panel-footer">
               <div class="pull-right">
                       <?php
                       echo "Number of likes : ".$numberOfLikes;
                       ?>
               </div>

			 		     <button class="btn btn-primary like_timeline" id="<?=$postId?>" style="margin-top:10px;">Like!</button>
				  </div>
				</div>
			</div>
		 </div>	
			<?php
		}
	?> 
</div>	

<script type="text/javascript">
$(document).ready(function(){
        $(".postImageTimeline").fileinput({
          maxFileCount: 1,
          allowedFileExtensions: ["jpg", "jpeg", "png"]
        });
      	$(".fileinput-upload").hide();
        $(".em").emotions();
  });
</script>
<?php
 	require_once('views/site_footer.php');
?>