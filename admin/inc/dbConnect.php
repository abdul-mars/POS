<?php 
	$dbHost = 'localhost';
	$dbUser = 'root';
	$dbPass = '';
	$dbName = 'pos';

	// $con = mysql_connect();
	$con = new mysqli($dbHost, $dbUser, $dbPass, $dbName);
	if ($con->connect_error) {
		header("location: ../index.php?msg=Something went wrong with the database");
	}