<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" href="../images/logo.png" type="image/x-icon">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Visit department store</title>
</head>
<body class="container">
<?php require 'nav.php'; ?>
            <div>
            <div class="loginHeader">
                <h1>Login</h1>
				<h2>Enter your information below to login.</h2>
            </div>
        <div class="loginBody">
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                
                    <label>Username</label>
                    <input type="text" name="username"/>
                    <label>Password</label>
                    <input type="password" name="password"/>
                    <button type="submit" name="login">Login</button>
                    <closeform></closeform>
                <div>
                <p class="para-2">
                Not have an account? <a href="signup.php" class="signup_color">Sign Up Here</a>
                </p>
                </div>
            </form>
        </div>
        </div>
    
    <?php
			include 'connect.php';
			if($_SERVER["REQUEST_METHOD"]=="POST"){
				if(isset($_POST['login'])){
					$username=$_POST['username'];
					$password=$_POST['password'];

					if($username==NULL){
						echo "<script>alert('Enter Username')</script>";
					}
					else if($password==NULL){
						echo "<script>alert('Enter Password')</script>";
					}
					else{
						$sql="SELECT * FROM employee
						where username='$username' AND password='$password' ";
						$result=mysqli_query($conn,$sql);
						$num=mysqli_num_rows($result);
						if($num==1){
							$_SESSION['username']=$username;
							$_SESSION['loggedin']=true;
						$p = $_SERVER['PHP_SELF'];
						echo "<script> location.replace('dashboard.php'); </script>";
						}
						else{
							echo "<script>alert('User not found, Please register')</script>";
						}
					}
				}
			}
		?>
</body>

</html>


