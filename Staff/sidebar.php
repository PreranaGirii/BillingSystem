<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="shortcut icon" href="../images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar Visit department store</title>
    <style>
        div.sidebar {
            display: flex;
            height: 100vh;
            top: 0px;
            left: 0;
            width: 200px;
            border-color: 2px rgb(172, 211, 193);
            background-color: aliceblue;
            font-size: large;
        }

        /* Sidebar menu */
        .sidebar-menu {
            height: fit-content;
            list-style: none;
            padding: 0;
            margin: 0;
        }

        /* Sidebar menu items */
        .sidebar-menu li {
            height: large;
            padding: 10px;
        }

        /* Sidebar menu links */
        .sidebar-menu li a {
            display: block;
            color: #100f0f;
            text-decoration: none;
        }

        /* Change color of links on hover */
        .sidebar-menu li a:hover {
            background-color: rgb(172, 211, 193);
            color: #080808;
        }

    </style>
</head>
        <div class="sidebar">
            <ul class="sidebar-menu">
                <li><a href="dashboardoverview.php">Dashboard</a></li>
                <li><a href="addproduct.php">Add Product</a></li>
                <li><a href="addcustomer.php">Add Customer</a></li>
                <li><a href="productreport.php">Product Report</a></li>
                <li><a href="customerreport.php">Customer Report</a></li>
            </ul>
        </div>
        
</body>
</html>