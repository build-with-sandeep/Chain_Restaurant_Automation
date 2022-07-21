<?php
	session_start();
if(!isset($_SESSION['user'])){
    header('location:manager_login.php');
}

?>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<style type="text/css">
		a{
			
			margin-left: 40%;
			margin-top:20%;
			font-size: 40px;
					}
	</style>
</head>


<a href="add_items.php" data-toggle="popover" title="Popover Header" data-content="Some content inside the popover">ADD ITEMS</a><BR>
<a href="delete_items1.php" data-toggle="popover" title="Popover Header" data-content="Some content inside the popover">DELETE ITEMS</a><BR>

<a href="update_items1.php" data-toggle="popover" title="Popover Header" data-content="Some content inside the popover">UPDATE ITEMS</a><BR>

<a href="view_items.php" data-toggle="popover" title="Popover Header" data-content="Some content inside the popover">VIEW ITEMS</a><BR>

<a href="view_transactions.php" data-toggle="popover" title="Popover Header" data-content="Some content inside the popover">VIEW TRANSACTIONS</a><BR>

<a href="manager_profile1.php" data-toggle="popover" title="Popover Header" data-content="Some content inside the popover">MY PROFILE</a><BR>


<a  href="manager_logout.php" data-toggle="popover" title="Popover Header" data-content="Some content inside the popover"><span style="color: red;">LOG OUT</span></a><BR>