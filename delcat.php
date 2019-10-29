<?php
require_once("connection.php");
$catid=$_GET["cid"];
$conn=mysqli_connect(host,user,pass,dbname) or die("Error in connection" . mysqli_connect_error());	
	$q="delete from addcat where catid='$catid'";
	mysqli_query($conn,$q);
	mysqli_close($conn);
	header("location:updatecat.php");

?>