<?php require_once '../inc/dbConnect.php';
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		if (isset($_POST['signinBtn'])) {
			if (empty($_POST['username']) || empty($_POST['password'])) {
				echo "Both fields are required";
			} else {
				$username = mysqli_real_escape_string($con, $_POST['username']);
				$password = mysqli_real_escape_string($con, $_POST['password']);
				$sql = "SELECT user_id, user_surname, user_forenames, username, user_password, user_role, user_phone, last_login FROM users WHERE username = '$username'";
				$runSql = $con->query($sql);

				if ($runSql->num_rows < 1) {
					echo json_encode("Incorrect username and or password");
				} else {
					$data = $runSql->fetch_assoc();
					// $msg = [];
					if (password_verify($password, $data['user_password'])) {
						// echo "login success";
						session_start(); //start session

						session_regenerate_id();
						$userSessionId = session_id();

						// // update last login
						// $lastLogin = date('Y-m-d h:i:s');
						// // echo $lastLogin;
						// $sql = "UPDATE users SET last_login = ? WHERE user_id = ?";
						// $stmt = $con->prepare($sql);
						// $stmt->bind_param('si', $lastLogin, $data['user_id']);
						// $stmt->execute();
						// $_SESSION['role'] = $data['user_role'];
						$_SESSION['userId'] = $data['user_id'];
						$_SESSION['phone'] = $data['user_phone'];
						$_SESSION['userSessionId'] = $userSessionId;
						if (empty($data['last_login'])) {
							$last_login[] = false;
							$_SESSION['NewUser'] = '<div class="newUserDiv" style="display:">
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
						} else {
							$last_login = true;
						}
						if ($data['user_role'] === 'admin') {
							// echo "admin login";
							// $_SESSION['adminUserId'] = $data['user_id'];
							// $_SESSION['adminUsername'] = $data['username'];
							// $_SESSION['adminSurname'] = $data['user_surname'];
							// $_SESSION['adminForenames'] = $data['user_forenames'];
							// $_SESSION['adminRole'] = $data['user_role'];
							$success[] =  1;
							
						} else {
							// echo "user login";
							$_SESSION['userId'] = $data['user_id'];
							$_SESSION['username'] = $data['username'];
							$_SESSION['surname'] = $data['user_surname'];
							$_SESSION['forenames'] = $data['user_forenames'];
							
							$success[] = 0;
						}
						// // update last login
						$lastLogin = date('Y-m-d h:i:s');
						// echo $lastLogin;
						$sql = "UPDATE users SET last_login = ?, login_session = ? WHERE user_id = ?";
						$stmt = $con->prepare($sql);
						$stmt->bind_param('ssi', $lastLogin, $userSessionId, $data['user_id']);
						$stmt->execute();
						$response = array("success" => $success, "lastLogin" => $last_login);
						echo json_encode($response);
						// echo json_encode($response);
					} else {
						// echo "Incorrect username and/or password";
						echo json_encode("Incorrect username and/or password");
					}
				}
			}
		}
	}
