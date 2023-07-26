<?php session_start();
	if ((!isset($_SESSION['adminUsername'])) || (!isset($_SESSION['adminSurname'])) || (!isset($_SESSION['adminForenames'])) || (!isset($_SESSION['role'])) || (!isset($_SESSION['adminUserId']))) {
		header("location: ../index.php");
		// exit();
	} else {
		if ($_SESSION['role'] !== 'admin') {
			header("location: ../index.php");
			// exit();
		} else {
			$adminUsername = $_SESSION['adminUsername'];
			$adminSurname = $_SESSION['adminSurname'];
			$adminForenames = $_SESSION['adminForenames'];
			$adminUserId = $_SESSION['adminUserId'];
		}
	}
	require_once '../inc/dbConnect.php';