<?php
	session_start();
if(!isset($_SESSION['user'])){
    header('location:manager_login.php');
}
?>
<html>
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
		<script type="text/javascript" src="bootstrap/js/jquery.min.js"></script>
		<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
	</head>
	<body>
		<header>
				<h1><span></span>View Items</h1>
            </header> 
	<form action="view_items1.php" method="post">
		<input type="text" name="query">
		<input type="submit" name="search" value="search">
	</form>
        
	</body>


<?php
error_reporting(0);
	include 'db_connection.php';
	$query = "SELECT * FROM items_list";
	$result = mysqli_query($conn,$query);

	if (mysqli_num_rows($result) > 0) {
		echo'<table class="table table-condensed table-hover table-bordered">';
		echo'<thead>';
		echo'<tr>';
		echo'<th>it.no.</th>';
		echo'<th>PIC</th>';
		echo'<th>NAME</th>';
		echo'<th>TYPE</th>';
		echo'<th>CUISINE</th>';
		echo'<th>COOKTYPE</th>';
		echo'<th>BASETASTE</th>';
		echo'<th>DESCIPTION</th>';
		echo'<th>PRICE</th>';
		echo'<th>ACTION</th>';
		echo'<th>ACTION</th>';
		echo'</tr>';
		echo'</thead>';
	    while($row = mysqli_fetch_assoc($result)) {
	    	$_SESSION['item_id']=$row['item_id'];
			echo'<tbody>';
	    	echo'<tr>';
	    	echo'<td>' .$row['item_id'] .'</td>';
	    	echo'<td><img id="myImg" src="'.$row['item_pic'].'" width="50" height="40"/></td>';
	    	echo '<td>' . $row['item_name'] .'</td>';
			echo '<td>' . $row['item_type'] . '</td>';
			echo '<td>' . $row['item_cuisine'] .'</td>';
			echo '<td>' . $row['item_cooktype'] . '</td>';
			echo '<td>' . $row['item_basetaste'] . '</td>';
			echo '<td>' . $row['item_details'] . '</td>';
			echo '<td>' . $row['item_price'] . '</td>';
	        echo'<td><a style="color:red;" href="delete_view_items.php?name='.$row[item_name].'&id='.$row[item_id].'&it='.$row[item_type].'">DELETE</a></td>';
	        echo'<td><a style="color:brown;" href="update_items6.php?name='.$row[item_name].'&id='.$row[item_id].'">UPDATE</a></td>';
	        echo"</tr>";
	    }
		echo'</tbody>';
	    echo'</table>';
	} else {
	    echo "<h3>No records found</h3>";
	}



?>