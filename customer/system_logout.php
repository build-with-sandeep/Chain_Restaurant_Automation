<?php
session_start();
include 'connection.php';
$system=$_SESSION['system'];

if ($_SESSION['manager'])
{	
	$sql = "DELETE FROM temp_staff_data WHERE sys_name= '$system' AND status= 1 ";

	$result=mysqli_query($conn, $sql);
    unset($_SESSION['manager']);
    session_destroy();
    header("location:system_login.php");
}


?>
