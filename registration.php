<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Registration</title>
<link rel="stylesheet" href="style.css" />
</head>
<body>
<?php
 require('db.php');
 session_start();
 // If form submitted, do checks and insert values into the database.
	 if (isset($_POST['username']))
	 {
		 $username = $_POST['username'];
		 $first = $_POST['first'];
		 $last = $_POST['last'];
		 $companyname = $_POST['companyname'];
		 $username = stripslashes($username);
		 $username = mysql_real_escape_string($username);
		 $first = stripslashes($first);
		 $first = mysql_real_escape_string($first);
		 $last = stripslashes($last);
		 $last = mysql_real_escape_string($last);
		 $companyname = stripslashes($companyname);
		 $companyname = mysql_real_escape_string($companyname);
		 //First we check to see if the passwords match 
	//	if($password !== $password2)
	//		{ 
	//		 echo "<div class='form'><h3>Passwords do not match.</h3><br/>Click here to <a href='registration.php'>try registering again.</a></div>";
	//		} 
	//	else
	//		{
			 //If password equals password2, then check if user exists in the database
	//		 $user_query = "SELECT * FROM `customer` WHERE cc_username='$username' ";
	//		 $user_result = mysql_query($user_query) or die(mysql_error());
	//		 $user_rows = mysql_num_rows($user_result);
	//		 $email_query = "SELECT * FROM `customer` WHERE customer_email_address='$email' ";
	//		 $email_result = mysql_query($email_query) or die(mysql_error());
	//		 $email_rows = mysql_num_rows($email_result);
	//		 $prereg_query = "SELECT * FROM `customer` WHERE customer_email_address='$email' and cc_username='$username' " ;
	//		 $prereg_result = mysql_query($prereg_query) or die(mysql_error());
	//		 $prereg_rows = mysql_num_rows($prereg_result);
	//					if ( ($user_rows ==0) and ($email_rows)==0 )// Yes password equals password2 and neither username nor email already exist in database, then do this
	//					 {
	//						$insert_query = "INSERT into `customer` (cc_username, cc_password, customer_email_address, CC_FirstName, CC_LastName, Customer_Company_Name) 
	//					 	VALUES ('$username', '$password', '$email', '$first', '$last', '$companyname')";
	//					 	$insert_result = mysql_query($insert_query);
	//						$_SESSION['username'] = $username; 
	//						 echo "<div class='form'><h3>You registered successfully and are logged in.</h3><br/>Click here to go to <a href='dashboard.php'>Member's Dashboard</a></div>"; 
	//					 }
	//					 if ( ($user_rows !==0) and ($email_rows)==0 ) /* This username already exists in db but email does not exists in database */
	//					 {
	//						echo "<div class='form'><h3>This username already exists. </h3><a href='registration.php'>Please choose another username and try again.</a></div>"; 	
	//					 	echo "<div class='form'><h3>If you think you have previously registered at Bright Bin: </h3><a href='login.php'>Please try logging in.</a></div>"; 	
	//					 }
	//					 if ( ($user_rows ==0) and ($email_rows)!==0 ) /* This email already exists in db but username does not exists in database */
	//					 {
	//						echo "<div class='form'><h3>This email already exists in our database. </h3><a href='login.php'>Please try logging in.</a></div>"; 	
	//					 	echo "<div class='form'><h3>Forgot your username? </h3><a href='username.php'>Retrieve your username here.</a></div>"; 	
	//					 }
	//					 if ( ($prereg_rows)!==0  )/* This email and username combo is already in database */
	//					 {
	//						echo "<div class='form'><h3>The email and username combination you entered is already registered at Bright Bin. </h3><br/><a href='login.php'>Please login.</a></div>"; 	
	//					 }
	//			}
 }
 else /* If first time through or if isset is empty, do this */
 {
	?>
	<div class="form">
	<h2>Welcome to HireHerosUSA Potential Job Candidate Search Page</h2>
	<p>This form provides our corporate partners with the opportunity to search for potential job candidates.</p>
	<p>Please complete with form, hit "submit", and a list of potential job candidates will be returned.</p>
	<form name="registration" action="" method="post">
	<label> Please enter the title of the book </label>
	<input type="text" name="username" placeholder="Username *" required >
	<input type="text" name="first" placeholder="First Name *" required /><br>
	<input type="text" name="last" placeholder="Last Name *" required /><br>
	<input type="text" name="companyname" placeholder="Company Name" /><br>
	Highest Education Obtained:
  <select name="High_Ed">
     <option value="">Select...</option>
     <option value="High School/GED">High School/GED</option>
     <option value="Technical Certificate">Technical Certificate</option>
      <option value="2 Year Degree">2 Year Degree</option>
       <option value="4 Year Degree">4 Year Degree</option>
        <option value="Graduate Degree">Graduate Degree</option>
  </select><br><br>
  	Type of Position:
  <select name="Type_pos">
     <option value="">Select...</option>
     <option value="Full-Time">Full-Time</option>
     <option value="Part-Time">Part-Time</option>
      <option value="Temporary/Contract">Temporary/Contract</option>
       <option value="Seasonal">Seasonal</option>
  </select><br><br>
    Job Location (State):
  <select name="State_JobLoc">
  	<option value="">Select...</option>
     <option value="PA">PA</option>
     <option value="NY">New York</option>
      <option value="NC">North Carolina</option>
       <option value="CA">CA</option>
  </select><br><br>
  <label> Qualification Keyword (Primary): </label>
<input type="text" name="Qual_Key_Pri"><br>
  <label> Qualification Keyword (Secondary): </label>
<input type="text" name="Qual_Key_Sec"><br>
	<input type="submit" name="submit" value="Submit" />
	</form>
	</div>
	<?php 
} 
?>
</body>
</html>