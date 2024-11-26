<?php
// Include your database connection file
include 'connect.php';

// Check if form data is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve form data
    $product_id = $_POST['id']; // Use $product_id instead of $id
    $product_name = $_POST['product_name'];
    $quantity = $_POST['quantity'];
    $rate = $_POST['rate'];

    // Calculate total price
    $total_price = $quantity * $rate;

    // Perform database update operation
    $sql = "UPDATE product SET product_name='$product_name', quantity=$quantity, rate=$rate, total_price=$total_price WHERE id=$product_id"; // Use $product_id here

    if (mysqli_query($conn, $sql)) {
        // If the query is executed successfully
        echo "Product updated successfully!";
    } else {
        // If there is an error in executing the query
        echo "Error updating product: " . mysqli_error($conn);
    }
} else {
    // Handle invalid request method (should be POST)
    echo "Invalid request method!";
}
?>
