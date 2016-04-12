<title>Book Description</title>
<!--link rel="stylesheet" href="css/style.css" /-->
<link rel="stylesheet" href="style.css" />
</head>
<body>
<div class="wrapper">
	<div class ="header">
<h1> The Art of War </h1>
</div>
<div class = "content">
	<table border = "1">
 <tr>
 <th> Book Title</th>
 <th> Authors </th>
 <th> ISBN13 </th>
 <th> Price </th>
 <th> Description </th>
 <th> Quantity </th>
 </tr>
<?php
 require('db.php');
//$title = mysql_real_escape_string($_GET ['searchtitle']);
//$author= mysql_real_escape_string($_GET ['searchauthor']);
//$ISBN = mysql_real_escape_string($_GET ['searchISBN']);
//if ($title =='Strengths Finder 2.0'){
$hello = mysql_query("SELECT url, title, author, isbn13, price_sold, book_description, warehouse_quantity
	from book b, inventory i where b.book_id = i.book_id and b.book_id  = 7") or die (mysql_error());
if (mysql_num_rows ($hello) >= 1 ) {
while($results = mysql_fetch_array($hello)){
	//echo '<a href="'.$i['title'].'">' .$i['title'].'</a><p>' .$i['author']. '</p><p>' .$i['isbn13'].'</p>' ;
echo "<tr>";
echo "<td>".$results['title']. "</td>";
echo "<td>" .$results['author']. "</td>";
echo "<td>" .$results['isbn13']. "</td>";
echo "<td>" .$results['price_sold']. "</td>";
echo "<td>" .$results['book_description']. "</td>";
echo "<td>" .$results['warehouse_quantity']. "</td>";
echo "</tr>";
echo "<div class='form'><h3><a href='searchauthor.php'>Search by Author</a></div>";
echo "<div class='form'><h3><a href='searchtitle.php'>Search By Title</a></div>";
echo "<div class='form'><h3><a href='searchisbn.php'>Search By ISBN</a></div>";
}
//else{
//echo "There are no results based on this search. Would you like to try your search again?";
}
//}
?>
</div>