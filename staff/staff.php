<?php
session_start();
include 'connection.php';
header("refresh: 3"); 
$sql = "SELECT * FROM temp_staff_data WHERE status = 0 ORDER BY datetime  ";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_assoc($result)) {
    echo "table: " . $row["sys_name"]. " Names: " . $row["item_names"]. "Quantities " . $row["quantities"];
    $id=$row['id'];
   echo'<button><a href="change_status.php?status=1&id='.$row['id'].'">ok</a></button>';	
   echo "<br>";


  }
} else { 
  echo "0 results";
}


?>
<a href="staff_logout.php">LOG OUT</a>
