<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Reset Password</title>
<link rel="stylesheet" href="style.css" />
</head>
<body>
<?php
 require('db.php');
 session_start();
 // If form submitted, insert values into the database.
 if (isset($_POST['username']))
 {
	 $username = $_POST['username'];
	 $password = $_POST['password'];
	 $password2 = $_POST['password2'];
	 $username = stripslashes($username);
	 $username = mysql_real_escape_string($username);
	 $password = stripslashes($password);
	 $password = mysql_real_escape_string($password);
	 $password2 = stripslashes($password2);
	 $password2 = mysql_real_escape_string($password2);
		 //now we check to see if the passwords match 
		if($password !== $password2)
			{ 
			 echo "<div class='form'><h3>Passwords do not match.</h3><br/>Click here to <a href='password.php'>try resetting your password again.</a></div>";
			} 
		else
			{
			 //If password equals password2, then check if user exists in the database
			 $query = "SELECT * FROM `customer` WHERE cc_username='$username' ";
			 $result = mysql_query($query) or die(mysql_error());
			 $rows = mysql_num_rows($result);
				if($rows==1) // Yes password equals password2 and this username is in the database, then do this
				{
				 $_SESSION['username'] = $username;
				 //Query to update database with new password
				 $update_query = mysql_query( "UPDATE `customer` SET cc_password = '$password' WHERE cc_username='$username' " );
				 echo "<div class='form'><h3>Password Successfully Updated!</h3><br/>Click here to <a href='dashboard.php'>Go To Member's Dashboard</a></div>";
				 }
				 else // when password equals password2 but username not in database
				 {
				 echo "<div class='form'><h3>Opps, username incorrect or does not exist.</h3><br/></div>";
				 echo "<div class='form'><h3>Want to try one of these options:</h3><br/></div>";
				 echo "<div class='form'><h3><a href='password.php'>Try resetting your password again?</a></div>";
				 echo "<div class='form'><h3><a href='username.php'>Retrieve your username here.</a></div>";
				 echo "<div class='form'><h3><a href='registration.php'>Register as a new user on Bright Bin!</a></div>";
				 }
			}
}
else //Display form first time through because isset if statement will be false.
{
?>
	<div class="form">
	<h1>Reset Password</h1>
	<form action="" method="post" name="password">
	<input type="text" name="username" placeholder="Username" required /><br>
	<input type="password" name="password" placeholder="Password" required /><br>
	<input type="password" name="password2" placeholder="Confirm Password" required /><br>
	<input name="submit" type="submit" value="Reset Password" />
	</form>
	<p>Not registered yet? <a href='registration.php'>Register Here</a></p>
	<p>Forgot your username? <a href='username.php'>Retrieve Username</a></p>
	<p>Ready to login? <a href='login.php'>Login Here</a></p>
	</div>
<?php  
}  
?>
</body>
</html>