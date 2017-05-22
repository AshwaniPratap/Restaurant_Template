<?php
session_start();
error_reporting(0);
include("config.php");
if(isset($_POST['submit']))
{
$ret=mysql_query("SELECT * FROM users WHERE email='".$_POST['username']."' and password='".md5($_POST['password'])."'");
$num=mysql_fetch_array($ret);
if($num>0)
{
$extra="dashboard.php";//
$_SESSION['login']=$_POST['username'];
$_SESSION['id']=$num['id'];
$host=$_SERVER['HTTP_HOST'];
$uip=$_SERVER['REMOTE_ADDR'];
$status=1;
$log=mysql_query("insert into userlog(uid,username,userip,status) values('".$_SESSION['id']."','".$_SESSION['login']."','$uip','$status')");
$uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
else
{
$_SESSION['login']=$_POST['username'];
$uip=$_SERVER['REMOTE_ADDR'];
$status=0;
mysql_query("insert into userlog(username,userip,status) values('".$_SESSION['login']."','$uip','$status')");
$_SESSION['errmsg']="Invalid username or password";
$extra="user-login.php";
$host  = $_SERVER['HTTP_HOST'];
$uri  = rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
header("location:http://$host$uri/$extra");
exit();
}
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
<title>Balaji Restaurant</title>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="style.css">
<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/jquery.cycle2.min.js"></script>

</head>

<body>
  <!-- logo image -->
<header class="mainhead">
  <div class="logo">
  <img src="images/logo.jpg">
  </div>
    <!--Responsive navigation-->
<nav class="mnu">
  <ul>
    <li><a href="index.html">Home</a></li>
    <li><a href="about.html">About Us</a></li>
    <li><a href="gallery.html">Gallery</a></li>
    <li><a href="menu.html">Our Menu</a></li>
    <li><a href="feedback.html">Feedback</a></li>
    <li><a href="contact.html">Contact Us</a></li>

  </ul>
</nav>
</header>

<aside>
<!-- Sidebar Menu -->
<nav class="sidebar">
  <ul>
    <li><a href="foodie.html">Foodies Menu</a></li>
    <li><a href="todays.html">Today's Special</a></li>
    <li><a href="testcart.php">Home Delivery</a></li>
    <li><a href="registration.php">Registration</a></li>
    <li><a href="user-login.php">Login</a></li>
  </ul>
</nav>
</aside>

<div class="wp-content">
				<!-- start: REGISTER BOX -->

					<form name="registration" id="registration"  method="post" style="border:1px solid #ccc">
						<fieldset>

							<p>
							Sign in to your account
							</p>
							<div class="container">
								<input type="text" name="username" placeholder="Username/e-mail id" required>


								<input type="password" name="password" placeholder="Password" required>





							</div>
							<div class="container">

								<button type="submit" class="signupbtn" id="submit" name="submit">
									Submit <i class="fa fa-arrow-circle-right"></i>
								</button>

                Don't have an account yet?
              <a href="registration.php">
                <b style="font-size:20px">Create an account</b>
              </a>
							</div>
						</fieldset>
					</form>


				</div>

			</div>
		</div>
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="vendor/modernizr/modernizr.js"></script>
		<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="vendor/switchery/switchery.min.js"></script>
		<script src="vendor/jquery-validation/jquery.validate.min.js"></script>
		<script src="assets/js/main.js"></script>
		<script src="assets/js/login.js"></script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				Login.init();
			});
		</script>

	<script>
function userAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'email='+$("#email").val(),
type: "POST",
success:function(data){
$("#user-availability-status1").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>

	</body>
	<!-- end: BODY -->
</html>
