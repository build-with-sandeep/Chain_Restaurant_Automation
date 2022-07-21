<?php
session_start();
if(!isset($_SESSION['user'])){
    header('location:manager_login.php');
}
include 'db_connection.php';
$id=$_SESSION['item_id'];
$sql = "SELECT * FROM items_list WHERE item_id='$id'";
  $result = mysqli_query($conn,$sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {


        if(isset($_POST['update']))
          { 
            if(!empty($_POST['item_name'])){
                $item_name= $_POST['item_name'];
            }else
            {
                $item_name=$row['item_name'];
            }

            if(!empty($_POST['item_category'])){
                $item_category=$_POST['item_category'];
            }else
            {
                $item_category=$row['item_type'];
            }

            if(!empty($_POST['item_cuisine'])){
                $cuisine=$_POST['item_cuisine'];
            }else
            {
                $cuisine=$row['item_cuisine'];
            }

            if(!empty($_POST['item_cooktype'])){
                $cooktype=$_POST['item_cooktype'];
            }else
            {
                $cooktype=$row['item_cooktype'];
            }


            if(!empty($_POST['item_basetaste'])){
                 $basetaste=$_POST['item_basetaste'];
            }else
            {
                 $basetaste=$row['item_basetaste'];
            }


            if(!empty($_POST['price'])){
                $price=$_POST['price'];
            }else
            {
               $price=$row['item_price'];
            }


            if(!empty($_POST['description'])){
                 $item_description=$_POST['description'];
            }else
            {
                $item_description=$row['item_details'];
            }


            if(!empty($_FILES['item_pic']['name'])){
                $item_pic=$_FILES['item_pic']['name'];
                $pictempname=$_FILES['item_pic']['tmp_name'];
                $picdestination='items/'.$item_pic;
                move_uploaded_file($pictempname, $picdestination);
            }else
            {
                $picdestination=$row['item_pic'];
            }


            }
            
        }    
            
    }       
            
           
            

                $update_details="UPDATE items_list SET item_name='$item_name',item_pic='$picdestination',item_type='$item_category',item_cuisine='$cuisine',item_cooktype='$cooktype',item_basetaste='$basetaste',item_details='$item_description',item_price='$price' WHERE item_id='$id'" ;
                $res=mysqli_query($conn,$update_details);
                if(!$res)
                    { 
                        $error= mysqli_error($conn);
                        echo '<script>alert("'.$error.'")</script>';
                    }

                else {
                    header('location:update_items1.php');
             } 
     

?>