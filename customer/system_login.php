<?php
session_start();

$conn =  mysqli_connect("localhost","root","","chainrestaurant");

if(isset($_POST['login']))
  { 
    $manager_name=$_POST['manager_name'];
    $password=$_POST['password'];
    $system=$_POST['system'];
    $query = "SELECT * FROM manager_info WHERE m_username='$manager_name'
                and m_password='$password'";
    $result = mysqli_query($conn,$query) or die(mysqli_error());
    $rows = mysqli_num_rows($result);
        if($rows==1){
            $r=mysqli_fetch_assoc($result);
            $res_code=$r['res_loccode'];
            $dbname='restaurant'.$res_code;
            $conn1 =  mysqli_connect("localhost","root","",$dbname);
            $query1 = "SELECT * FROM $dbname.manager_info WHERE m_username='$manager_name'
                and m_password='$password'";

            $result1 = mysqli_query($conn1,$query1) or die(mysqli_error());
             $rows1 = mysqli_num_rows($result1);
             if($rows==1) {
                $_SESSION['manager'] = $manager_name;
                $_SESSION['dbname']=$dbname;
                $_SESSION['system']=$system;
                header('location:connection.php');
                header("location:welcome.php");
             } 
              
         }else{
            echo '<script>alert("Username and/or Password incorrect !")</script>';
    }
  }


?>




<!DOCTYPE html>
<html>
<head>
<title>Activate System</title>
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7; IE=EmulateIE9">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <link rel="stylesheet" type="text/css" href="css/style.css" media="all" />
    <link rel="stylesheet" type="text/css" href="css/demo.css" media="all" />
    
</head>
<body>
<div class="container">            
			<header>
				<h1><span></span>System Login</h1>

            </header>       
      <div  class="form">

                <form id="contactform" action="system_login.php" method="post">

                   <select name="system" required=""">
                    <option value="1">system 1</option>
                    <option value="2">system 2</option>
                    <option value="3">system 3</option>
                    <option value="4">system 4</option>
                    <option value="5">system 5</option>
                    <option value="6">system 6</option>
                    </select>       

                <p class="contact"><label for="username">Enter Manager's username</label></p> 
    			<input id="username" name="manager_name" placeholder="username" required="" tabindex="2" type="text"> 
    			       
                
                <p class="contact"><label for="password">Enter Manager's password</label></p> 
    			<input type="password" id="password" name="password" placeholder="password" required=""> 
	            <input class="buttom" name="login" id="submit" tabindex="5" value="Log In!" type="submit"> 	 
   </form> 
</div>      
</div>
</body>
</html>