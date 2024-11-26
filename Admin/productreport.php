<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/productreport.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" href="../images/logo.png" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Report</title>
</head>
<body>
<header>
    <?php require 'navv.php'; ?>
</header>

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
            <div class="productreport">
                <h1>Product Overview</h1>
            </div>

            <!-- Search functionality -->
            <div class="search-container">
                <input type="text" id="search-input" placeholder="Search by name or number">
                <button id="search-btn">Search</button>
            </div>

            <!-- Product table -->
            <table id="product-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Quantity</th>
                        <th>Rate</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'connect.php'; // Include your database connection file

                    // Select query to retrieve data from the product table
                    $sql = "SELECT * FROM product";
                    $result = mysqli_query($conn, $sql);

                    // Check if there are any rows returned
                    if (mysqli_num_rows($result) > 0) {
                        // Loop through the result set and output data row by row
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>
                                    <td>" . $row['product_name'] . "</td>
                                    <td>" . $row['category'] . "</td>
                                    <td>" . $row['quantity'] . "</td>
                                    <td>" . $row['rate'] . "</td>
                                    <td>
                                        <a onclick='editProduct(" . $row['id'] . ")'><i class='fas fa-edit'></i></a>
                                        <a onclick='deleteProduct(" . $row['id'] . ")'><i class='fas fa-trash-alt'></i></a>
                                    </td>
                                </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>No products found.</td></tr>";
                    }

                    // Free result set
                    mysqli_free_result($result);

                    // Close connection
                    mysqli_close($conn);
                    ?>
                </tbody>
            </table>
            <script>
            const searchInput = document.getElementById('search-input');
            const tableRows = document.querySelectorAll('#product-table tbody tr');

            searchInput.addEventListener('input', function() {
                const searchText = this.value.toLowerCase(); 
            
                tableRows.forEach(row => {
                    const productName = row.cells[0].innerText.toLowerCase(); 
                    const category = row.cells[1].innerText.toLowerCase(); 

                    
                    if (productName.includes(searchText) || category.includes(searchText)) {
                        row.style.display = ''; 
                    } else {
                        row.style.display = 'none'; 
                    }
                });
            });
        </script>
    </div>
</div>

</body>
</html>

<script>
    function editProduct(productId) {
    // Redirect to edit_product.php with the product ID in the URL
    window.location.href = "edit_product.php?id=" + productId;
}
function deleteProduct(productId) {
    if (confirm("Are you sure you want to delete this product?")) {
        // Send an AJAX request to delete_product.php with the product ID
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "delete_product.php?id=" + productId, true);
        xhr.onload = function () {
            if (xhr.status === 200) {
                // Product deleted successfully
                // Refresh the table or update the UI as needed
                location.reload();
            } else {
                // Error occurred while deleting the product
                console.error("Error deleting product: " + xhr.responseText);
            }
        };
        xhr.send();
    }
}
</script>