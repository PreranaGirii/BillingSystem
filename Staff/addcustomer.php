<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/addcustomer.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" href="../images/logo.png" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Sells Form</title>
</head>
<body >
<?php require 'navv.php'; ?>
        <div class="wrapper">
        <div class="sidebar">
            <ul class="sidebar-menu">
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="addcustomer.php">Add Customer</a></li>
                <li><a href="productreport.php">Product Report</a></li>
                <li><a href="customerreport.php">Customer Report</a></li>
            </ul>
        </div>
        <div class="main-container">
        <div class="addSells">
                <h1>Add Customer</h1>
            </div>
            <div class="addSellsForm">
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <div class="InputContainer">
                        <label>Customer Name</label>
                        <input type="text" name="customername"/>
                    </div>
                    <div class="InputContainer">
                        <div class="">
                        <label for="">Customer Number</label>
                        <input type="tel" name="ph_number"/>
                    </div>
                    <div class="InputContainer">
                        <button type="submit" name="billing">Continue to bill</button>
                    </div>
                </form>
            </div>
        </div>
        </div>
        <?php
            include 'connect.php';
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_POST['billing'])) {
                    $customerName = $_POST['customername'];
                    $phoneNumber = $_POST['ph_number'];
                    if (empty($customerName)) {
                        echo "<script>console.log('Enter Customer Name')</script>";
                    } elseif (empty($phoneNumber)) {
                        echo "<script>console.log('Enter Phone Number')</script>";
                    } else {
                        $sql = "INSERT INTO customer (customer_name, ph_number) VALUES ('$customerName', '$phoneNumber')";
                        if (mysqli_query($conn, $sql)) {
                            $redirect_url = "customerbilling.php?";
                            echo "<script>location.replace('$redirect_url')</script>";
                        } else {
                            echo "<script>alert('Error: " . mysqli_error($conn) . "')</script>";
                        }
                    }
                }
            }
        ?>
</body>
</html>