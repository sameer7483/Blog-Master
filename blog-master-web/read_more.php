<?php
session_start();
$connection = mysql_connect("localhost", "root", ""); // Establishing Connection with Server
$db = mysql_select_db("blog_site", $connection); 

if(!isset($_POST['submit'])){
$read=$_GET['id'];}

if(isset($_POST['submit'])){
	$read=$_POST['readmore'];
	
   
}

$results=mysql_query("select * from blog_master natural join blog_detail where blog_id='$read'");
	$row=mysql_fetch_array($results);
	
	$id=$row['blog_id'];
	$title=$row['blog_title'];
   $myphoto= $row['blog_detail_image'];
   $desc=$row['blog_desc'];
   $author=$row['blog_author'];
   $creat_date=$row['creation_date'];
   $upda_date=$row['updated_date'];
?>
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

<div class="wrap">
	<div class="main">
		<div class="content">
			<div class="box1">
			    <h2><a href="#"><?php echo $title; ?></a></h2>
			    <span>By <?php echo $author?></span><br/>
			    <span><?php echo ' updated on ' . $upda_date; ?></span>
			    <span><?php echo 'created on' . $creat_date; ?></span>
				<div class="box1_img">
				    <img src="MyUploadImages/<?php echo $myphoto; ?>" height=180px width=270px />
				</div>   
				<div class="data">
				    <p><?php  echo$desc; ?></p>
				   

				  
				</div>
			<div class="clear"></div>
			</div>

			
		</div>
    </div>
</div>    
</body>
</html>