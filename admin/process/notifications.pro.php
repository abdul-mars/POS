<?php require_once '../checkSession.php';
	if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'get_notifications') {
		$sql = "SELECT product_id, product_name, product_img, stock FROM products WHERE stock <= 10";
		$result = $con->query($sql);

		if ($result->num_rows > 0) {
		    // Initialize an array to hold the notification data
		    $notifications = array();

		    // Loop through the results and add them to the notifications array
		    while ($row = $result->fetch_assoc()) {
		        $notifications[] = array(
		            'product_id' => $row['product_id'],
		            'product_name' => $row['product_name'],
		            'product_img' => $row['product_img'],
		            'stock' => $row['stock']
		        );
		    }
		    echo json_encode($notifications);
		}
	}