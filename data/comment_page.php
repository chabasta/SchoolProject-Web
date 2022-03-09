<?php
if (isset($_GET['lang'])) {
	$lang= $_GET['lang'];
}
else{
	$lang= '';
}


if (isset($_GET['p'])) {   // check if isset get parametr and write it to page veriable  
  	$page = (int) $_GET['p']; // change type to int 
} 
else {
  	$page = 1; // set 1 as default 
}
$comments = array(); 
$comments_on_page = 3; // count of rows on page
$max_pages= 0;
$count_query = mysqli_query($mysqli, "SELECT count(*) AS comments_count FROM comments WHERE language LIKE '%".$lang."%'"); // find count of all rows
$row = mysqli_fetch_assoc($count_query);

if ($row['comments_count'] > 0) {

  	$max_pages = ceil($row['comments_count'] / $comments_on_page); // Calculate the maximum number of pages and round up with ceil () function

  	if ($page > $max_pages || $page <= 0) {
  		$page= 1;


  	}

	$select_from = $comments_on_page * ($page - 1); // number of row to select from 
	$select_to = $select_from + $comments_on_page; //  number of row to select to

	if ($select_to > $row['comments_count']) { // if select to variable is bigger than amount of all rows 

	  $select_to = $row['comments_count']; // if true , set max index 
	}

	$number_of_rows = $select_to - $select_from; // count of rows on actual page 

	$result_query = mysqli_query($mysqli, "SELECT user.username, comments.topic, comments.comment, comments.cas FROM comments LEFT JOIN user  ON comments.user_id=user.id WHERE comments.language LIKE '%".$lang."%' ORDER BY comments.id DESC LIMIT ". $select_from .",". $number_of_rows."  "); //final query 

	while ($data = mysqli_fetch_assoc($result_query)){ //write comments array
		$comments[]= $data;
	}
}
?>