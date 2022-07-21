<?php
	
	include 'db_connection.php';
	$pr_man=$_POST['pr_man'];
	$sr_man=$_POST['sr_man'];
	$rescode=$_SESSION['rescode'];
	$dbname='restaurant'.$rescode;

	if(!empty($pr_man) && empty($sr_man)){

		$query= "UPDATE restaurant info SET res_man1='$pr_man' WHERE res_loccode='$res_code'";

	$query1= "UPDATE manager_info SET res_loccode='$rescode' WHERE m_username ='$pr_man'";

	$query2="SELECT * FROM $dbname.manager_info  WHERE m_username='$pr_man'";
	$result=mysqli_query($conn,$query2);
	while($row = mysqli_fetch_assoc($result)) {

		$m_username=$row['m_username'];
		$q="UPDATE chainrestaurant.manager_info SET res_loccode='' WHERE m_username='$m_username'";
		mysqli_query($conn,$q);

	}

	$query3="UPDATE"

	}

	elseif(empty($pr_man) && !empty($sr_man)){

		$query= "UPDATE restaurant info SET res_man2='$sr_man' WHERE res_loccode='$res_code'";

	$query1= "UPDATE manager_info SET res_loccode='$rescode' WHERE m_username ='$sr_man'";
	}

	elseif(!empty($pr_man) && !empty($sr_man)){

		$query= "UPDATE restaurant info SET res_man1='$pr_man', res_man2='$sr_man' WHERE res_loccode='$res_code'";

	$query1= "UPDATE manager_info SET res_loccode='$rescode' WHERE m_username ='$sr_man' AND $m_username='$pr_man'";
	}





?>