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

$user = $_POST["username"];
$pass = $_POST["password"];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    
    die("Connection failed: " . $conn->connect_error);
}

// Check that information is not NULL
if ($user == NULL) {
    
    echo nl2br("- The User Name is a required field and cannot be blank\n\n");
}

if ($pass == NULL) {
    
    echo nl2br("- The Password is a required field and cannot be blank\n\n");
}

$sql = ("SELECT USERNAME, PASSWORD FROM users WHERE USERNAME=" . mysql_real_escape_string($_POST['username']) . "AND PASSWORD=" . mysql_real_escape_string($_POST['password']));
$captured = $conn->query($sql);

    // Check for error
    if ($captured->num_rows = 1) {
        
        echo "Login was succesful";
    }
    else if ($captured->num_rows = 0) {
        
        echo "Login Failed";
    }
    else if ($captured->num_rows > 2) {
        
        echo "There are multiple users that have registered";
    }
    else {
        
        echo $conn->error;
    }


$conn->close();
?>