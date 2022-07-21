<?php
	session_start();
	if(!isset($_SESSION['user'])){
    header('location:admin_login.php');
}
		
?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<style type="text/css">
		a{
			font-size: 40px;
					}

		#nav{
			margin-left: 35%;
		}			
	</style>
</head>	
<body >

		<a  style="color: red" "float:right;"  href="admin_logout.php" >Log Out</a><BR>

		<div id="nav">
		<a href="restaurant_registration.php" data-toggle="popover" title="Popover Header" data-content="Some content inside the popover">RESTAURANT REGISTRATION</a><BR>

		<a href="restaurant_deletion.php" data-toggle="popover" title="Popover Header" data-content="Some content inside the popover">RESTAURANT DELETION</a><BR>

		<a href="restaurant_man_updation.php" data-toggle="popover" title="Popover Header" data-content="Some content inside the popover">RESTAURANT UPDATION</a><BR>

		<a href="restaurant_view.php" data-toggle="popover" title="Popover Header" data-content="Some content inside the popover">RESTAURANT VIEW</a><BR>

		<a href="manager_registration.php" data-toggle="popover" title="Popover Header" data-content="Some content inside the popover">MANAGER REGISTRATION</a><BR>

		<a href="manager_deletion.php" data-toggle="popover" title="Popover Header" data-content="Some content inside the popover">MANAGER DELETION</a><BR>

		<a href="manager_updation1.php" data-toggle="popover" title="Popover Header" data-content="Some content inside the popover">MANAGER UPDATION</a><BR>

		<a href="manager_view.php" data-toggle="popover" title="Popover Header" data-content="Some content inside the popover">MANAGER VIEW</a><BR>

		<a href="view_restaurant_details.php" data-toggle="popover" title="Popover Header" data-content="Some content inside the popover">VIEW RESTAURANT DETAILS</a><BR>

		<a href="admin_profile.php" data-toggle="popover" title="Popover Header" data-content="Some content inside the popover">MY PROFILE</a><BR>

	</div>



<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>		
</body>
</html>