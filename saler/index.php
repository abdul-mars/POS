<?php include_once 'inc/header.php'; ?>
<?php echo isset($_SESSION['NewUser']) ? $_SESSION['NewUser'] : ''; ?>
<div class="loader">
	<div class="loaderImg">
		<img src="../assets/loader/loader.gif" width="300" height="300" alt="">
	</div>
</div>
<div class="prntChkout" style="display: none;">
	
</div>

<div class="container-fluid row flex-nowrap d-flex justify-content-between">
	<div class="main mt-3 col" style="margin-left: ; margin-right:;">
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
	<div class="rightSide col-3" style="z-index: 9; margin-right: -20px;">
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
						<button class="btn btn-primary keepBtn"  title="Coming Soon">Keep</button>
						<button class="btn btn btn-danger clearBtn">Clear</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="footer bg-dark text-light">
	<div class="footerMain">
		<div class="footerain row col-6">
			<div class="col-5"><h5 class="p-2"><a href="../signout.php"><i class="fas fa-power-off"></i></a> <?= $surname.' '.$forenames; ?></h5></div>
			<div class="tal col-1">
				<div class="tall"></div>
			</div>
			<div class="col-3" style="margin-left: 10px;">
				<h5>Today: <br> GHS <strong class="totalSales"></strong>
				</h5>
			</div>
		</div>
		<div class="col-6 footerMain">
			<!-- <div class="tall"></div> -->
			<p>Powered By: MARs Tech | v1.0</p>
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
		<script>
			
		</script>
	</body>
</html>
<?//= require_once 'inc/footer.php'; ?>