<?php
// Project Name: Activity 2
// Version: 1.1
// Module: Activity 2 v1.1
// Programmer Name: Tim James
// Date: March 4, 2019
// Synopsis: Working through the activities step by step.

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "activity2";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    
    die("Connection failed: " . $conn->connect_error);
}

$select = "SELECT ID, FIRST_NAME, LAST_NAME FROM users";
$captured = $conn->query($select);

if ($captured->num_rows > 0) {
    
    // Print data from rows
    while($row = $captured->fetch_assoc()) {
        echo "ID: " . $row["ID"]. " - Name: " . $row["FIRST_NAME"]. " " . $row["LAST_NAME"]. "<br>";
    }
} else {
    
    echo "0 results";
}

$conn->close();
?>