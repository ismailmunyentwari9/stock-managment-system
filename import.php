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
	
      	<?php 
             $conn=mysqli_connect('localhost','root','','dukundumurimo');

             $id=$_GET['import'];
             $ans=mysqli_query($conn,"SELECT * FROM  food where food_id='$id'");

             	
             	while ($row=mysqli_fetch_array($ans)) {
         
      	 ?>
	<form method="POST">
	 	
	 <div  class="form">Adding Food</div>
	 <hr>
	  <input type="number" name="food_id" value="<?php echo $row['food_id']?>" readonly=""><br>
	  <input type="text" name="importdate" placeholder="Enter Date" ><br>
	  <input type="text" name="quantity" placeholder="Enter Quantity"><br>
	 <button name="submit" style="font-size:25px;color:white;background-color:black;">Submit</button>
	<?php } ?>
	 </form>
</center>
</center>
</body>
</html>


 <?php 


$conn=mysqli_connect('localhost','root','','dukundumurimo');

if (isset($_POST['submit'])) {
	$code=$_POST['food_id'];
	$name=$_POST['importdate'];
	$owner=$_POST['quantity'];
		$ans=mysqli_query($conn,"INSERT INTO import VALUES(NULL,'$code','$name','$owner')");

	if ($ans==true ) {
		
			header('location:viewimport.php');
	
	}
	else{
		echo"<script> alert(' Denied')</script>";
	}
}
 ?>

