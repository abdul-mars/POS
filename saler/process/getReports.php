<?php session_start();
	if (!isset($_SESSION['username']) || !isset($_SESSION['surname']) || !isset($_SESSION['forenames'])) {
		header("location: ../../index.php");
		exit();
	} else {
		$username = $_SESSION['username'];
		$surname = $_SESSION['surname'];
		$forenames = $_SESSION['forenames'];
		$forenames = $_SESSION['forenames'];
	}
	require_once '../../inc/dbConnect.php';
	$time = 'today';
	// $time = ;
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		// $time = mysqli_real_escape_string($con, $_POST['time']);
		$fromDate = mysqli_real_escape_string($con, $_POST['fromDate']);
		$toDate = mysqli_real_escape_string($con, $_POST['toDate']);
				
		// Get the selected option from the user
		// $time = $_POST['time'];
		// $time = 'week';
		$sellerId = 1;

		// $fromDate = '2023-07-16';
		// $toDate = '2023-07-18';
		$query = "SELECT COUNT(s.quantity_sold) AS max_quantity, s.product_id, p.product_name, SUM(s.product_price) AS total_amount, 
	        s.sales_invoice_no, DATE_FORMAT(s.date_sold, '%Y-%m-%d') AS formatted_date, SUM(s.product_price) AS total
	        FROM sales s
	        INNER JOIN products p ON s.product_id = p.product_id
	        WHERE s.sold_by = ?
	        AND s.date_sold >= ? AND s.date_sold <= ?
	        GROUP BY s.sales_invoice_no";

		switch ($time) {
		    case 'today':
		        $query .= " AND DATE(s.date_sold) = CURDATE()";
		        $timeDate = "Today's";
		        break;
		    case 'week':
		        $query .= " AND WEEK(s.date_sold) = WEEK(CURDATE())";
		        $timeDate = "This Week's";
		        break;
		    case 'month':
		        $query .= " AND MONTH(s.date_sold) = MONTH(CURDATE()) AND YEAR(s.date_sold) = YEAR(CURDATE())";
		        $timeDate = "This Month's";
		        break;
		    default:
		        // Handle the default case if no valid option is selected
		        break;
		}

		// Prepare and execute the SQL query
		$stmt = $con->prepare($query);
		$stmt->bind_param("iss", $sellerId, $fromDate, $toDate);
		$stmt->execute();
		$result = $stmt->get_result();
		$sales = $result->fetch_all(MYSQLI_ASSOC);

		// Rest of the code to display the sales information

		?>

		<!-- Display the sales information in an HTML table -->
		<h4 class="text-center"><?= $timeDate; ?> sales</h4>
		<table class="table table-hover table-striped">
		  <thead>
		    <tr>
		      <th>Products</th>
		      <th># Items</th>
		      <th>Amount</th>
		      <th>Invoice No</th>
		      <th>Time</th>
		      <th>More</th>
		    </tr>
		  </thead>
		  <tbody>
		    <?php $total = 0;
		    	foreach ($sales as $sale):
		    		$total = $total + $sale['total_amount'];
		    	 ?>
		    <tr>
		      <td><?php echo $sale['product_name']; ?></td>
		      <td><?php echo $sale['max_quantity']; ?></td>
		      <td><?php echo $sale['total_amount']; ?></td>
		      <td><?php echo $sale['sales_invoice_no']; ?></td>
		      <td><?php echo $sale['formatted_date']; ?></td>
		      <td><button class="more-button btn btn-success" data-invoice="<?php echo $sale['sales_invoice_no']; ?>">More</button></td>
		    </tr>
		    <?php endforeach; ?>
		    <tr class="">
		    	<th colspan="5" style="background: forestgreen; color: white">Total:</th>
		    	<th style="background: forestgreen; color: white"><?= $total; ?></th>
		    </tr>
		  </tbody>
		</table>

		<script>
		// Function to handle the "More" button click event
		document.querySelectorAll('.more-button').forEach(button => {
		  button.addEventListener('click', () => {
		    const invoiceNumber = button.dataset.invoice;
		    // Perform an action to display all the products, quantities, and prices in the invoice
		    // You can use AJAX to fetch the detailed information and display it dynamically
		    console.log('Display more information for invoice number:', invoiceNumber);
		  });
		});
		</script>
	<?php } else {
		header("location: ../index.php");
		exit();
	}
