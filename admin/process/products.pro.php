<?php require_once '../inc/dbConnect.php';
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		if (isset($_POST['updatePriceBtn'])) {
			$productId = mysqli_real_escape_string($con, $_POST['productId']);
			$newPrice = mysqli_real_escape_string($con, $_POST['newPrice']);

			// echo $newPrice;
			$sql = "UPDATE products SET `product_price` = ? WHERE `product_id` = ?";
			$stmt = $con->prepare($sql); //prepare sql statement

			$stmt->bind_param('di', $newPrice, $productId); //bind the parameters to the prepare statement

			if ($stmt->execute()) { //execute the statement
				echo "Price updated successfully!";
			} else {
				echo "Unabel to update price";
			}

		}
	}