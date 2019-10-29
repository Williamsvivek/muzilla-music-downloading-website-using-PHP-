<?php
require_once("connection.php");
$un=$_GET["un"];
$conn=mysqli_connect(host,user,pass,dbname) or die("Error in connection" . mysqli_connect_error());	
	$q="delete from signup where username='$un'";
	mysqli_query($conn,$q);
	mysqli_close($conn);
	header("location:list.php");

?>