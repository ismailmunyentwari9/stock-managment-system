

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		
		body{
			background-color:#97755764;

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



<center>
	
	 <form method="POST">
	 	
	 <div  class="form">Login form</div>
	 <hr>
	 <input type="text" name="username" placeholder="Enter user name"><br>
	 <input type="passowrd" name="password" placeholder=" Enter passowrd"> <br>
	 <button name="submit" style="font-size:25px;color:white;background-color:black;">Submit</button>
	 </form>
</center>
</body>
</html>

<?php 
  #gutangiza session.........
session_start()	;
$conn=mysqli_connect('localhost','root','','dukundumurimo');

if (isset($_POST['submit'])) {
	$name=$_POST['username'];
	$code=$_POST['password'];
	$ans=mysqli_query($conn,"SELECT * FROM manager WHERE username='$name' AND password='$code'");

	if (mysqli_num_rows($ans)==true ) {
		#kubika amakuru yumu user..................
		$_SESSION['username']=$name;
		header('location:addfood.php');
	}
	else{
		echo"<script> alert('login denied')</script>";
	}
}
 ?>
