<?php

class search extends controller{

 private $userModel;

 function __construct() {

    $this->userModel = new model_user();
  }

  public function index() {
  	 
     $data = $this->search();
     require('views/search/index.php');
  }

  public function search(){

     return $data = $this->userModel->searchUser($_POST['srch-term']);
  }
  
}

