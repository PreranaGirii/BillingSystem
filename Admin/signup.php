<html lang="en">
<head>
    <title>Sign Up</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/signup.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet"/>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
    <body>
    <?php require 'nav.php'; ?>
    <br>
    <br>
    <br>
    <div class="signup-box">
        <div class="signup">
            <h1>Sign Up</h1>
            <!-- <h2>Enter your information below to signup.</h2> -->
        </div>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label>Full Name</label>
        <input type="text" name="fullname" />
        <label>User Name</label>
        <input type="text" name="username" />
        <label>Email</label>
        <input type="email" name="email" />
        <label>Password</label>
        <input type="password" name="password" />
        <label>Confirm Password</label>
        <input type="password" name="repassword" />
        <button type="submit" name="signup">Sign up</button>
        <closeform></closeform></form>
    </div>
    <p class="para-2">
        Already have an account? <a href="login.php">Login</a>
    </p>
    <?php
include 'connect.php';
if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(isset($_POST['signup'])){
        $username=$_POST['username'];
        $fullname=$_POST['fullname'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $repassword=$_POST['repassword'];

        if($username==NULL){
            echo "<script>alert('Enter Username')</script>";
        }
        else if($fullname==NULL){
            echo "<script>alert('Enter your name')</script>";
        }
        else if($email==NULL){
            echo "<script>alert('Enter your email')</script>";
        }
        else if($password==NULL){
            echo "<script>alert('Enter your password')</script>";
        }
        else if($repassword==NULL){
            echo "<script>alert('Enter your re-password')</script>";
        }
        else if($password!=$repassword){
            echo "<script>alert('Passwords does not match, Try Again')</script>";
        }
        else{
            $sql="INSERT INTO employee(fullName,username,email,password)
        values('$fullname','$username','$email','$password')
        ";
        $result=mysqli_query($conn,$sql);
        if($result){
            echo "<script>alert('Account Created, Please Login In')</script>";
        }
        else{
            echo "<script>alert('Error, Please Register Again')</script>";
        }
        }

    }
}
?>
  </body>
</html>