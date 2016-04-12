<?php include("auth.php"); //include auth.php file on all secure pages ?>
<!DOCTYPE html>
<html>
<head>
<title> Search by ISBN</title>
</head>
<meta charset="utf-8">
<link rel="stylesheet" href="style.css" />
<body>
	<div class="form">
<p> You have chosen to search by ISBN.<p>
  If you wish to search by author
or title, please click on the links below. <p>	
<form method="get" action="isbn.php">
<label> Please enter the 13 digit ISBN including hyphen: </label>
<input type="varchar" name="searchISBN">
<button type="submit">Search</button>
<p>
<a href="searchauthor.php"> Search by Author</a>
<p><a href="searchtitle.php"> Search by Title</a><p>
<p>
<p>
<p><a href="dashboard.php">Dashboard</a></p>
<a href="logout.php">Logout</a>
</form>
</div>
</body>
</html>