<?php require_once '../inc/dbConnect.php';
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		if (isset($_POST['signinBtn'])) {
			if (empty($_POST['username']) || empty($_POST['password'])) {
				echo "Both fields are required";
			} else {
				$username = mysqli_real_escape_string($con, $_POST['username']);
				$password = mysqli_real_escape_string($con, $_POST['password']);
				$sql = "SELECT user_surname, user_forenames, username, user_password, user_role FROM users WHERE username = '$username'";
				$runSql = $con->query($sql);

				if ($runSql->num_rows < 1) {
					echo "Incorrect username and or password";
				} else {
					$data = $runSql->fetch_assoc();
					if (password_verify($password, $data['user_password'])) {
						// echo "login success";
						session_start();
						$_SESSION['role'] = $data['user_role'];
						if ($data['user_role'] === 'admin') {
							// echo "admin login";
							$_SESSION['adminUsername'] = $data['username'];
							$_SESSION['adminSurname'] = $data['user_surname'];
							$_SESSION['adminForenames'] = $data['user_forenames'];
							echo 1;
						} else {
							// echo "user login";
							$_SESSION['username'] = $data['username'];
							$_SESSION['surname'] = $data['user_surname'];
							$_SESSION['forenames'] = $data['user_forenames'];
							echo 0;
						}
					} else {
						echo "Incorrect username and or password";
					}
				}
			}
		}
	}
