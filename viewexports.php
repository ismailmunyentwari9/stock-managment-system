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
		table{
			width:70%;
			margin-top:13rem;

		}
		td,th{
			text-align: center;
			font-size:25PX;
		}
		tr:nth-child(even){
			background-color:#9877;
		}
		td a{
			color:#789;
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
			
      <table>
      	<tr>
      		<th>Import ID</th>
      		<th>Import Date</th>
      		<th>Import Quantity</th>
      		<th colspan=3>OPTION</th>
      	</tr>

      	<?php 
             $conn=mysqli_connect('localhost','root','','dukundumurimo');

             $id=$_GET['delete'];
             $ans=mysqli_query($conn,"DELETE FROM export where e_id='$id'");

             	$ans=mysqli_query($conn,"SELECT * FROM export");
             	while ($row=mysqli_fetch_array($ans)) {
         
      	 ?>

      	 <tr>
      	 	<td><?php echo $row['e_id']?></td>
      	 	<td><?php echo $row['exportdate']?></td>
      	 	<td><?php echo $row['quantity']?></td>
      	 	 <td><a href="viewexports.php?delete=<?php echo $row['e_id']?>">DELETE</a></td>
      	 	 <td><a href="editexport.php?editexport=<?php echo $row['e_id']?>">EDIT</a></td>
      	 


      	 </tr>
      	<?php } ?>
      </table><br>


		</center>
		 <center><button   onclick="window.print()" style="margin-left:100rem;margin-top:2rem;border-radius:7px"><span style="color:black;font-size:45px;font-family:cursive;">Pri</span><span style="color:brown;font-size:35px">nt</span></button></center>
		
	</div>

</section>

</body>
</html>