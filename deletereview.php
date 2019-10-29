<?php
require_once("connection.php");
$coid=$_GET["co"];
$conn=mysqli_connect(host,user,pass,dbname) or die("Error in connection" . mysqli_connect_error());	
	$q="delete from review where id='$coid'";
	mysqli_query($conn,$q);
	mysqli_close($conn);
	header("location:listofreviews.php");

?>