<?php include("auth.php"); //include auth.php file on all secure pages ?>
<!DOCTYPE html>
<html>
<head>
<title> Search by Author</title>
</head>
<meta charset="utf-8">
<link rel="stylesheet" href="style.css" />
<body>
	<div class="form">
<p> You have chosen to search by author.<p>
  If you wish to search by title
or ISBN, please click on the links below. <p>	
<form method="get" action="author.php">
<label> Please enter the author's name </label>
<input type="text" name="searchauthor">
<button type="submit">Search</button>
<p>
<a href="searchtitle.php"> Search by Title</a>
<p><a href="searchISBN.php"> Search by ISBN</a><p>
<p><a href="dashboard.php">Dashboard</a></p>
<a href="logout.php">Logout</a>
</form>
</div>
</body>
</html>