<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title><?=$_SESSION['website_title'];?></title>
    <script type="text/javascript" src="<?=$GLOBALS['LOCAL_ROOT'];?>/libs/js/jquery.min.js"></script>
    <script type="text/javascript" src="<?=$GLOBALS['LOCAL_ROOT'];?>/libs/jquery-emotions-master/jquery.emotions.js"></script>
   
    <link rel="stylesheet" href="<?=$GLOBALS['LOCAL_ROOT'];?>/libs/css/bootstrap.css"/>
    <link rel="stylesheet" href="<?=$GLOBALS['LOCAL_ROOT'];?>/libs/font-awesome-4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?=$GLOBALS['LOCAL_ROOT'];?>/libs/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="<?=$GLOBALS['LOCAL_ROOT'];?>/libs/dist/css/skins/skin-blue.min.css">
    <link rel="stylesheet" type="text/css" href="<?=$GLOBALS['LOCAL_ROOT'];?>/libs/css/sweetalert.css">
    <link rel="stylesheet" type="text/css" href="<?=$GLOBALS['LOCAL_ROOT'];?>/libs/bootstrap-fileinput-master/css/fileinput.min.css">
    <link rel="stylesheet" type="text/css" href="<?=$GLOBALS['LOCAL_ROOT'];?>/libs/bootstrap-select-1.9.3/dist/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="<?=$GLOBALS['LOCAL_ROOT'];?>/libs/jquery-emotions-master/jquery.emotions.icq.css"/>

    <link rel="stylesheet" type="text/css" href="<?=$GLOBALS['LOCAL_ROOT'];?>libs/css/main2.css"/>

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    
  </head>
  <body>
   <nav id="menu" class="navbar navbar-inverse navbar-fixed-top">
      <div class="container"> 
      <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
         <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" 
          data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span> 
          <span class="icon-bar"></span> <span class="icon-bar"></span> 
          <span class="icon-bar"></span> </button>
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <?php

            if($_SESSION['log-in_user_pic']==''){}
             else{ 
              ?>
                <img src="http://localhost/THESOCIALS/uploads/user_images/<?=$_SESSION['log-in_user_pic']?>" style="max-height:50px;"class="pull-left">
              <?php
               }?>
            <ul class="nav navbar-nav navbar-left">
              <li><a href="http://localhost/THESOCIALS/profile/view/<?=$_SESSION["log-in_user"]?>"><?=$_SESSION["log-in_user_name"];?></a><li>
              <li><a href="http://localhost/THESOCIALS/timeline" >Home</a></li>
              <li><a href="" data-toggle="modal" data-target="#FriendsModal">friends</a></li>

            </ul>
          </div>
    <!-- /.navbar-collapse --> 
        </div>
  <!-- /.container-fluid -->
        <div>
          <ul class="nav navbar-nav navbar-right">
            <li> 
            <form action="<?=$GLOBALS['LOCAL_ROOT'];?>search" class="navbar-form " method="post" role="search">
              <div class="input-group">
                <div class="input-group-btn">
                <input type="text" class="form-control" placeholder="Search" name="srch-term" id="srch-term" style="width:400px">
                <button style="height:34px;" id="searchClick" class="btn btn-default" type="submit" ><i class="glyphicon glyphicon-search"></i></button>
                </div>
              </div>
            </form></li>
             <li><a href="#" class="fa fa-globe dropdown-toggle" data-toggle="dropdown" data-target="#notification"></a></li>
             <li><a href="http://localhost/THESOCIALS/"><span class="fa fa-sign-out"></span>Logout</a></li>
          </ul>
        </div>
    </div>  
  </nav>




  <div id="FriendsModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title home_h1">Your Friends !</h4>
          </div>
          <div class="modal-body">
              <?php 
                foreach($friends as $user) { ?>
                    <?php
                      $profPic=$user->profile_pic;

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
                        <a href="http://localhost/THESOCIALS/profile/view/<?=$user->user_id?>"><?=$user->first_name." ".$user->last_name;?></a>
                       <br>
                      <?php
                      } 
                    ?>                     
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
      </div>
    </div>
  </div>


   <div class="dropdown" id="notification">
     <ul class="dropdown-menu dropdown-menu-right ">
      <li class="dropdown-header">Friend requests</li>
         <?php 
                foreach($friendRequests as $user) { ?>
                    
                    <?php
                      $profPic=$user->profile_pic;

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
                        <a href="http://localhost/THESOCIALS/profile/view/<?=$user->user_id?>"><?=$user->first_name." ".$user->last_name;?></a>
                    
                        <button class="btn btn-info accept" id="<?=$user->user_id?>">accept</button>
                        <button class="btn btn-info reject" id="<?=$user->user_id?>">reject</button>
                          
                       <br>
                      <?php
                      } 
                    ?> 
                     
     </ul> 
  </div>

   
    <div class="container" style="margin-top:60px;">

  <script type="text/javascript">
      $(document).ready(function(){
           
           $('#searchClick').click(function(e){
                  
              if($('#srch-term').val()=="")
                return false;
              else 
                return true;
              });
     });
  </script>    