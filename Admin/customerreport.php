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
        <div class="sellsreport">
                    <h1>Customer Overview</h1>
        </div>
        <div class="search-container">
            <input type="text" id="search-input" placeholder="Search by name or number">
            <button id="search-btn">Search</button>
        </div>
        <table id="sales-table">
            <thead>
                <tr>
                    <th>Bill No.</th>
                    <th>Customer Name</th>
                    <th>Phone Number</th>
                    <th>Date</th>
                    <th>Total Amount</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Include your database connection file
                include 'connect.php';
                // Select data from the billing table
                $sql = "SELECT * FROM billing";
                $result = mysqli_query($conn, $sql);
                // Check if there are any rows returned
                if ($result && mysqli_num_rows($result) > 0) {
                    // Loop through the result set and output data row by row
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                                <td>{$row['bill_number']}</td>
                                <td>{$row['customer_name']}</td>
                                <td>{$row['customer_phone']}</td>
                                <td>{$row['bill_date']}</td>
                                <td>{$row['total_amount']}</td>
                                <td>
                                <a onclick='viewCustomer(" . $row['id'] . ")'><i class='fas fa-eye'></i></a>
                                <a onclick='deleteCustomer(" . $row['id'] . ")'><i class='fas fa-trash-alt'></i></a>
                                </td>
                            </tr>";
                    }
                } else {
                    // No data found
                    echo "<tr><td colspan='4'>No sales data found.</td></tr>";
                }

                // Close the database connection
                mysqli_close($conn);
                ?>
            </tbody>
        </table>
        <script>
            const searchInput = document.getElementById('search-input');
            const tableRows = document.querySelectorAll('#billing-table tbody tr');

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
    function deleteCustomer(billno) {
        if (confirm("Are you sure you want to delete this customer?")) {
            // Send an AJAX request to delete_customer.php with the product ID
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "delete_customer.php?id=" + billno, true);
            xhr.onload = function () {
                if (xhr.status === 200) {
                    // Product deleted successfully
                    // Refresh the table or update the UI as needed
                    location.reload();
                } else {
                    // Error occurred while deleting the product
                    console.error("Error deleting customer: " + xhr.responseText);
                }
            };
            xhr.send();
        }
    }

    function viewCustomer(billNo) {
        var modal = document.getElementById('customerModal');
        var span = modal.querySelector('.close');
        var modalContent = modal.querySelector('.modal-content');
        
        // AJAX request to fetch customer details
        var xhr = new XMLHttpRequest();
        xhr.open('GET', 'get_customer_details.php?billNo=' + billNo, true);
        xhr.onload = function() {
            if (xhr.status === 200) {
                modalContent.innerHTML = xhr.responseText;
                modal.style.display = 'block';
            } else {
                console.error('Error fetching customer details');
            }
        };
        xhr.send();

        // Close modal when the user clicks on the close button (x)
        span.onclick = function() {
            modal.style.display = 'none';
        };

        // Close modal when the user clicks anywhere outside of the modal
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = 'none';
            }
        };
    }

    function viewCustomer(billNo) {
        // Redirect to edit_product.php with the product ID in the URL
        window.location.href = "get_customer_details.php?id=" + billNo;
    }
</script>