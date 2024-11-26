<?php
// Include your database connection file
include 'connect.php';

// Check if form data is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve data from the POST request
    $billNumber = $_POST['bill_number'];
    $billDate = $_POST['bill_date'];
    $customerName = $_POST['customer_name'];
    $customerPhone = $_POST['customer_phone'];
    $totalAmount = $_POST['total_amount'];

    // Perform database insertion operation
    $sql = "INSERT INTO billing (bill_number, bill_date, customer_name, customer_phone, total_amount)
            VALUES ('$billNumber', NOW(), '$customerName', '$customerPhone', '$totalAmount')";
    if (mysqli_query($conn, $sql)) {
        // If insertion is successful, return a success message
        echo "Bill saved successfully!";
        echo "<script>location.replace('productreport.php');</script>";
    } else {
        // If there's an error, return an error message
        echo "Error: " . mysqli_error($conn);
    }
} else {
    // Handle invalid request method (should be POST)
    echo "Invalid request method!";
}
?>