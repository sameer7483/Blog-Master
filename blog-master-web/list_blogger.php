<style>
#abc{
	text-align: center;
	padding:20px;
	margin:20px auto;
	background-color:grey;
	width:40%;
}
#abc input{
	width:110px;
	background-color: black;
	color: white;
	height: 30px;
	border-radius: 5px;
}
#button {
	position: relative;
	display: inline;
}
</style>
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
				    	<li><a href="admin.php">HOME</a></li>
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
session_start();
if($_SESSION['admin']){
$connection = mysql_connect("localhost", "root", ""); // Establishing Connection with Server
$db = mysql_select_db("blog_site", $connection); // Selecting Database from Server

$query=mysql_query("SELECT * FROM blogger_info ");
?>
	<div id="abc"> <?Php
	echo "<h1>"."Username"."</h1>";
while ($row = mysql_fetch_assoc($query))
    {
       /* echo $row['blogger_id']."   ".$row['blogger_username']."<br />";*/
       ?><div id="a">
       		<form id="button" method="post" action="blogger_detail.php">
       			<input type="submit" name="submit" value=<?php echo $row['blogger_username']; ?>></td></form>
       			<?php
       			$active=$row['blogger_is_active'];
       			
       			if($active){
       				?>
       				<form id="button" action="post_blog.php" method="post">
				      <input type="hidden" value="<?php echo $row['blogger_id']; ?>" name="id">
       			      <input type="submit" name="n_allow" value="Do Not Allow">
       			</form>
       			<?php
       		}
       		else{
       			?>
       			<form id="button" action="post_blog.php" method="post">
				<input type="hidden" value="<?php echo $row['blogger_id']; ?>" name="id">
       			<input type="submit" value="Allow" name="allow" >
       			</form>
       			
       			<?php } ?>
                

       		</div>


       		
       <?php
    }
}
else{ 
	?><script type="text/javascript">alert("plz login again");</script<?php 
		header("location:login.php"); } ?> </div>