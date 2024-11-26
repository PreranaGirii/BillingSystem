<?php
// Include the database connection file
include 'connect.php';

// Define the SQL query to create the admin table
$sql = "CREATE TABLE IF NOT EXISTS admins (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

// Execute the SQL query
if ($conn->query($sql) === TRUE) {
    echo "Admins table created successfully<br>";
} else {
    echo "Error creating table: " . $conn->error;
}

// Insert a sample admin into the table
$username = "admin";
$password = password_hash("admin123", PASSWORD_DEFAULT); // Encrypt the password
$email = "admin@example.com";

$sql = "INSERT INTO admins (username, password, email) VALUES ('$username', '$password', '$email')";

if ($conn->query($sql) === TRUE) {
    echo "Admin created successfully<br>";
} else {
    echo "Error creating admin: " . $conn->error;
}

// Close the database connection
$conn->close();
?>