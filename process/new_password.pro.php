<?php session_start();
	require_once '../inc/dbConnect.php';
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
		if (isset($_POST['newUserChangePassBtn'])) {
			$newPass = mysqli_real_escape_string($con, $_POST['newPass']);
			$confirmPass = mysqli_real_escape_string($con, $_POST['confirmPass']);
			// echo $confirmPass;

			// validate inputs
			if (empty($newPass) || empty($confirmPass)) {
				echo "Password cannot be less than 8 characters";
						exit();
			} else {
				if ($newPass !== $confirmPass) {
					echo "Passwords do not match";
						exit();
				} else {
					$newPass = password_hash($newPass, PASSWORD_DEFAULT);
					$sql = "UPDATE users SET user_password = ? WHERE user_id = ?";
					$stmt = $con->prepare($sql);
					$stmt->bind_param("si", $newPass, $userId);

					if ($stmt->execute()) {
						echo "New password set successfully!";
						unset($_SESSION['NewUser']);
						exit();
					} else {
						echo "Unable to set new password";
						exit();
					}
				}
			}
		}
	}