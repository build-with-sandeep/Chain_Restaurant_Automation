<?php
session_start();
$total=$_REQUEST['total'];
echo $total."amount has been paid";
header("Refresh:3; url=customer_logout.php");

?>