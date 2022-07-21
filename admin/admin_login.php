<?php
session_start();
include 'db_connection.php';

if(isset($_POST['login']))
  {	
    $username=$_POST['username'];
    $password=$_POST['password'];
    $query = "SELECT * FROM admin_info WHERE admin_username='$username'
                and admin_password='$password'";
    $result = mysqli_query($conn,$query) or die(mysql_error());
    $rows = mysqli_num_rows($result);
        if($rows==1){
        $_SESSION['user'] = $username;
        header("Location: admin_navigation.php");
         }else{
            echo '<script>alert("Username and/or Password incorrect !")</script>';
    }
  }


?>
<!DOCTYPE html>
<html>
<head>
<title>Admin Login Form</title>
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7; IE=EmulateIE9">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <link rel="stylesheet" type="text/css" href="css/style.css" media="all" />
    <link rel="stylesheet" type="text/css" href="css/demo.css" media="all" />
</head>
<body>
<div class="container">            
			<header>
				<h1><span></span>Admin Login Form</h1>
            </header>       
      <div  class="form">
                <form id="contactform" action="admin_login.php" method="post">
                <p class="contact"><label for="username">Enter your username</label></p> 
    			<input id="username" name="username" placeholder="username" required="" tabindex="2" type="text"> 
    			 
                <p class="contact"><label for="password">Enter your password</label></p> 
    			<input type="password" id="password" name="password" placeholder="password" required=""> 
	            <input class="buttom" name="login" id="submit" tabindex="5" value="Log In!" type="submit"> 	 
   </form> 
</div>      
</div>
</body>
</html>
