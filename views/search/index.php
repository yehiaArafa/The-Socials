<?php
require_once('views/site_header.php');

foreach($data as $user) { 
     
$profPic=$user->profile_pic;
?>
<ul>
  <li>
  <?php
if($profPic==''){
	if(intval($user->gender)==1){
      ?><i class="fa fa-male" style="font-size:40px;"></i>
      <?php 
       }
	   else{
	  	?><i class="fa fa-female" style="font-size:40px;"></i>  
       <?php
	  	} 
	  }
    else{
     ?>
	   <img src="http://localhost/THESOCIALS/uploads/user_images/<?=$profPic;?>"style="max-height:50px;">	
     <?
	   }
	 ?>
   
    <a href="http://localhost/THESOCIALS/profile/view/<?=$user->user_id?>" class="userName"><?=$user->first_name." ".$user->last_name;?></a>
  </li>
</ul>   
  <?php
   } 

require_once('views/site_footer.php');
?>