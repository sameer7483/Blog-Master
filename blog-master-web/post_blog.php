<?php
session_start();
$connection = mysql_connect("localhost", "root", ""); // Establishing Connection with Server
$db = mysql_select_db("blog_site", $connection); // Selecting Database from Server
if(isset($_POST['submit'])){
	$id=$_POST['id'];
	$query=("UPDATE blog_master SET blog_is_active = 1 WHERE blog_id ='$id' ");
	mysql_query($query);
	header("location:admin.php");
} 
if(isset($_POST['submit2'])){
	$id=$_POST['id'];
	$query=("UPDATE blog_master SET blog_is_active = 0 WHERE blog_id ='$id' ");
	mysql_query($query);
	header("location:admin.php");
		
}


if(isset($_POST['n_allow'])){
	$id=$_POST['id'];
	$query=("UPDATE blogger_info SET blogger_is_active = 0 WHERE blogger_id ='$id' ");
	mysql_query($query);
	header("location:list_blogger.php");
}
if(isset($_POST['allow'])){
	$id=$_POST['id'];
	$query=("UPDATE blogger_info SET blogger_is_active = 1 WHERE blogger_id ='$id' ");
	mysql_query($query);
	header("location:list_blogger.php");
}

if(isset($_POST['delete'])){
	$id=$_POST['id'];
	$query=("DELETE from blog_master WHERE blog_id ='$id' ");
	mysql_query($query);
	$query=("DELETE from blog_detail WHERE blog_id ='$id' ");
	mysql_query($query);
	header("location:admin.php");
}


?>