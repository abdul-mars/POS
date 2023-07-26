<?php require_once '../checkSession.php';

	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		if (isset($_POST['reportFormBtn'])) {
			// Get the selected date range from the form
			$fromDate = mysqli_real_escape_string($con, $_POST['fromDate']);
			$toDate = mysqli_real_escape_string($con, $_POST['toDate']);

			// Prepare and execute the SQL query
			$query = "SELECT SUM(sales.product_price * quantity_sold) AS total_sales,
		          COUNT(sales_id) AS total_orders,
		          AVG(sales.product_price) AS average_order_value,
		          sales.product_id,
		          products.product_name,
		          products.cost_price,
		          SUM(quantity_sold) AS quantity_sold,
		          SUM(sales.product_price * quantity_sold) AS total_revenue
		          FROM sales
		          INNER JOIN products ON sales.product_id = products.product_id
		          WHERE date_sold >= ? AND date_sold <= ?
		          GROUP BY product_id
		          ORDER BY quantity_sold DESC
		          LIMIT 5"; // Limit to top 5 selling products
			$stmt = $con->prepare($query);
			$stmt->bind_param("ss", $fromDate, $toDate);
			$stmt->execute();
			$result = $stmt->get_result();
			$salesData = $result->fetch_all(MYSQLI_ASSOC);
			// Calculate total sales

			$totalSales = 0;
			foreach ($salesData as $sale) {
			    $totalSales += $sale['total_sales'];
			}

			// Calculate profit margin (you need to retrieve cost of goods sold from another table)
			$costOfGoodsSold = 0;
			foreach ($salesData as $sale) {
			    $productId = $sale['product_id'];
			    // Replace 'your_table_name' with the actual table name where cost_price is stored
			    $query = "SELECT cost_price FROM products WHERE product_id = ?";
			    $stmt = $con->prepare($query);
			    $stmt->bind_param("i", $productId);
			    $stmt->execute();
			    $result = $stmt->get_result();
			    $costData = $result->fetch_assoc();
			    $costOfGoodsSold += $costData['cost_price'];
			}
			
			$profitMargin = ($totalSales - $costOfGoodsSold) / $totalSales * 100;

			// Calculate total number of orders
			$totalOrders = array_sum(array_column($salesData, 'total_orders'));

			// Calculate average order value
			$averageOrderValue = $totalSales / $totalOrders;
 			?>

			<div class="card-body">
				<div class="container mt-4">
					<div class="row">
						<div class="col-md-4">
							<!-- Total Sales -->
							<div class="card mb-4">
								<div class="card-body text-center">
									<h5 class="card-title">Total Sales</h5>
									<p class="card-text">Additional information about the period.</p>
									<h3 class="card-text">₵<?= number_format($totalSales, 2); ?></h3>
								</div>
							</div>
							
							<!-- Total Number of Orders -->
							<div class="card mb-4">
								<div class="card-body text-center">
									<h5 class="card-title">Total Number of Orders</h5>
									<p class="card-text">Summary of the number of orders for the period.</p>
									<h3 class="card-text"><?= $totalOrders; ?></h3>
								</div>
							</div>
							<!-- Average Order Value -->
							<div class="card mb-4">
								<div class="card-body text-center">
									<h5 class="card-title">Average Order Value</h5>
									<p class="card-text">Calculated based on total sales and total number of orders.</p>
									<h3 class="card-text">$200</h3>
								</div>
							</div>
						</div>
						<div class="col-md-8">
							<!-- Top Selling Products -->
							<div class="card mb-4">
								<div class="card-body">
									<h5 class="card-title">Top Selling Products</h5>
									<table class="table table-striped">
										<thead>
											<tr>
												<th>Product Name</th>
												<th>Quantity Sold</th>
												<th>Total Revenue</th>
											</tr>
										</thead>
										<tbody>
											<!-- <tr>
												<td>Product A</td>
												<td>100</td>
												<td>$5,000</td>
											</tr> -->
											<?php foreach ($salesData as $sale): ?>
									            <tr>
									                <td><?= $sale['product_name']; ?></td>
									                <td><?= $sale['quantity_sold']; ?></td>
									                <td>$<?= number_format($sale['total_revenue'], 2); ?></td>
									            </tr>
									        <?php endforeach; ?>
											<!-- Add more rows for other products -->
										</tbody>
									</table>
								</div>
							</div>
							<!-- Sales Trend -->
							<div class="card mb-4">
								<div class="card-body">
									<h5 class="card-title">Sales Trend</h5>
									<!-- Add a line chart or area graph here using charting libraries like Chart.js or Highcharts -->
									<div id="salesTrendChart"></div>
								</div>
							</div>
							<!-- Sales by Category -->
							<div class="card mb-4">
								<div class="card-body">
									<h5 class="card-title">Sales by Category</h5>
									<!-- Add a bar chart or pie chart here using charting libraries -->
									<div id="salesByCategoryChart"></div>
								</div>
							</div>
							<!-- Best Performing Salespersons -->
							<!-- <div class="card mb-4">
								<div class="card-body">
									<h5 class="card-title">Best Performing Salespersons</h5>
									<ul class="list-group">
										<li class="list-group-item">Salesperson 1: $3,000</li>
										<li class="list-group-item">Salesperson 2: $2,500</li>
									</ul>
								</div>
							</div> -->
							<?php
							// Assuming you have established a database connection
							// Fetch the data for the best performing salespersons along with their total sales
							$query = "SELECT u.user_surname, u.user_forenames, u.username, SUM(s.product_price * s.quantity_sold) AS total_sales
						          FROM sales s
						          INNER JOIN users u ON s.sold_by = u.user_id
						          WHERE s.date_sold >= ? AND s.date_sold <= ?
						          GROUP BY s.sold_by, u.username
						          ORDER BY total_sales DESC
						          LIMIT 5"; // Limit to top 5 salespersons

							$stmt = $con->prepare($query);
							$stmt->bind_param("ss", $fromDate, $toDate);
							$stmt->execute();
							$result = $stmt->get_result();
							$bestPerformingSalespersons = $result->fetch_all(MYSQLI_ASSOC);
							?>

							<!-- Best Performing Salespersons -->
							<div class="card mb-4">
							    <div class="card-body">
							        <h5 class="card-title">Best Performing Salespersons</h5>
							        <ul class="list-group">
							            <?php foreach ($bestPerformingSalespersons as $salesperson): ?>
							            <li class="list-group-item">
							                <?= ucwords($salesperson['user_surname']. ' '. $salesperson['user_forenames']); ?>: $<?= $salesperson['total_sales']; ?>
							            </li>
							            <?php endforeach; ?>
							        </ul>
							    </div>
							</div>

						</div>
					</div>

				    <div class="row">
				      	<!-- <div class="col-md-6">
				        <div class="card mb-4">
				          <div class="card-body">
				            <h5 class="card-title">Revenue by Region</h5>
				            <div id="revenueByRegionChart"></div>
				          </div>
				        </div>
				      	</div> -->

				      <div class="col-md-6">
				        <!-- <div class="card mb-4">
				          <div class="card-body text-center">
				            <h5 class="card-title">Refunds and Returns</h5>
				            <p class="card-text">Number and value of refunds and returns.</p>
				            <h3 class="card-text">10</h3>
				            <p class="card-text">Total Value: $500</p>
				          </div>
				        </div> -->

				        <!-- Profit Margin -->
				        <div class="card mb-4">
				          <div class="card-body text-center">
				            <h5 class="card-title">Profit Margin</h5>
				            <p class="card-text">Calculated based on total sales and cost of goods sold.</p>
				            <h3 class="card-text"><?= $profitMargin; ?>%</h3>
				          </div>
				        </div>
				      </div>
				    </div>
				</div>
			</div>
		<?php }
	}