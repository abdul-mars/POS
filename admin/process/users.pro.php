<?php require_once '../checkSession.php';

	function generateRandomPassword($length = 8) {
	    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()-_+=';
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

	if (isset($_SESSION['random_password'])) {
	    $password = $_SESSION['random_password'];
	} else {
	    // Generate a new password and store it in the session
	    $password = generateRandomPassword(8);
	    $_SESSION['random_password'] = $password;
	}
	function usernameExists($con, $username) {
	    $username = $con->real_escape_string($username);
	    $sql = "SELECT username FROM users WHERE username = '$username'";
	    $result = $con->query($sql);
	    return $result->num_rows > 0;
	}
	// echo $password;
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		if (isset($_POST['addUserBtn'])) {
			// $phone = '';
			$surname = mysqli_real_escape_string($con, ucwords($_POST['surname']));
			$forenames = mysqli_real_escape_string($con, ucwords($_POST['forenames']));
			$phone = mysqli_real_escape_string($con, $_POST['phone']);
			$role = mysqli_real_escape_string($con, $_POST['role']);

			if (!empty($surname) || !empty($forenames) || !empty($role)) {
				$username = strtolower(str_replace(' ', '', $surname).'.'.str_replace(' ', '', $forenames));
				// echo $username;
				$passwordHashed = password_hash($password, PASSWORD_DEFAULT);

				$sql = "INSERT INTO users (
					user_surname,
					user_forenames,
					username, 
					user_password, 
					user_phone,
					user_role
					) VALUES (?, ?, ?, ?, ?, ?);";
				$stmt = $con->prepare($sql);
				$stmt->bind_param('ssssis', $surname, $forenames, $username, $passwordHashed, $phone, $role);
				if ($stmt->execute()) {
					$msg = "New User added successfully. Your username is $username and password is $password";
					// Fetch the newly inserted user data
				    $newUserId = $stmt->insert_id;
				    $sqlNewUser = "SELECT * FROM users WHERE user_id = ?";
				    $stmtNewUser = $con->prepare($sqlNewUser);
				    $stmtNewUser->bind_param("i", $newUserId);
				    $stmtNewUser->execute();
				    $resultNewUser = $stmtNewUser->get_result();
				    $newUserData = $resultNewUser->fetch_assoc();

				    // Form the success message with username and password
				    $response = array('success' => true, 'message' => $msg, 'user' => $newUserData);

				    // Return the response as JSON
				    echo json_encode($response);

					unset($_SESSION['random_password']);
				} else {
					echo "Unable to add new user";
				}

			} else {
				echo "Please fill all required fields";
			}
		}
	}

	if ($_SERVER['REQUEST_METHOD'] === 'POST') { // handle user delete 
		if (isset($_POST['delUserBtn'])) {
			$userId = mysqli_real_escape_string($con, $_POST['userId']);
			if (empty($userId)) {
				echo "Something went wrong";
			} else {
				$sql = "DELETE FROM users WHERE user_id = ?";
				$stmt = $con->prepare($sql);
				$stmt->bind_param('i', $userId);
				if ($stmt->execute()) {
					echo "User Deleted Successfully";
				} else {
					echo "Unable to delete user";
				}
			}
		}
	}

