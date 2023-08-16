<?php session_start();
	require_once '../../inc/dbConnect.php';
	if ((!isset($_SESSION['username'])) || (!isset($_SESSION['surname'])) || (!isset($_SESSION['forenames'])) || (!isset($_SESSION['userId']))) {
		header("location: ../index.php");
		// exit();
	} else {
		$userId = $_SESSION['userId'];
		$username = $_SESSION['username'];
		$surname = $_SESSION['surname'];
		$forenames = $_SESSION['forenames'];
		$phone = $_SESSION['phone'];
	}

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		if (isset($_POST['updateProfileBtn'])) {
			$oldUsername = mysqli_real_escape_string($con, $_POST['username']);
			$newSurname = mysqli_real_escape_string($con, ucwords($_POST['surname']));
			$newForenames = mysqli_real_escape_string($con, ucwords($_POST['forenames']));
			$newPhone = mysqli_real_escape_string($con, $_POST['phone']);
			$newUsername = mysqli_real_escape_string($con, $_POST['newUsername']);

			// $newPhone = intval($newPhone);
			// // echo gettype($newPhone);
			// echo strlen($newPhone);

			if ((empty($oldUsername)) || (empty($newSurname)) || (empty($newForenames)) || (empty($newPhone)) || (empty($newUsername))) {
				echo "Please fill all fields properly";
			} else {
				$newUsername = strtolower($newSurname.'.'.$newForenames);
				$sql = "UPDATE users SET user_surname = ?, user_forenames = ?, username = ?, user_phone = ? WHERE user_id = ?";
				$stmt = $con->prepare($sql);
				$stmt->bind_param("sssii", $newSurname, $newForenames, $newUsername, $newPhone, $userId);
				if ($stmt->execute()) {
					$_SESSION['username'] = $newUsername;
		            $_SESSION['surname'] = $newSurname;
		            $_SESSION['forenames'] = $newForenames;
		            $_SESSION['phone'] = $newPhone;
					echo "Profile Updated Successfully, new username is: ". $newUsername;
				} else {
					echo "Unable to update profile";
				}
			}
		}

		if (isset($_POST['changePasswordBtn'])) {
			$oldPassword = mysqli_real_escape_string($con, $_POST['oldPassword']);
			$newPassword = mysqli_real_escape_string($con, $_POST['newPassword']);
			$confirmPassword = mysqli_real_escape_string($con, $_POST['confirmPassword']);
			// echo $newPassword;
			if (empty($oldPassword) || strlen($oldPassword) < 8) {
				echo "Old password cannot be less than 8 characters";
			} else {
				if ((strlen($newPassword) < 8) || (strlen($confirmPassword) < 8)) {
					echo "New Password cannot be less than 8 characters";
				} else {
					if ((strtolower($newPassword)) !== (strtolower($confirmPassword))) {
						echo "Passwords do not match";
					} else {
						// $oldHashedPassword = password_verify(password, hash)
						$sql = mysqli_query($con, "SELECT user_password FROM users WHERE user_id = '$userId' AND username = '$username'");
						if (mysqli_num_rows($sql) < 1) {
							echo "Something went wrong";
						} else {
							$data = mysqli_fetch_assoc($sql);
							$oldHashedPassword = $data['user_password'];
							if (password_verify($oldPassword, $oldHashedPassword)) {
								$hashNewPassword = password_hash($newPassword, PASSWORD_DEFAULT);
								$sql = "UPDATE users SET user_password = ? WHERE user_id = ?";
								$stmt = $con->prepare($sql);
								$stmt->bind_param("si", $hashNewPassword, $userId);
								if ($stmt->execute()) {
									echo "Password changed successfully";
								} else {
									echo "Unable to change password";
								}
							}
						}		
					}
				}
			}
		}
	} else {
		header("location: ../index.php");
	}

	