<?php
require_once("connection.php");
$catid=$_GET["scid"];
$conn=mysqli_connect(host,user,pass,dbname) or die("Error in connection" . mysqli_connect_error());	
	$q="delete from addsubcat where subcatid='$catid'";
	mysqli_query($conn,$q);
	mysqli_close($conn);
	header("location:updatesubcate.php");

?>