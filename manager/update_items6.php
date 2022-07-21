<?php
session_start();
if(!isset($_SESSION['user'])){
    header('location:manager_login.php');
}

 include 'db_connection.php';
  $id=$_REQUEST['id'];
  $_SESSION['item_id']=$id;
    $sql = "SELECT * FROM items_list WHERE item_id='$id'";
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

    <title>Update items</title>
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
<form class="form-horizontal" action="update_view_items.php" method="post" enctype="multipart/form-data">
<fieldset>

<!-- Form Name -->
<legend> Update Menu Item </legend>

<!-- Text input-->




<div class="form-group">
  <label class="col-md-4 control-label" for="Name ">Item Name</label>  
  <div class="col-md-4">
 <div class="input-group">
       <div class="input-group-addon">
        <i class="fa fa-cutlery" aria-hidden="true"></i>
       </div>
       <input id="item_name" name="item_name" type="text" placeholder="<?php echo $row['item_name'];?>" class="form-control input-md">
      </div>

    
  </div>

  
</div>

<!-- File Button --> 
<div class="form-group">
  <label class="col-md-4 control-label" for="Upload photo">Item photo</label>
  <div class="col-md-4">
    <input id="Upload photo"  name="item_pic" class="input-file" type="file"><span style="color: red;"><?php echo $row['item_pic']; ?></span></input>
  </div>
</div>





<div class="form-group">
  <label class="col-md-4 control-label" for="Name ">Item Category</label>  
  <div class="col-md-4">
 <div class="input-group">
       <div class="input-group-addon">
        <i class="fa fa-list-alt" aria-hidden="true"></i>
       </div>
       <input id="item_category" name="item_category" type="text" placeholder="<?php echo $row['item_type'];?>" class="form-control input-md"></input>
      </div>

    
  </div>

  
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="Name ">*Cuisine </label>  
  <div class="col-md-4">
 <div class="input-group">
        <select name="item_cuisine" >
          <option value=""></option>
          <option value="volvo">Volvo</option>
          <option value="saab">Saab</option>
          <option value="mercedes">Mercedes</option>
          <option value="audi">Audi</option>
        </select>
        <?php echo $row['item_cuisine'];   ?>
      </div>

    
  </div>

  
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="Name ">*Cook Type</label>  
  <div class="col-md-4">
 <div class="input-group">
        <select name="item_cooktype" >
          <option value=""></option>
          <option value="volvo">Volvo</option>
          <option value="saab">Saab</option>
          <option value="mercedes">Mercedes</option>
          <option value="audi">Audi</option>
        </select> 
        <?php echo $row['item_cooktype'];   ?>      
      </div>

    
  </div>

</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="Name ">*Base Taste</label>  
  <div class="col-md-4">
      <select name="item_basetaste">
          <option  value=""></option>
          <option value="volvo">Volvo</option>
          <option value="saab">Saab</option>
          <option value="mercedes">Mercedes</option>
          <option value="audi">Audi</option>
        </select>
        <?php echo $row['item_basetaste'];   ?> 
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
       <input id="price" name="price" type="text" placeholder="<?php echo $row['item_price'];?>" class="form-control input-md">
      </div>
  
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="Overview (max 50 words)">Item Description (max 50 words)</label>
  <div class="col-md-4">                     
    <textarea class="form-control" rows="10"  id="Overview (max 200 words)" name="description" placeholder="<?php echo $row['item_details'];?>"></textarea>
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