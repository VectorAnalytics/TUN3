<?php include("auth.php"); //include auth.php file on all secure pages ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Dashboard</title>
<link rel="stylesheet" href="style.css" />
</head>
<body>
<div class="form">
<p>Thank you for choosing Bright Bin as your source for used textbooks! <p>
	How would you like to search for your books today <?php echo $_SESSION['username']; ?>?</p>
<p>This is secure area.</p>
<p><a href="searchauthor.php">Search by Author</a></p>
<a href="searchtitle.php"> Search by Title</a>
<p><a href="searchISBN.php"> Search by ISBN</a><p>
<p>
<p><a href="dashboard.php">Member's Home</a></p>
<a href="logout.php">Logout</a>
</div>
</body>
</html>
