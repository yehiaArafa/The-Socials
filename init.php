<?php

spl_autoload_register(function($class){
	if(file_exists('models/'.$class.'.php')) require_once "models/{$class}.php";
	else if(file_exists('controllers/'.$class.'.php')) require_once "controllers/{$class}.php";
});

require_once 'core/app.php';
require_once 'core/controller.php';
require_once 'core/DB.php';
require_once 'core/model.php';

?>
