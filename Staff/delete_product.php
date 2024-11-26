<?php
include 'connect.php'; // Include your database connection file

// Check if the product ID is set in the request
if (isset($_GET['id'])) {
    // Sanitize the input to prevent SQL injection
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    // Perform a DELETE query on the product table to delete the specific product
    $sql = "DELETE FROM product WHERE id = '$id'";
    if (mysqli_query($conn, $sql)) {
        // Product deleted successfully
        echo "Product deleted successfully";
    } else {
        // Error occurred while deleting the product
        echo "Error deleting product: " . mysqli_error($conn);
    }
} else {
    // Product ID is not set in the request
    echo "Product ID is not set";
}

// Close connection
mysqli_close($conn);
?>
