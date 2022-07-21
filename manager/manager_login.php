<?php
session_start();

$conn =  mysqli_connect("localhost","root","","chainrestaurant");

if(isset($_POST['login']))
  { 
    $username=$_POST['username'];
    $password=$_POST['password'];
    $query = "SELECT * FROM manager_info WHERE m_username='$username'
                and m_password='$password'";


    $result = mysqli_query($conn,$query) or die(mysql_error());
    $rows = mysqli_num_rows($result);
        if($rows==1){
            $r=mysqli_fetch_assoc($result);
            $res_code=$r['res_loccode'];
            $dbname='restaurant'.$res_code;
            $conn1 =  mysqli_connect("localhost","root","",$dbname);
            $query1 = "SELECT * FROM $dbname.manager_info WHERE m_username='$username'
                and m_password='$password'";

            $result1 = mysqli_query($conn1,$query1) or die(mysqli_error());
             $rows1 = mysqli_num_rows($result1);
             if($rows==1) {
                $_SESSION['user'] = $username;
                $_SESSION['dbname']=$dbname;
                header('location:db_connection.php');
                header("Location: manager_navigation.php");
             } 
              
         }else{
            echo '<script>alert("Username and/or Password incorrect !")</script>';
    }
  }


?>




<!DOCTYPE html>
<html>
<head>
<title>Manager Login Form</title>
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7; IE=EmulateIE9">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <link rel="stylesheet" type="text/css" href="css/style.css" media="all" />
    <link rel="stylesheet" type="text/css" href="css/demo.css" media="all" />
</head>
<body>
<div class="container">            
			<header>
				<h1><span></span>Manager Login Form</h1>
            </header>       
      <div  class="form">
                <form id="contactform" action="manager_login.php" method="post">
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