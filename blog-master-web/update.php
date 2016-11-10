<?php
session_start();
$connection = mysql_connect("localhost", "root", ""); // Establishing Connection with Server
$db = mysql_select_db("blog_site", $connection); // Selecting Database from Server
if(isset($_POST['submit'])){
	$read=$_POST['update'];
	$results=mysql_query("select * from blog_master natural join blog_detail where blog_id='$read'");
	$row=mysql_fetch_array($results);
	
	$id=$row['blog_id'];
   // $_SESSION['id']=$id;
	$title=$row['blog_title'];
	$cat=$row['blog_category'];
   $myphoto= $row['blog_detail_image'];
   $desc=$row['blog_desc'];
   $author=$row['blog_author'];
   $creat_date=$row['creation_date'];
   $upda_date=$row['updated_date'];
}
$_SESSION['updat']=$_SESSION['username'];
   
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
			     <div class="login_button">
			    	<ul>
			    		
			    		<li><a href="index.php">Logout</a></li>
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
				    	<li><a href="#">LOGOS</a></li>
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
		<div class="feed">
			<div class="feedback">
			   <h1>BLOG</h1>
			   <form action="update1.php" method="post" enctype="multipart/form-data" >
				   <label>TITLE</label>
				   <input type="text" value="<?php echo $title; ?>" name="title" Placeholder="Title" >
				   <label>CATEGORY</label>
				   <input type="text" value="<?php echo $cat; ?>" name="category" placeholder="Category">
				   <label>DESCRIPTION</label>
				   <textarea type="text" name="description"><?php echo $desc; ?> </textarea><br>
                   <input type="file" name="UploadImage" title="<?php echo $myphoto; ?>">
                   <input type="hidden" value="<?php echo $id; ?>" name="id">
				   <input type="submit" name="submit1" value="Update">
			   </form>
			</div>
			
		<div class="clear"></div>
		</div>
</div>
	
</body>
</html>