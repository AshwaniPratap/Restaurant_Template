<?php
include_once('config.php');
if(isset($_POST['submit']))
{
$fname=$_POST['full_name'];
$address=$_POST['address'];
$city=$_POST['city'];
$email=$_POST['email'];
$password=md5($_POST['password']);
$query=mysql_query("insert into users(fullname,address,city,email,password) values('$fname','$address','$city','$email','$password')");
if($query)
{
	echo "<script>alert('Successfully Registered. You can login now');</script>";
	//header('location:user-login.php');
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
							<legend>
              </br>
								Sign Up
							</legend>
							<p>
								Enter your personal details below:
							</p>
							<div class="container">
								<input type="text" name="full_name" placeholder="Full Name" required>


								<input type="text" name="address" placeholder="Address" required>


								<input type="text" name="city" placeholder="City" required>


							</div>
							<p>
								Enter your account details below:
							</p>
							<div class="container">

									<input type="text" name="email" id="email"  placeholder="Email" required>





									<input type="password" class="form-control" id="password" name="password" placeholder="Password" required>




									<input type="password" class="form-control" name="password_again" placeholder="Password Again" required>




									<input type="checkbox" id="agree" value="agree">
									<label for="agree">
										I agree
									</label>

							</div>
							<div class="container">
								<p>
									Already have an account?
									<a href="user-login.php">
										Log-in
									</a>
								</p>
								<button type="submit" class="signupbtn" id="submit" name="submit">
									Submit <i class="fa fa-arrow-circle-right"></i>
								</button>
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
