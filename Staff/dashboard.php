<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/productreport.css">
    <link rel="stylesheet" href="css/customerreport.css">
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="shortcut icon" href="../images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Visit Department Store</title>
    <style>
        span {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
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

        .a:hover {
            background-color: black;
            color: #f9f9f9;
        }

        /* Styling for the value boxes */
        .values {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            margin: 20px 0;
            padding-top: 540px;
            text-align: center;
            flex-direction: row;
        }

        .val-box {
            background: lightcyan;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            text-align: center;
            width: 150px;
            margin: 10px;
            transition: transform 0.3s ease;
        }

        .val-box:hover {
            transform: translateY(-10px);
        }

        .val-box i {
            font-size: 40px;
            color: #007BFF;
            margin-bottom: 10px;
        }

        .val-box h3 {
            font-size: 20px;
            margin: 10px 0;
            color: #333;
        }

        .val-box span {
            font-size: 15px;
            color: #777;
        }
    </style>
</head>

<body class="container">
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
                    <span>
                        <a href="../homepage.php">Home</a>
                    </span>

                    <span>
                        <a href="dashboard.php">Dashboard</a>
                    </span>

                    <span id="Billing">
                        <a href="addcustomer.php">Billing</a>
                        <div class="dropdown" id="Billingss">
                            <a href="addcustomer.php">Add Customer</a>
                        </div>
                    </span>

                    <span id="report-link">
                        <a href="customerreport.php">Report</a>
                        <div class="dropdown" id="report-dropdown">
                            <a href="productreport.php">Product Report</a>
                            <a href="customerreport.php">Customer Report</a>
                        </div>
                    </span>
                </span>
            </div>

            <div class="account">
                <span>
                    <span>
                        <a href="../homepage.php">
                            <i class="fa-solid fa-house-chimney"></i>
                        </a>
                    </span>
                    <span>
                        <a href="../homepage.php">Logout</a>
                    </span>
                </span>
            </div>
        </div>
    </header>
    <div class="wrapper">
    <div class="sidebar">
        <span class="sidebar-menu">
            <li><a href="dashboard.php"> Dashboard</a></li>
            <li><a href="addcustomer.php"> Add Customer</a></li>
            <li><a href="productreport.php"> Product Report</a></li>
            <li><a href="customerreport.php"> Customer Report</a></li>
        </span>
    </div>

    <div class="main-container">
        <div class="productreport">
            <h1>Product Overview</h1>
        </div>

        <div class="search-container">
            <input type="text" id="search-input" placeholder="Search by name or number">
            <button id="search-btn">Search</button>
        </div>

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
                include 'connect.php';

                $sql = "SELECT * FROM product";
                $result = mysqli_query($conn, $sql);

                if (mysqli_num_rows($result) > 0) {
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

                mysqli_free_result($result);
                mysqli_close($conn);
                ?>
            </tbody>
        </table>

        <script>
            const searchInput = document.getElementById('search-input');
            const tableRows = document.querySelectorAll('#product-table tbody tr');

            searchInput.addEventListener('input', function () {
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

            function editProduct(productId) {
                window.location.href = "edit_product.php?id=" + productId;
            }

            function deleteProduct(productId) {
                if (confirm("Are you sure you want to delete this product?")) {
                    var xhr = new XMLHttpRequest();
                    xhr.open("GET", "delete_product.php?id=" + productId, true);
                    xhr.onload = function () {
                        if (xhr.status === 200) {
                            location.reload();
                        } else {
                            console.error("Error deleting product: " + xhr.responseText);
                        }
                    };
                    xhr.send();
                }
            }
        </script>
        </div>
    </div>
</body>

</html>
