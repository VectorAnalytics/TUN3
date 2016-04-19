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
     $High_Ed = $_POST['High_Ed'];
     $Type_pos = $_POST['Type_pos'];
     $Will_Relo = $_POST['Will_Relo'];
     $Spec_Ind= $_POST['Spec_Ind'];
    # $Qual_Key_Pri = $_POST['Qual_Key_Pri'];
    # $Min_Sal = $_POST['Min_Sal'];
    # $Ser_Rank = $_POST['Ser_Rank'];


     $State_JobLoc = stripslashes($State_JobLoc);
     $High_Ed = stripslashes($High_Ed);
     $Type_pos = stripslashes($Type_pos);
     $Will_Relo = stripslashes($Will_Relo);
     $Spec_Ind = stripslashes($Spec_Ind);
    # $Qual_Key_Pri = stripslashes($Qual_Key_Pri);
    # $Min_Sal = stripslashes($Min_Sal);
    # $Ser_Rank = stripslashes($Ser_Rank);

     $State_JobLoc = mysql_real_escape_string($State_JobLoc);
     $High_Ed = mysql_real_escape_string($High_Ed);
     $Type_pos = mysql_real_escape_string($Type_pos);
     $Will_Relo = mysql_real_escape_string($Will_Relo);
     $Spec_Ind = mysql_real_escape_string($Spec_Ind);
    # $Qual_Key_Pri = mysql_real_escape_string($Qual_Key_Pri);
    # $Min_Sal = mysql_real_escape_string($Min_Sal);
    # $Ser_Rank = mysql_real_escape_string($Ser_Rank);


     $user_query = "SELECT id, Desired_States_of_Employment, Highest_Level_of_Education, Employment_Type, 
     Willing_to_Relocate_YN, Specific_Industries_Jobs, Min_Salary_Expectations,
     Service_Rank, KeywordsSelected, MailingState, Status_c
     FROM `vet_candidates` WHERE (Desired_States_of_Employment LIKE '%$State_JobLoc%') AND 
     (Highest_Level_of_Education='$High_Ed') AND (Employment_Type='$Type_pos') AND
     (Willing_to_Relocate_YN='$Will_Relo') AND ( Specific_Industries_Jobs LIKE'%$Spec_Ind%')";

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
			<h2> Based on the criteria you entered, here are HHUSA candidates that match your search: </h2>
            <table border = "1">
	 		<tr>
	 		<th> ID Number</th>
	 		<th> Current Location</th>
            <th> Service Rank</th>
            <th> Current Employment Status</th>
            <th> Min Salary Expectation</th>
	 		</tr>
			</div>

			<?php
			while($row = mysql_fetch_array($user_result))
				{
				echo "<tr>";
				echo "<td>" .$row['id']. "</td>";
				echo "<td>" .$row['MailingState']. "</td>";
                echo "<td>" .$row['Service_Rank']. "</td>";               
	           echo "<td>" .$row['Status_c']. "</td>";
               echo "<td>" .$row['Min_Salary_Expectations']. "</td>";            
    			echo "</tr>";
	
			
				} 
 			}
 }
 else /* If first time through or if isset is empty, do this */
 {
	?>
	<div class="form">
	<h2>Welcome to HireHerosUSA Potential Job Candidate Search Page</h2>
	<p>This form provides you, our corporate partner, the opportunity to search for potential job candidates.</p>
	<p>Please complete the form, hit "submit", and a list of potential job candidates will be returned.</p>
	<form name="EmployerSearch" action="" method="post">
<br><br>
  	Type of position you wish to fill:
  <select name="Type_pos">
     <option value="">Select...</option>
     <option value="Full-Time">Full-Time</option>
     <option value="Part-Time">Part-Time</option>
      <option value="Temporary/Contract">Temporary/Contract</option>
       <option value="Seasonal">Seasonal</option>
  </select><br><br>
    Job location (state):
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
      Are you looking for applicants willing to relocate:
  <select name="Will_Relo">
  	<option value="">Select...</option>
     <option value="Yes">Yes</option>
     <option value="No">No</option>
  </select><br><br>
    <label> What industry are you recruiting for (enter a keyword): </label>
	<input type="text" name="Spec_Ind"><br><br>
    What is the minimum education level you wish to hire:
    <select name="High_Ed">
     <option value="">Select...</option>
     <option value="High School/GED">High School/GED</option>
     <option value="Technical Certificate">Technical Certificate</option>
      <option value="2 Year Degree">2 Year Degree</option>
       <option value="4 Year Degree">4 Year Degree</option>
        <option value="Graduate Degree">Graduate Degree</option>
  </select><br><br>
  <!--
    Salary range you wish to hire for:
  <select name="Min_Sal">
  	<option value="">Select...</option>
     <option value="$20000 - $29999">$20000 - $29999</option>
     <option value="$30000 - $39999">$30000 - $39999</option>
     <option value="$40000 - $49999">$40000 - $49999</option>
     <option value="$50000 - $59999">$50000 - $59999</option>
     <option value="$60000 - $69999">$60000 - $69999</option>
     <option value="$70000 - $79999">$70000 - $79999</option>
     <option value="$80000 - $89999">$80000 - $89999</option>
     <option value="$90000 - $99999">$90000 - $99999</option>                    
     <option value="$100000+">$100000+</option>
  </select><br><br>	
    <label> What applicant area of qualification are you looking for (enter a keyword): </label>
    <input type="text" name="Qual_Key_Pri"><br><br>
  Service rank of desired applicant (pick 1):
  <select name="Ser_Rank">
  	<option value="">Select...</option>
     <option value="Spouse">Spouse</option>
     <option value="O-1">O-1</option>
     <option value="O-2">O-2</option>
     <option value="O-3">O-3</option>  
     <option value="O-4">O-4</option>
     <option value="O-5">O-5</option>
     <option value="O-6">O-6</option> 
     <option value="E-1">E-1</option> 
     <option value="E-2">E-2</option>
     <option value="E-3">E-3</option>  
     <option value="E-4">E-4</option>
     <option value="E-5">E-5</option>
     <option value="E-6">E-6</option>         
     <option value="E-7">E-7</option> 
     <option value="E-8">E-8</option> 
     <option value="E-9">E-9</option> 
  </select><br><br>	-->
  	<input type="submit" name="submit" value="Submit" />
	</form>
	</div>
	<?php 
} 
?>
</body>
</html>