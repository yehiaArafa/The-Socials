<?php

class model_posts extends model
{

 public function addPost($caption,$logInUserId,$isPublic,$image=''){
   $Post=DB::getInstance()->insert("Posts",array(
      "user_id" => $logInUserId,
      "caption" => $caption,
      "is_public" => $isPublic,
      "image"=>$image
    ));
  }

  public function getPosts($logInUserId){

    $post_re = DB::getInstance()->query("SELECT p.post_id,p.user_id,p.caption,p.image,p.is_public,p.post_date,count(l.user_id) as numberOfLikes
                                         FROM Likes as l RIGHT JOIN Posts as p ON l.post_id=p.post_id 
                                         WHERE p.user_id=$logInUserId 
                                         GROUP BY p.post_id 
                                         ORDER BY post_date DESC");
    return $post_re->getresults();
    }


  public function getFriendsPosts($logInUserId){

     $post_re= DB::getInstance()->query(" SELECT p.post_id,p.user_id,p.caption,p.image,p.is_public,p.post_date,count(l.user_id) as numberOfLikes
                                          FROM Likes as l RIGHT JOIN Posts as p ON l.post_id=p.post_id 
                                          WHERE p.user_id IN 
                                         (SELECT f.friend_2_id FROM Friends as f WHERE f.friend_1_id=$logInUserId AND f.status='1' 
                                          UNION 
                                          SELECT f.friend_1_id FROM Friends as f WHERE f.friend_2_id=$logInUserId AND f.status='1') 
                                          GROUP BY p.post_id 
                                          ORDER BY post_date DESC");
     return $post_re->getresults();
    }

   
   
  public function add_PP_Post($userId,$userName,$image){
       
   $addPost = DB::getInstance()->insert("Posts",array(
        "user_id" => $userId,
        "caption" => "$userName changed his profile pic",
        "image"=>$image,
        "is_public"=>"0"
      ));
  }

  public function likePost($userId,$postId){
     
    $like=DB::getInstance()->insert("Likes",array(
          "user_id"=>$userId,
          "post_id"=>$postId
     ));
  }

 public function checkLike($userId,$postId){
  $like=DB::getInstance()->query("SELECT * FROM Likes WHERE user_id=$userId AND post_id=$postId");
   return $like->getresults(); 
 } 


}

?>