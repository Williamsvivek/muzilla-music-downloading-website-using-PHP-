<?php
session_start();
if($_SESSION["usertype"]!="Admin")
{
	header("location:errorlogin.php");
}
require_once("connection.php");
if(isset($_POST["submit"]))
{
$fname=$_POST["fname"];
$lname=$_POST["lname"];
$gen=$_POST["gen"];
$st=$_POST["state"];
$ct=$_POST["city"];
$uname=$_POST["username"];
$pass=$_POST["pass"];

$conn=mysqli_connect(host,user,pass,dbname) or die("Error in connection".mysqli_connect_error());
$q="insert into signup values('$fname','$lname','$gen','$st','$ct','$uname','$pass','Normal')";
mysqli_query($conn,$q) or die("Error in Query".mysqli_error($conn));
$cnt=mysqli_affected_rows($conn);
mysqli_close($conn);
if($cnt==1)
{
	header("location:thanks.php");
}
else
{
	header("location:error.php");
}
}
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
          <h2>Admin Panel</h2>
          <div class="left_col_box">                                              
          </div>
	  </div>
        
        <div id="templatemo_right_column">
        	<div id="new_released_section">
           	  <h1>Admin Panel</h1>
           	  <table width="100%" border="0" align="center">
           	    <tr>
           	      <td width="26%" align="center"><a href="addcategory.php">Add Category</a></td>
           	      <td width="34%" align="center"><a href="addsubcat.php">Add Album</a></td>
           	      <td width="40%" align="center" class="tabledata"><a href="addproduct.php">Add Song</a></td>
       	        </tr>
           	    <tr>
           	      <td align="center" class="tabledata"><a href="list.php">List Of Users</a></td>
           	      <td align="center" class="tabledata"><a href="searchuser.php">Search User</a></td>
           	      <td align="center" class="tabledata"><a href="Addadmin.php">Add Admin</a></td>
       	        </tr>
           	    <tr>
           	      <td align="center" class="tabledata"><a href="updatecat.php">Update Category</a></td>
           	      <td align="center" class="tabledata"><a href="updatesubcate.php">Update Sub Category</a></td>
           	      <td align="center" class="tabledata"><a href="listcontacts.php">List Of Contacts</a></td>
       	        </tr>
           	    <tr>
           	      <td align="center" class="tabledata"><a href="listofreviews.php">List Of Reviews</a></td>
           	      <td align="center" class="tabledata">&nbsp;</td>
           	      <td align="center" class="tabledata">&nbsp;</td>
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