<?php require_once '../checkSession.php';
	if (isset($_GET['action']) && $_GET['action'] === 'inventory_table') {
		$sql = "SELECT * FROM products";
		$result = $con->query($sql);
		if ($result->num_rows < 1) {
			echo "No Product in the inventory";
		} else { ?>
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
	              <td><?= $count; ?></td>
	              <td><img src="../assets/products/<?= $data['product_img']; ?>" width="50" height="50" alt="product image" style="border-radius: 50px;"></td>
	              <td><?= ucwords($data['product_name']); ?></td>
	              <td class="price"><?= $data['product_price']; ?></td>
	              <td class="stock"><?= $data['stock']; ?></td>
	              <!-- <td><?= $data['product_name']; ?></td> -->
	              <td>
	              	<button class="btn forestgreen btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#updateInventoryMdl" product-id="<?= $data['product_id']; ?>" product-name="<?= $data['product_name']; ?>">
	              		Restock
	              	</button>
	              </td>
	            </tr>
			<?php $count++;
			}
		}
		?>
          </tbody>
        </table>
	<?php } if (isset($_GET['action']) && $_GET['action'] === 'product_table') { ?>
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
		              	<button class="btn forestgreen btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#updatePriceMdl" product-price="<?= $data['product_price']; ?>" product-id="<?= $data['product_id']; ?>" product-name="<?= $data['product_name']; ?>">Update Price</button>
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
	<?php }