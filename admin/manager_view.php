<?php
	session_start();
	if(!isset($_SESSION['user'])){
    header('location:admin_login.php');
}
		
?>
<head>
		<title> MANAGERS</title>
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
		<script type="text/javascript" src="bootstrap/js/jquery.min.js"></script>
		<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
	</head>

<body>
		<header>
				<h1><span></span>Managers View</h1>
            </header>  
<body>

<?php
error_reporting(0);
    include 'db_connection.php';
    $query = "SELECT * FROM manager_info ";
    $result = mysqli_query($conn,$query);


    if (mysqli_num_rows($result) > 0) {
        echo'<table class="table table-condensed table-hover table-bordered">';
        echo'<thead>';
        echo'<tr>';
        echo'<th>NO.</th>';
        echo'<th>NAME</th>';
        echo'<th>USERNAME</th>';
        echo'<th>EMAIL ID</th>';
        echo'<th>LOC CODE</th>';
        echo'<th>PHONE NO</th>';
        echo'</tr>';
        echo'</thead>';
        while($row = mysqli_fetch_assoc($result)) {
            $_SESSION['m_id']=$row['m_id'];
            echo'<tbody>';
            echo'<tr>';
            echo'<td>' .$row['m_id'] .'</td>';
            echo '<td>' . $row['m_name'] .'</td>';
            echo '<td>' . $row['m_username'] . '</td>';
            echo '<td>' . $row['m_emailid'] .'</td>';
            echo '<td>' . $row['res_loccode'] . '</td>';
            echo '<td>' . $row['m_phone'] . '</td>';
  
            echo"</tr>";
        }
        echo'</tbody>';
        echo'</table>';
    } else {
        echo "<h3>No records found</h3>";
    }



?>


