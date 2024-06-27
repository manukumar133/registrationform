<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "responsiveform3";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
// if (!$conn) {
//     die("Connection failed: " . mysqli_connect_error());
// }

// $sql = "CREATE TABLE users (
//     id INT AUTO_INCREMENT PRIMARY KEY,
//     fname VARCHAR(50) NOT NULL,
//     lname VARCHAR(50) NOT NULL,
//     pass VARCHAR(255) NOT NULL,
//     cpass VARCHAR(255) NOT NULL,
//     gender ENUM('male', 'female', 'other') NOT NULL,
//     email VARCHAR(100) NOT NULL,
//     phno VARCHAR(20) NOT NULL,
//     `add` TEXT NOT NULL
// )";


// if (mysqli_query($conn, $sql)) {
//     echo "Table users created successfully";
// } else {
//     echo "Error creating table: " . mysqli_error($conn);
// }

// mysqli_close($conn);
?>
