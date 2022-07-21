<?php
	session_start();
	if(!isset($_SESSION['user'])){
    header('location:admin_login.php');
}
		
?>



<?php
	include 'db_connection.php';
	if(isset($_POST['delete']))
		  {	
	    $user_id=$_POST['user_id'];
	    $query = "SELECT * FROM manager_info WHERE m_id='$user_id'";
	    $result = mysqli_query($conn,$query);
	    $rows = mysqli_num_rows($result);
	        if($rows==1){

	        	$r= mysqli_fetch_assoc($result);

	        		if (!empty($r['res_loccode'])){
	        		$mname = $r['m_username'];
	        		$dbname = 'restaurant'.$r['res_loccode'];
	        		$q="DELETE FROM $dbname.manager_info WHERE m_username='$mname'";
	        	    $res = mysqli_query($conn,$q) or die(mysqli_error());

	        		}
	        	

	        	
	        	$q="DELETE FROM manager_info WHERE m_id='$user_id'";
	        	$res = mysqli_query($conn,$q) or die(mysqli_error());

	        	if($res){
	        		echo '<script>alert("manager deletion successfull")</script>';
	        		header('location:admin_navigation.php');
	        	}
	        	

	         }else{
	            echo '<script>alert("UserId invalid !")</script>';
	    }
	  }
?>



<html>
<head>
<title>Manager Deletion Form</title>
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7; IE=EmulateIE9">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <link rel="stylesheet" type="text/css" href="css/style.css" media="all" />
    <link rel="stylesheet" type="text/css" href="css/demo.css" media="all" />
</head>
<body>
<div class="container">            
			<header>
				<h1><span></span>Manager Deletion Form</h1>
            </header>       
      <div  class="form">
                <form id="contactform" action="manager_deletion.php" method="post">
                <p class="contact"><label for="username">Enter Manager's ID</label></p> 
    			<input id="username" name="user_id" placeholder="Manager ID" required="" tabindex="2" type="text">
	            <input class="buttom" name="delete" id="submit" tabindex="5" value="Delete!" type="submit"> 	 
   </form> 
</div>      
</div>
</body>
</html>
