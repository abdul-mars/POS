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
	require_once '../../inc/dbConnect.php';

	if (@$_GET['action'] === 'search') {
	  $searchProduct = mysqli_real_escape_string($con, $_POST['searchProduct']);
	  $sql = "SELECT product_id, product_name, product_price, product_desc, product_img, stock FROM products WHERE product_name LIKE '%$searchProduct%'";
	  $result = $con->query($sql);
	  
	  if ($result->num_rows < 1) {
	    echo "No product";
	  } else {
	    while ($data = $result->fetch_assoc()) { ?>
	      <div class="card <?php echo ($data['stock'] > 0) ? "proCard" : "outOfStock"; ?>" product-name="<?= $data['product_name']; ?>" product-price="<?= $data['product_price']; ?>" product-id="<?= $data['product_id']; ?>" product-img="<?= $data['product_img']; ?>" product-stock="<?= $data['stock']; ?>">
	        <div class="proCardInner">
	          <div class="proName">
	            <h5><?= $data['product_name']; ?></h5>
	          </div>
	          <div class="proImg">
	            <img src="../assets/products/<?= $data['product_img']; ?>" alt="product image" width="100">
	          </div>
	          <div class="proPrice">
	            <h5>₵<?= $data['product_price']; ?></h5>
	          </div>
	        </div>
	      </div>
	    <?php }
	  }
	}


	if (@$_GET['action'] === 'checkout') {
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			
			// Retrieve the product items data from the frontend
			$itemsData = $_POST['items'];

			// get new invoice no
			$sqlInvoice = mysqli_query($con, "SELECT sales_invoice_no FROM sales ORDER BY sales_id DESC LIMIT 1");
			$dataInvoice = mysqli_fetch_assoc($sqlInvoice);
			$invoiceNo = $dataInvoice['sales_invoice_no'] + 1;

			$totalAmount = 0;
			$chkoutItems = '';
			foreach ($itemsData as $item) {
			  $productId = $item['productId'];
			  $quantity = $item['quantity'];

			  $sql = "SELECT product_id, product_name, product_price, stock FROM products WHERE product_id = $productId";
			  $result = $con->query($sql);
			  if ($result -> num_rows < 1) {
			  	echo "Something went wrong";
			  } else {
			  	while ($data = $result->fetch_assoc()) {
			  		$productIdFromDb = $data['product_id'];
			  		$productNameFromDb = $data['product_name'];
			  		$productPrice = $data['product_price'];
			  		$productStock = $data['stock'];
			  		$sqlInsetToSales = "INSERT INTO sales (
			  			product_id,
			  			product_price, 
			  			sales_invoice_no,
			  			quantity_sold, 
			  			sold_by
			  			) VALUES (
			  			'$productIdFromDb',
			  			'$productPrice',
			  			'$invoiceNo',
			  			'$quantity',
			  			'$userId'
			  		);";

			  		// check if inserted to sales tb
			  		if ($con -> query($sqlInsetToSales) === TRUE) {

			  			$newStock = $productStock - $quantity;
			  			// update stock
			  			$sqlUpdateStock = "UPDATE products SET stock = '$newStock' WHERE product_id = '$productIdFromDb'";
			  			if ($con -> query($sqlUpdateStock) === TRUE) {
			  				$subTotal = $quantity * $productPrice;
			  				$chkoutItems .= '<tr>
									<td>'.$productNameFromDb.'</td>
									<td>'.$quantity.'</td>
									<td>'.$productPrice.'</td>
									<td>'.$subTotal.'</td>
								</tr>';
							$totalAmount += $subTotal;
			  				$itemsSold = 'Items sold successfully';
			  			}
			  		} else {
			  			echo "Something went wrong selling";
			  		}
			  	}
			  }
			  // echo $itemsSold;		  
			  // echo 'Product ID: ' . $productId . ', Quantity: ' . $quantity . '<br>';
			}
			// echo $chkoutItems;
			echo '<div class="chkoutMain shadow-sm">
				<div class="text-cente bg-light pt-2" style="width: 100%;">
					<h4 class="text-center">MARs LIMITED</h4>
					<p class="text-center">P.O.BOX 34, KANVILI - TAMALE <br>TEL: 0249393898 / 0507557540</p>
					<small class="invTime">
						<p>Inv No: '.$invoiceNo.'</p>
						<p>'.date('d-M-Y H:i:s').'</p>
					</small> <hr style="margin-top: -10px; margin-bottom: ;">
					<div class="chkoutItems p-2" style="width: ;">
						<table class="text-left" style="width: 100%;">
							<thead>
								<tr>
									<th>ItemName</th>
									<th>Qty</th>
									<th>Price</th>
									<th>Total</th>
								</tr>
							</thead>
							<tbody>
								'.$chkoutItems.'
								<tr class="" style="background: #eee;">
									<th colspan="3">Total Amount:</th>
									<th>Ghc '.$totalAmount.'</th>
								</tr>
							</tbody>
						</table>
					</div>
					<hr>
					<div class="prtBtnDiv text-center " style="width: 100%; margin-bottom: 20px !important;">
						<button class="btn btn-success prtBtn px-5" style="float: left; margin-left: 15px; margin-bottom: 10px;">Print</button>
						<button class="btn btn-outline-danger cancelBtn px-3" style="float: right; margin-right: 15px; margin-bottom: 10px;">Cancel</button>
					</div>
				</div>
			</div>';
		}
	}
