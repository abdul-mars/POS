<?php session_start();
	require_once 'inc/dbConnect.php';
	if ((!isset($_SESSION['username'])) || (!isset($_SESSION['surname'])) || (!isset($_SESSION['forenames'])) || (!isset($_SESSION['userId'])) || (!isset($_SESSION['userSessionId']))) {
		header("location: ../index.php");
		// exit();
	} else {
		$userId = $_SESSION['userId'];
		$username = $_SESSION['username'];
		$surname = $_SESSION['surname'];
		$forenames = $_SESSION['forenames'];
		$phone = $_SESSION['phone'];
		$userSessionId = $_SESSION['userSessionId'];
	}
	
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- bootstrap -->
		<link rel="stylesheet" href="../css/bootstrap.min.css?s=<?= time(); ?>">
		<!-- font awesome -->
		<link rel="stylesheet" href="../css/all.css?s=<?= time(); ?>">
		<!-- custom css main -->
		<link rel="stylesheet" href="../css/style.css?s=<?= time(); ?>">
		<!-- custom admin css -->
		<link rel="stylesheet" href="css/style.css?s=<?= time(); ?>">
		<link rel="stylesheet" href="css/printlk.css?s=<?= time(); ?>">
		<title>Salers Page</title>
	</head>
	<body>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top shadow" style="margin-left: ;">
			<div class="container-fluid mx-0">
				<a class="navbar-brand" href="#">
					<img src="../assets/school bag.png" width="40" height="40" style="border-radius: 50px;" alt=""> <?//= ucwords($surname.' '.$forenames); ?> MARs LIMITED
				</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse justify-content-end" id="navbarNav" style="">
					<ul class="navbar-nav ml-auto" style="">
						<?php echo ($_SESSION['role'] === 'admin') ? '<li class="nav-item">
							<a class="nav-link active" href="../admin/index.php">Go To Admin</a>
						</li>' : ''; ?>
						<li class="nav-item">
							<a class="nav-link" href="index.php">Home</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="reports.php">Reports</a>
						</li>
						<!-- <li class="nav-item">
							<a class="nav-link active" href="../signout.php"><i class="fas fa-power-off"></i> Sign Out</a>
						</li> -->
						<li class="nav-item">
							<div class="dropdown open bg-dark downBtnDiv">
								<button class="btn border-none text-white dropdown-toggle m-0" type="button" id="triggerId" data-bs-toggle="dropdown" data-aria-expanded="false">
								<i class="fas fa-user-circle"></i> <span class="ms-2 d-none d-sm-inline"><?//= ucwords($name); ?></span>
								</button>
								<div class="dropdown-menu dropdown-menu-end dropdown-menu-dark" aria-labbeledby="triggerId">
									<!-- <button class="dropdown-item"><i class="fas fa-cog"></i> Settings</button> -->
									<!-- <button class="dropdown-item"><i class="far fa-user"></i> Profile</button> -->
									<a href="profile.php" class="dropdown-item">
										<i class="far fa-user"></i> Profile
									</a>
									<!-- <button class="dropdown-item"><i class="far fa-user-circle"></i> Notification</button> -->
									<div class="dropdown-divider"></div>
									<a href="../signout.php" class="dropdown-item"><i class="fas fa-power-off"></i> Sign Out</a>
								</div>
							</div>
						</li>
						
					</ul>
				</div>
			</div>
		</nav>