<?php
// Project Name: Activity 2
// Version: 1.1
// Module: Activity 2 v1.1
// Programmer Name: Tim James
// Date: March 4, 2019
// Synopsis: Working through the activities step by step.

require_once 'myfuncs.php';

$user = $_POST["username"];
$pass = $_POST["password"];

// Create connection
$conn = dbConnect();

// Check that information is not NULL
if ($user == NULL) {
    
    echo nl2br("- The User Name is a required field and cannot be blank\n\n");
}

if ($pass == NULL) {
    
    echo nl2br("- The Password is a required field and cannot be blank\n\n");
}

$sql = "SELECT ID FROM users WHERE USERNAME='$user' AND PASSWORD='$pass'";
$captured = $conn->query($sql);

    // Check for error
    if ($captured->num_rows == 1) {
        
        $row = $captured->fetch_assoc();
        saveUserId($row["ID"]);
        include('loginResponse.php');
    }
    else if ($captured->num_rows == 0) {
        
        $message = "Login Failed";
        include('loginFailed.php');
    }
    else if ($captured->num_rows > 2) {
        
        echo "There are multiple users that have registered";
    }
    else {
        
        echo $conn->error;
    }

$conn->close();
?>