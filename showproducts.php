<?php
session_start();
if(!isset($_SESSION["un"]))
{
	header("location:errorlogin.php");
}
?>
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
        	  <table width="100%" border="1">
        	    <tr>
        	      <td>Welcome
                  <?php
				  if(isset($_SESSION["n"]))
				  {
					  print $_SESSION["n"]."&nbsp;";
					  print "<a href='signout.php'>Signout</a>"."&nbsp;";
					  print "<a href='changepass.php'>Change Password</a>";
				  }
				  else
				  {
					print "Guest"."&nbsp;";
					print "<a href='login.php'>Login</a>"."&nbsp;";
					print "<a href='signup.php'>Signup</a>";  
				  }
				  
                  ?></td>
      	      </tr>
      	    </table>
        	</form>
        </div>
    </div>

	<div id="templatemo_banner">
       	<div id="templatemo_banner_text">
            <div id="banner_title">Welcome To Muzilla Online Music Store</div>
            <p>Never miss a single song.. Listen or download each and every song that is released. We provide you the the best quality Audio and Video songs.</p>
            <div class="more_button"></div>
    	</div>
	</div>
    
    <div id="templatemo_menu">
     	<ul>
			<li><a href="home.php" class="current">Main Page</a></li>
			<li><a href="displaycat.php">Categories</a></li>
            <li><a href="search.php">Search</a></li>
            <li><a href="feedback.php">Feedback</a></li>  
            <li><a href="reviews.php">Reviews</a></li>                      
            <li><a href="contact.php" class="lastmenu">Contact</a></li>            
        </ul>  
    </div>
    
    <div id="templatemo_content">
    
    	<div id="templatemo_left_column">
          <h2>Album Songs</h2>
          <div class="left_col_box">                                              
          </div>
	  </div>
        
        <div id="templatemo_right_column">
        	<div id="new_released_section">
           	  <h1>Album Songs</h1>
           	  <table width="100%" border="0" cellpadding="10px">
           	    <tr>
           	      <td align="center" height="200" width="150">
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
				print "<img src='images/$x[2]' height='100%' width='100%'>
				";
			}
			
		
	}
				  ?>
                  
                  </td>
           	      <td valign="top">
                   <?php
				   require_once("connection.php");
	$conn=mysqli_connect(host,user,pass,dbname) or  die("Error in connection".mysqli_connect_error());
	$scatid=$_GET["scid"];
	$query="select * from addproduct where subcatid='$scatid'";
	$res=mysqli_query($conn,$query) or  die("Error in query".mysqli_error($conn));
	$cnt=mysqli_affected_rows($conn);
	mysqli_close($conn);
	if($cnt==0)
	{
		print "No Songs Avaliable";
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
                  
                  </td>
       	        </tr>
       	      </table>
           	  <table width="100%" border="0">
           	    <tr>
           	      <td><span class="Album">*To Download : Right-Click on song and select &quot;Save Link As&quot;.*</span></td>
       	        </tr>
           	    <tr>
           	      <td><form id="form1" name="form1" method="post" action="">
           	        <table width="100%" border="0">
                    <?php
					require_once("connection.php");
					 if(isset($_POST["submit"]))
 {
	 $nm=$_POST["name"];
	 $cm=$_POST["comment"];
	 $uname=$_SESSION["un"];

$conn=mysqli_connect(host,user,pass,dbname) or die("Error in connection".mysqli_connect_error());
$query="insert into comment(name,comment,username) values('$nm','$cm','$uname')";
$res=mysqli_query($conn,$query) or die("Error in query".mysqli_error($conn));
$cnt=mysqli_affected_rows($conn);
mysqli_close($conn);
if($cnt==1)
{
	$msg="Comment Successfull";
}
else
{
	$msg="Error";
}
}
?>

           	          <tr>
           	            <td>Enter Name</td>
           	            <td><label for="name"></label>
       	                <input type="text" name="name" id="name" /></td>
       	              </tr>
           	          <tr>
           	            <td width="22%">Comments:</td>
           	            <td width="78%"><label for="comment"></label>
       	                <textarea name="comment" id="comment" cols="45" rows="5"></textarea>
       	                <input type="submit" name="submit" id="submit" value="Comment" /></td>
       	              </tr>
       	            </table>
       	          </form></td>
       	        </tr>
           	    <tr>
           	      <td><?php
				   if(isset($_POST["submit"]))
 {
	 print $msg;
 }
				  ?>
                  </td>
       	        </tr>
           	    <tr>
           	      <td>
                   <?php
require_once("connection.php");
	$conn=mysqli_connect(host,user,pass,dbname) or die("Error in connection" . mysqli_connect_error());	
	$q="select * from comment";
	$res=mysqli_query($conn,$q);
	$cnt=mysqli_affected_rows($conn);
	mysqli_close($conn);
	if($cnt==0)
	{
		print "No Comments";	
	}
	else
	{
	print "<table width='100%' celpadding='10px' cellspacing='0'>";
			print "<tr align='left' bgcolor='#006600'>";
				print "<th>Name</th>";
				print "<th>Comment</th>";
				
			print "</tr>";
			
			while($x=mysqli_fetch_array($res))
			{
				print "<tr bgcolor='#000000'>
				
		    	<td>$x[1]</td>
				<td>$x[2]</td>
				
				
				</tr>";
			}
			print "</table>";
	}

?>
                  </td>
       	        </tr>
       	      </table>
           	  <p class="thanks">&nbsp;</p>
        	</div>
        </div>
    </div>
    <!--  Designed by w w w . t e m p l a t e m o . c o m  --> 
    
	<div id="templatemo_footer">
        <a href="#">Home</a> | <a href="#">Audios</a> | <a href="#">Albums</a> | <a href="#">Login</a> |<a href="signup.php"> Signup</a> | <a href="#">Contact</a><br />
        Copyright © Muzilla<a href="#"><strong></strong></a> |2015</div>
</div>
  
<div align=center>This template  downloaded form <a href='http://all-free-download.com/free-website-templates/'>free website templates</a></div></body>
</html>