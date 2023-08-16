<div class="col" style="width: 100vw">
	<div class="card mt-3">
		<div class="card-body">
			<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt- pb-2  mb- border-bottom">
				<h1 class="h2">Sales</h1>
				<div class="btn-toolbar mb-2 mb-md-0">
				</div>
			</div>
		</div>
	</div>
	<div id="toastContainer" class="position-absolute top-0 end-0 p-3" style="z-index: 9999"></div>

	<div class="card mt-3">
		<div class="card-body" id="">
			<ul class="nav nav-pills">
			<?php $sql = mysqli_query($con, "SELECT user_id, user_surname, user_forenames, user_role FROM users");
				while ($data = mysqli_fetch_assoc($sql)) { ?>
					<li class="nav-item">
						<a class="nav-link text-dark tab" user-id="<?= $data['user_id']; ?>" aria-current="page" href="#"><?= substr($data['user_surname'], 0, 1).'. '.$data['user_forenames']; ?></a>
					</li>
					<li class="nav-item">
						<div style="width: 2px; height: 90%; background-color: forestgreen; margin: 2px;"></div>
					</li>
				<?php }?>
			</ul>
			<div class="tab1">
				<div class="card p-2 mt-2 bg-light">
					<form action="#" method="post" class="d-flex justify-content-between align-items-center">
						<div class="d-flex justify-content-between align-items-center">
							<label for="fromDate">From:</label>
							<input type="date" class="" id="fromDate" name="fromDate">
						</div>
						<div>
							<label for="toDate">To:</label>
							<input type="date" id="toDate" name="toDate">
						</div>
						<div>
							<button type="button" class="btn forestgreen mx-3 viewSalesBtn" style="font-size: 17px">View Sales</button>
						</div>
					</form>
					<style>
						label{
							font-size: 17px;
							padding-right: 17px;
						}
						input{
							font-size: 17px;
							padding: 5px 30px;
							border-radius: 10px;
							border: 2px solid #ccc;
						}
					</style>
				</div>
				<div class="card mt-3">
					<div class="card-body table-responsive salesDiv">
						<table class="table table-sm table-hover table-striped">
							<thead>
								<tr>
									<th>#</th>
									<th>Products</th>
									<th>Invoice</th>
									<th>Quantity</th>
									<th>Amount (Ghc)</th>
									<th>Time</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody class="salesTbBd">
								
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="viewAllSalesMdl" data-bs-keyboard="false" data-bs-backdrop="static" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="staticBackdropLabel">All products in invoice </h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body table-responsive">
				<table class="table table-hover table-striped">
					<thead>
						<tr>
							<th>Item</th>
							<!-- <th>Invoice</th> -->
							<th>Qty</th>
							<th>Amount</th>
							<th>Date</th>
							<th>Sold By</th>
						</tr>
					</thead>
					<tbody class="viewAllSalesTbBd">
						<tr>
							<td>Needle</td>
							<!-- <td>12345</td> -->
							<td>3</td>
							<td>Ghc 5</td>
							<td>23/4/2023</td>
							<td>M. Rashid</td>
						</tr>
						<tr>
							<td>Needle</td>
							<!-- <td>12345</td> -->
							<td>3</td>
							<td>Ghc 5</td>
							<td>23/4/2023</td>
							<td>M. Rashid</td>
						</tr><tr>
							<td>Needle</td>
							<!-- <td>12345</td> -->
							<td>3</td>
							<td>Ghc 5</td>
							<td>23/4/2023</td>
							<td>M. Rashid</td>
						</tr><tr>
							<td>Needle</td>
							<!-- <td>12345</td> -->
							<td>3</td>
							<td>Ghc 5</td>
							<td>23/4/2023</td>
							<td>M. Rashid</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<!-- products js -->
<script src="js/sales.js?s=<?= time(); ?>"></script>