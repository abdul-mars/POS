<?php session_start();
	if ((!isset($_SESSION['username'])) || (!isset($_SESSION['surname'])) || (!isset($_SESSION['forenames'])) || (!isset($_SESSION['userId']))) {
		header("location: ../index.php");
		// exit();
	} else {
		$userId = $_SESSION['userId'];
		$username = $_SESSION['username'];
		$surname = $_SESSION['surname'];
		$forenames = $_SESSION['forenames'];
	}
	require_once '../inc/dbConnect.php';
	
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
		<title>Salers Page</title>
	</head>
	<body>
		<!-- <div class="loader">
			<div class="loaderImg">
				<img src="../assets/products/1689189644_64aefd0c1fb0d.png" width="100" height="100" alt="">
			</div>
		</div> -->
		<div class="prntChkout" style="display: none;">
			
		</div>
		<?php include_once 'inc/header.php'; ?>
		<div class="container-fluid row flex-nowrap d-flex justify-content-between">
			<div class="main mt-3 col">
				<!-- <div>					
					<div class="input-group mb-3" style="width: ;">
						<input type="text" class="form-control p-" name="searchProduct" id="searchProduct" placeholder="Type product name to search" aria-describedby="basic-addon2" autocomplete="off" style="font-size: 20px;">
						<span class="input-group-text" id="basic-addon2"><i class="fas fa-search"></i></span>
					</div>
				</div>
				<div class="searchResultsMain mb-3">
					<h4 class="text-center my-">Search Results</h4>
					<div class="searchResults">
						
					</div> <hr>
				</div> -->
				<div>
					<div class="input-group mb-3" style="width: ;">
						<input type="text" class="form-control p-" name="searchProduct" id="searchProduct" placeholder="Type product name to search" aria-describedby="basic-addon2" autocomplete="off" style="font-size: 20px;">
						<span class="input-group-text" id="basic-addon2"><i class="fas fa-search"></i></span>
					</div>
				</div>
				<div class="searchResultsMain mb-3">
					<h4 class="text-center my-">Search Results</h4>
					<div class="searchResults"></div>
					<hr>
				</div>

				<div class="cards">
					
				</div>
			</div>
			<div class="rightSide col-3" style="">
				<div class="rightSideInner">
					<!-- <div class="text-center">
						<h4 class="text-center">MARs LIMITED</h4>
						<p>P.O.BOX 34, KANVILI - TAMALE <br>TEL: 0249393898 / 0507557540</p>
					</div> -->
					<h3 class="text-center">Cart <span class="itemsInCart"></span></h3> <hr style="margin-top: -7px;">
					<div class="productItemMainDiv">
						<div class="productItems">
							
						</div>
						<div class="btnsDiv">
							<div class="totalDiv">
								<h4>Total:</h4>
								<h4 class="totalPrice">Ghc </h4>
							</div>
							<div class="checkoutDiv">
								<button class="btn btn-lg btn-success checkoutBtn">Checkout</button>
							</div>
							<div class="keepClearDiv">
								<button class="btn btn-primary keepBtn">Keep</button>
								<button class="btn btn btn-danger clearBtn">Clear</button>
							</div>
						</div>
					</div>
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
	</body>
</html>