<?php
	session_start();
	if(!isset($_SESSION['user'])){
    header('location:admin_login.php');
}
		
?>

<head>
        <title></title>
        <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.css">
        <script type="text/javascript" src="bootstrap/js/jquery.min.js"></script>
        <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
    </head>

<body>
        <header>
                <h1><span></span>Restaurant View</h1>
            </header>  
<body>

<?php
error_reporting(0);
    include 'db_connection.php';
    $query = "SELECT * FROM restaurant_info ";
    $result = mysqli_query($conn,$query);

    if (mysqli_num_rows($result) > 0) {
        echo'<table class="table table-condensed table-hover table-bordered">';
        echo'<thead>';
        echo'<tr>';
        echo'<th>RES CODE.</th>';
        echo'<th>NAME</th>';
        echo'<th>ADDRESS</th>';
        echo'<th>CITY</th>';
        echo'<th>LOC CODE</th>';
        echo'<th>Pr. MANAGER</th>';
         echo'<th>Sr. MANAGER</th>';
        echo'</tr>';
        echo'</thead>';
        while($row = mysqli_fetch_assoc($result)) {
            $_SESSION['m_id']=$row['m_id'];
            echo'<tbody>';
            echo'<tr>';
            echo'<td>' .$row['res_code'] .'</td>';
            echo '<td>' . $row['res_name'] .'</td>';
            echo '<td>' . $row['res_address'] . '</td>';
            echo '<td>' . $row['res_city'] .'</td>';
            echo '<td>' . $row['res_loccode'] . '</td>';
            echo '<td>' . $row['res_man1'] . '</td>';
             echo '<td>' . $row['res_man2'] . '</td>';
  
            echo"</tr>";
        }
        echo'</tbody>';
        echo'</table>';
    } else {
        echo "<h3>No records found</h3>";
    }



?>



