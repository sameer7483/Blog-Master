<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php

$connection = mysql_connect("localhost", "root", ""); // Establishing Connection with Server
$db = mysql_select_db("blog_site", $connection); // Selecting Database from Server


$query="SELECT * FROM blog_detail natural join blog_master WHERE blog_is_active=1";
$results = mysql_query($query);
$id=array();
$title=array();
$myphoto=array();
$desc=array();
$author=array();
$creat_date=array();
$upda_date=array();
$is_active=array();

$i=0;

?>
<!DOCTYPE HTML>
<html>
<head>

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
			    
			    <li><a href="login.php">Login</a></li>
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
			    	
			    	<li><a href="#">SERVICES</a></li>
			    	<li><a href="#">LOGOS</a></li>
			    	<li><a href="#">TOOLS</a></li>
			    	<li><a href="#">ICONS</a></li>
			    	<li><a href="#">WALLPAPERS</a></li>
			    	
			    	<li><a href="contact.php?name=0">CONTACT</a></li>
			    </ul>
			</div>
			
			<div class="clear"></div>
		</div>
	</div>
</div>

<?php  

while($row = mysql_fetch_array($results))
{

    $id[$i]=$row['blog_id'];
	$title[$i]=$row['blog_title'];
   $myphoto[$i]= $row['blog_detail_image'];
   $desc[$i]=$row['blog_desc'];
   $author[$i]=$row['blog_author'];
   $creat_date[$i]=$row['creation_date'];
   $upda_date[$i]=$row['updated_date'];
   $is_active[$i]=$row['blog_is_active'];
   $i=$i+1;
}
   
   ?>

<?php
for($j=$i-1;$j>=0;$j--){

	?>

<div class="wrap">
	<div class="main">
		<div class="content">
			<div class="box1">
			    <h2><a href="read_more.php?id=<?php echo $id[$j]; ?>"><?php echo $title[$j]; ?></a></h2>
			    <span>By <a href="blogger_detail.php?name=<?php echo $author[$j]; ?>"><?php echo $author[$j] ?></a></span><br/>
			    <span><?php echo ' updated on ' . $upda_date[$j]; ?></span>
			    <span><?php echo 'created on' . $creat_date[$j]; ?></span>
				<div class="box1_img">
				    <img src="MyUploadImages/<?php echo $myphoto[$j]; ?>" height=180px width=270px />
				</div>   
				<div class="data">
				    <p><?php  echo substr($desc[$j],0,500). "....."; ?></p>
				    <form id="button" action="read_more.php" method="post">
				      <input type="hidden" value="<?php echo $id[$j]; ?>" name="readmore">
				      <input type="submit" value="Read more>>>" name="submit" >
				      </form>

                    
                 
				      
				</div>
			<div class="clear"></div>
			</div>

			
		</div>
    </div>
</div>    
<?php } ?>

	
</body>
</html>

