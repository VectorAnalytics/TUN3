<?php include("auth.php"); //include auth.php file on all secure pages ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Search By Author</title>
<link rel="stylesheet" href="style.css" />
</head>
<body>
<?php
require('db.php');
$author = mysql_real_escape_string($_GET ['searchauthor']);
// if no title was entered in search
if(empty($author)) 
{
echo "You must enter something to search.";
echo "<div class='form'><h3><a href='searchauthor.php'>Search by Author</a></div>";
echo "<div class='form'><h3><a href='searchtitle.php'>Search By Title</a></div>";
echo "<div class='form'><h3><a href='searchisbn.php'>Search By ISBN</a></div>";
}
else // something was entered in the title search
{
$hello = mysql_query("SELECT url, title, author, isbn13, price_sold, book_description from book where author like '%$author%'") or die (mysql_error());
	if (mysql_num_rows ($hello) < 1 ) // if there is nothing in MYSQL to match the title entered
	{
	echo "<div class='form'><h3>Oops, there were no results based on that search.</h3><br/></div>";
	echo "<div class='form'><h3>Want to try one of these options:</h3><br/></div>";
	echo "<div class='form'><h3><a href='searchauthor.php'>Search by Author</a></div>";
	echo "<div class='form'><h3><a href='searchtitle.php'>Search By Title</a></div>";
	echo "<div class='form'><h3><a href='searchisbn.php'>Search By ISBN</a></div>";
	}
	else // there are matches to the title entered in MYSQL
	{
	?>
	<div class="form">
	<title>Book Search by Author</title>
	<link rel="stylesheet" href="style.css" />
	<body>
	<h1> Book Search by Author Results </h1>
	<table border = "1">
	 <tr>
	 <th> Book Title</th>
	 <th> Authors </th>
	 <th> ISBN13 </th>
	 <th> Price </th>
	 </tr>
	</div>
	<?php
	while($results = mysql_fetch_array($hello))
	{
	echo "<tr>";
	echo "<td> <a href= ".$results['url']."> ".$results['title']."</a></td>";
	echo "<td>" .$results['author']. "</td>";
	echo "<td>" .$results['isbn13']. "</td>";
	echo "<td>" .$results['price_sold']. "</td>";
	echo "</tr>";
	
	
	//<p><a href="searchISBN.php"> Search by ISBN</a><p>
	//<a href="logout.php">Logout</a>
	}echo "<div class='form'><h3><a href='searchauthor.php'>Search by Author</a></div>";
	echo "<div class='form'><h3><a href='searchtitle.php'>Search By Title</a></div>";
	echo "<div class='form'><h3><a href='searchisbn.php'>Search By ISBN</a></div>";
	//echo "<p><a href=searchauthor.php>Search by Author</a></p>";
	//echo "<a href='searchtitle.php> Search by Title</a>";
	
}
}

?>
</body>
</html>