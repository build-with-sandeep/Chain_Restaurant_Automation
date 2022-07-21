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
        $rescode=$_POST['rescode'];
        $query = "SELECT * FROM restaurant_info WHERE re_code = '$rescode'";
        $result = mysqli_query($conn,$query);
        $rows = mysqli_num_rows($result);
            if($rows==1){
   
                $q="DELETE FROM restaurant_info WHERE re_code='$rescode'";
                $res = mysqli_query($conn,$q) or die(mysql_error());
                if($res){
                header('location:admin_navigation.php');
            
                }
            }

             else{
                echo '<script>alert("invalid restaurant code !")</script>';
        }
      }
?>











<html>
<head>
<title>Restaurant Deletion Form</title>
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7; IE=EmulateIE9">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <link rel="stylesheet" type="text/css" href="css/style.css" media="all" />
    <link rel="stylesheet" type="text/css" href="css/demo.css" media="all" />
</head>
<body>
<div class="container">            
			<header>
				<h1><span></span>Restaurant Deletion Form</h1>
            </header>       
      <div  class="form">
                <form id="contactform" action="restaurant_deletion.php" method="post">

                <p class="contact"><label for="res_loc_code">Enter Restaurant Code</label></p> 
                <input id="rescode" name="rescode" placeholder="restaurant code" required="" tabindex="2" type="text">  
	            <input class="buttom" name="delete" id="submit" tabindex="5" value="Delete!" type="submit"> 	 
   </form> 
</div>      
</div>
</body>
</html>
