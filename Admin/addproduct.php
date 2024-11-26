<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/addproduct.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" href="../images/logo.png" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product Form</title>
</head>
<body>
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
            <div class="addProduct">
                <h1>Add Product Form</h1>
            </div>
            <div class="addProductForm">
            <form action="" method="post">
                <div class="InputContainer">
                    <div class="">
                        <label for="product_name">Product Name</label>
                        <input type="text" id="product_name" name="product_name"/>
                    </div>
                    <div>
                        <div class="InputContainer">
                            <div class="">
                                <label for="category">Category</label>
                                <select class="category" id="category" name="category" required>
                                    <option value="select" disabled selected>Select</option>
                                    <option value="food">Food</option>
                                    <option value="kitchen">Kitchen Item</option>
                                    <option value="stationary">Stationary</option>
                                    <option value="cosmetic">Cosmetics</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="InputContainer">
                        <div class="">
                            <label for="quantity">Quantity</label>
                            <input type="number" id="quantity" name="quantity"/>
                        </div>
                        <div class="InputContainer">
                            <div class="">
                                <label for="rate">Rate</label>
                                <input type="number" id="rate" name="rate"/>
                            </div>
                        </div>
                        <div class="InputContainer">
                            <button type="submit" name="submit">Submit</button>
                            <button type="reset">Reset</button>
                        </div>
                    </div>
                </div>
            </form>
            </div>
        </div>
        </div>
        <?php
            include 'connect.php'; // Include your database connection file

            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
                // Check if the form is submitted

                // Retrieve form data
                $product_name = $_POST['product_name'];
                $category = $_POST['category'];
                $quantity = isset($_POST['quantity']) ? floatval($_POST['quantity']) : 0; // Convert to float
                $rate = isset($_POST['rate']) ? floatval($_POST['rate']) : 0; // Convert to float

                // Calculate total price
                $total_price = $quantity * $rate;

                // Check for empty fields or non-numeric values
                if (empty($product_name)) {
                    echo "<script>console.log('Enter Product Name');</script>";
                } elseif (empty($category) || $category == 'select') {
                    echo "<script>console.log('Select Category');</script>";
                } elseif ($quantity <= 0) {
                    echo "<script>console.log('Enter a valid Quantity');</script>";
                } elseif ($rate <= 0) {
                    echo "<script>console.log('Enter a valid Price per item');</script>";
                } else {
                    // Insert data into the database
                    $sql = "INSERT INTO product (product_name, category, quantity, rate, total_price)
                            VALUES ('$product_name', '$category', '$quantity', '$rate', '$total_price')";
                    if (mysqli_query($conn, $sql)) {
                        echo "<script>alert('Product inserted successfully');</script>";
                        echo "<script>location.replace('productreport.php');</script>";
                        
                    } else {
                        echo "<script>console.log('Error: " . mysqli_error($conn) . "');</script>";
                    }
                }
            }
            ?>
</body>
</html>