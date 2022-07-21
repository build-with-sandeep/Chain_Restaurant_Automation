<?php
	session_start();
    if(!isset($_SESSION['manager'])){
    header('location:system_login.php');
    }

?>
<head>
        <title></title>
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	  <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
	  <link rel="map" type="text/map" href="bootstrap.min.css.map"> 
 	  <link rel="stylesheet" type="text/css" href="style.css"/>
		</script>
    </head>
<body>
        <header>
                <h1><span></span>Order Summary</h1>
            </header> 

<?php
	
			include 'connection.php';
			$system_name=$_SESSION['system'];
			$username=$_SESSION['c_name'];
			$contact= $_SESSION['contact'];
			$dateime=date("Y-m-d H:i:s") ;
			$names= $_REQUEST['sid2'][0];
			$quantities=$_REQUEST['sid4'][0];
			$id =explode(',', $_REQUEST['sid1'][0]);
			$name =explode(',',$_REQUEST['sid2'][0]);
			$price =explode(',', $_REQUEST['sid3'][0]);
			$quantity =explode(',', $_REQUEST['sid4'][0]);

			$p=0;$total=0;
	        for ($j=0;$j<count($id);$j++){
	        	$p=($price[$j]*$quantity[$j]);
	        	$total+=$p;
	        }

	        $query1="INSERT INTO temp_staff_data VALUES ('','$system_name','$names','$quantities','$dateime',0)";

			$query="INSERT INTO transactions VALUES ('','$username' ,'$contact', '$system_name','$quantities','$names', '$dateime', '$total', NULL)";
			$result=mysqli_query($conn,$query);
			$result1=mysqli_query($conn,$query1);

			echo'<table  class="table table-dark table-striped">';
	        echo'<thead class="thead-light" >';
	        echo'<tr>';
	        echo'<th> ITEM ID </th>';
	        echo'<th>Dish Name</th>';
	        echo'<th>quantity</th>';
	        echo'<th>Price</th>';
	        echo'</tr>';
	        echo'</thead>';


	       
           		
	      	 for($i=0;$i<count($id);$i++){
	        	echo'<tbody>';
	            echo'<tr>';
	            echo'<td>' .($i+1) .'</td>';
	            echo '<td>' . $name[$i] .'</td>';
	            echo '<td>' .$quantity[$i] . '</td>';
	            echo '<td>' . $price[$i].'</td>';
           		echo'</tr>';
           	}
	        	$p=0;$total=0;
	        for ($j=0;$j<count($id);$j++){
	        	$p=($price[$j]*$quantity[$j]);
	        	$total+=$p;
	        }
	        echo'</tbody>';
	        echo '<tr ><td></td><td></td><th>total</th> <td><b>'.$total.'</b></td></tr>' ;
        	echo'</table>';
        	
        	echo'<button><a href="payment.php?total='.$total.'">PAY NOW</a></button>';
        	echo '               ';
        	echo'<button><a href="customer.php">CANCEL</a></button>';
	

?>	

</body>
	













