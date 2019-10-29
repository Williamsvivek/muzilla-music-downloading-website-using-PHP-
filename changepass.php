<?php
session_start();
if(!isset($_SESSION["un"]))
{
	header("location:errorlogin.php");
}
?>
<?php
require_once("connection.php");
if(isset($_POST["submit"]))
{
	$oldp=$_POST["cpass"];
	$newp=$_POST["npass"];
	$cnewp=$_POST["cnpass"];
	if($newp==$cnewp)
	{
		$conn=mysqli_connect(host,user,pass,dbname) or die("Error in connection" . mysqli_connect_error());	
		$un=$_SESSION["un"];
		$query="update signup set password='$newp' where username='$un' and password='$oldp'";
		mysqli_query($conn,$query) or die("Error In Query".mysqli_error($conn));
		$cnt=mysqli_affected_rows($conn);
		mysqli_close($conn);
		if($cnt==1)
		{
			$msg="Password Changed Successfully";
		}
		else 
		{
			$msg="Current Password Incorrect";
		}
	}
	else
	{
		$msg="Password Doesn't Match";
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
          <h2>Change Password</h2>
          <div class="left_col_box">                                              
          </div>
	  </div>
        
        <div id="templatemo_right_column">
        	<div id="new_released_section">
           	  <h1>Change Password</h1>
           	  <form id="form1" name="form1" method="post" action="">
           	    <table width="100%" border="0">
           	      <tr>
           	        <td width="33%" align="left" class="tabledata">Current Password</td>
           	        <td width="67%" align="left"><label for="cpass"></label>
       	            <input type="text" name="cpass" id="cpass" /></td>
       	          </tr>
           	      <tr>
           	        <td align="left" class="tabledata">New Password</td>
           	        <td align="left"><label for="npass"></label>
       	            <input type="text" name="npass" id="npass" /></td>
       	          </tr>
           	      <tr>
           	        <td align="left" class="tabledata">Confirm New Password</td>
           	        <td align="left"><label for="cnpass"></label>
       	            <input type="text" name="cnpass" id="cnpass" /></td>
       	          </tr>
           	      <tr>
           	        <td>&nbsp;</td>
           	        <td align="left"><input type="submit" name="submit" id="submit" value="Change Password" /></td>
       	          </tr>
           	      <tr>
           	        <td>&nbsp;</td>
           	        <td align="left"><?php
					if(isset($_POST["submit"]))
					{
						print $msg;
					}
					?>
                    
                    </td>
       	          </tr>
       	        </table>
       	      </form>
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