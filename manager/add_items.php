<?php
session_start();
if(!isset($_SESSION['user'])){
    header('location:manager_login.php');
}
include 'db_connection.php';
if(isset($_POST['add']))
  { 
    $item_name= $_POST['item_name'];
    $item_category=$_POST['item_category'];
    $cuisine=$_POST['item_cuisine'];
    $cooktype=$_POST['item_cooktype'];
    $basetaste=$_POST['item_basetaste'];
    $price=$_POST['price'];
    $item_description=$_POST['description'];
    $item_pic=$_FILES['item_pic']['name'];
    $pictempname=$_FILES['item_pic']['tmp_name'];
    $picdestination='items/'.$item_pic;
    move_uploaded_file($pictempname, $picdestination);

        $insert_details="INSERT INTO items_list VALUES('','$item_name','$picdestination','$item_category','$cuisine','$cooktype','$basetaste','$item_description','$price','')";
        $result=mysqli_query($conn,$insert_details);
        if(!$result)
            { 
                $error= mysqli_error($conn);
                echo '<script>alert("'.$error.'")</script>';
            }

        else {
            header('location:manager_navigation.php');
     } 

    }


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

    <title>add items</title>
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
    </style>

</head>

<body>

   <div class="container">
<div class="row">
<div class="col-md-10 ">
<form class="form-horizontal" action="add_items.php" method="post" enctype="multipart/form-data">
<fieldset>

<!-- Form Name -->
<legend> Add New Menu Item </legend>

<!-- Text input-->




<div class="form-group">
  <label class="col-md-4 control-label" for="Name ">Item Name</label>  
  <div class="col-md-4">
 <div class="input-group">
       <div class="input-group-addon">
        <i class="fa fa-cutlery" aria-hidden="true"></i>
       </div>
       <input id="item_name" name="item_name" type="text" required="" placeholder="Item Name" class="form-control input-md">
      </div>

    
  </div>

  
</div>

<!-- File Button --> 
<div class="form-group">
  <label class="col-md-4 control-label" for="Upload photo">Item photo</label>
  <div class="col-md-4">
    <input id="Upload photo" required=""  name="item_pic" class="input-file" type="file">
  </div>
</div>





<div class="form-group">
  <label class="col-md-4 control-label" for="Name ">Item Category</label>  
  <div class="col-md-4">
 <div class="input-group">
       <div class="input-group-addon">
        <i class="fa fa-list-alt" aria-hidden="true"></i>
       </div>
       <input id="item_category" name="item_category" type="text" placeholder="Item Category" required="" class="form-control input-md">
      </div>

    
  </div>

  
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="Name ">Cuisine </label>  
  <div class="col-md-4">
 <div class="input-group">
        <select name="item_cuisine" required="">
          <option value="volvo">Volvo</option>
          <option value="saab">Saab</option>
          <option value="mercedes">Mercedes</option>
          <option value="audi">Audi</option>
        </select>
      </div>

    
  </div>

  
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="Name ">Cook Type</label>  
  <div class="col-md-4">
 <div class="input-group">
        <select name="item_cooktype" required="">
          <option value="veg">veg</option>
          <option value="non-veg">non-veg</option>
          <option value="vegan">vegan</option>
          <option value="eggitarian">eggitarian</option>
          <option value="Desert">dessert</option>
          <option value="brevreges">brevereges</option>
          <option value="misc">misc</option>
        </select>       
      </div>

    
  </div>

</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="Name ">Base Taste</label>  
  <div class="col-md-4">
      <select name="item_basetaste" required="">
          <option value="volvo">Volvo</option>
          <option value="saab">Saab</option>
          <option value="mercedes">Mercedes</option>
          <option value="audi">Audi</option>
        </select>
      </div>

    
  </div>

<!-- Text input-->
<div class="form-group">
<label class="col-md-4 control-label" for="price">Price</label>  
  <div class="col-md-4">

  <div class="input-group">
       <div class="input-group-addon">
     <i class="fa fa-inr"></i>
        
       </div>
       <input id="price" name="price" type="text" required="" placeholder="price" class="form-control input-md">
      </div>
  
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="Overview (max 50 words)">Item Description (max 50 words)</label>
  <div class="col-md-4">                     
    <textarea class="form-control" rows="10" required="" id="Overview (max 200 words)" name="description" placeholder="Item Description"></textarea>
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" ></label>  
  <div class="col-md-4">
  <input type="submit"  name = "add" class="btn btn-success" value="ADD"></input>
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