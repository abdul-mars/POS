<?php 
	session_id($_SESSION['userSessionId']);
	
	session_start();
	require_once 'inc/dbConnect.php';
	
	session_unset();
	session_destroy();
	header("location: index.php");