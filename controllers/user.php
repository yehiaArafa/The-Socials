<?php

class user extends controller{

 private $userModel;

 function __construct() {
    $this->userModel = new model_user();
  }
    
  public function getSession(){
    echo $_SESSION["log-in_user"];
  }

  public function addUser(){

      if(isset($_FILES['profilepic']))  {
        $file = $_FILES['profilepic'];
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

      $firstName=$_POST['firstName'];
      $lastName=$_POST['lastName'];
      $bDate=$_POST['date'];
      $gender=intval($_POST['gender']);
      $email=$_POST['mail'];
      $pass=$_POST['pass'];
     
      if($file_name!='')
        $this->userModel->createUser($firstName,$lastName,$bDate,$gender,$email,$pass,$file_name_new);
      else
        $this->userModel->createUser($firstName,$lastName,$bDate,$gender,$email,$pass);
        
        $temp=$this->userModel->getUser($email);  
        $_SESSION["log-in_user"]=$temp->user_id;
        $_SESSION["log-in_user_pic"]=$temp->profile_pic;
        $_SESSION["log-in_user_name"]=$temp->first_name." ".$temp->last_name;

        $this->userModel->addFriend($temp->user_id,$temp->user_id,"2");
        
   } 
  
  
   public function checkUser(){
       
      $email=$_POST['LuserName'];
      $pass=$_POST['Lpass'];
      
      if($this->userModel->checkuser($email,$pass)){
           
            $temp=$this->userModel->getUser($email);  
            $_SESSION["log-in_user"]=$temp->user_id;
            $_SESSION["log-in_user_pic"]=$temp->profile_pic;
            $_SESSION["log-in_user_name"]=$temp->first_name." ".$temp->last_name;  

           echo "1";
        }
      else 
          echo "0";     
    }

    public function updateInfo(){
      
      $userId=$_SESSION["log-in_user"];
      
      $number=$_POST['number'];
      $homeTown=$_POST['homeTown'];
      $aboutMe=$_POST['aboutMe'];
      $martial=$_POST['martialStatus'];

      $this->userModel->updateInfo($userId,$number,$homeTown,$aboutMe,$martial);
    }
   
   
   public function sendRequest(){
     $this->userModel->addFriend(intval($_POST['friendOne']),intval($_POST['friendTwo']),"3"); 
   } 

   public function acceptRequest(){
       
      $friendOne=$_SESSION["log-in_user"];
      $friendTwo=intval($_POST['friendTwo']);
     
     $this->userModel->confirmRequest($friendTwo,$friendOne);
   }

   public function rejectRequest(){
     
      $friendOne=$_SESSION["log-in_user"];
      $friendTwo=intval($_POST['friendTwo']);

       echo $friendOne;
       echo $friendTwo;

      $this->userModel->deleteRequest($friendTwo,$friendOne);
   }

   }
?>