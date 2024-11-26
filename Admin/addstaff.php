<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/customerreport.css">
    <link rel="stylesheet" href="css/staff.css">
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
    <div class="main-container">
    <h2>Add Staff Member</h2>
    <form action="" method="post">
        <label for="emailid">Email ID:</label>
        <input type="email" name="emailid" id="emailid" required><br><br>
        
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required><br><br>
        
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required><br><br>
        
        <input type="submit" value="Add Staff">
    </form>
</body>
</html>

<?php
include 'connect.php'; // Include your database connection script

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $emailid = $_POST['emailid'];
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Encrypt the password for security

    // Prepare the SQL statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO staff (emailid, username, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $emailid, $username, $password);

    if ($stmt->execute()) {
        echo "<script>alert('Staff member added successfully!');</script>";
        echo "<script>location.replace('dashboard.php');</script>"; // Redirect to admin dashboard
    } else {
        echo "<script>alert('Error adding staff member. Please try again.');</script>";
    }

    $stmt->close();
    $conn->close();
}
?>

    </div>
    </div>
    </header>        
</body>
</html>