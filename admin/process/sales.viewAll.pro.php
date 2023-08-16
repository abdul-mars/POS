<?php require_once '../checkSession.php';
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		if (isset($_POST['userId']) && isset($_POST['invoiceNo'])) {
			$userId = mysqli_real_escape_string($con, $_POST['userId']);
			$invoiceNo = mysqli_real_escape_string($con, $_POST['invoiceNo']);
			// echo $invoiceNo;

			// $sql = mysqli_query($con, "SELECT * FROM sales WHERE sales_invoice_no = '$invoiceNo' AND sold_by = '$userId'");
			$sql = mysqli_query($con, "SELECT sales.*, products.product_name, users.user_surname, users.user_forenames
		        FROM sales
		        JOIN products ON sales.product_id = products.product_id
		        JOIN users ON sales.sold_by = users.user_id WHERE sales.sales_invoice_no = '$invoiceNo' AND sales.sold_by = '$userId'");
			if (mysqli_num_rows($sql) < 1) {
				echo 'Something went wrong';
			} else {
				$totalAmount = 0;
				while ($data = mysqli_fetch_assoc($sql)) { 
					$totalAmount = $totalAmount + $data['product_price'];
					$totalAmount = number_format($totalAmount, 2, '.', '');
					?>
					<tr>
						<td><?= $data['product_name']; ?></td>
						<!-- <td>12345</td> -->
						<td><?= $data['quantity_sold']; ?></td>
						<td><?= $data['product_price']; ?></td>
						<td><?= $data['date_sold']; ?></td>
						<td><?= strtoupper(substr($data['user_surname'], 0, 1)).'. '.$data['user_forenames']; ?></td>
					</tr>
				<?php } ?>
					<tr>
						<th colspan="4">Invoice Tatal Amount:</th>
						<th>Ghc: <?= $totalAmount; ?></th>
					</tr>
			<?php }
		}
	}