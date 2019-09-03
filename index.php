<?php

session_start();

if(isset($_SESSION['admin'])){

	require 'admin/index.php';
	
}else{
	require 'paginas/login.php';
}

 ?>