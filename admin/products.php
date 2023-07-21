<div class="col" style="width: 100vw">
	<div class="card mt-3">
		<div class="card-body">
			<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt- pb-2  mb- border-bottom">
				<h1 class="h2">Products</h1>
				<div class="btn-toolbar mb-2 mb-md-0">
					<!-- <button class="btn btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#addInventMdl"><i class="fas fa-plus"></i> Add New Product</button> -->
					<!-- Modal start -->
					<!-- <div class="modal fade" id="addInventMdl" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog modal-dialog-scrollable modal-dialog-centered ">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
								<div class="modal-body">
									<form action="#" method="post" id="productForm">
										<div class="mb-3">
											<label for="productName" class="form-label">Product Name</label>
											<input type="text" class="form-control" name="productName" id="productName" placeholder="Enter product name" required>
										</div>
										<div class="mb-3">
											<label for="productPrice" class="form-label">Product Price</label>
											<input type="number" class="form-control" name="productPrice" id="productPrice" placeholder="Enter product price" step="0.01" required>
										</div>
										<div class="mb-3">
											<label for="productImg" class="form-label">Product Image (PNG, JPG/JPEG)</label>
											<input type="file" class="form-control" name="productImg" id="productImg" accept=".png, .jpg, .jpeg" required>
										</div>
										<div class="mb-3">
											<label for="productStock" class="form-label">Product Stock</label>
											<input type="number" class="form-control" name="productStock" id="productStock" placeholder="Enter product stock" required>
										</div>
										<div class="mb-3">
											<label for="productDesc" class="form-label">Product Description</label>
											<textarea class="form-control" name="productDesc" id="productDesc" rows="3" placeholder="Enter product description"></textarea>
										</div>
										<div class="modal-footer">
											<input type="submit" name="addInventoryBtn" class="btn forestgreen btn-success" value="Add Product">
											<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div> -->
					<!-- modal end -->
				</div>
			</div>
		</div>
	</div>
	<div id="toastContainer" class="position-absolute top-0 end-0 p-3" style="z-index: 9999"></div>

	<div class="card mt-3">
		<div class="card-body">
			<div class="d-flex justify-content-between ">
				<h4>All Products in stock</h4>
				<button class="btn btn-outline-success" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
				   <i class="fas fa-chevron-down"></i>
				</button>
			</div>
			<hr>
			<?php $sql = "SELECT * FROM products WHERE stock != 0";
			$result = $con->query($sql);
			if ($result->num_rows < 1) {
				echo "No Product";
			} else { ?>
				<div class="table-responsive collapse show" id="collapseExample">
					<table class="table table-striped table-sm">
			          <thead>
			            <tr>
			              <th scope="col">#</th>
			              <th scope="col">Image</th>
			              <th scope="col">Name</th>
			              <th scope="col">Price</th>
			              <th scope="col">Stock</th>
			              <th scope="col">Action</th>
			            </tr>
			          </thead>
			          <tbody style="">
					<?php $count = 1;
					while ($data = $result->fetch_assoc()) { ?>
						<tr class="">
			              <td style=";"><?= $count; ?></td>
			              <td style=";"><img src="../assets/products/<?= $data['product_img']; ?>" width="50" height="50" alt="product image" style="border-radius: 50px;"></td>
			              <td style=";"><?= ucwords($data['product_name']); ?></td>
			              <td style=";"><?= $data['product_price']; ?></td>
			              <td style=";"><?= $data['stock']; ?></td>
			              <!-- <td style=";"><?= $data['product_name']; ?></td> -->
			              <td style=";">
			              	<button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#updatePriceMdl" product-price="<?= $data['product_price']; ?>" product-id="<?= $data['product_id']; ?>" product-name="<?= $data['product_name']; ?>">Update Price</button>
			              </td>
			            </tr>
					<?php $count++;
					}
				}
				?>
		          </tbody>
		        </table>
		    </div>


		    <!-- products out of stock -->
		    <!-- <hr> -->
		    <div class="d-flex justify-content-between mt-4">
				<h4>All Products out of stock</h4>
				<button class="btn btn-outline-success" type="button" data-bs-toggle="collapse" data-bs-target="#outOfStockCollapse" aria-expanded="false" aria-controls="outOfStockCollapse">
				   <i class="fas fa-chevron-down"></i>
				</button>
			</div>
			<?php $sql = "SELECT * FROM products WHERE stock = 0";
			$result = $con->query($sql);
			if ($result->num_rows < 1) {
				echo "No Product";
			} else { ?>
				<div class="table-responsive collapse" id="outOfStockCollapse">
					<table class="table table-striped table-hover table-sm">
			          <thead>
			            <tr>
			              <th scope="col">#</th>
			              <th scope="col">Image</th>
			              <th scope="col">Name</th>
			              <th scope="col">Price</th>
			              <th scope="col">Stock</th>
			              <th scope="col">Action</th>
			            </tr>
			          </thead>
			          <tbody style="">
					<?php $count = 1;
					while ($data = $result->fetch_assoc()) { ?>
						<tr class="">
			              <td style=";"><?= $count; ?></td>
			              <td style=";"><img src="../assets/products/<?= $data['product_img']; ?>" width="50" height="50" alt="product image" style="border-radius: 50px;"></td>
			              <td style=";"><?= ucwords($data['product_name']); ?></td>
			              <td style=";"><?= $data['product_price']; ?></td>
			              <td style=";"><?= $data['stock']; ?></td>
			              <!-- <td style=";"><?= $data['product_name']; ?></td> -->
			              <td style=";"><button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#updatePriceMdl" product-price="<?= $data['product_price']; ?>" product-id="<?= $data['product_id']; ?>" product-name="<?= $data['product_name']; ?>">Update Price</button></td>
			            </tr>
					<?php $count++;
					}
				}
				?>
		          </tbody>
		        </table>
		    </div>
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
					<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
					<button type="button" name="updatePriceBtn" id="updatePriceBtn" class="btn btn-success">Update Price</button>
				</div>
			</form>
		</div>
	</div>
</div>