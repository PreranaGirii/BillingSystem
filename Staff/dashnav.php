<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="shortcut icon" href="../images/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Visit department store</title>
    <style>
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
        }

        li {
            
            display: inline-block;
        }



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
    </style>
</head>
<body class="container">
    <div>
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
                    <ul>
                        <li >
                            <a href="index.php" >Home</a>
                        </li>
                        
                        <li>
                            <a  href="#">Dashboard</a>
                        </li>
                        <li id="administration-link">
                            <a href="#" onclick="toggleDropdown1()">Administration</a>
                            <div class="dropdown" id="administration-dropdown">
                                <a href="addproduct.php">Add product</a>
                                <a href="addcustomer.php">Sell Product</a>
                               
                            </div>
                        </li>
                        <li id="report-link">
                            <a href="#" onclick="toggleDropdown2()">Report</a>
                            <div class="dropdown" id="report-dropdown">
                                <a href="productreport.php">Product Report</a>
                                <a href="customerreport.php">Sells Report</a>
                            </div>
                        </li>
                    </ul>
                    </div>
                    <div class="account">
                        <ul>
                            <li href="index.php">
                                <a>
                                    <i class="fa-solid fa-house-chimney"></i>
                                </a>
                            </li>
                            <li href="logout.php">
                                <a>
                                    <i class="fa-solid fa-sign-out"></i>
                                </a>
                            </li>
                            
                        </ul>
                    </div>
                </div>
            </header>
        </div>
    <div>
            <div class="dashboardName">
                <h1>Visit Department Store</h1>
            </div>
            <div class="dashBoard">
               
                    <a href="addproduct.php">
                        <li>Add Product</li>
                    </a>
                    <a href="addsell.php">
                        <li>Add sell</li>
                    </a>
                    <a href="productreport.php">
                        <li>Product Report</li>
                    </a>
                    <a href="sellsreport.php">
                        <li>Sells Report</li>
                    </a>
            
                
            </div>

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
</body>
</html>