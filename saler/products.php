<?php session_start();
	if ((!isset($_SESSION['username'])) || (!isset($_SESSION['surname'])) || (!isset($_SESSION['forenames'])) || (!isset($_SESSION['userId']))) {
		header("location: ../index.php");
		exit();
	} else {
		$userId = $_SESSION['userId'];
		$username = $_SESSION['username'];
		$surname = $_SESSION['surname'];
		$forenames = $_SESSION['forenames'];
	}
	require_once '../inc/dbConnect.php';
	
	$sql = "SELECT product_id, product_name, product_price, product_desc, product_img, stock FROM products WHERE stock != 0";
	$result = $con->query($sql);
	if ($result -> num_rows < 1) {
		echo "No product";
	} else { 
		while ($data = $result->fetch_assoc()) { ?>
			<!-- <div class="card proCard"> -->
			<div class="card proCard" product-name="<?= $data['product_name']; ?>" product-price="<?= $data['product_price']; ?>" product-id="<?= $data['product_id']; ?>" product-img="<?= $data['product_img']; ?>" product-stock="<?= $data['stock']; ?>">
				<div class="proCardInner">
					<div class="proName">
						<p class="fw-bold"><?= $data['product_name']; ?></p>
					</div>
					<div class="proImg">
						<img src="../assets/products/<?= $data['product_img']; ?>" alt="product image" width="50" height="50">
					</div>
					<div class="proPrice" style="<!-- background-color: lavender; -->">
						<p class="fw-bold">₵<?= $data['product_price']; ?></p>
					</div>
				</div>					
			</div>
		<?php }
	}
?>