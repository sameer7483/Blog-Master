<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php
session_start();
if($_SESSION['username']){
$connection = mysql_connect("localhost", "root", ""); // Establishing Connection with Server
$db = mysql_select_db("blog_site", $connection); // Selecting Database from Server

if(isset($_POST['submit']))
{


extract($_POST);
$title=$_POST['title'];
$category=$_POST['category'];
$desc=$_POST['description'];
$blog_author=$_SESSION['username'];

 $query=mysql_query("SELECT * FROM blogger_info WHERE blogger_username= '$_SESSION[username]' ");
$result= mysql_fetch_array($query);
 $blogger_id= $result['blogger_id'];
 $active=$result['blogger_is_active'];

if($active){

$insert=("insert into blog_master(blogger_id, blog_title,  blog_desc, blog_category, blog_author, blog_is_active, creation_date, updated_date) values
 ('$blogger_id', '$title','$desc' ,'$category', '$blog_author', false, CURDATE(),CURDATE())");
mysql_query($insert);

$query=mysql_query("SELECT * FROM blog_master where blogger_id='$blogger_id' and blog_title='$title' and blog_desc='$desc'");
$result= mysql_fetch_array($query);
$blog_id=$result['blog_id'];


extract($_POST);
 $UploadedFileName=$_FILES['UploadImage']['name'];
if($UploadedFileName!='')
{
                $upload_directory = "MyUploadImages/"; //This is the folder which you created just now
        $TargetPath=time().$UploadedFileName;
                if(move_uploaded_file($_FILES['UploadImage']['tmp_name'], $upload_directory.$TargetPath))
                {    
                	
            $QueryInsertFile="INSERT INTO blog_detail(blog_id,blog_detail_image) values ('$blog_id','$TargetPath')";
            mysql_query($QueryInsertFile); 
            // Write Mysql Query Here to insert this $QueryInsertFile   .                   
                }
}
header("location:blogger.php");
}

else{
?><script type="text/javascript">alert("you are not an allowed blogger") </script>
<?php
header("location:blogger.php");

}
}




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
				    	<li><a href="blogger.php">HOME</a></li>
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
			   <form action="blog.php" method="post" enctype="multipart/form-data" >
				   <label>TITLE</label>
				   <input type="text" value="" name="title" Placeholder="Title" >
				   <label>CATEGORY</label>
				   <input type="text" value="" name="category" placeholder="Category">
				   <label>DESCRIPTION</label>
				   <textarea type="text" name="description" placeholder="Description" required> </textarea><br>
                   <input type="file" name="UploadImage" >

				   <input type="submit" name="submit"value="Submit">
			   </form>
			</div>
			
		<div class="clear"></div>
		</div>
</div>
	<div class="footer">
		<div class="wrap">
			<div class="footer_grid1">
			   <h3>About Us</h3>
			   <p>Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here desktop publishing making it look like readable English.<br><a href="#">Read more....</a></p>
			</div>
			<div class="footer_grid2">
			   <h3>Navigate</h3>
					<div class="f_menu">
					   <ul>
					     <li><a href="index.php">Home</a></li>
					     <li><a href="#">Articles</a></li>
					     <li><a href="contact.php">Contact</a></li>
					     <li><a href="#">Write for Us</a></li>
					     <li><a href="#">Submit Tips</a></li>
					     <li><a href="#">Privacy Policy</a></li>
					   </ul>
					</div>
			</div>
		<div class="footer_grid3">
			<h3>We're Social</h3>
			<div class="img_list">
			   <ul>
			     <li><img src="images/facebook.png" alt="" /><a href="#">Facebook</a></li>
			     <li><img src="images/flickr.png" alt="" /><a href="#">Flickr</a></li>
			     <li><img src="images/google.png" alt="" /><a href="#">Google</a></li>
			     <li><img src="images/yahoo.png" alt="" /><a href="#">Yahoo</a></li>
			     <li><img src="images/youtube.png" alt="" /><a href="#">Youtube</a></li>
			     <li><img src="images/twitter.png" alt="" /><a href="#">Twitter</a></li>
			     <li><img src="images/yelp.png" alt="" /><a href="#">Help</a></li>
			   </ul>
			</div>
		</div>
		</div>
	<div class="clear"></div>
	</div>
<div class="f_bottom">
   		<p>© 2012 rights Reseverd | Design by  <a href="http://w3layouts.com/">W3Layouts</a></p>
</div>
</body>
</html>
<?php }
else{
	header("location:login.php");
	echo "Plz Login Again";
}
?>