<?php
	session_start();
    if(!isset($_SESSION['manager'])){
    header('location:system_login.php');
    }


?>

<html>
	<head>
		<title>customer home</title>
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	  <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
	  <link rel="map" type="text/map" href="bootstrap.min.css.map"> 
 	  <link rel="stylesheet" type="text/css" href="style.css"/>
		<script>


			var itmlst=[];
			
			function add(itm1)
			{
				if(itmlst[0]==null)
					{
						itmlst.push(itm1);
					}
				else 
					{
					var flg=0; var counter;
						for(var i=0;i<itmlst.length;i++)
						{
							if(itmlst[i].id == itm1.id)
							{flg=1;counter=i;}

						}
						if(flg==1)
						{
							itmlst[counter].it_q ++;
						}
						else
						{
							itm1.it_q=1;
							itmlst.push(itm1);
						}						
					}
			}
			function additm(it_id,it_nm,it_pr)
			{
			
				var itm={
				id:it_id,
				nm:it_nm,
				pr:it_pr,
				it_q:1
				};
				add(itm);
			}
			
			function disp()
			{	document.getElementById("tbl").innerHTML="";

				var html = "<table class='table table-condensed table-hover table-bordered'><thead><tr><th>slno.></th><th>name></th><th>price</th><th>quantity</th></tr><tbody>";
				for (var i = 0; i<itmlst.length; i++) 
				{
 						html +="<tr>";
 						html +="<td>"+ (i) +"</td>";
    					html +="<td>"+itmlst[i].nm+"</td>";
 						html +="<td>"+itmlst[i].pr+"</td>";
						html +="<td>"+itmlst[i].it_q+"</td>";
    					html +="</tr>";
					
				}
				html+="</tbody></table>";
				document.getElementById("tbl").innerHTML+= html;
				for(var i = 0; i<itmlst.length; i++) 
				{	
					if(i==0)
					{
					   document.getElementById("ssid1").value=itmlst[i].id;
					   document.getElementById("ssid2").value= itmlst[i].nm;
					   document.getElementById("ssid3").value=itmlst[i].pr;
					   document.getElementById("ssid4").value=itmlst[i].it_q;

					}
					else
						{document.getElementById("ssid1").value+=","+itmlst[i].id;
					   document.getElementById("ssid2").value+=","+itmlst[i].nm;
					   document.getElementById("ssid3").value+=","+itmlst[i].pr;
					   document.getElementById("ssid4").value+=","+itmlst[i].it_q;


				}
				}
					
			}
		
			function openMenu(evt, menuName )
			{
				var i, tabcontent, tablinks;
				tabcontent = document.getElementsByClassName("tabcontent");
				for (i = 0; i < tabcontent.length; i++) 
				{
					tabcontent[i].style.display = "none";
				}
				tablinks = document.getElementsByClassName("tablinks");
				for (i = 0; i < tablinks.length; i++) 
				{
					tablinks[i].className = tablinks[i].className.replace(" active", "");
				}
				document.getElementById(menuName).style.display = "block";
				evt.currentTarget.className += " active";
				if(menuName==="Cart")
				{	
					disp();};
			}
			
				
			function OnButton1()  
			{  
			    document.Form1.action = "transaction.php"  ;
			    document.Form1.submit(); 
			    return true;  
			}    
				  
				/*function OnButton2()  
				{  
				   document.Form1.action = "insert_transaction.php" ; 
				   document.Form1.target = "_blank";   
				   document.Form1.submit();            
				  
				return true;  
			} */ 		


		
			
		 </script>
	</head>
	<BODY>
	<div class="jumbotron" id="jumbotron" style="text-align:center;background-color:skyblue;color:white;">
			<p>	<h1>My Restaurant</h1></p>
			<a id="lgout" "  href="welcome.php" >Log Out</a><br>
				<div id="nav">
					<ul>
						<li><a><div class="tab"><button class="tablinks" onclick="openMenu(event, 'Home')">Home</button></div></a></li>
						<li><a><div class="tab"><button class="tablinks" onclick="openMenu(event, 'Vegitarian')">Vegitarian</button></div></a></li>
						<li><a><div class="tab"><button class="tablinks" onclick="openMenu(event, 'NonVegitarian')">NonVegitarian</button></div></a></li>
						<li><a><div class="tab"><button class="tablinks" onclick="openMenu(event, 'Eggitarian')">Eggitarian</button></div></a></li>
						<li><a><div class="tab"><button class="tablinks" onclick="openMenu(event, 'Vegan')">Vegan</button></div></a></li>
						<li><a><div class="tab"><button class="tablinks" onclick="openMenu(event, 'Breverage')">Breverage</button></div></a></li>
						<li><a><div class="tab"><button class="tablinks" onclick="openMenu(event, 'Desert')">Desert</button></div></a></li>
						<li>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</li>
						<li><a><div class="tab"><button class="tablinks" onclick="openMenu(event, 'Cart')"><i class="fa fa-cart-arrow-down"></i></button></div></a></li>
					</ul>
				</div>	
			</div>
	<section> 
		<div id ="container" text-align="center">


			<div id="content">
				<div id="main"> </div>
				
					<div id="Home" class="tabcontent">
					<div class="card-columns">
					<?php
					include 'connection.php';
					$sql="select * from items_list ";
					$result= mysqli_query($conn, $sql);
					if(mysqli_num_rows($result)>0)
					{
						while($row=mysqli_fetch_assoc($result))
						{
						echo '<div class="card bg-success">
							<div class="card-body text-center">
								<div id="itemName">
									<label id="it-nm">'.$row["item_name"].'</label>
									<br>
									<label id="it-pr">'.$row["item_price"].'</label>
									<br>
									<label id="it-des">'.$row["item_details"].'</label>
									<br>
									<button id="add" onclick="additm('.$row["item_id"].','."'".$row["item_name"]."'".','.$row["item_price"].')">Add</button>
								</div>
							</div>
						</div>';
						}
					}
					?>
						</div>
					 </div> 
					<div id="Vegetarian" class="tabcontent">
						<div class="card-columns">
					<?php
					include 'connection.php';
					$sql="select * from items_list where  item_type='vegetarian'";
					$result= mysqli_query($conn, $sql);
					if(mysqli_num_rows($result)>0)
					{
						while($row=mysqli_fetch_assoc($result))
						{
						echo '<div class="card bg-success">
							<div class="card-body text-center">
								<div id="itemName">
									<label id="it-nm">'.$row["item_name"].'</label>
									<br>
									<label id="it-pr">'.$row["item_price"].'</label>
									<br>
									<label id="it-des">'.$row["item_details"].'</label>
									<br>
									<button id="add" onclick="additm('.$row["item_id"].','."'".$row["item_name"]."'".','.$row["item_price"].')">Add</button>
								</div>
							</div>
						</div>';
						}
					}
					?>
					</div>
				</div>
				<div id="NonVegitarian" class="tabcontent">
				<div class="card-columns">
					<?php
					include 'connection.php';
					$sql="select * from items_list where  item_type='nonvegetarian'";
					$result= mysqli_query($conn, $sql);
					if(mysqli_num_rows($result)>0)
					{
						while($row=mysqli_fetch_assoc($result))
						{
						echo '<div class="card bg-success">
							<div class="card-body text-center">
								<div id="itemName">
									<label id="it-nm">'.$row["item_name"].'</label>
									<br>
									<label id="it-pr">'.$row["item_price"].'</label>
									<br>
									<label id="it-des">'.$row["item_details"].'</label>
									<br>
									<button id="add" onclick="additm('.$row["item_id"].','."'".$row["item_name"]."'".','.$row["item_price"].')">Add</button>
								</div>
							</div>
						</div>';
						}
					}
					?>
				</div>
				</div>
				<div id="Eggitarian" class="tabcontent">
				<div class="card-columns">
					<?php
					include 'connection.php';
					$sql="select * from items_list where  item_type='eggetarian'";
					$result= mysqli_query($conn, $sql);
					if(mysqli_num_rows($result)>0)
					{
						while($row=mysqli_fetch_assoc($result))
						{
						echo '<div class="card bg-success">
							<div class="card-body text-center">
								<div id="itemName">
									<label id="it-nm">'.$row["item_name"].'</label>
									<br>
									<label id="it-pr">'.$row["item_price"].'</label>
									<br>
									<label id="it-des">'.$row["item_details"].'</label>
									<br>
									<button id="add" onclick="additm('.$row["item_id"].','."'".$row["item_name"]."'".','.$row["item_price"].')">Add</button>
								</div>
							</div>
						</div>';
						}
					}
					?>
					</div>
					</div>
				<div id="Vegan" class="tabcontent">
				<div class="card-columns">
					<?php
					include 'connection.php';
					$sql="select * from items_list where  item_type='vegan'";
					$result= mysqli_query($conn, $sql);
					if(mysqli_num_rows($result)>0)
					{
						while($row=mysqli_fetch_assoc($result))
						{
						echo '<div class="card bg-success">
							<div class="card-body text-center">
								<div id="itemName">
									<label id="it-nm">'.$row["item_name"].'</label>
									<br>
									<label id="it-pr">'.$row["item_price"].'</label>
									<br>
									<label id="it-des">'.$row["item_details"].'</label>
									<br>
									<button id="add" onclick="additm('.$row["item_id"].','."'".$row["item_name"]."'".','.$row["item_price"].')">Add</button>
								</div>
							</div>
						</div>';
						}
					}
					?>
				</div>
				</div>
				<div id="Breverage" class="tabcontent">
				<div class="card-columns">
					<?php
					include 'connection.php';
					$sql="select * from items_list where  item_type='breverage'";
					$result= mysqli_query($conn, $sql);
					if(mysqli_num_rows($result)>0)
					{
						while($row=mysqli_fetch_assoc($result))
						{
						echo '<div class="card bg-success">
							<div class="card-body text-center">
								<div id="itemName">
									<label id="it-nm">'.$row["item_name"].'</label>
									<br>
									<label id="it-pr">'.$row["item_price"].'</label>
									<br>
									<label id="it-des">'.$row["item_details"].'</label>
									<br>
									<button id="add" onclick="additm('.$row["item_id"].','."'".$row["item_name"]."'".','.$row["item_price"].')">Add</button>
								</div>
							</div>
						</div>';
						}
					}
					?>
				</div>
				</div>
				<div id="Desert" class="tabcontent">
				<div class="card-columns">
					<?php
					include 'connection.php';
					$sql="select * from items_list where  item_type='dessert'";
					$result= mysqli_query($conn, $sql);
					if(mysqli_num_rows($result)>0)
					{
						while($row=mysqli_fetch_assoc($result))
						{
						echo '<div class="card bg-success">
							<div class="card-body text-center">
								<div id="itemName">
									<label id="it-nm">'.$row["item_name"].'</label>
									<br>
									<label id="it-pr">'.$row["item_price"].'</label>
									<br>
									<label id="it-des">'.$row["item_details"].'</label>
									<br>
									<button id="add" onclick="additm('.$row["item_id"].','."'".$row["item_name"]."'".','.$row["item_price"].')">Add</button>
								</div>
							</div>
						</div>';
						}
					}
					?>
				</div>
				</div>
				<div id="Cart" class="tabcontent">
					<div>
						
						
						<div id="tbl">
							
						</div>

							<form name="Form1" method="post">  

							<input type="hidden" name="sid1[]" id="ssid1"/>
							<input type="hidden" name="sid2[]" id="ssid2"/>
							<input type="hidden" name="sid3[]" id="ssid3"/>
							<input type="hidden" name="sid4[]" id="ssid4"/>
							<input type="button" value="Order NOW" name="order" onclick="OnButton1(); ">  
		  
							</form>  

					</div>
			</div>
	
			<div id="footer">
			</div>
		</div>
		</section>
	</BODY>
</html>
