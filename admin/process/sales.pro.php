<?php require_once '../checkSession.php';
    // Check if userId, fromDate, and toDate are provided in the request
    if (isset($_POST['userId'])) {
        $userId = $_POST['userId'];
        $userCondition = " sold_by = '$userId'";
    } else {
        $userCondition = "";
    }

    if (isset($_POST['fromDate']) && isset($_POST['toDate'])) {
        $fromDate = mysqli_real_escape_string($con, $_POST['fromDate']);
        $toDate = mysqli_real_escape_string($con, $_POST['toDate']);
        $fromDate = date('Y-m-d', strtotime($fromDate));
        $toDate = date('Y-m-d', strtotime($toDate));

        // $dateCondition = " AND date_sold BETWEEN '$fromDate' AND '$toDate'";
        // $dateCondition = "AND date_sold >= '$fromDate' AND date_sold <= '$toDate'";
        $dateCondition = "AND DATE_FORMAT(date_sold, '%Y-%m-%d') >= '$fromDate' AND DATE_FORMAT(date_sold, '%Y-%m-%d') <= '$toDate'";
    } else {
        $dateCondition = "";
    }

    // Fetch sales data based on the conditions
    $sql = "SELECT sales_id, product_id, product_price, quantity_sold, sales_invoice_no, quantity_sold, date_sold, sold_by
            FROM sales 
            WHERE $userCondition $dateCondition GROUP BY sales_invoice_no ORDER BY date_sold DESC";

    $result = mysqli_query($con, $sql);

    // Generate HTML content for the sales table
    $html = '';
    if ($result) {
        $count = 1;
        while ($row = mysqli_fetch_assoc($result)) {
            $html .= '<tr>';
            // $html .= '<td>' . $row['sales_id'] . '</td>';
            $html .= '<td>' . $count . '</td>';
            $html .= '<td>' . getProductNames($con, $row['sales_id']) . '</td>';
            $html .= '<td>' . $row['sales_invoice_no'] . '</td>';
            $html .= '<td>' . $row['quantity_sold'] . '</td>';
            $html .= '<td>' . ($row['product_price'] * $row['quantity_sold']) . '</td>';
            $html .= '<td>' . date('d/M/Y', strtotime($row['date_sold'])) . '</td>';
            // $html .= '<td><button class="btn forestgreen px-4">View All</button></td>';
            $html .= '<td><button class="btn forestgreen px-4 viewAllBtn" data-sales-id="' . $row['sales_id'] . '" data-user-id="' . $row['sold_by'] . '" data-invoice-no="' . $row['sales_invoice_no'] . '" data-bs-target="#viewAllSalesMdl" data-bs-toggle="modal">View All</button></td>';
            $html .= '</tr>'; $count++;
        }
    }

    echo $html;

    // Function to get product names for a sales_id
    function getProductNames($con, $salesId) {
        $productNames = [];
        $productSql = "SELECT products.product_name
                       FROM sales
                       INNER JOIN products ON sales.product_id = products.product_id
                       WHERE sales.sales_id = $salesId
                       LIMIT 2"; // Limit to 2 products
        $productResult = mysqli_query($con, $productSql);
        while ($productRow = mysqli_fetch_assoc($productResult)) {
            $productNames[] = $productRow['product_name'];
        }

        return implode(', ', $productNames);
        // return $productNames[0].', '.$productNames[1];
    }


    

    mysqli_close($con);
?>
