<?php session_start();
	if ((!isset($_SESSION['adminUsername'])) || (!isset($_SESSION['adminSurname'])) || (!isset($_SESSION['adminForenames'])) || (!isset($_SESSION['role']))) {
		header("location: ../index.php");
		// exit();
	} else {
		if ($_SESSION['role'] !== 'admin') {
			header("location: ../index.php");
			// exit();
		} else {
			$adminUsername = $_SESSION['adminUsername'];
			$adminSurname = $_SESSION['adminSurname'];
			$adminForenames = $_SESSION['adminForenames'];
		}
	}
	require_once 'inc/dbConnect.php';
	
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
	<title>Admin Dashboard</title>
</head>
<body>
	<?php require_once 'inc/header.php'; ?>
	<div class="container-fluid" style="padding: px;">
		<div id="toastContainer" class="position-absolute top-0 end-0 p-3" style="z-index: 9999"></div>
		<div class="row flex-nowrap" style="">

			<!-- <div class="col"> -->
				<?php require_once 'inc/sidebar.php' ?>

				<?php //if (isset($_GET['page']) ) {
				// 	include_once $_GET['page'] . '.php';
				// } else {
				// 	include_once 'dashboard'.'.php';
				// } ?>
				
				<?php $page = isset($_GET['page']) && !empty($_GET['page']) ? $_GET['page'] : 'dashboard';
					include_once($page.'.php');
				?>
			</div>
		</div>
	</div>


	<!-- bootstrap js -->
	<script src="../js/bootstrap.bundle.min.js?s=<?= time(); ?>"></script>
	<!-- jQuery -->
	<script src="../js/jquery-3.7.js?s=<?= time(); ?>"></script>
	<!-- custom js main -->
	<script src="../js/script.js?s=<?= time(); ?>"></script>
	<script src="js/script.js?s=<?= time(); ?>"></script>
	<!-- inventory js -->
	<script src="js/inventory.js?s=<?= time(); ?>"></script>
	<!-- products js -->
	<script src="js/products.js?s=<?= time(); ?>"></script>
</body>
</html>