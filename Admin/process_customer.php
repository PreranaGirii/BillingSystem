<?php
include 'connect.php'; // Include your database connection file

// Initialize variables to avoid warnings
$billNumber = "";
$billDate = "";
$customerName = "";
$customerPhone = "";

// Fetch customer data from the database
$sql = "SELECT bill_no, created_date, customer_name, ph_number FROM customer ORDER BY id DESC LIMIT 1"; // Assuming you want to fetch the latest customer added
$result = $conn->query($sql);

if ($result) {
    // Check if any rows are returned
    if ($result->num_rows > 0) {
        // Fetch the first row
        $row = $result->fetch_assoc();
        // Assign values to variables
        $billNumber = $row["bill_no"];
        $billDate = $row["created_date"];
        $customerName = $row["customer_name"];
        $customerPhone = $row["ph_number"];
    } else {
        echo "No records found in the customer table.";
    }
} else {
    echo "Error executing query: " . $conn->error;
    echo "SQL Query: " . $sql;
}

$conn->close();
?>
