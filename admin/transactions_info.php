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
				<h1><span></span>View Transactions</h1>
            </header> 

        
	</body>


<?php
error_reporting(0);
	include 'db_connection.php';
	 $dbname=$_REQUEST['dbname'];
	$query = "SELECT * FROM $dbname.transactions";
	$result = mysqli_query($conn,$query);

	if (mysqli_num_rows($result) > 0) {
		echo'<table class="table table-condensed table-hover table-bordered">';
		echo'<thead>';
		echo'<tr>';
		echo'<th>ORDER_ID</th>';
		echo'<th>USERNAME</th>';
		echo'<th>PHONE NO</th>';
		echo'<th>SYSTEM NAME</th>';
		echo'<th>TOTAL ITEMS</th>';
		echo'<th>ITEMS</th>';
		echo'<th>DATETIME</th>';
		echo'<th>AMOUNT</th>';
		echo'<th>FEEDBACK</th>';
		echo'</tr>';
		echo'</thead>';
	    while($row = mysqli_fetch_assoc($result)) {
			echo'<tbody>';
	    	echo'<tr>';
	    	echo'<td>' .$row['order_id'] .'</td>';
	    	echo '<td>' . $row['user_name'] .'</td>';
			echo '<td>' . $row['user_phone'] . '</td>';
			echo '<td>' . $row['system_name'] .'</td>';
			echo '<td>' . $row['no_of_items'] . '</td>';
			echo '<td>' . $row['items_ordered'] . '</td>';
			echo '<td>' . $row['order_datetime'] . '</td>';
			echo '<td>' . $row['amount'] . '</td>';
			echo '<td>' . $row['feedback'] . '</td>';
	        echo"</tr>";
	    }
		echo'</tbody>';
	    echo'</table>';
	} else {
	    echo "<h3>No records found</h3>";
	}



?>