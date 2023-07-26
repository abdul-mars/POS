<div class="col" style="width: 100vw">
	<div class="card mt-3">
		<div class="card-body">
			<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt- pb-2  mb- border-bottom">
				<h1 class="h2">Sales Reports</h1>
				<div class="btn-toolbar mb-2 mb-md-0">
					
				</div>
			</div>
		</div>
	</div>
	<div id="toastContainer" class="position-absolute top-0 end-0 p-3" style="z-index: 9999"></div>

	<div class="card mt-3">
		<div class="card-body">
			<form action="#" method="post" class="" id="reportForm">
				<div class="row d-flex justify-content-between">
					<div class="row mb-3 col-4">
						<label for="fromDate" class="col-sm-3 col-form-label">From</label>
						<div class="col-sm-8">
							<input type="date" name="fromDate" class="form-control" id="fromDate" max="<?= date('Y-m-d'); ?>">
						</div>
					</div>
					<div class="row mb-3 col-4">
						<label for="toDate" class="col-sm-2 col-form-label">To</label>
						<div class="col-sm-8">
							<input type="date" name="toDate" class="form-control" id="toDate" style="margin-left: -30px" max="<?//= date('Y-m-d'); ?>" value="<?= date('Y-m-d'); ?>">
						</div>
					</div>
					<div class="col-4">
						<button class="btn btn-success" type="submit" id="reportFormBtn">View Sales</button>
					</div>
				</div>
			</form>
		</div>
	</div>
	<div class="card mt-3 reportCard">
		
	</div>
</div>
<script src="js/reports.js"></script>