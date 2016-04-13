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
     <option value="AL">AL</option>
     <option value="AK">AK</option>
     <option value="AZ">AZ</option>
     <option value="AR">AR</option>
     <option value="CA">CA</option>
     <option value="CO">CO</option>
     <option value="CT">CT</option>
     <option value="DE">DE</option>
     <option value="FL">FL</option>
     <option value="GA">GA</option>
     <option value="HI">HI</option>
     <option value="ID">ID</option>
     <option value="IL">IL</option>
     <option value="IN">IN</option>
     <option value="IA">IA</option>
     <option value="KS">KS</option>
     <option value="KY">KY</option>
     <option value="LA">LA</option>
     <option value="ME">ME</option>
     <option value="MD">MD</option>
     <option value="MA">MA</option>
     <option value="MI">MI</option>
     <option value="MN">MN</option>
     <option value="MS">MS</option>
     <option value="MO">MO</option>
     <option value="DC">DC</option>
     <option value="MT">MT</option>
     <option value="NE">NE</option>
     <option value="NV">NV</option>
     <option value="NH">NH</option>
     <option value="NJ">NJ</option>
     <option value="NM">NM</option>
     <option value="NY">NY</option>
     <option value="NC">NC</option>
     <option value="ND">ND</option>
     <option value="OH">OH</option>
     <option value="OK">OK</option>
     <option value="OR">OR</option>
     <option value="PA">PA</option>
     <option value="RI">RI</option>
     <option value="SC">SC</option>
     <option value="SD">SD</option>
     <option value="TN">TN</option>
     <option value="TX">TX</option>
     <option value="UT">UT</option>
     <option value="VT">VT</option>
     <option value="VA">VA</option>
     <option value="WA">WA</option>
     <option value="WV">WV</option>
     <option value="WI">WI</option>
     <option value="WY">WY</option>
     <option value="PR">PR</option>
  </select><br><br>
      Applicant Is Willing To Relocate:
  <select name="Will_Relo">
  	<option value="">Select...</option>
     <option value="Yes">Yes</option>
     <option value="No">No</option>
  </select><br><br>
    <label> Applicant's Industry of Interest: </label>
	<input type="text" name="Spec_Ind"><br><br>
  <label> Applicant's Area of Qualification (Primary Keyword): </label>
	<input type="text" name="Qual_Key_Pri"><br><br>
  <label> Applicant's Area of Qualification (Secondary Keyword): </label>
	<input type="text" name="Qual_Key_Sec"><br><br>
      Applicant's Minimum Salary Expections:
  <select name="Min_Sal">
  	<option value="">Select...</option>
     <option value="$20000 - $29000">$20000 - $29000</option>
     <option value="$30000 - $39000">$30000 - $39000</option>
     <option value="$40000 - $49000">$40000 - $49000</option>
     <option value="$50000 - $59000">$50000 - $59000</option>
     <option value="$60000 - $69000">$60000 - $69000</option>
     <option value="$70000 - $79000">$70000 - $79000</option>
     <option value="$80000 - $89000">$80000 - $89000</option>
     <option value="$90000 - $99000">$90000 - $99000</option>                    
     <option value="$100000+">$100000+</option>
  </select><br><br>	
  Applicant's Service Rank (Pick 1):
  <select name="Ser_Rank">
  	<option value="">Select...</option>
     <option value="Spouse">Spouse</option>
     <option value="O-1">O-1</option>
     <option value="O-2">O-2</option>
     <option value="O-3">O-3</option>  
     <option value="O-4">O-4</option>
     <option value="O-5">O-5</option>
     <option value="O-6">O-6</option>         
  </select><br><br>	
  	<input type="submit" name="submit" value="Submit" />
	</form>
	</div>
	<?php 
} 
?>
</body>
</html>