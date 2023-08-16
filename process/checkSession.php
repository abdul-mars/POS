<?php 
	require_once '../inc/dbConnect.php';
	session_start();

	$userId = $_SESSION['userId'];

	$sql = mysqli_query($con, "SELECT login_session FROM users WHERE user_id = '$userId'");
	$data = mysqli_fetch_assoc($sql);

	$response = array();
	if ($_SESSION['userSessionId'] != $data['login_session']) {
		$response['output'] = 'logout';
		// $response[] = array(
		// 	 // 'product_id' => $row['product_id'],
		// 	 'output' => 'logout',
		// );
	} else {
		$response['output'] = 'login';
		// $response[] = array(
		// 	 // 'product_id' => $row['product_id'],
		// 	 'output' => 'login',
		// );
	}

	echo json_encode($response);