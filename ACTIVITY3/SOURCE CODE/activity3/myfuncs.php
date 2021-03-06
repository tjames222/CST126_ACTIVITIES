<?php
// Project Name: Activity 2
// Version: 1.1
// Module: Activity 2 v1.1
// Programmer Name: Tim James
// Date: March 4, 2019
// Synopsis: Working through the activities step by step.

function dbConnect() {
    
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
    
    return $conn; 
}

function saveUserId($id) {
    
    session_start();
    $_SESSION["USER_ID"] = $id; 
}

function getUserId() {
    
    session_start();
    return $_SESSION["USER_ID"];
}