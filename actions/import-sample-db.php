<?php
// Database credentials
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "sms_project";

// Path to the SQL file
$sqlFile = '../admin/sample/database.sql';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Read the SQL file
$sql = file_get_contents($sqlFile);


// Execute SQL queries
if ($conn->multi_query($sql) === TRUE) {
    echo "Database imported successfully";
} else {
    echo "Error importing database: " . $conn->error;
}

// Close connection
$conn->close();
?>