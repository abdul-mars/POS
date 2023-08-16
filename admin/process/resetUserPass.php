<?php require_once '../checkSession.php';
	function generateRandomPassword($length = 8) {
	    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789@#$%&()=';
	    $password = '';
	    
	    do {
	        $password = '';
	        $max = strlen($characters) - 1;
	        for ($i = 0; $i < $length; $i++) {
	            $password .= $characters[rand(0, $max)];
	        }
	    } while (strlen($password) < 8);

	    return $password;
	}
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		if (isset($_POST['resetUserId'])) {
			$resetUserId = mysqli_real_escape_string($con, $_POST['resetUserId']);
			
			$sql = mysqli_query($con, "SELECT password_reset FROM users WHERE user_id = '$resetUserId'");
			if (mysqli_num_rows($sql) < 1) {
				echo "Something went wrong";
				exit();
			} else {
				$data = mysqli_fetch_assoc($sql);
				if ($data['password_reset'] == 0) {
					echo "User password does not need reseting";
					exit();
				}
			}

			$resetedPassword = generateRandomPassword();
			$resetedHashedPassword = password_hash($resetedPassword, PASSWORD_DEFAULT);
			
			$sql = "UPDATE users SET user_password = ? WHERE user_id = ?";
			$stmt = $con->prepare($sql);
			$stmt->bind_param('si', $resetedHashedPassword, $resetUserId);

			if ($stmt->execute()) {
				// echo "User password reset successfull";
				$sql = mysqli_query($con, "UPDATE users SET password_reset = 0 WHERE user_id = '$resetUserId'");
				echo "Reset user password successfully, user password is now: $resetedPassword";
			} else {
				echo "Unable to reset user password";
			}
		} else {
			echo "Something went wrong";
		}
	}