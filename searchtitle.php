<?php include("auth.php"); //include auth.php file on all secure pages ?>
<!DOCTYPE html>
<html>
<head>
<title> Search by Title</title>
</head>
<meta charset="utf-8">
<link rel="stylesheet" href="style.css" />
<body>
<div class="form">
<p> You have chosen to search by title.<p>
  If you wish to search by author
or ISBN, please click on the links below. <p>	
<form method="get" action="title.php">
<label> Please enter the title of the book </label>
<input type="text" name="searchtitle">
<button type="submit">Search</button>
<p>
<a href="searchauthor.php"> Search by Author</a>
<p><a href="searchISBN.php"> Search by ISBN</a><p>
<p><a href="dashboard.php">Dashboard</a></p>
<a href="logout.php">Logout</a>
</form>
</div>
</body>
</html>