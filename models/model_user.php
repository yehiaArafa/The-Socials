<?php

class model_user extends model
{

  function __construct(){}

  function createUser($firstName,$lastName,$bDate,$gender,$mail,$pass,$img = ''){
    
    $hashPass=password_hash($pass,PASSWORD_BCRYPT);
    $users = DB::getInstance()->insert("Users",array(
  			"first_name" => $firstName,
        "last_name" => $lastName,
        "birthdate"=>$bDate,
        "gender"=>$gender, 
  			"password" => $hashPass,
        "email" => $mail,
        "profile_pic" => $img
  		));
  }

  function checkUser($mail,$pass) {
     
    $users = DB::getInstance()->query("SELECT * FROM Users WHERE email = ?"
  		,array($mail),1);
  	if(!empty($users->getresults())) {
  		if(password_verify($pass,$users->getresults()->password)) {
  			return $users->getresults();
  		}
  	} else {
  		return false;
  	}
  }

  function getUser($mail){
     
      $select=DB::getInstance()->query("SELECT * FROM `Users` WHERE email=?"
                                   ,array($mail),1);
      return $select->getresults();
  }
  
  function updateInfo($userId,$number,$homeTown,$aboutMe,$martial){
    
      $where="user_id=$userId";
      $users = DB::getInstance()->update("Users",$where,array(
        "phone_number" => $number,
        "home_town" => $homeTown,
        "about_me"=>$aboutMe,
        "martial_status"=>$martial
      ));     
   }


  function getInfo($userId){

    $info = DB::getInstance()->retrive("*","Users",["user_id","=",$userId]);
    return $info->getresults();
    } 

  
  

  function checkFriends($friendOneID,$friendTwoID){ 
     
    $check=DB::getInstance()->query("SELECT * FROM Friends WHERE 
                                    friend_1_id=$friendOneID AND friend_2_id=$friendTwoID 
                                    OR friend_1_id=$friendTwoID AND friend_2_id=$friendOneID"); 
   return $check->getresults();
   
   } 

 
   function getFriends($freindOneID){
      
      $friends=DB::getInstance()->query("SELECT * FROM Users Where user_id IN ( 
                                         SELECT friend_2_id FROM `Friends` WHERE friend_1_id=$freindOneID AND status='1' 
                                         UNION 
                                         SELECT friend_1_id FROM `Friends` WHERE friend_2_id=$freindOneID AND status='1')");
      return $friends->getresults();        
   }
   

    
    function searchUser($srch_term){
        
      $users = DB::getInstance()->query("SELECT DISTINCT u.first_name,u.last_name,u.profile_pic,u.gender,u.user_id
      FROM Users AS u LEFT JOIN Posts AS p ON p.user_id=u.user_id WHERE
      u.first_name like '%{$srch_term}%' OR u.last_name LIKE '%{$srch_term}%'  
      OR u.email='{$srch_term}' OR u.home_town='{$srch_term}' OR u.phone_number='{$srch_term}'
      OR (p.caption LIKE'%{$srch_term}%'AND p.is_public='1')");     

      return $users->getresults();
    }

   public function getRequests($userId){
      
      $friends=DB::getInstance()->query("SELECT DISTINCT u.first_name,u.last_name,u.profile_pic,u.gender,u.user_id FROM Users as u WHERE u.user_id 
                                         IN ( SELECT friend_1_id FROM Friends where friend_2_id=$userId AND status='3') " );
      return $friends->getresults();  
   }
   
   public function addFriend($friendOneID,$friendTwoID,$status){
   
     $friend= DB::getInstance()->insert("Friends",array(
       "friend_1_id"=>$friendOneID,
       "friend_2_id"=>$friendTwoID,
       "status"=>$status
       ));
   }

  public function confirmRequest($friendOneID,$friendTwoID){
    
    $where="friend_1_id=$friendOneID AND friend_2_id=$friendTwoID";
    $confirm=DB::getInstance()->update("Friends",$where,array(
      "status"=>"1"
      ));
  }
  
  public function deleteRequest($friendOneID,$friendTwoID){
     
     $delete=DB::getInstance()->query("DELETE FROM Friends WHERE friend_1_id=$friendOneID AND friend_2_id=$friendTwoID AND status='3';");
  }

  public function removePP($userId){
    $where="user_id=$userId";
    $removePP=DB::getInstance()->update("Users",$where,array(
        "profile_pic"=>''
      ));
  }

  public function changePP($userId,$image){
    $where="user_id=$userId";
    $changePP=DB::getInstance()->update("Users",$where,array(
        "profile_pic"=>$image
      ));
  }

}

?>