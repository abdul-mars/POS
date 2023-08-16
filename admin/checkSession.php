<?php session_start();
	require_once '../inc/dbConnect.php';
	// error_reporting(0);
	$sessionTimeout = 900;
	if (!isset($_SESSION['userId'])) {
		header("location: ../index.php?msg=Something");
	} else {
		$userId = $_SESSION['userId'];
		$sqlSession = mysqli_query($con, "SELECT user_id, user_surname, user_forenames, username, user_role FROM users WHERE user_id = '$userId'");
		if (mysqli_num_rows($sqlSession) < 1) {
			header("location: ../index.php");
			exit();
		} else {
			$dataSession = mysqli_fetch_assoc($sqlSession);
			if ($dataSession['user_role'] === 'admin') {
				$_SESSION['username'] = $dataSession['username'];
				$_SESSION['surname'] = $dataSession['user_surname'];
				$_SESSION['forenames'] = $dataSession['user_forenames'];
				$_SESSION['role'] = $dataSession['user_role'];
				$name = $_SESSION['surname'].' '.$_SESSION['forenames'];

				if (isset($_SESSION['lastActivity'])) {
					$currentTime = time();
					$lastActivity = $_SESSION['lastActivity'];
					if ($currentTime - $lastActivity > $sessionTimeout) {
						// echo '<meta http-equiv="refresh" content="1;url=signout.php">';
						header("location: signout.php");
						exit();
					}
				}
				$_SESSION['lastActivity'] = time();
			} else {
				header("location: ../index.php");
				exit();			
			}
		}
		
	}

	if ((!isset($_SESSION['username'])) || (!isset($_SESSION['surname'])) || (!isset($_SESSION['forenames'])) || (!isset($_SESSION['role'])) || (!isset($_SESSION['userId'])) || (!isset($_SESSION['userSessionId']))){
		header("location: ../index.php");
		exit();
	}

	$userSessionId = $_SESSION['userSessionId'];

	$sqlCheckLstLgn = mysqli_query($con, "SELECT last_login FROM users WHERE user_id = ".$_SESSION['userId']);
	$dataCheckLstLgn = mysqli_fetch_assoc($sqlCheckLstLgn);
	$lastLog = $dataCheckLstLgn['last_login'];
	$newUserDiv = '';
	if (empty($lastLog)) {
		// echo "<script>$('.newUserDiv').css('display', 'flex');</script>";
		// echo "<style>.newUserDiv{display: flex; }</style>";
		$newUserDiv = '<div class="newUserDiv" style="display:">
			<div class="text-center py-2 bg-light" style="width: 300px; border-radius: 10px 10px 0 0">
				<p>Welcome, Mustapha Abdul-Rashid <br> password change is required for new users</p>
			</div>
			<div class="div border bg-light p-3" style="width: 300px; border-radius: 0 0 10px 10px">
				<h5 class="text-center">Create a new password</h5>
				<form action="" method="post" id="newUserChangePassForm">
					<div class="mb-3">
						<label for="newPass" class="form-label">New Password</label>
						<input type="password" name="newPass" class="form-control border border-success" id="newPass" autocomplete="new-password">
					</div>
					<div class="mb-3">
						<label for="confirmPass" class="form-label">Confirm Password</label>
						<input type="password" name="confirmPass" class="form-control border border-success" id="confirmPass" autocomplete="new-password">
					</div>
					<div class="mb-3">
						<button class="btn btn-success" type="submit" id="newUserChangePassBtn">Change Password</button>
					</div>
				</form>
			</div>
		</div>';
	}