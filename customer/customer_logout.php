<?php
session_start();
if (isset($_SESSION['c_name']))
{
    unset($_SESSION['c_name']);

}
header("location:welcome.php");
?>