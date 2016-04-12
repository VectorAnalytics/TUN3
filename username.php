<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Retrieve Username</title>
<link rel="stylesheet" href="style.css" />
</head>
<body>
<?php
 require('db.php');
 session_start();
 // If form submitted, check and retrieve username from database.
 if (isset($_POST['email']))
 {
	 $email = $_POST['email'];
	 $email = stripslashes($email);
	 $email = mysql_real_escape_string($email);
	 //Checking is username existing in the database or not
	 $query = "SELECT cc_username FROM `customer` WHERE customer_email_address='$email' ";
	 $result = mysql_query($query) or die(mysql_error());
	 $rows = mysql_num_rows($result);
	 $rowdata = mysql_fetch_array($result);
		 if($rows==1)
		 {
		 echo "<div class='form'><h3>Here is your username:  " . $rowdata ['cc_username'];
		 echo "<div class='form'><br/>Click here to <a href='login.php'>login.</a></div>";
		 }
		 else
		 {
		 echo "<div class='form'><h3>That email address does not exist in our database.</h3><br/>Click here to <a href='registration.php'>register as a new user.</a></div>";
		 echo "<div class='form'><br/>Click here to <a href='username.php'>try another email address.</a></div>";
		 }
 }
 else // Display form for the first time or if $_POSTemail isset is emply
 {
	?>
	<div class="form">
	<h1>Retrieve Username</h1>
	<form action="" method="post" name="retrieve_username"><br>
	<input type="email" name="email" placeholder="Email" required /><br>
	<input name="submit" type="submit" value="Retrieve Username" />
	</form>
	<p>Not registered yet? <a href='registration.php'>Register Here</a></p>
	<p>Forgot your password? <a href='password.php'>Reset Your Password Here</a></p>
	<p>Ready to login? <a href='login.php'>Login Here</a></p>
	</div>
	<?php 
} 
?>
</body>
</html>