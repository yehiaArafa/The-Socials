<?php

class profile extends controller{

  private $postsModel,$userModel;

  public function __construct() {
    $this->postsModel = new model_posts();
    $this->userModel = new model_user();  
    
  }

   public function getId(){
    echo $_SESSION["currentProfileId"];
   }

  public function view($userId){
     
    $_SESSION["currentProfileId"]=$userId; 
    $info = $this->getinfo($userId);
    $posts = $this->getPost($userId);
    $friends=$this->userModel->getFriends($_SESSION["log-in_user"]);
    $isFriend=$this->userModel->checkFriends($_SESSION["log-in_user"],$userId);
    $friendRequests=$this->getRequests();

     if (empty($isFriend[0])){
          $isFriend="Not Friends";}
    else {
         if($isFriend[0]->status==1)
            $isFriend="Friends";
         else if($isFriend[0]->status==3) 
            $isFriend="just requested";
         else 
            $isFriend="Me";
         }
               
    require('views/profile/index.php');
  }

 
  public function addPost(){
        
        
        if(isset($_FILES['postImage']))  {
        $file = $_FILES['postImage'];
        $file_name = $file['name'];
        $file_tmp_loc = $file['tmp_name'];
        $file_size = $file['size'];
        $file_ext = strtolower(end(explode('.',$file_name)));
        $file_name_new = uniqid('',true) . '.' . $file_ext;
        $file_new_location = '/opt/lampp/htdocs/THESOCIALS/uploads/user_images/'. $file_name_new;
        if($file['error']===0 && $file_size < 2097152) {
          if(move_uploaded_file($file_tmp_loc, $file_new_location)) {
            echo "YES";
          } else {
            echo "NO";
          }
        }
      }
        echo $file_name;
        $caption=$_POST['myPosts'];
        $isPublic=$_POST['pp'];
        if($file_name!='') 
        $this->postsModel->addPost($caption,$_SESSION["log-in_user"],$isPublic,$file_name_new);
        else
        $this->postsModel->addPost($caption,$_SESSION["log-in_user"],$isPublic);  
  }


  public function getinfo($userId){
   return $info = $this->userModel->getInfo($userId);
   }
  
  public function getPost($userId){
    return $postre = $this->postsModel->getPosts($userId);
   }

   
  public function getRequests(){
     return $this->userModel->getRequests($_SESSION["log-in_user"]);
  } 

  public function removePP(){
    $this->userModel->removePP($_SESSION["log-in_user"]);
  }
  
  public function changePP(){
     if(isset($_FILES['changePP'])) {
        $file = $_FILES['changePP'];
        $file_name = $file['name'];
        $file_tmp_loc = $file['tmp_name'];
        $file_size = $file['size'];
        $file_ext = strtolower(end(explode('.',$file_name)));
        $file_name_new = uniqid('',true) . '.' . $file_ext;
        $file_new_location='/opt/lampp/htdocs/THESOCIALS/uploads/user_images/'. $file_name_new;
        if($file['error']===0 && $file_size < 2097152) {
          move_uploaded_file($file_tmp_loc,$file_new_location);

        }
      }

     
     $this->userModel->changePP($_SESSION["log-in_user"],$file_name_new);
     $_SESSION["log-in_user_pic"]=$file_name_new;
     $this->postsModel->add_PP_Post($_SESSION["log-in_user"],$_SESSION["log-in_user_name"],$file_name_new); 
     
  }



 }

?>