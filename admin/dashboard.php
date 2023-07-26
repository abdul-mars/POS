<div class="col">
	<div class="p-2 d-flx justify-content-between">
		<div class="cards">
			<a href="?page=inventory">
				<div class="card text-white" style="width: 250px; background-color: DarkOrange ; border-top: 4px solid DarkBlue;">
					<div class="card-body cardBody p-4">
						<div class="cardText">
							<p style="margin-bottom: -3px; font-family: arial; white-space: nowrap;">200 Total in stock</p>
							<h4 style="letter-spacing: 4px;">Inventory</h4>
							<p style="margin-bottom: -6px; font-family: arial; white-space: nowrap;">Tap to view</p>
						</div>
						<div>
							<!-- <i class="fas fa-user fa-4x text-mued" style="opacity: .7;"></i> -->
							<i class="fas fa-clipboard-list fa-4x" style="opacity: .7;"></i>
						</div>
					</div>
				</div>
			</a>
			<a href="?page=products">
				<div class="card text-white" style="width: 250px; background-color: DarkBlue; border-top: 4px solid DarkOrange;">
					<div class="card-body cardBody p-4">
						<div class="cardText">
							<?php $sqlProducts = mysqli_query($con, "SELECT COUNT(*) AS total_products FROM products");
								$dataProducts = mysqli_fetch_assoc($sqlProducts);
							?>
							<p style="margin-bottom: 6px; font-family: arial; white-space: nowrap;"><?= $dataProducts['total_products']; ?> Total</p>
							<h4 style="letter-spacing: 4px;">Products</h4>
							<p style="margin-bottom: -6px; font-family: arial; white-space: nowrap;">Tap to view</p>
						</div>
						<div>
							<i class="fas fa-box-open fa-4x text-mued" style="opacity: .7;"></i>
						</div>
					</div>
				</div>
			</a>
			<a href="?page=users">
				<div class="card text-white" style="width: 250px; background-color: ForestGreen ; border-top: 4px solid DarkBlue;">
					<div class="card-body cardBody p-4">
						<div class="cardText">
							<?php $sqlUsers = mysqli_query($con, "SELECT COUNT(*) AS total_users FROM users");
								$dataUsers = mysqli_fetch_assoc($sqlUsers);
							?>
							<p style="margin-bottom: 6px; font-family: arial; white-space: nowrap;"><?= $dataUsers['total_users']; ?> Total</p>
							<h4 style="letter-spacing: 4px;">Users</h4>
							<p style="margin-bottom: -6px; font-family: arial; white-space: nowrap;">Tap to view</p>
						</div>
						<div>
							<i class="fas fa-user fa-4x text-mued" style="opacity: .7;"></i>
						</div>
					</div>
				</div>
			</a>
			<a href="?page=customers">
				<div class="card text-white" style="width: 250px; background-color: DarkOrange ; border-top: 4px solid darkblue;">
					<div class="card-body cardBody p-4">
						<div class="cardText">
							<p style="margin-bottom: 6px; font-family: arial; white-space: nowrap;">40 Total</p>
							<h4 style="letter-spacing: 3px;">Customers</h4>
							<p style="margin-bottom: -6px; font-family: arial; white-space: nowrap;">Tap to view</p>
						</div>
						<div>
							<i class="fas fa-users fa-4x text-mued" style="opacity: .7;"></i>
						</div>
					</div>
				</div>
			</a>
			<a href="?page=reports">
				<div class="card text-white" style="width: 250px; background-color: darkblue ; border-top: 4px solid darkorange;">
					<div class="card-body cardBody p-4">
						<div class="cardText">
							<!-- <p style="margin-bottom: 6px; font-family: arial; white-space: nowrap;">50 Total users</p> -->
							<h4 style="letter-spacing: 4px;">Reports</h4>
							<p style="margin-bottom: -6px; font-family: arial; white-space: nowrap;">Tap to view</p>
						</div>
						<div>
							<i class="fas fa-chart-bar fa-4x text-mued" style="opacity: .7;"></i>
						</div>
					</div>
				</div>
			</a>
			<a href="?page=notifications">
				<div class="card text-white" style="width: 250px; background-color: forestgreen ; border-top: 4px solid darkblue;">
					<div class="card-body cardBody p-4">
						<div class="cardText">
							<p style="margin-bottom: -3px; font-family: arial; white-space: nowrap;"><span class="notificationCount"></span> unread</p>
							<h4 style="letter-spacing: 3px;">Notifications</h4>
							<p style="margin-bottom: -6px; font-family: arial; white-space: nowrap;">Tap to view</p>
						</div>
						<div>
							<i class="fas fa-bell fa-3x text-mued" style="opacity: .7;"></i>
						</div>
					</div>
				</div>
			</a>
		</div>
	</div>
	<div class="card mt-2">
		<div class="card-body">
			<h4>Most Sold Today</h4>
			<?php // Get today's date
				$today = date('Y-m-d');

				// SQL query to fetch most sold products for today
				$query = "SELECT sales.product_id, products.product_name, SUM(quantity_sold) AS total_sold, SUM(sales.product_price * quantity_sold) AS total_amount
				          FROM sales
				          INNER JOIN products ON sales.product_id = products.product_id
				          WHERE DATE(date_sold) = ?
				          GROUP BY sales.product_id
				          ORDER BY total_sold DESC
				          LIMIT 5"; // Limit to top 5 most sold products

				// Prepare and execute the SQL query
				$stmt = $con->prepare($query);
				$stmt->bind_param("s", $today);
				$stmt->execute();
				$result = $stmt->get_result();
				$mostSoldProducts = $result->fetch_all(MYSQLI_ASSOC);
			?>
			<div class="table-responsive">
				<table class="table table-striped table-sm table-hover">
				  <thead>
				    <tr>
				      <!-- <th>Product ID</th> -->
				      <th>Product Name</th>
				      <th>Total Sold</th>
				      <th>Total Amount</th>
				    </tr>
				  </thead>
				  <tbody>
				    <?php foreach ($mostSoldProducts as $product): ?>
				    <tr>
				      <!-- <td><?php echo $product['product_id']; ?></td> -->
				      <td><?php echo $product['product_name']; ?></td>
				      <td><?php echo $product['total_sold']; ?></td>
				      <td><?php echo $product['total_amount']; ?></td>
				    </tr>
				    <?php endforeach; ?>
				  </tbody>
				</table>
			</div>
		</div>
	</div>
</div>