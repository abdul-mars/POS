<div class="col" style="width: 100vw">
	<div class="card mt-3">
		<div class="card-body">
			<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt- pb-2  mb- border-bottom">
				<h1 class="h2">Products</h1>
				<div class="btn-toolbar mb-2 mb-md-0">
				</div>
			</div>
		</div>
	</div>
	<div id="toastContainer" class="position-absolute top-0 end-0 p-3" style="z-index: 9999"></div>

	<div class="card mt-3">
		<div class="card-body" id="productTable">
			
		</div>
	</div>
</div>
<!-- Modal -->
<div class="modal fade" id="updatePriceMdl" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="staticBackdropLabel">Update Price for </h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<form action="#" method="post" id="updatePriceForm">
				<div class="modal-body">
					<label for="newPrice" class="form-label">New Price</label>
					<input type="number" name="newPrice" id="newPrice" class="form-control">
					<input type="hidden" name="productId" id="productId" value="" class="form-control">
				</div>
				<div class="modal-footer">
					<button type="button" name="updatePriceBtn" id="updatePriceBtn" class="btn forestgreen btn-success">Update Price</button>
					<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- products js -->
<script src="js/products.js?s=<?= time(); ?>"></script>