<?php
    session_start();
    if(!isset($_SESSION['user'])){
    header('location:admin_login.php');
}
?>

<?php
include 'db_connection.php';
if(isset($_POST['signup']))
  { 
    $name= $_POST['name'];
    $username=$_POST['username'];
    $email=$_POST['email'];
    $res_code=$_POST['res_loc_code'];
    $dbname='restaurant'.$res_code;
    $number=$_POST['phone'];
    $password=$_POST['password'];
    $repassword=$_POST['repassword'];
        if(strcmp($password, $repassword)==0){
        $insert_details="INSERT INTO manager_info VALUES('','$name','$username','$email','$res_code','$password','$number')";
        $result=mysqli_query($conn,$insert_details);
        if(empty(!$res_code) ){

            $insert_details1="INSERT INTO $dbname.manager_info VALUES('','$name','$username','$email','$res_code','$password','$number')";
            $result1=mysqli_query($conn,$insert_details1);  
        }
        

        if(!$result)
            { 
                $error= mysqli_error($conn);
                echo '<script>alert("'.$error.'")</script>';
            }

        else {
            echo '<script>alert("manager registration successfull !")</script>';
            header('location:admin_navigation.php');
     } 

    }else
    {   
        echo '<script>alert("password dont match")</script>';   
    }

}
?>


<html>
<head>
<title>Manager Registration Form</title>
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7; IE=EmulateIE9">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <link rel="stylesheet" type="text/css" href="css/style.css" media="all" />
    <link rel="stylesheet" type="text/css" href="css/demo.css" media="all" />
</head>
<body>
<div class="container">            
			<header>
				<h1><span></span>Manager Registration</h1>
            </header>       
      <div  class="form" >
    		<form id="contactform" action="manager_registration.php" method="post"> 
    			<p class="contact"><label for="name">Name</label></p> 
    			<input id="name" name="name" placeholder="First and last name" required="" tabindex="1" type="text"> 
                
                <p class="contact"><label for="username">Create a username</label></p> 
    			<input id="username" name="username" placeholder="username" required="" tabindex="2" type="text"> 

                <p class="contact"><label for="email">Email</label></p> 
                <input id="email" name="email" placeholder="example@domain.com" required="" type="email"> 

                <p class="contact"><label for="res_loc_code"> Enter restaurant location code</label></p> 
                <input id="res_loc_code" name="res_loc_code" placeholder="resaurant location code" required="" tabindex="2" type="text"> 
    			 
                <p class="contact"><label for="password">Create a password</label></p> 
    			<input type="password" id="password" placeholder="password" name="password" required=""> 
                <p class="contact"><label for="repassword">Confirm your password</label></p> 
    			<input type="password" id="repassword" name="repassword" required=""> 
         
	            <p class="contact"><label for="phone">Mobile phone</label></p> 
	            <input id="phone" name="phone" placeholder="phone number" required="" type="text"> <br>
	            <input class="buttom" name="signup" id="submit" tabindex="5" value=" Register me up!" type="submit"> 	 
   </form> 
</div>      
</div>
</body>
</html>
