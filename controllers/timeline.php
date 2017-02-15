<?php

class timeline extends controller{

	private $postsModel;
	private $userModel;

	public function __construct() {
		$this->postsModel = new model_posts();
		$this->userModel= new model_user();	
	}

	public function index() {
		$friendsPosts=$this->getFriendsPosts();
		$friends=$this->userModel->getFriends($_SESSION["log-in_user"]); 
		$friendRequests=$this->getRequests();
		require('views/timeline/index.php');
	}

	
	public function getFriendsPosts(){
       return $postre=$this->postsModel->getFriendsPosts($_SESSION["log-in_user"]); 		
  	}
     
    
    public function getName($userId){

      $temp = $this->userModel->getInfo($userId);
      return $temp;
    }
    
    public function getRequests(){
      return $this->userModel->getRequests($_SESSION["log-in_user"]);
    } 

    public function likePost(){
      $this->postsModel->likePost($_SESSION["log-in_user"],intval($_POST['postId']));
    }

    public function checkLike(){
       $postId=intval($_POST['postId']);
       $like=$this->postsModel->checkLike($_SESSION["log-in_user"],$postId);
       if(empty($like))
       	 echo 0;
       	else 
       	 echo 1;

    }
   

 }

?>