<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/sidebar.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <!-- Include your CSS file -->
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
                    <h1>Edit Product</h1>
        </div>
    <?php
        // Include your database connection file
        include 'connect.php';

        // Check if the product ID is provided in the URL
        if(isset($_GET['id'])) {
            $productId = $_GET['id'];

            // Retrieve the product details from the database based on the product ID
            $query = "SELECT * FROM product WHERE id = $productId";
            $result = mysqli_query($conn, $query);

            // Check if the product exists
            if(mysqli_num_rows($result) > 0) {
                // Fetch the product details
                $product = mysqli_fetch_assoc($result);
            } else {
                // Product not found, handle error (redirect or display error message)
                echo "Product not found.";
            }
        } else {
            // Product ID is not provided in the URL, handle error (redirect or display error message)
            echo "Product ID not provided.";
        }

        // Close the database connection
        mysqli_close($conn);
    ?>
    <form method="post" id="edit-product-form">
        <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
        <label for="product_name">Product Name:</label>
        <input type="text" name="product_name" value="<?php echo $product['product_name']; ?>"><br>
        <label for="category">Category:</label>
        <input type="text" name="category" value="<?php echo $product['category']; ?>"><br>
        <label for="quantity">Quantity:</label>
        <input type="text" name="quantity" value="<?php echo $product['quantity']; ?>"><br>
        <label for="rate">Rate:</label>
        <input type="text" name="rate" value="<?php echo $product['rate']; ?>"><br>
        <button type="button" onclick="updateProduct()">Update Product</button>
    </form>
    </div>
</div>
<script>
    function updateProduct() {
    var form = document.getElementById('edit-product-form');
    var formData = new FormData(form);

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'update_product.php', true);
    xhr.onload = function() {
        if (xhr.status >= 200 && xhr.status < 400) {
            // Request successful, handle response
            var response = xhr.responseText;
            console.log(response); // Log response for debugging
            // Update UI or display success message
        } else {
            // Error handling for server errors
            console.error('Error: ' + xhr.status);
        }
    };
    xhr.onerror = function() {
        // Error handling for network errors
        console.error('Network Error');
    };
    xhr.send(formData);
}


</script>
<style>

.main-container {
    flex-grow: 1;
    margin-left: 40px;
    margin-right: 40px;
}

.wrapper {
    display: flex;
    flex-direction: row;
}

.editproduct {
    text-align: center;
    margin-bottom: 20px;
}

.editproduct h1 {
    font-size: 32px;
    font-weight: 600;
    color: rgb(92, 92, 92);
    padding: 0px;
    margin: 40px;
}

/* Style for form container */
#edit-product-form {
    width: 400px;
    height: 200px;
    padding-top: 30px;
    margin: 20px;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #f9f9f9;
}

/* Style for form labels */
#edit-product-form label {
    display: inline-block;
    width: 100px;
    margin-bottom: 10px;
}

/* Style for form input fields */
#edit-product-form input[type="text"] {
    width: calc(100% - 120px); /* Adjust input width */
    padding: 5px;
    margin-bottom: 10px;
    border: 1px solid #ccc;
    border-radius: 3px;
}

/* Style for update button */
#edit-product-form button {
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 3px;
    cursor: pointer;
}

/* Hover effect for update button */
#edit-product-form button:hover {
    background-color: #0056b3;
}
</style>
</body>
</html>





