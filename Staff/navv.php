

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" href="../images/logo.png" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product Form</title>
</head>

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
            margin-top: 177px;
            position: absolute;
            background-color: #f9f9f9;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        

        .dropdown a {
            padding-top: 20px;
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

    </style>
</head>
<body  class="container">

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
            <a href="../homepage.php" >Home</a>
        </span>
        
        <span>
            <a  href="dashboard.php">Dashboard</a>
        </span>
        <span id="administration-link">
            <a href="#" onclick="toggleDropdown1()">Administration</a>
            <div class="dropdown" id="administration-dropdown">
                <a href="addproduct.php">Add product</a>
                <a href="addcustomer.php">Add Customer</a>
                <!-- Add more dropdown items here -->
            </div>
        </span>
        <span id="report-link">
            <a href="#" onclick="toggleDropdown2()">Report</a>
            <div class="dropdown" id="report-dropdown">
                <a href="productreport.php">Product Report</a>
                <a href="customerreport.php">Customer Report</a>
                <!-- Add more dropdown items here -->
            </div>
        </span>
    </span>
    </div>
    <div class="account">
        <a href="../homepage.php">
            <i class="fa-solid fa-house-chimney"></i>
        </a>
        <a href="../homepage.php" class="logout-icon">
            <i class="fa-solid fa-sign-out"></i>
            <span class="logout-text">Logout</span>
        </a>
    </div>
</div>
</header>

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
        
</body>
</html>