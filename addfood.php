<?php 
session_start();
if (!isset($_SESSION['username'])) {
	header('location:login.php');
}


 ?>



<!DOCTYPE html>
<html>
<head>
	<title>Adding Food</title>
	<style type="text/css">
		*{
			padding:0px;
			margin:0px;
		}
		section{
			width:100%;
			display:flex;
			margin-top:-7rem;
		}
		.menu{
			width:15%;
			background-color:#9879;
			height:100vh

		}
		.contents{
			width:85%;
			background-color:#97755764;
			height:100vh
		}
		a{
			text-decoration: none;
		}
		.big{

			margin-top:13rem;
		}
		.icons{
			font-size:35px;
			color:white;
			border-bottom:1px solid black;
			background-color:#789;
			padding:17px 30px 17px;
		}
		nav{
			height:7rem;
			width:100%;
			background-color:black;
			opacity:0.78;
		}
				
		form{
			width:40%;
			background-color:white;
			margin-top:13rem;
			padding-top:5rem;
			padding-bottom:5rem;
			border-radius:5px;
		}
		input{
			width:70%;
			height:2rem;
			border-radius:4px;
			font-size:25px;
			margin-bottom:15px;
		}
		.form{
			font-size:28px;
			color: brown;
			
		}
		hr{
			margin-bottom:2rem;
		}
	</style>
</head>
<body>

<nav>
	<span><span style="color:white;font-size:45px;font-family:cursive;">Dukunde</span><span style="color:brown;font-size:35px">Umurimo</span></span>

	<a href="logout.php"><button style="margin-left:100rem;margin-top:2rem;border-radius:7px"><span style="color:black;font-size:45px;font-family:cursive;">LOG</span><span style="color:brown;font-size:35px">out</span></button></a>

</nav>
<section>
	<div class="menu">
		<div class="big">
		<a href="addfood.php"><div class="icons">Add FOOD</div></a>
		<a href="viewfood.php"><div class="icons">View FOOD</div></a>
		<a href="viewimport.php"><div class="icons">View Imports</div></a>
		<a href="Viewexports.php"><div class="icons">View Exports</div></a>
		</div>
		
	</div>
	<div class="contents">

<center>
	
	 <form method="POST">
	 	
	 <div  class="form">Adding Food</div>
	 <hr>
	 <input type="text" name="food_name" placeholder="Enter Food name"><br>
	 <input type="passowrd" name="food_owner" placeholder=" Enter Food Owner"> <br>
	 <button name="submit" style="font-size:25px;color:white;background-color:black;">Submit</button>
	 </form>
</center>
		
	</div>
</section>

</body>
</html>

<?php 


$conn=mysqli_connect('localhost','root','','dukundumurimo');

if (isset($_POST['submit'])) {
	$name=$_POST['food_name'];
	$owner=$_POST['food_owner'];
	$ans=mysqli_query($conn,"INSERT INTO food VALUES(NULL,'$name','$owner')");

	if ($ans==true ) {
		
		echo"<script> alert('Inserted')</script>";
	}
	else{
		echo"<script> alert(' Denied')</script>";
	}
}
 ?>
