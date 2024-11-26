<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/customerreport.css">
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="shortcut icon" href="../images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Visit department store</title>
    <style>
        span {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
        }

        span {
            
            display: inline-block;
        }
        
        /* Styling for the dropdown */
        .dropdown {
            display: none;
            margin-top: 25px;
            position: absolute;
            background-color: #f9f9f9;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .dropdown a {
            float: none;
            width: 100%;
            padding: 12px 16px;
            display: block;
            text-align: left;
        }
        .a:hover{
            background-color: black;
            color: #f9f9f9;
        }

        /* .values{
        padding: 3px 3px 0 3px;

        }

        .values .val-box{
        background-color: lightblue;
        width: 60px;
        height: 40px;
        padding: 1px 2px;
        border-radius: 5px;
        display: f1;
        justify-content: flex-start;
        align-items: center;
        } */


        /* Parent container */

    </style>
</head>
<body class="container">
    <div class="navbar">
            <header>
                <div class="header">
                    <div class="logo">
                        <img src="./images/logo1.png" alt="">
                    </div>
                    <div class="bar">
                        <i class="fa-solid fa-bars"></i>
                        <i class="fa-solid fa-xmark" id="hdcross"></i>
            
                    </div>
                    <div class="nav">
                    <span>
                        <span >
                            <a href="../homepage.php" >Home</a>
                        </span>
                        
                        <span>
                            <a  href="dashboard.php">Dashboard</a>
                        </span>
                        <span id="report-link">
                            <a href="productreport.php">Report</a>
                </span>
                    </span>
                   
                    </div>
                    <div class="account">
                        <span>
                            <span >
                                <a href="../homepage.php">
                                    <i class="fa-solid fa-house-chimney"></i>
                                </a>
                            </span>
                            <span >
                                <a href="../homepage.php">Logout</a>
                            </span>                          
                        </span>                   
                    </div>                 
                </div>  
        </div>
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
        <script>
        function toggleDropdown1() {
            var dropdown = document.getElementById('administration-dropdown');
            dropdown.style.display = (dropdown.style.display === 'block') ? 'none' : 'block';
        }
        function toggleDropdown2() {
            var dropdown = document.getElementById('report-dropdown');
            dropdown.style.display = (dropdown.style.display === 'block') ? 'none' : 'block';
        }
    </script>

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
    </div>
    </header>
<style>
.values {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
    margin: 20px 0;
    padding-top: 540px;
    text-align: center;
    flex-direction: row;
}

/* Individual value box */
.val-box {
    background: lightcyan; /* White background */
    border-radius: 10px; /* Rounded corners */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Subtle shadow for depth */
    padding: 20px; /* Inner padding */
    text-align: center; /* Center-aligned text */
    width: 150px; /* Width of each box */
    margin: 10px; /* Margin around each box */
    transition: transform 0.3s ease; /* Smooth transition for hover effect */
}

/* Hover effect for the value box */
.val-box:hover {
    transform: translateY(-10px); /* Lift up on hover */
}

/* Icon styling */
.val-box i {
    font-size: 40px; /* Large icon size */
    color: #007BFF; /* Primary color */
    margin-bottom: 10px; /* Space below the icon */
}

/* Heading styling */
.val-box h3 {
    font-size: 20px; /* Larger font size for the heading */
    margin: 10px 0; /* Vertical margin */
    color: #333; /* Darker text color */
}

/* Span styling */
.val-box span {
    font-size: 15px; /* Smaller font size for the span */
    color: #777; /* Lighter text color */
}
</style>




        
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

</body>
</html>