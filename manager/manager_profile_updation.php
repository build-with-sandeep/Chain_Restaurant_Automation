<?php
session_start();
if(!isset($_SESSION['user'])){
    header('location:manager_login.php');
}
include 'db_connection.php';
$m_username=$_SESSION['user'];
$sql = "SELECT * FROM manager_info WHERE m_username='$m_username' ";
  $result = mysqli_query($conn,$sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {


        if(isset($_POST['update']))
          { 
            if(!empty($_POST['m_name'])){
                $m_name= $_POST['m_name'];
            }else
            {
                $m_name=$row['m_name'];
            }

            if(!empty($_POST['m_username'])){
                $m_username= $_POST['m_username'];
            }else
            {
                $m_username=$row['m_username'];
            }

            if(!empty($_POST['m_emailid'])){
                $m_emailid=$_POST['m_emailid'];
            }else
            {
                $m_emailid=$row['m_emailid'];
            }

            if(!empty($_POST['m_phone'])){
                $m_phone=$_POST['m_phone'];
            }else
            {
                $m_phone=$row['m_phone'];
            }

            if(!empty($_POST['m_password'])){
                $m_password=$_POST['m_password'];
            }else
            {
                $m_password=$row['m_password'];
            }
          }  
        }    
            
    }       
            
           
                $update_details="UPDATE chainrestaurant.manager_info SET m_name='$m_name',m_username ='$m_username',m_emailid='$m_emailid',m_password='$m_password',m_phone='$m_phone' " ;

                $update_details1="UPDATE manager_info SET m_name='$m_name',m_username ='$m_username',m_emailid='$m_emailid',m_password='$m_password',m_phone='$m_phone' " ;
                $res=mysqli_query($conn,$update_details);
                $res1=mysqli_query($conn,$update_details1);
                if(!$res && !$res1)
                    { 
                        $error= mysqli_error($conn);
                        echo '<script>alert("'.$error.'")</script>';
                    }

                else {
                    header('location:manager_navigation.php');
             } 
     

?>