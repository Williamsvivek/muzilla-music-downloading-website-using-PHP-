<?php
session_start();
if($_SESSION["usertype"]!="Admin")
{
	header("location:errorlogin.php");
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
          <h2>Update Sub Category</h2>
          <div class="left_col_box">                                              
          </div>
	  </div>
        
        <div id="templatemo_right_column">
       	  <div id="new_released_section">
       	    <h1>Update Sub Category</h1>
       	    <form id="form1" name="form1" method="post" action="">
       	      <table width="100%" border="0">
       	        <tr>
       	          <td width="27%" class="tabledata">Select Category</td>
       	          <td width="73%" align="left"><label for="cat"></label>
       	            <select name="cat" id="cat">
       	              <?php
					  require_once("connection.php");
		    $conn=mysqli_connect(host,user,pass,dbname) or die("Error in Connection" . mysqli_connect_error());
		
		$query="select * from addcat";
		
	$res=mysqli_query($conn,$query) or die("Error in Query" . mysqli_error($conn));

	$cnt = mysqli_affected_rows($conn);
	mysqli_close($conn);
	if($cnt==0)
	{
		print "<option>No Categories</option>";	
	}
	else
	{
		while($x=mysqli_fetch_array($res))
		{
			 
			print "<option value='$x[0]'>$x[1]</option>";	
		}

	}
	
	
            ?>
                  </select></td>
   	            </tr>
       	        <tr>
       	          <td>&nbsp;</td>
       	          <td align="left"><input type="submit" name="go" id="go" value="View Sub Category" /></td>
   	            </tr>
       	        <tr>
       	          <td>&nbsp;</td>
       	          <td><?php
				  if(isset($_POST["go"]))
				  {
					  $catid=$_POST["cat"];
			  require_once("connection.php");
		$conn=mysqli_connect(host,user,pass,dbname) or die("Error in connection" . mysqli_connect_error());	
	$q="select * from addsubcat where catid='$catid'";
	$res=mysqli_query($conn,$q);
	$cnt=mysqli_affected_rows($conn);
	mysqli_close($conn);
	if($cnt==0)
	{
		print "No categories available";	
	}
	else
	{
	print "<table width='100%' celpadding='10px' cellspacing='0'>";
			print "<tr align='left' bgcolor='#006600'>";
				print "<th>Sub Category Picture</th>";
				print "<th>Name</th>";
				print "<th>Update</th>";
				print "<th>Delete</th>";
			print "</tr>";
			$cntr=1;
			while($x=mysqli_fetch_array($res))
			{
				if($cntr%2==0)
				{
					$color="#400A0A";
				}
				else
				{
					$color="#000000";
				}
				print "<tr bgcolor='$color'>
				<td><img src='images/$x[2]' height='125' width='125'></td>
				<td>$x[1]</td>
	<td><a href='updatesubcatdetails.php?scid=$x[3]'>Update</a></td>
		<td><a href='delsubcat.php?scid=$x[3]'>Delete</a></td>
				</tr>";
				$cntr++;
			}
			print "</table>";
	}
				  }
?></td>
   	            </tr>
   	          </table>
       	    </form>
       	    <p class="tabledata"></p>
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