<?php
error_reporting(0);
session_start();
$dbname=$_SESSION['dbname'];
$conn = mysqli_connect("localhost","root","",$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>