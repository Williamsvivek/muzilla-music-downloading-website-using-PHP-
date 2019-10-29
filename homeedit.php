<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Muzilla</title>
<meta name="keywords" content="Free CSS Template, Website Templates, Music Websites" />
<meta name="description" content="Free CSS Template for Music Websites" />
<link href="templatemo_style.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="ism/css/my-slider.css"/>
<link href="../homelatest.css" rel="stylesheet" type="text/css" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="ism/js/ism-2.0.1-min.js"></script>

</head>
<body>
<!--
This is a free CSS template provided by templatemo.com
-->
<div id="templatemo_container">

	<div id="templatemo_header">
    	<div id="templatemo_title">
            <div id="templatemo_sitetitle">MuZiLla.Com</div>
        </div>
        
        <div id="templatemo_login">
        	<form method="get" action="#">
                <label>Search:</label><input class="inputfield" name="keyword" type="text" id="keyword"/>
                <input class="button" type="submit" name="Search" value="Search" />
            </form>
        </div>
    </div>

	 <div class="ism-slider">
  <ol>
    <li>
      <img src="ism/image/slides/_u/1436885434591_50399.jpg">
    </li>
    <li>
      <img src="ism/image/slides/_u/1436885531366_624548.jpg">
    </li>
    <li>
      <img src="ism/image/slides/_u/1436885578599_505831.jpg">
    </li>
    <li>
      <img src="ism/image/slides/_u/1436885595792_236262.jpg">
    </li>
    <li>
      <img src="ism/image/slides/_u/1436885613105_317825.jpg">
    </li>
  </ol>
</div>
    
    <div id="templatemo_menu">
     	<ul>
			<li><a href="index.html" class="current">Main Page</a></li>
			<li><a href="subpage.html">Audios</a></li>
            <li><a href="subpage.html">Albums</a></li>
            <li><a href="login.php">Login</a></li>  
            <li><a href="signup.php">Signup</a></li>                      
            <li><a href="subpage.html" class="lastmenu">Contact</a></li>            
        </ul>  
    </div>
    
    <div id="templatemo_content">
    
    	<div id="templatemo_left_column">
            <h2>Home</h2>
    	</div>
    	<table width="72%" border="0">
    	  <tr>
    	    <td>

  	    </tr>
    	  <tr>
    	    <td bgcolor="#000000" class="homw">Latest Albums</td>
  	    </tr>
    	  <tr>
    	    <td>
            <?php
			require_once("connection.php");
			$conn=mysqli_connect(host,user,pass,dbname)or die("Error In Connection".mysqli_connect_error());
			$query="select * from addsubcat order by rand() limit 3";
			$res=mysqli_query($conn,$query)or die("Error In Query".mysqli_error($conn));
			$cnt=mysqli_affected_rows($conn);
			mysqli_close($conn);
			if($cnt==0)
			{
				print "No Albums";
			}
				else
	{
		print "<table width='100%'>";
		print "<tr align='center'>";
		$cntr=1;
		while($x=mysqli_fetch_array($res))
		{
			if($cntr<=3)
			{
				print "<td>
				<a href='showproducts.php?scid=$x[3]'>
					<img src='images/$x[2]' height='200' width='200'>
				</a><br/>
				<a href='showproducts.php?scid=$x[3]'>$x[1]</a>
				</td>";
			}
			else
			{
				print "</tr>
				<tr align='center'>
				<td>
				<a href='showproducts.php?scid=$x[3]'>
					<img src='images/$x[2]' height='200' width='200'>
				</a><br/>
				<a href='showproducts.php?scid=$x[3]'>$x[1]</a>
				</td>";	
				$cntr=1;
			}
			$cntr++;
		}
		print "</table>";
	}
	?>
            </td>
  	    </tr>
  	  </table>
    </div>
    <!--  Designed by w w w . t e m p l a t e m o . c o m  --> 
    
	<div id="templatemo_footer">
        <a href="#">Home</a> | <a href="#">Audios</a> | <a href="#">Albums</a> | <a href="#">Login</a> |<a href="signup.php"> Signup</a> | <a href="#">Contact</a><br />
        Copyright © 2048 <a href="#"><strong>Your Company Name</strong></a> |
        <a href="http://www.iwebsitetemplate.com" target="_parent">Website Templates</a> by <a href="http://www.templatemo.com" target="_parent">CSS Templates</a>
	</div>
</div>
  
<div align=center>This template  downloaded form <a href='http://all-free-download.com/free-website-templates/'>free website templates</a></div></body>
</html>