<?php
require 'autoload.php';
require 'control/control.'.CONTROL.'.php';

$controlName = CONTROL."Control";

if(isset($_GET['c'])) {
	$class = $_GET['c'];

	$control = new $controlName;
	$control->$class();
}else{
	$control = new $controlName;
	$control->index();
}

?>