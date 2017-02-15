
<?php

require_once 'init.php';

$GLOBALS['ADMIN_ROOT'] = 'http://localhost/THESOCIALS/dashboard/';
$GLOBALS['LOCAL_ROOT'] = 'http://localhost/THESOCIALS/';
$GLOBALS['CONT_LIST'] = ['Home','Users','Settings'];
$GLOBALS['ICONS_LIST'] = ['fa fa-home','fa fa-users','fa fa-gears'];

session_start();


$app = new App;
DB::getInstance();



//$data = DB::getInstance()->retriveAll("*","users",array('name','=','Omar Khairy'));
//var_dump($data->getresults());
//DB::getInstance()->delete("users",array("name","=","Za3bola"));
?>
