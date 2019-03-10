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

$firstName = $_POST["FirstName"];
$lastName = $_POST["LastName"];
$user = $_POST["Username"];
$pass = $_POST["Password"];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    
    die("Connection failed: " . $conn->connect_error);
}

// Insert values into the SQL database
$sql = "INSERT INTO users (FIRST_NAME, LAST_NAME, USERNAME, PASSWORD)
VALUES ('$firstName', '$lastName', '$user', '$pass')";

// Check that information is not NULL
if ($firstName == NULL) {
    
    echo nl2br("- The First Name is a required field and cannot be blank\n\n");
}

if ($lastName == NULL) {
    
    echo nl2br("- The Last Name is a required field and cannot be blank\n\n");
}

if ($user == NULL) {
    
    echo nl2br("- The User Name is a required field and cannot be blank\n\n");
}

if ($pass == NULL) {
    
    echo nl2br("- The Password is a required field and cannot be blank\n\n");
}


// Check for error
if (!($firstName == NULL || $lastName == NULL || $user == NULL || $pass == NULL) && $conn->query($sql) === TRUE) {
    
    echo "New record created successfully";
} else {
    
    echo "Error: " . $sql . "<br>" . $conn->error;
}



$conn->close();
?>