<?php
session_start();
if(!isset($_SESSION['user'])){
    header('location:admin_login.php');
}
  include 'db_connection.php';
  $rescode=$_POST['rescode'];
  $_SESSION['rescode']=$rescode;
 
   $sql = "SELECT * FROM restaurant_info WHERE res_loccode='$rescode'";
  $result = mysqli_query($conn,$sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        
              ?>




<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title></title>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha256-3dkvEK0WLHRJ7/Csr0BZjAWxERc5WH7bdeUya2aXxdU= sha512-+L4yy6FRcDGbXJ9mPG8MT/3UCDzwR9gPeyFNMCtInsol++5m3bk2bXWKdZjvybmohrAsn3Ua5x8gfLnbE1YkOg==" crossorigin="anonymous">
    <!-- Bootstrap Core CSS -->
<!--     <link href="css/bootstrap.min.css" rel="stylesheet"> -->
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha256-7s5uDGW3AHqw6xtJmNNtr+OBRJUlgkNJEo78P4b0yRw= sha512-nNo+yCHEyn0smMxSswnf/OnX6/KwJuZTlNZBjauKhTK0c+zT+q5JOCx0UFhXQ6rJR9jg6Es8gPuD2uZcYDLqSw==" crossorigin="anonymous">

    <!-- Custom CSS -->
    <style>
    body {
        padding-top: 70px;
    }

    .othertop{margin-top:10px;}


    input[type="text"]::placeholder{
      color: red;
    }
    </style>

</head>

<body>

   <div class="container">
<div class="row">
<div class="col-md-10 ">
<form class="form-horizontal" action="admin_updation.php" method="post" enctype="multipart/form-data">
<fieldset>

<!-- Form Name -->
<legend> Manager INFO </legend>

<!-- Text input-->




<div class="form-group">
  <label class="col-md-4 control-label" for="Name "> Primary Manager Name</label>  
  <div class="col-md-4">
 <div class="input-group">
       <div class="input-group-addon">
       </div>
       <input id="ad_name" name="pr_man" type="text" placeholder="<?php echo $row['res_man1'];?>" class="form-control input-md">
      </div>

    
  </div>

  
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for=username ">Secondary Manager Name</label>  
  <div class="col-md-4">
 <div class="input-group">
       <div class="input-group-addon">
       </div>
       <input id="username" name="sr_man" type="text" placeholder="<?php echo $row['res_man2'];?>" class="form-control input-md"></input>
      </div>

    
  </div>
</div>






<div class="form-group">
  <label class="col-md-4 control-label" ></label>  
  <div class="col-md-4">
  <input type="submit"  name = "update" class="btn btn-success" value="UPDATE"></input>
  </div>
</div>

</fieldset>
</form>
</div>
<div class="col-md-2 hidden-xs">
<img src="" class="img-responsive img-thumbnail ">
  </div>


</div>
   </div>
    <!-- jQuery Version 1.11.1 -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>



<?php
      
      }
  }
  

?>