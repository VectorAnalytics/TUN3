<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>HomePage</title>
<link rel="stylesheet" href="style.css" />
</head>
<body>
<?php
 require('db.php');
 session_start();
 // If form submitted, do checks and insert values into the database.
	 if (isset($_POST['State_JobLoc']))
{
		 $State_JobLoc = $_POST['State_JobLoc'];
		 $State_JobLoc = stripslashes($State_JobLoc);
		 $State_JobLoc = mysql_real_escape_string($State_JobLoc);
		 $user_query = "SELECT id, Desired_States_of_Employment FROM `vet_candidates` WHERE Desired_States_of_Employment ='$State_JobLoc' ";
		 $user_result = mysql_query($user_query) or die(mysql_error());
		 $user_rows = mysql_num_rows($user_result);	


		 if  ($user_rows ==0) // There are no matches in MYSQL
		 	{
		 	
			echo "<div class='form'><h3>Oops, there were no results based on that search.</h3><br/></div>";

			echo "<div class='form'><h3><a href='index.php'>Search Again!</a></div>";
			}
		else // there are matches in MYSQL
			{
			?>
			<div class="form">
			<title>Potential Candidates</title>
			<link rel="stylesheet" href="style.css" />
			<body>
			<h1> Search Results </h1>
			<table border = "1">
	 		<tr>
	 		<th> ID Number</th>
	 		<th> Desired States of Employment </th>
	 		</tr>
			</div>
			<?php
			while($row = mysql_fetch_array($user_result))
				{
				echo "<tr>";
				echo "<td>" .$row['id']. "</td>";
				echo "<td>" .$row['Desired_States_of_Employment']. "</td>";
				echo "</tr>";
	
			
				}
 			}
 }
 else /* If first time through or if isset is empty, do this */
 {
	?>
	<div class="form">
	<h2>Welcome to HireHerosUSA Potential Job Candidate Search Page</h2>
	<p>This form provides our corporate partners with the opportunity to search for potential job candidates.</p>
	<p>Please complete with form, hit "submit", and a list of potential job candidates will be returned.</p>
	<form name="EmployerSearch" action="" method="post">
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