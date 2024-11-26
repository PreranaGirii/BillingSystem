<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/customerreport.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" href="../images/logo.png" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Details</title>
</head>
<body>
<header>
<?php require 'navv.php'; ?>
    <div class="wrapper">
    <div class="sidebar">
            <span class="sidebar-menu">
                <li><a href="dashboard.php">  Dashboard</a></li>
                <li><a href="addproduct.php">  Add Product</a></li>
                <li><a href="productreport.php">  Product Report</a></li>
                <li><a href="addstaff.php"> Add Staff</a></li>
                <li><a href="customerreport.php">  Customer Report</a></li>
                <li><a href="staffreport.php"> Staff Report</a></li>
            </span>
        </div>
<div class="main-container">
<div class="staffreport">
    <h1>Staff Overview</h1>
</div>
<div class="search-container">
    <input type="text" id="search-input" placeholder="Search by email or username">
    <button id="search-btn">Search</button>
</div>
<table id="sales-table">
    <thead>
        <tr>
            <th>Staff ID</th>
            <th>Email</th>
            <th>Username</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Include your database connection file
        include 'connect.php';

        // Select data from the staff table
        $sql = "SELECT * FROM staff";
        $result = mysqli_query($conn, $sql);

        // Check if there are any rows returned
        if ($result && mysqli_num_rows($result) > 0) {
            // Loop through the result set and output data row by row
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>{$row['userid']}</td>
                        <td>{$row['emailid']}</td>
                        <td>{$row['username']}</td>
                        <td>
                            <a onclick='deleteStaff(" . $row['userid'] . ")'><i class='fas fa-trash-alt'></i></a>
                        </td>
                    </tr>";
            }
        } else {
            // No data found
            echo "<tr><td colspan='4'>No staff data found.</td></tr>";
        }

        // Close the database connection
        mysqli_close($conn);
        ?>
    </tbody>
</table>
        </div>
    </div>
</body>
</html>


