<?php

$connection = mysql_connect("localhost", "root", ""); // Establishing Connection with Server
$db = mysql_select_db("blog_site", $connection); // Selecting Database from Server
$query="SELECT * from contact_us";
$results=mysql_query($query);
$count=mysql_num_rows($results);
$i=0;
$id[$i]=array();
	$name[$i]=array();
   $email[$i]= array();
   $sub[$i]=array();
   $detail[$i]=array();
   $date[$i]=array();

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

    $id[$i]=$row['resp_id'];
	$name[$i]=$row['name'];
   $email[$i]= $row['email'];
   $sub[$i]=$row['subject'];
   $detail[$i]=$row['detail'];
   $date[$i]=$row['date'];
  
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
			<center>
			    <?php echo 'response id'.'-----' .$id[$j]; ?><br/>
			    <?php echo 'name'.'  -----     ' .$name[$j] ?><br/>
			    <?php echo 'email' .'  -----     '. $email[$j]; ?><br/>
			    <?php echo 'subject'.' -----      ' . $sub[$j]; ?><br/>
			    <?php echo 'details'.'  -----     ' . $detail[$j]; ?><br/>
			    <?php echo 'date' .'    -----   '. $date[$j]; ?><br/>

                    
                 
				      </center>
				</div>
			<div class="clear"></div>
			</div>

			
		</div>
    </div>
</div>    
<?php } ?>