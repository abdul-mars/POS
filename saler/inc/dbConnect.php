<?php 
	$dbHost = 'localhost';
	$dbUser = 'root';
	$dbPass = '';
	$dbName = 'pos';

	// $con = mysql_connect();
	$con = new mysqli($dbHost, $dbUser, $dbPass, $dbName);
	if ($con->connect_error) {
		header("location: ../index.php?msg=Someti=hing went wrong with the database");
	}

	// $password = password_hash('pl,okmijn', PASSWORD_DEFAULT);
	// $sql = "INSERT INTO users (
	// 		user_surname,
	// 		user_forenames,
	// 		username,
	// 		user_password,
	// 		user_role
	// 	)
	// 	VALUES (
	// 		'mohammed',
	// 		'adam',
	// 		'mohammed.adam',
	// 		'$password',
	// 		'user'
	// 	);";

	// mysqli_query($con, $sql);

	// -- Create the products table
	// CREATE TABLE products (
	//   product_id INT AUTO_INCREMENT PRIMARY KEY,
	//   product_name VARCHAR(255) NOT NULL,
	//   unit_price DECIMAL(10, 2) NOT NULL,
	//   description TEXT,
	//   total_pieces INT NOT NULL,
	//   last_updated DATETIME
	// );

	// -- Create the inventory table
	// CREATE TABLE inventory (
	//   inventory_id INT AUTO_INCREMENT PRIMARY KEY,
	//   product_id INT NOT NULL,
	//   quantity INT NOT NULL,
	//   added_date DATETIME,
	//   FOREIGN KEY (product_id) REFERENCES products (product_id)
	// );

	// CREATE TABLE users (
	//     user_id INT AUTO_INCREMENT PRIMARY KEY,
	//     user_surname VARCHAR(20) NOT NULL,
	//     user_forenames VARCHAR(20) NOT NULL,
	//     username VARCHAR(30) NOT NULL,
	//     user_password VARCHAR(255) NOT NULL,
	//     user_role VARCHAR(5) NOT NULL,
	//     date_added DATE NOT NULL,
	//     last_login DATETIME,
	//     login_session VARCHAR(255)
	// );

	// CREATE TABLE products (
	//     product_id INT AUTO_INCREMENT PRIMARY KEY,
	//     product_name VARCHAR(30) NOT NULL,
	//     product_price DECIMAL(10, 2) NOT NULL,
	//     product_desc VARCHAR(255) NOT NULL,
	//     product_img VARCHAR(255) NOT NULL,
	//     product_category VARCHAR(50),
	//     stock INT NOT NULL,
	//     date_added DATETIME DEFAULT CURRENT_TIMESTAMP,
	//     added_by INT NOT NULL,
	//     date_stock_update DATETIME,
	//     updated_by INT NOT NULL,
	//     FOREIGN KEY (added_by) REFERENCES users (user_id),
	//     FOREIGN KEY (updated_by) REFERENCES users (user_id)
	// );

	// CREATE TABLE sales (
	//     sales_id INT AUTO_INCREMENT PRIMARY KEY,
	//     product_id INT NOT NULL,
	//     product_price DECIMAL(10, 2),
	//     sales_invoice_no INT NOT NULL,
	//     date_sold DATETIME DEFAULT CURRENT_TIMESTAMP,
	//     sold_by INT NOT NULL,
	//     FOREIGN KEY (product_id) REFERENCES products (product_id),
	//     FOREIGN KEY (sold_by) REFERENCES users (user_id)
	// );

	// CREATE TABLE notifications (
	//     notif_id INT AUTO_INCREMENT PRIMARY KEY,
	//     notification VARCHAR(255) NOT NULL,
	//     product_id INT NOT NULL,
	//     notif_date DATETIME DEFAULT CURRENT_TIMESTAMP,
	//     notif_status INT NOT NULL,
	//     FOREIGN KEY (product_id) REFERENCES products (product_id)
	// );
