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
			     <div class="login_button">
			    	<ul>
			    		
			    		<li><a href="logout.php">Logout</a></li>
			   		</ul>	
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
				    	<li><a href="list_blogger.php">Bloggers</a></li>
				    	<li><a href="#">TOOLS</a></li>
				    	<li><a href="#">ICONS</a></li>
				    	<li><a href="#">WALLPAPERS</a></li>
				    	<li><a href="index.php">HELP</a></li>
				    	<li><a href="contact.php">CONTACT</a></li>
				    </ul>
				</div>
				
				<div class="clear"></div>
			</div>
		</div>
</div>

<?php

$connection = mysql_connect("localhost", "root", ""); // Establishing Connection with Server
$db = mysql_select_db("blog_site", $connection); // Selecting Database from Server
if(isset($_GET['name']))
{
	$blogger_name=$_GET['name'];
}

if(isset($_POST['submit'])){
	$blogger_name=$_POST['submit'];}

	$results=mysql_query("Select * from blogger_info where blogger_username='$blogger_name'");
    $row=mysql_fetch_array($results);
    ?>
    <table>

        <tr>
    	    <td><?php echo "Blogger ID"  ?></td>
    	    <td>---------</td>
            <td><?php echo $row['blogger_id']?></td>
        </tr>     
    	<tr>
    	    <td><?php echo "username"  ?></td>
    	    <td>---------</td>
            <td><?php echo $row['blogger_username']?></td>
        </tr>

        <tr>
    	    <td><?php echo "Account Created on"  ?></td>
    	    <td>---------</td>
            <td><?php echo $row['blogger_creation_date']?></td>
        </tr>

        <tr>
    	    <td><?php echo "Last Update on"  ?></td>
    	    <td>---------</td>
            <td><?php echo $row['blogger_updated_date']?></td>
        </tr>
    </table>        
