<?php
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
<script type="text/javascript">
function xyz()
{
	if(document.form1.fname.value.length<4)
	{
		alert("please fill your First Name");
		return false;
	}
	if(document.form1.lname.value.length<4)
	{
		alert("please fill your Last Name");
		return false;
	}
	if (document.form1.gen.selectedIndex == 0) 
	{
 		alert('please choose gender');
		return false;
	}
	if(document.form1.state.value.length<4)
	{
		alert("please fill your State");
		return false;
	}
	if(document.form1.city.value.length<4)
	{
		alert("please fill your City");
		return false;
	}
	if(document.form1.username.value.length<1||document.form1.username.value.indexOf("@")<3||document.form1.username.value.indexOf(".")<4)
	{
		alert("please fill proper email id");
		return false;
	}
	var p1,p2;
	p1=document.form1.pass.value
	p2=document.form1.cpass.value
	if(p1!=p2)
	{
		alert("Passwords doesn't match");
	    return false
	}
}

</script>
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
					  print "<a href='signout.php'>Signout</a>";
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
            <h2>Member Signup    	</h2>
    	</div>
        
        <div id="templatemo_right_column">
        	<div id="new_released_section">
           	  <h1>Become A Member</h1>
           	  <form id="form1" name="form1" method="post" action="" onsubmit="return xyz()">
           	    <table width="100%" height="280" align="center">
           	      <tr>
           	        <td width="19%"><strong class="sign">First Name</strong></td>
           	        <td width="81%" align="left"><label for="fname"></label>
       	            <input name="fname" type="text" id="fname" size="50" /></td>
       	          </tr>
           	      <tr>
           	        <td class="sign">Last Name</td>
           	        <td align="left"><label for="lname"></label>
       	            <input type="text" name="lname" id="lname" /></td>
       	          </tr>
           	      <tr>
           	        <td class="sign">Gender</td>
           	        <td align="left"><label for="gen"></label>
           	          <select name="gen" id="gen">
           	            <option value="Male" selected="selected">Male</option>
           	            <option value="Female">Female</option>
                    </select></td>
       	          </tr>
           	      <tr>
           	        <td class="sign">State</td>
           	        <td align="left"><label for="state"></label>
       	            <input type="text" name="state" id="state" /></td>
       	          </tr>
           	      <tr>
           	        <td class="sign">City</td>
           	        <td align="left"><label for="city"></label>
       	            <input type="text" name="city" id="city" /></td>
       	          </tr>
           	      <tr>
           	        <td class="sign">E-Mail(Username)</td>
           	        <td align="left"><label for="username"></label>
       	            <input type="text" name="username" id="username" /></td>
       	          </tr>
           	      <tr>
           	        <td class="sign">Password</td>
           	        <td align="left"><label for="pass"></label>
       	            <input type="password" name="pass" id="pass" /></td>
       	          </tr>
           	      <tr>
           	        <td class="sign">Confirm Password</td>
           	        <td align="left"><label for="cpass"></label>
       	            <input type="password" name="cpass" id="cpass" /></td>
       	          </tr>
           	      <tr>
           	        <td>&nbsp;</td>
           	        <td align="left"><input name="submit" type="submit" class="button" id="submit" value="Sign Up" />
       	            <input name="Reset" type="reset" class="button" id="Reset" value="Reset" /></td>
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