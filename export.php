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

             $id=$_GET['export'];
             $ans=mysqli_query($conn,"SELECT * FROM  import where i_id='$id'");

             	
             	while ($row=mysqli_fetch_array($ans)) {
         
      	 ?>
	<form method="POST">
	 	
	 <div  class="form">Adding Food</div>
	 <hr>
	  <input type="number" name="food_id" value="<?php echo $row['food_id']?>" readonly=""><br>
	   <input type="text" name="import_quantity"  value="<?php echo $row['quantity']?>" hidden=""><br>
	  <input type="text" name="exportdate" placeholder="Enter Date" ><br>
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
	$date=$_POST['exportdate'];
	$quantity=$_POST['quantity'];
	$import_quantity=$_POST['import_quantity'];
		

	if ($quantity>$import_quantity) {
		
		echo"<script> alert('export is greatrer than import')</script>";
	
	}
	else{
		$remaining=$import_quantity-$quantity;
		$ans=mysqli_query($conn,"INSERT INTO export VALUES(NULL,'$code','$date','$quantity')");

		if ($remaining=0) {
			mysqli_query($conn,"DELETE FROM import WHERE food_id='$code')");
		}
		else
		{
			$ans=mysqli_query($conn,"UPDATE import SET quantity='$remaining' WHERE food_id='$code'");
			header('location:viewexport.php');
		}

	}
}
 ?>

