<?php
	session_start();
if(!isset($_SESSION['user'])){
    header('location:manager_login.php');
}

?>

<?php
	include 'db_connection.php';
	$id=$_REQUEST['id'];
	
	$sql="DELETE FROM items_list WHERE item_id='$id'";
	$result=mysqli_query($conn,$sql);
	if($result)
	{
		header('location:view_items.php');
	}

?>