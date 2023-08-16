<div class="col" style="width: 100vw">
	<div class="card mt-3"> <?php //$timeZone = date_default_timezone_get();
		  	//date_default_timezone_set($timeZone);
	 //echo date('d-m-Y h:i:s'); ?>
		<div class="card-body">
			<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt- pb-2  mb- border-bottom">
				<h1 class="h2">Inventory</h1>
				<div class="btn-toolbar mb-2 mb-md-0">
					<button class="btn btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#addInventMdl"><i class="fa fa-plus"></i> Add New Product</button>
					<!-- Modal start -->
					<div class="modal fade" id="addInventMdl" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable ">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Add New Product</h5>
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
								<div class="modal-body">
									<form action="#" method="post" id="productForm">
										<div class="mb-3">
											<label for="productName" class="form-label">Product Name</label>
											<input type="text" class="form-control" name="productName" id="productName" placeholder="Enter product name" required>
										</div>
										<div class="mb-3 row">
											<div class="col-6">
												<label for="costPrice" class="form-label">Cost Price</label>
												<input type="number" class="form-control" name="costPrice" id="costPrice" placeholder="Enter product price" step="0.01" required>
											</div>
											<div class="col-6">
												<label for="productPrice" class="form-label">Selling Price</label>
												<input type="number" class="form-control" name="productPrice" id="productPrice" placeholder="Enter product price" step="0.01" required>
											</div>
										</div>
										<div class="mb-3 row">
											<div class="col-6">
												<label for="productImg" class="form-label"><small>Product Image (PNG, JPG/JPEG)</small></label>
												<input type="file" class="form-control" name="productImg" id="productImg" accept=".png, .jpg, .jpeg" required>
											</div>
											<div class="col-6">
												<label for="productStock" class="form-label">Product Stock</label>
												<input type="number" class="form-control" name="productStock" id="productStock" placeholder="Enter product stock" required>
											</div>
										</div>
										<!-- <div class="mb-3">
												
										</div> -->
										<div class="mb-3">
											<label for="productDesc" class="form-label">Product Description</label>
											<textarea class="form-control" name="productDesc" id="productDesc" rows="3" placeholder="Enter product description"></textarea>
										</div>
									</div>
										<div class="modal-footer">
											<!-- <button type="button" name="addInventoryBtn" id="addInventoryBtn" class="btn forestgreen btn-success">Add Product</button> -->
											<input type="submit" name="addInventoryBtn" class="btn forestgreen btn-success" value="Add Product">
											<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
										</div>
									</form>
								<!-- </div> -->
							</div>
						</div>
					</div>
					<!-- modal end -->
				</div>
			</div>
		</div>
	</div>
	<div class="card mt-3">
		<div class="card-body">
			<h4>All Products in inventory</h4>
			<hr>
			<div class="table-responsive" id="inventoryTable">
				
		    </div>
		</div>
	</div>
</div>

<!-- restock Modal -->
<div class="modal fade" id="updateInventoryMdl" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-s">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="" method="post" id="restockForm">
	      <div class="modal-body row">
	      	<div class="mb-3 col-6">
	      		<input type="hidden" name="productId" id="productId" value="">
	      		<label for="stock" class="form-label">Stock</label>
		        <input type="text" name="stock" id="stock" class="form-control" placeholder="Enter the number of stock to add">
	      	</div>
	      	<div class="mb-3 col-6">
	      		<label for="costPrice" class="form-label">Cost Price</label>
		        <input type="number" name="costPrice" id="costPrice" class="form-control" placeholder="Enter the cost price">
	      	</div>
	      	<input type="hidden" name="newPrice">
	      	<div class="mb-3 col-6 newPriceDiv">
	      				        
	      	</div>
			<div class="form-check form-switch mb-3 col-12" style="margin-left: 10px">
				<input class="form-check-input " type="checkbox" name="updatePriceCheck" id="updatePriceCheck" role="switch">
				<label class="form-check-label" for="updatePriceCheck">Update Price?</label>
			</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-success updateStockBtn">Restock</button>
	        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
	      </div>
  	</form>
    </div>
  </div>
</div>
<!-- inventory js -->
<script src="js/inventory.js?s=<?= time(); ?>"></script>