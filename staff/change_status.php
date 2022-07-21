<?php
	include 'connection.php';
	$status=$_REQUEST['status'];
	$id=$_REQUEST['id'];
	$sql = "UPDATE temp_staff_data SET status= 1 WHERE id=$id";
	if (mysqli_query($conn, $sql)) {
  	header('location:staff.php');
	} 
	



?>