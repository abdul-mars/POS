<?php require_once '../checkSession.php';

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		
		$productName = ucwords($_POST["productName"]);
		$productPrice = $_POST["productPrice"];
		$costPrice = $_POST["costPrice"];
		$productStock = $_POST["productStock"];
		$productImg = $_FILES["productImg"];
		$productDesc = ucwords($_POST["productDesc"]);

		$sql = mysqli_query($con, "SELECT LOWER(product_name) AS product_name_lower FROM products WHERE LOWER(product_name) = LOWER('$productName')");
		if (mysqli_num_rows($sql) > 0) {
		    echo "Product already added to inventory";
		} else {
			// Perform the same form validation as before
			if (empty($productName)) {
			  $errors[] = "Please enter a product name.";
			} else {
				if (empty($costPrice) || floatval($costPrice) === 0) {
				  $errors[] = "Please enter a valid cost price.";
				} else {
					if (empty($productPrice) || floatval($productPrice) === 0) {
					  $errors[] = "Please enter a valid product price.";
					} else {
						if (empty($productStock)) {
						  $errors[] = "Please enter the product stock.";
						} else {
							// File type validation
							$allowedExtensions = array("png", "jpeg", "jpg");
							$fileExtension = strtolower(pathinfo($productImg["name"], PATHINFO_EXTENSION));
							if (!in_array($fileExtension, $allowedExtensions)) {
							  $errors[] = "Invalid file type. Please select a PNG, JPG, or JPEG image.";
							} else {
								// File size validation
								$maxSize = 3 * 1024 * 1024; // 3MB
								if ($productImg["size"] > $maxSize) {
								  $errors[] = "File size exceeds the limit. Please select a file up to 3MB.";
								} else {
									// If there are no validation errors, proceed with further processing
									if (empty($errors)) {
									  // Generate a unique name for the image file
									  $uniqueFileName = time() . '_' . uniqid() . '.' . $fileExtension;

									  // Move the uploaded image to the desired folder
									  $uploadPath = '../../assets/products/' . $uniqueFileName;
									  if (move_uploaded_file($productImg['tmp_name'], $uploadPath)) {
									    // Database insertion

									  	// $added_by = 1;
									  	// $updated_by = 1;
									  	$timeZone = date_default_timezone_get();
									  	date_default_timezone_set($timeZone);
									  	$date_stock_update = date('Y-m-d H:i:s');
								      // Prepare the SQL statement
								      $stmt = $con->prepare("INSERT INTO products (product_name, product_price, product_desc, product_img, cost_price, stock, added_by, date_stock_update, updated_by) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
								      // Bind the parameters and execute the statement
								      $stmt->bind_param("sssssiisi", $productName, $productPrice, $productDesc, $uniqueFileName, $costPrice, $productStock, $adminUserId, $date_stock_update, $adminUserId);

								      if ($stmt->execute()) {
								        // Data inserted successfully, send success response or redirect to a success page
								        $response = array("success" => true, "message" => "New product successfully added to inventory");
								      } else {
								        // Error in executing the SQL statement, handle the error
								        $errors[] = "Failed to add new product to inventory";
								        $response = array("success" => false, "errors" => $errors);
								      }

								      $stmt->close();
								      $con->close();
									  } else {
									    // Error in moving the image file, handle the error
									    $errors[] = "Failed to move product image";
									    $response = array("success" => false, "errors" => $errors);
									  }

									  echo json_encode($response);
									  exit;
									} else {
									  // Send an error response or display error messages
									  // ...
									  // For example:
									  $response = array("success" => false, "errors" => $errors);
									  echo json_encode($response);
									  exit;
									}
								}
							}
						}
					}
				}
			}
		}
	}
?>
