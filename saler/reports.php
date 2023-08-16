
		<?php include_once 'inc/header.php'; ?>

		<div class="container-fluid">
			<div class="card my-3">
				<div class="card-body">
					<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt- pb-2  mb- border-bottom">
						<h1 class="h2">Sales Reports</h1>
						
					</div>
				</div>
			</div>
			<div class="card p-2 my-3" style="background: transparent;">
				<!-- <h4>Sales Summary</h4> -->
				<div class="card-body">
					<!-- <div class="reportSammaryMainDiv">
						<div class="card reportSammaryDiv " style="background: #ffa300; border-left: 7px solid #000096;" data-time="today">
							<div class="card-body cardBody py-4">
								<div style="font-size: 20px">
									<h5>Today's Sales</h5>
									<h3 style="font-size: 30px;"> Ghc 400</h3>
								</div>
								<div class="text-muted">
									<i class="fas fa-list-ol fa-4x s-1"></i>
								</div>
							</div><hr class="" style="margin: -10px 0 0 0">
							<div class="card-foter text-center px-3 pt-1">
								<h5>View More <i class="fas fa-arrow-right"></i></h5>
							</div>
						</div>
						<div class="card reportSammaryDiv" style="background: forestgreen; border-left: 7px solid #ffa300;" data-time="week">
							<div class="card-body cardBody py-4 text-light">
								<div style="font-size: 20px">
									<h5>This Weeks's Sales</h5>
									<h3 style="font-size: 30px;"> Ghc 400</h3>
								</div>
								<div class="text-muted">
									<i class="fas fa-list-ol fa-4x s-1"></i>
								</div>
							</div>
						</div>
						<div class="card reportSammaryDiv" style="background: #000096; border-left: 7px solid forestgreen;" data-time="month">
							<div class="card-body cardBody py-4 text-light">
								<div style="font-size: 20px">
									<h5>This Month's Sales</h5>
									<h3 style="font-size: 30px;"> Ghc 400</h3>
								</div>
								<div class="text-mute text-light">
									<i class="fas fa-list-ol fa-4x s-1"></i>
								</div>
							</div>
						</div>
					</div> -->
					<form action="#" method="post" class="" id="viewSalesForm">
						<div class="row d-flex justify-content-between">
							<div class="row mb-3 col-4">
								<label for="fromDate" class="col-sm-2 col-form-label">From</label>
								<div class="col-sm-10">
									<input type="date" name="fromDate" class="form-control" id="fromDate">
								</div>
							</div>
							<div class="row mb-3 col-4">
								<label for="toDate" class="col-sm-2 col-form-label">To</label>
								<div class="col-sm-10">
									<input type="date" name="toDate" class="form-control" id="toDate" style="margin-left: -30px" max="<?= date('Y-m-d'); ?>" value="<?= date('Y-m-d'); ?>">
								</div>
							</div>
							<div class="col-4">
								<button class="btn btn-success" type="submit" id="viewSalesBtn">View Sales</button>
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="card">
				<div class="card-body">
					<!-- <div class="selectDiv row">
						<div class="col-4">
							<label for="timePeriod" class="form-label">Select time to view report</label>
							<select id="timePeriod" class="form-control">
								<option value="day">Today</option>
								<option value="week">This Week</option>
								<option value="month">This Month</option>
							</select>
						</div>
						<div class="col-2">
							<button id="viewSalesBtn" class="btn btn-success ">View Report</button>
						</div>
					</div> -->
					<div>
						<h5>Date: <?= date('F d, Y'); ?></h5>
						<h5>Seller: <?= ucwords($surname.' '.$forenames); ?></h5>
					</div> <hr style="margin-top: -7px">
					<div id="salesList" class="mt-3 card">
						<div class="card-body">
							<h3 class="text-left">Summary</h3>
							<div style="background: #eee; padding: 10px;">
								<h5>Total Sales: Ghc 890</h5>
								<h5>Number of Orders: 40</h5>
								<h5>Average Order Value: Ghc 30</h5>
							</div>
							<!-- <h3>Top-Selling Products</h3> -->
							<div class="salesReportDiv">
								
							</div>
							
						</div>
					</div>
					<div id="totalAmount">
						
					</div>
				</div>
			</div>
		</div>
<?//= require_once 'inc/footer.php'; ?>
<!-- bootstrap js -->
		<script src="../js/bootstrap.bundle.min.js?s=<?= time(); ?>"></script>
		<!-- jQuery -->
		<script src="../js/jquery-3.7.js?s=<?= time(); ?>"></script>
		<!-- custom js main -->
		<script src="../js/script.js?s=<?= time(); ?>"></script>
		<script src="js/script.js?s=<?= time(); ?>"></script>
		<script src="js/report.js?s=<?= time(); ?>"></script>
	</body>
</html>