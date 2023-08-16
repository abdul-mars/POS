<?php require_once '../checkSession.php';
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		if (isset($_POST['updateStockBtn'])) {
			$productId = mysqli_real_escape_string($con, $_POST['productId']);
			$newStock = mysqli_real_escape_string($con, $_POST['newStock']);
			$costPrice = mysqli_real_escape_string($con, $_POST['newCostPrice']);
			$updatePriceCheck = $_POST['updatePriceCheck'];
			$newPrice = isset($_POST['newPrice']) ? $_POST['newPrice'] : null;

			if (!empty($newStock) || !empty($costPrice)) {
				if ($updatePriceCheck == 'true') {
					$sql = "UPDATE products SET stock = stock + ?, cost_price = ?, product_price = ? WHERE product_id = ?";
					$stmt = $con->prepare($sql);
					$stmt->bind_param('iddi', $newStock, $costPrice, $newPrice, $productId);
				} else {
					$sql = "UPDATE products SET stock = stock + ?, cost_price = ? WHERE product_id = ?";
					$stmt = $con->prepare($sql);
					$stmt->bind_param('idi', $newStock, $costPrice, $productId);
				}
				if ($stmt->execute()) {
					echo 'stock updated successfully';
				} else {
					echo "unable to update stock";
				}
			}
		}
	}