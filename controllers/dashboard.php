<?php

class dashboard extends controller
{
	public $msg = '';

	function __construct() {
		
	}

	function islogged() {
		return isset($_SESSION['islogged']) && $_SESSION['islogged'];
	}

	function login() {
		if(isset($_POST['inputName']) && isset($_POST['inputPassword'])) {
			$name = $_POST['inputName'];
			$pass = $_POST['inputPassword'];
			require_once('models/userModel.php');
			$users = new userModel();
			$results = $users->checkUser($name,$pass);
			if(!empty($results->id)) {
				$_SESSION['islogged'] = true;
				$_SESSION['user_id'] = $results->id;
				$_SESSION['user_name'] = $results->name;
				$_SESSION['user_prof'] = $results->profile;
				header("Location:" . $GLOBALS['ADMIN_ROOT'] . $GLOBALS['tmp_controller'] . '/' . $GLOBALS['tmp_method'] . '/');
			} else {
				$_SESSION['islogged'] = false;
				echo "<p class='errmsg'>Wrong Username or Password.</p>";
			}
		}
		$this->loadView('dashboard/users','login');
	}

	function logout() {
		$_SESSION['islogged'] = false;
		header("Location:" . $GLOBALS['ADMIN_ROOT'] . 'home/index/');
	}
}

?>
