<?php 
	require_once '../inc/dbConnect.php';
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		if (isset($_POST['forgetPassUsername'])) {
			$forgetPassUsername = mysqli_real_escape_string($con, $_POST['forgetPassUsername']);

			// $sql = "SELECT user_id, username FROM users WHERE username = ?";
			// $stmt = $con->prepare($sql);
			// $stmt->bind_param('s', $forgetPassUsername);
			// $stmt->execute();
			// $result = $stmt->get_result();
			// $user = $result->fetch_all(MYSQLI_ASSOC);

			$sql =  mysqli_query($con, "SELECT user_id, username FROM users WHERE username = '$forgetPassUsername'");
			$data = mysqli_fetch_assoc($sql);

			if (mysqli_num_rows($sql) < 1) {
				echo "Incorrect username \ncheck your username and try again";
			} else {
				$sql = "UPDATE users SET password_reset = 1 WHERE username = ?";
				$stmt = $con -> prepare($sql);
				$stmt -> bind_param('s', $forgetPassUsername);
				if ($stmt->execute()) {
					echo 1;
					// echo "Password reset request is sent successfull";
				} else {
					echo "Unable to send password request";
				}
			}
		}
	}
