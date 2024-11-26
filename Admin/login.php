<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" href="../images/logo.png" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login for Visit department store</title>
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
                    <a href="../homepage.php"><span>Home</span></a>
                </span>
            </div>
            <div class="account">
                <span><a href="../homepage.php">
                    <span><i class="fa-solid fa-house-chimney"></i></span>
                    </a>
                </span>
            </div>
        </div>
        <div>   
        </header>
            <div>
            <div class="loginHeader">
                <h1>Admin Login</h1>
				<h2>Enter your information below to login.</h2>
            </div>
        <div class="loginBody">
        <form action="login.php" method="post">
            <input type="text" name="admin" placeholder="Username" required>
            <input type="password" name="departmentadmin" placeholder="Password" required>
            <input type="submit" name="login" value="Login">
        </form>
        </div>
        </div>
    
        <?php


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['login'])) {
            $username = $_POST['admin'];
            $password = $_POST['departmentadmin'];

            if (empty($username)) {
             echo "<script>alert('Enter Username')</script>";
            } else if (empty($password)) {
             echo "<script>alert('Enter Password')</script>";
            } else {
                $admin_username = 'admin'; // Set your admin username
                $admin_password = 'departmentadmin'; // Set your admin password

                if ($username === $admin_username && $password === $admin_password) {
                    $_SESSION['username'] = $username;
                    $_SESSION['loggedin'] = true;
                    echo "<script> location.replace('dashboard.php'); </script>";
                } else {
                    echo "<script>alert('Incorrect username or password')</script>";
                }
            }
        }
    }
?>
</body>

</html>








