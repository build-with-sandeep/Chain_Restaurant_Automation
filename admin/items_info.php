<?php
	session_start();
if(!isset($_SESSION['user'])){
    header('location:admin_login.php');
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

        
	</body>


<?php
error_reporting(0);
	include 'db_connection.php';
	 $dbname=$_REQUEST['dbname'];
	$query = "SELECT * FROM $dbname.items_list";
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
	        echo"</tr>";
	    }
		echo'</tbody>';
	    echo'</table>';
	} else {
	    echo "<h3>No records found</h3>";
	}



?>