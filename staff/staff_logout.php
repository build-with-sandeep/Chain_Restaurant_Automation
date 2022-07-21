<?php
session_start();
include 'connection.php';
$manager_name=$_SESSION['manager'] ;
if ($_SESSION['manager'])
{	
	$sql = "DELETE FROM temp_staff_data";

	$result=mysqli_query($conn, $sql);
    unset($_SESSION['manager']);
    session_destroy();
    header("location:staff_login.php");
}


?>