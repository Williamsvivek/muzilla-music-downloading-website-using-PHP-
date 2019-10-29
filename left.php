<?php
require_once("connection.php");
			$conn=mysqli_connect(host,user,pass,dbname)or die("Error In Connection".mysqli_connect_error());
			$query="select * from reviews order by rand() limit 3";
			$res=mysqli_query($conn,$query)or die("Error In Query".mysqli_error($conn));
			$cnt=mysqli_affected_rows($conn);
			mysqli_close($conn);
			if($cnt==0)
			{
				print "No Reviews";
			}
				else
	{
		while($x=mysqli_fetch_array($res))
		{
			print "<a href='songs/$x[4]'>$x[3]</a> 
				<br><br>";
		}
	}
		
?>