<?php 
	$sessionTimeout = 1;
	if (isset($_SESSION['lastActivity'])) {
		$currentTime = time();
		$lastActivity = $_SESSION['lastActivity'];
		if ($currentTime - $lastActivity > $sessionTimeout) {
			header("location: signout.php");
			exit();
		}
	}
	$_SESSION['lastActivity'] = time();
	echo time();