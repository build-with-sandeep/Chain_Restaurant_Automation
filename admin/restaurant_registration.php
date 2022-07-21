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
    $r_name=$_POST['name'];
    $add= $_POST['address'];
	$city=$_POST['city'];  
    $loc=$_POST['res_loc_code'];
	$mname=$_POST['m_name'];
	$sname=$_POST['s_name'];
    $db_name='restaurant'.$loc;

    $query="SELECT * FROM manager_info WHERE m_username ='$mname'";
    $r=mysqli_query($conn,$query);
    if(mysqli_num_rows($r)==1){

        $row = mysqli_fetch_assoc($r);

        $insert_details="INSERT INTO chainrestaurant.restaurant_info VALUES('','$r_name','$add','$city','$loc','$mname','$sname')";

        $sql = "CREATE DATABASE  $db_name";

        $sql1 = "CREATE TABLE $db_name.items_list (
        item_id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        item_name VARCHAR(20) ,
        item_pic VARCHAR(60) ,
        item_type VARCHAR(15) ,
        item_cuisine VARCHAR(20) ,
        item_cooktype VARCHAR(20) ,
        item_basetaste VARCHAR(20) ,
        item_details VARCHAR(100) ,
        item_price DOUBLE ,
        item_rating DOUBLE 
        )";

        $sql2 = "CREATE TABLE $db_name.manager_info (
        m_id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        m_name VARCHAR(60) ,
        m_username VARCHAR(20) UNIQUE ,
        m_emailid VARCHAR(30)  UNIQUE,
        res_loccode VARCHAR(10) UNIQUE ,
        m_password VARCHAR(20) ,
        m_phone BIGINT(20)
        )";

        $sql5 = "CREATE TABLE $db_name.temp_staff_data (
        m_id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        sys_name  INT(11) ,
        item_names VARCHAR(120) ,
        quantities VARCHAR(30) ,
        datetime datetime  ,
        status INT(11) 
        )";

        $sql3 = "CREATE TABLE $db_name.transactions (
        order_id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        user_name VARCHAR(20) ,.
        user_phone BIGINT(20) ,
        system_name VARCHAR(30) ,
        no_of_items VARCHAR(10) ,
        items_ordered VARCHAR(100) ,
        order_datetime datetime ,
        amount DOUBLE ,
        feedback VARCHAR(150)  
        )";

        $sql4="INSERT INTO $db_name.manager_info VALUES('','".$row['m_name']."','".$row['m_username']."','".$row['m_emailid']."','".$row['res_loccode']."','".$row['m_password']."','".$row['m_phone']."')";
        $res=mysqli_query($conn,$sql);
        $res2=mysqli_query($conn,$sql2);
        $res1=mysqli_query($conn,$sql1);
        $res3=mysqli_query($conn,$sql3);
        $res5=mysqli_query($conn,$sql4);
        $res6=mysqli_query($conn,$sql5);
        $res4=mysqli_query($conn,$insert_details);
        if(!$res && !$res1 && !$res2 && !$res3 && !$res4  && !$res5 && !$res6)
            { 
                $error= mysqli_error($conn);
                echo '<script>alert("'.$error.'")</script>';
            }

        else {
            header('location:admin_navigation.php');
     } 

    }else{
        echo '<script>alert("Invalid manager Username")</script>';
    }



        

    }


?>




<html>
<head>
<title>Restaurant registration</title>
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7; IE=EmulateIE9">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <link rel="stylesheet" type="text/css" href="css/style.css" media="all" />
    <link rel="stylesheet" type="text/css" href="css/demo.css" media="all" />
</head>
<body>
<div class="container">            
            <header>
                <h1><span></span>Restaurant Registration</h1>
            </header>       
      <div  class="form" >
            <form id="contactform" action="restaurant_registration.php" method="post"> 
				 
				
                <p class="contact"><label for="Name">Name</label></p> 
                <input id="address" name="name" placeholder=" Name" required="" tabindex="1" type="text"> 
				
                <p class="contact"><label for="address"> Address</label></p> 
                <input id="address" name="address" placeholder=" Address" required="" tabindex="1" type="text"> 
				
				<p class="contact"><label for="city">city</label></p> 
                <input id="address" name="city" placeholder=" city" required="" tabindex="1" type="text"> 
				

                <p class="contact"><label for="res_loc_code">restaurant location code</label></p> 
                <input id="res_loc_code" name="res_loc_code" placeholder="resaurant location code" required="" tabindex="2" type="text"> 
                 
				 <p class="contact"><label for="Pr_manager"> Primary Manager</label></p> 
                <input id="m_name" name="m_name" placeholder=" username"tabindex="1" type="text" required=""> 
				
				 <p class="contact"><label for="Sr_manager"> Secondary Manager(optional)</label></p> 
                <input id="m_name" name="s_name" placeholder="username"tabindex="1" type="text"> 
            
                <input class="buttom" name="signup" id="submit" tabindex="5" value=" Register !" type="submit">     
   </form> 
</div>      
</div>
</body>
</html>
