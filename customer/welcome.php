<?php
    session_start();
    if(!isset($_SESSION['manager'])){
    header('location:system_login.php');
    }
    include 'connection.php';
?>


<head>
<title></title>
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7; IE=EmulateIE9">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <link rel="stylesheet" type="text/css" href="css/style.css" media="all" />
    <link rel="stylesheet" type="text/css" href="css/demo.css" media="all" />
</head>
<body>
<div class="container">            
            <header>
                <h1><span> Welcome !</span></h1>
                <h1><span>YOU are using SYSTEM <?php echo $_SESSION['system'];
                ?></span></h1>

            </header>    


<?php
    


    if(isset($_POST['explore'])){
    $c_name=$_POST['c_name'];
    $contact=$_POST['contact'];
    $system=$_SESSION['system'];
    $_SESSION['c_name']=$c_name;
    $_SESSION['contact']=$contact;
    header('location:customer.php');

    }

?>    
   


      <div  class="form">
                <form id="contactform" action="welcome.php" method="post">
                <p class="contact"><label for="name">Your Name</label></p> 
    			<input id="username" name="c_name" placeholder="Name" required="" tabindex="2" type="text"> 
    			 
                <p class="contact"><label for="contact">Contact</label></p> 
    			<input type="contact" id="contact" name="contact" placeholder="contact" tabindex="2" required=""> 
                <br>
	            <center><input class="buttom" name="explore" id="submit" tabindex="5" value="Explore" type="submit"> </center>	 
   </form> 
</div>     
<a href="system_logout.php">Log Out</a>     
</div>
</body>
