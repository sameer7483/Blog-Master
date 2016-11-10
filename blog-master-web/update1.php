<?php
session_start();
$connection = mysql_connect("localhost", "root", ""); // Establishing Connection with Server
$db = mysql_select_db("blog_site", $connection); // Selecting Database from Server
if(isset($_POST['submit1'])){
    $id=$_POST['id'];
	$tit=$_POST['title'];
$cate=$_POST['category'];
$des=$_POST['description'];
$query=("UPDATE blog_master set blog_title='$tit', blog_category='$cate', blog_desc='$des' , updated_date=CURDATE() where blog_id='$id'");
mysql_query($query);
mysql_query("UPDATE blogger_info set blogger_updated_date=CURDATE() where blogger_username='$_SESSION[updat]'");

extract($_POST);
 $UploadedFileName=$_FILES['UploadImage']['name'];
if($UploadedFileName!='')
{
                $upload_directory = "MyUploadImages/"; //This is the folder which you created just now
        $TargetPath=time().$UploadedFileName;
                if(move_uploaded_file($_FILES['UploadImage']['tmp_name'], $upload_directory.$TargetPath))
                {    
            $QueryInsertFile="UPDATE blog_detail SET blog_detail_image='$TargetPath' WHERE blog_id='$id'";
            mysql_query($QueryInsertFile); 
            // Write Mysql Query Here to insert this $QueryInsertFile   .                   
                }
}

if($_SESSION['updat']=="Sameer"){
    header("location:admin.php");}
else{
    $_SESSION['username']=$_SESSION['updat'];

    header("location:blogger.php");

}

}
?>

