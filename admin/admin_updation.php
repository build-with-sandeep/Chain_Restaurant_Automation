<?php
session_start();
if(!isset($_SESSION['user'])){
    header('location:admin_login.php');
}
include 'db_connection.php';
$sql = "SELECT * FROM admin_info ";
  $result = mysqli_query($conn,$sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {


        if(isset($_POST['update']))
          { 
            if(!empty($_POST['ad_name'])){
                $ad_name= $_POST['ad_name'];
            }else
            {
                $ad_name=$row['admin_name'];
            }

            if(!empty($_POST['ad_username'])){
                $ad_username= $_POST['ad_username'];
            }else
            {
                $ad_username=$row['admin_username'];
            }

            if(!empty($_POST['ad_emailid'])){
                $ad_emailid=$_POST['ad_emailid'];
            }else
            {
                $ad_emailid=$row['admin_emailid'];
            }

            if(!empty($_POST['ad_phone'])){
                $ad_phone=$_POST['ad_phone'];
            }else
            {
                $ad_phone=$row['admin_number'];
            }

            if(!empty($_POST['ad_password'])){
                $ad_password=$_POST['ad_password'];
            }else
            {
                $ad_password=$row['admin_password'];
            }
          }  
        }    
            
    }       
            
           
            

                $update_details="UPDATE admin_info SET admin_name='$ad_name',admin_username ='$ad_username',admin_emailid='$ad_emailid',admin_password='$ad_password',admin_number='$ad_phone' " ;
                $res=mysqli_query($conn,$update_details);
                if(!$res)
                    { 
                        $error= mysqli_error($conn);
                        echo '<script>alert("'.$error.'")</script>';
                    }

                else {
                    header('location:admin_navigation.php');
             } 
     

?>