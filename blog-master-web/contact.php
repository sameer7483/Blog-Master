<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php

$connection = mysql_connect("localhost", "root", ""); // Establishing Connection with Server
$db = mysql_select_db("blog_site", $connection); // Selecting Database from Server

if(isset($_POST['submit'])){
	$name=$_POST['name'];
	$email=$_POST['email'];
	$subject=$_POST['subject'];
	$detail=$_POST['detail'];
	$query= "insert into contact_us(name,email,subject,detail,date) values ('$name','$email','$subject','$detail',CURDATE())";
	mysql_query($query);
?>


	<script type="text/javascript">alert("query successfully registered")</script>
	<?php
	

} ?>
<!DOCTYPE HTML>
<html>
<head>
<title>The Free Blogsite.com Website Template | contact :: w3layouts</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all"/>
<link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
</head>
<body>
<div class="header">
		<div class="header_top">
			<div class="wrap">
			     <div class="logo">
			       		<a href="index.php"><img src="images/logo.png" alt="" /></a>
			     </div>
			     
				<div class="clear"></div>
			</div>
		</div>
		<div class="header_bottom">
			<div class="wrap">
				<div class="menu">
				    <ul>
				    	<li><a href="index.php">HOME</a></li>
				    	<li><a href="#">ARTICLES</a></li>
				    	<li><a href="#">SERVICES</a></li>
				    	<li><a href="#">LOGOS</a></li>
				    	<li><a href="#">TOOLS</a></li>
				    	<li><a href="#">ICONS</a></li>
				    	<li><a href="#">WALLPAPERS</a></li>
				    	<li><a href="index.php">HELP</a></li>
				    	
				    </ul>
				</div>
				
				<div class="clear"></div>
			</div>
		</div>
</div>
<div class="wrap">
		<div class="feed">
			<div class="feedback">
			   <h1>FEEDBACK</h1>
			   <form action="contact.php" method="post">
				   <label>NAME</label>
				   <input type="text" value="" name="name">
				   <label>E-MAIL</label>
				   <input type="text" value="" name="email">
				   <label>SUBJECT</label>
				   <input type="text" value="" name="subject">
				   <label>Detail</label>
				   <textarea type="text" name="detail"> </textarea><br>
				   <input type="submit" name="submit">
			   </form>
			</div>
			<div class="map">
				<iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.co.in/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=svnit,+dumas road,+surat,+Gujarat&amp;aq=0&amp;oq=s2+cinemas+in+nellore&amp;sll=14.419884,80.05806&amp;sspn=0.106735,0.209255&amp;ie=UTF8&amp;hq=S2+Cinemas,+S2+Multiplex+Road,+Nellore,+Andhra+Pradesh&amp;t=m&amp;ll=21.1671678,72.7814591&amp;spn=0.006295,0.006295&amp;output=embed"></iframe><br /><small><a href="http://maps.google.co.in/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=S2+Cinemas,+S2+Multiplex+Road,+Nellore,+Andhra+Pradesh&amp;aq=0&amp;oq=s2+cinemas+in+nellore&amp;sll=14.419884,80.05806&amp;sspn=0.106735,0.209255&amp;ie=UTF8&amp;hq=S2+Cinemas,+S2+Multiplex+Road,+Nellore,+Andhra+Pradesh&amp;t=m&amp;ll=14.447958,79.984565&amp;spn=0.006295,0.006295" style="color:#254779;text-align:left">View Larger Map</a></small>
			</div>
		<div class="clear"></div>
		</div>
</div>
	