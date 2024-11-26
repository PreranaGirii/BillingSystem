<?php
    $host="localhost";
    $user="root";
    $pw="";
    $db = "departmentbillings";
  

    $conn=mysqli_connect($host,$user,$pw,$db);

    if(!$conn){
        die("Connection not successfull due to ".mysqli_connect_error());
    }
    // else{
    //     echo "Connection successfull.";
    // }
?>