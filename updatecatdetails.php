<?php
session_start();
require_once("connection.php");
$catid=$_GET["cid"];
$conn=mysqli_connect(host,user,pass,dbname) or die("Error in connection" . mysqli_connect_error());	
	$q="select * from addcat where catid='$catid'";
	$res=mysqli_query($conn,$q);
	$x=mysqli_fetch_array($res);
	mysqli_close($conn);


if(isset($_POST["submit"]))
{
	$cname=$_POST["catname"];
	if($_FILES["catpic"]["error"]==4)
	{
		$cpic=$x[2];
	}
	else
	{
		if($_FILES["catpic"]["error"]==0)
		{
		$cpic=$_FILES["catpic"]["name"];
		$tname=$_FILES["catpic"]["tmp_name"];
		move_uploaded_file($tname,"images/$cpic");
		}
		else
		{
			$cpic=$x[2];	
		}
	}
	$conn=mysqli_connect(host,user,pass,dbname) or die("Error in connection" . mysqli_connect_error());	
	$q="update addcat set catname='$cname',catpic='$cpic' where catid='$catid'";
	mysqli_query($conn,$q);
	$cnt=mysqli_affected_rows($conn);
	mysqli_close($conn);
	if($cnt==1)
	{
		$msg = header("location:updatecat.php");
	}
	else
	{
		$msg = "Category not updated successfully";	
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
            <h2>Member Login    	</h2>
    	</div>
       
        <div id="templatemo_right_column">
        	<div id="new_released_section">
           	  <h1>Login</h1>
           	  <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
           	    <table width="100%" height="280" align="center">
           	      <tr>
           	        <td width="19%" class="tabledata">Category Name</td>
           	        <td width="81%" align="left"><label for="catname"></label>
       	            <input type="text" name="catname" id="catname" value="<?php print $x[1]; ?>" /></td>
       	          </tr>
           	      <tr>
           	        <td class="sign">Category Pic</td>
           	        <td align="left"><label><?php
			
			print "<img src='images/$x[2]' height='125' width='125'>";
			
			?></label>
       	            <input type="file" name="catpic" id="catpic" /></td>
       	          </tr>
           	      <tr>
           	        <td class="sign">&nbsp;</td>
           	        <td align="left"><input type="submit" name="submit" id="submit" value="Update Category" /></td>
       	          </tr>
           	      <tr>
           	        <td class="sign">&nbsp;</td>
           	        <td align="left"><?php
                    if(isset($_POST["submit"]))
{
	print $msg;
}
?>
                   
                    </td>
       	          </tr>
           	      <tr>
           	        <td class="sign">&nbsp;</td>
           	        <td align="left">&nbsp;</td>
       	          </tr>
           	      <tr>
           	        <td class="sign">&nbsp;</td>
           	        <td align="left">&nbsp;</td>
       	          </tr>
           	      <tr>
           	        <td class="sign">&nbsp;</td>
           	        <td align="left">&nbsp;</td>
       	          </tr>
           	      <tr>
           	        <td class="sign">&nbsp;</td>
           	        <td align="left">&nbsp;</td>
       	          </tr>
           	      <tr>
           	        <td>&nbsp;</td>
           	        <td align="left">&nbsp;</td>
       	          </tr>
       	        </table>
       	      </form>
           	  <p>&nbsp;</p>
        	</div>
        </div>
    </div>
    <!--  Designed by w w w . t e m p l a t e m o . c o m  --> 
    
	<div id="templatemo_footer">
        <a href="#">Home</a> | <a href="#">Audios</a> | <a href="#">Albums</a> | <a href="#">Login</a> | <a href="signup.php">Signup</a> | <a href="#">Contact</a><br />
        Copyright © Muzilla<a href="#"><strong></strong></a> |2015</div>
</div>
  
<div align=center>This template  downloaded form <a href='http://all-free-download.com/free-website-templates/'>free website templates</a></div></body>
</html>
