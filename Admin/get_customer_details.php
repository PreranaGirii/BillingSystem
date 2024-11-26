<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/sidebar.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Product</title>
    <!-- Include your CSS file -->
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            padding: 20px;
            border: 1px;
        }

        .main-container {
            flex-grow: 1;
            margin-left: 40px;
            margin-right: 40px;
        }

        .wrapper {
            display: flex;
            flex-direction: row;
        }   

        .customer-details {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin-bottom: 20px;
        }

        .customer-details p {
            margin: 10px 0;
        }

        .error-message {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>
<?php require 'navv.php'; ?>

<div class="wrapper">
    <div class="sidebar">
            <ul class="sidebar-menu">
                    <li><a href="dashboardoverview.php">Dashboard</a></li>
                    <li><a href="addproduct.php">Add Product</a></li>
                    <li><a href="addcustomer.php">Add Customer</a></li>
                    <li><a href="productreport.php">Product Report</a></li>
                    <li><a href="customerreport.php">Customer Report</a></li>
            </ul>
        </div>
        <div class="main-container">
        <div class="editproduct">
                        <h1>Customer details</h1>
            </div>  
            <?php
            // Include your database connection file
            include 'connect.php';

            // Retrieve bill number from the AJAX request
            $billNo = $_GET['id'];

            // Query to select customer details based on bill number
            $sql = "SELECT * FROM billing WHERE id = '$billNo'";
            $result = mysqli_query($conn, $sql);

            if ($result && mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                // Display customer details as HTML with CSS classes
                echo "<div class='customer-details'>";
                echo "<p>Customer Name: <span>{$row['customer_name']}</span></p>";
                echo "<p>Phone Number: <span>{$row['customer_phone']}</span></p>";
                echo "<p>BillDate: <span>{$row['bill_date']}</span></p>";
                echo "<p>TotalAmount: <span>{$row['total_amount']}</span></p>";
                // Add more details as needed
                echo "</div>";
            } else {
                echo "<p class='error-message'>Customer details not found.</p>";
            }

            // Close database connection
            mysqli_close($conn);
            ?>
            </div>
</div>
</body>
</html>
