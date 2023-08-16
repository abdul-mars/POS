<?php require_once 'checkSession.php';
	
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
	<!-- jQuery -->
	<script src="../js/jquery-3.7.js?s=<?= time(); ?>"></script>
	<title>Admin Dashboard</title>
</head>
<body class="" style="">
	<div class="loader">
		<div class="loaderImg">
			<img src="../assets/loader/loader.gif" width="300" height="300" alt="">
		</div>
	</div>
	<?php echo isset($_SESSION['NewUser']) ? $_SESSION['NewUser'] : ''; ?>
	<style>
		/*.loader{
			width: 100%;
			height: 100vh;
			background-color: rgba(0, 0, 0, 0.5);
			top: 0;
			left: 0;
			position: fixed;
			z-index: 9999999999999999999999999;
		}*/
	</style>
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
	<!-- custom js main -->
	<script src="../js/script.js?s=<?= time(); ?>"></script>
	<script src="js/script.js?s=<?= time(); ?>"></script>
	<script src="js/ajax.tables.pro.js?s=<?= time(); ?>"></script>
	
	
</body>
</html>