<?php
session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Free CSS Template for Music Websites</title>
<meta name="keywords" content="Free CSS Template, Website Templates, Music Websites" />
<meta name="description" content="Free CSS Template for Music Websites" />
<link href="templatemo_style.css" rel="stylesheet" type="text/css" />
<link href="styles.css" rel="stylesheet" type="text/css" />
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

	<div id="templatemo_banner">
       	<div id="templatemo_banner_text">
            <div id="banner_title">Welcome To Muzilla Online Music Store</div>
            <p>Never miss a single song.. Listen or download each and every song that is released. We provide you the the best quality Audio and Video songs.</p>
            <div class="more_button"><a href="#">Read More</a></div>
    	</div>
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
          <h2>Member Signout | Change Password</h2>
          <div class="left_col_box">                                              
          </div>
	  </div>
        
        <div id="templatemo_right_column">
        	<div id="new_released_section">
           	  <h1>Categories</h1>
           	  <table width="100%" border="1">
           	    <tr>
           	      <td rowspan="4" align="center">
                  <?php
				   require_once("connection.php");
	$conn=mysqli_connect(host,user,pass,dbname) or  die("Error in connection".mysqli_connect_error());
	$scatid=$_GET["scid"];
	$query="select * from addsubcat where subcatid='$scatid'";
	$res=mysqli_query($conn,$query) or  die("Error in query".mysqli_error($conn));
	$cnt=mysqli_affected_rows($conn);
	mysqli_close($conn);
	if($cnt==0)
	{
		print "No Pic Avaliable";
	}
	else
	{
		while($x=mysqli_fetch_array($res))
		{
				print "<img src='images/$x[3]' height='200' width='200'>
				</td>";
			}
			
		print "</table>";
	}
				  ?>
                  
                  </td>
           	      <td>&nbsp;</td>
       	        </tr>
           	    <tr>
           	      <td>&nbsp;</td>
       	        </tr>
           	    <tr>
           	      <td>&nbsp;</td>
       	        </tr>
           	    <tr>
           	      <td>&nbsp;</td>
       	        </tr>
       	      </table>
           	  <p class="thanks">&nbsp;</p>
        	</div>
        </div>
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