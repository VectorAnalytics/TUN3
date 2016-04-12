<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Login</title>
<link rel="stylesheet" href="style.css" />
</head>
<body>
<?php
 require('db.php');
 session_start();
 // If form submitted, ie there is a value in username, insert values into the database.
 if (isset($_POST['username']))
 {
	 $username = $_POST['username'];
	 $password = $_POST['password'];
	 $username = stripslashes($username);
	 $username = mysql_real_escape_string($username);
	 $password = stripslashes($password);
	 $password = mysql_real_escape_string($password);
	 // does user even exist in database
	 $user_query = "SELECT * FROM `customer` WHERE cc_username='$username' ";
			 $user_result = mysql_query($user_query) or die(mysql_error());
			 $user_rows = mysql_num_rows($user_result);
	 //Checking if user + password combo exists in the database
	 $combo_query = "SELECT * FROM `customer` WHERE cc_username='$username' and cc_password='$password'";
	 $combo_result = mysql_query($combo_query) or die(mysql_error());
	 $combo_rows = mysql_num_rows($combo_result);
	 //Checking if user + password combo exists in the database
		 if($combo_rows==1) //is yes then login and send to dashboard
		 	{
			 $_SESSION['username'] = $username;
			 header("Location: dashboard.php"); // Redirect user to dashboard.php
			 }
		 if( ($combo_rows==0) and ($user_rows==1) ) // If username exists in db but password entered does not match that in db for this username
		 	{
			 echo "<div class='form'><h3>Password is incorrect for the username you entered.</h3><br/>Click here to <a href='login.php'>try login again.</a></div>";
			 echo "<div class='form'>Click here to <a href='password.php'>reset your password.</a></div>";
			 }
		if ($user_rows==0) 
		 	{
			 echo "<div class='form'><h3>The username you entered is not our database.</h3><br/>Click here to <a href='login.php'>try login again.</a></div>";
			 echo "<div class='form'>Click here to <a href='username.php'>retrieve your username.</a></div>";
			 echo "<div class='form'>Click here to <a href='registration.php'>register as a new member of Bright Bin!</a></div>";
			 }
 }else //Display form first time through because isset if statement will be false.
 {
?>
	<div class="form">
	<h1>Log In</h1>
	<form action="" method="post" name="login">
	<input type="text" name="username" placeholder="Username" required /><br>
	<input type="password" name="password" placeholder="Password" required /><br>
	<input name="submit" type="submit" value="Login" />
	</form>
	<p>Not registered yet? <a href='registration.php'>Register Here</a></p>
	<p>Forgot your password? <a href='password.php'>Reset Your Password Here</a></p>
	<p>Forgot your username? <a href='username.php'>Retrieve Your Username Here</a></p>
	</div>
<?php 
} 
?>
</body>
</html>