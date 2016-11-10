<?php
session_start();

$connection = mysql_connect("localhost", "root", ""); // Establishing Connection with Server
$db = mysql_select_db("blog_site", $connection); // Selecting Database from Server
if(isset($_POST['login']))
{
    $myusername = $_POST['username'];
$mypassword = $_POST['password'];

    $sql="SELECT * FROM blogger_info WHERE blogger_username='$myusername' and blogger_password='$mypassword'";
$result=mysql_query($sql);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);

if($myusername == 'Sameer' and $mypassword =='7483')
{
  header("location:admin.php");
  session_start();
  $_SESSION['admin'] = $myusername;
  break;
}



// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1){

// Register $myusername, $mypassword and redirect to file "login_success.php".
    
 $_SESSION['username'] = $myusername;

header("location:blogger.php");
}
else {
?><script type="text/javascript">alert("Wrong Username or Password");</script><?php 
}

}




if(isset($_POST['submit'])){ // Fetching variables of the form which travels in URL

$username = $_POST['username'];
$password = $_POST['password'];

    $sql="SELECT * FROM blogger_info WHERE blogger_username='$username'";
$result=mysql_query($sql);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);


if($count==0){
    $query=mysql_query("insert into blogger_info(blogger_username, blogger_password, blogger_creation_date, blogger_is_active, blogger_updated_date) values
 ('$username', '$password', CURDATE(),1,CURDATE())");
}
else{
    ?><script> alert("already exist") </script><?php
}
}
?>

<!DOCTYPE html>
<!--[if lt IE 7 ]> <html lang="en" class="no-js ie6 lt8"> <![endif]-->
<!--[if IE 7 ]>    <html lang="en" class="no-js ie7 lt8"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en" class="no-js ie8 lt8"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en" class="no-js ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="UTF-8" />
        <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">  -->
        <title>Login and Registration Form with HTML5 and CSS3</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Login and Registration Form with HTML5 and CSS3" />
        <meta name="keywords" content="html5, css3, form, switch, animation, :target, pseudo-class" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" href="../favicon.ico"> 
        <link rel="stylesheet" type="text/css" href="css1/demo.css" />
        <link rel="stylesheet" type="text/css" href="css1/style.css" />
		<link rel="stylesheet" type="text/css" href="css1/animate-custom.css" />

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
                    <li><a href="contact.php">CONTACT</a></li>
                </ul>
            </div>
            
            <div class="clear"></div>
        </div>
    </div>
</div>
        <div class="container">
            <!-- Codrops top bar -->
            <div class="codrops-top">
               
                <div class="clr"></div>
            </div><!--/ Codrops top bar -->
            <header>
                <h1>Login and Registration Form </h1>
				
            </header>
            <section>				
                <div id="container_demo" >
                    <!-- hidden anchor to stop jump http://www.css3create.com/Astuce-Empecher-le-scroll-avec-l-utilisation-de-target#wrap4  -->
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
                        <div id="login" class="animate form">
                            <form  action="login.php" autocomplete="on" method="post"> 
                                <h1>Log in</h1> 
                                <p> 
                                    <label for="username" class="uname" >  Username </label>
                                    <input id="username" name="username" required="required" type="text" placeholder="myusername or mymail@mail.com"/>
                                </p>
                                <p> 
                                    <label for="password" class="youpasswd"> Your password </label>
                                    <input id="password" name="password" required="required" type="password" placeholder="eg. X8df!90EO" /> 
                                </p>
                                
                                <p class="login button"> 
                                    <input type="submit" name="login" value="Login" /> 
								</p>
                                <p class="change_link">
									Not a member yet ?
									<a href="#toregister" class="to_register">Join us</a>
								</p>
                            </form>
                        </div>

                        <div id="register" class="animate form">
                            <form  action="login.php" autocomplete="on" method="post"> 
                                <h1> Sign up </h1> 
                                <p> 
                                    <label for="usernamesignup" class="uname" >Your username</label>
                                    <input id="usernamesignup" name="username" required="required" type="text" placeholder="mysuperusername690" />
                                </p>
                    
                                <p> 
                                    <label for="passwordsignup" class="youpasswd" >Your password </label>
                                    <input id="passwordsignup" name="password" required="required" type="password" placeholder="eg. X8df!90EO"/>
                                </p>         
                                <p class="signin button"> 
									<input type="submit" name="submit" value="Sign up"/> 

								</p>
                                <p class="change_link">  
									Already a member ?
									<a href="#tologin" class="to_register"> Go and log in </a>
								</p>
                            </form>
                        </div>
						
                    </div>
                </div>  
            </section>
        </div>
    </body>
</html>