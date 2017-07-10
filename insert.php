<?php

	$name = '';
	$name = $_REQUEST['name'];
	$comments = $_REQUEST['comments'];
	
	require_once('db.php');
	mysqli_query($conn, "insert into comments(name,comments) values('$name','$comments')");
	
	$result = mysqli_query($conn, "select * from comments order by id asc");
	while($row=mysqli_fetch_array($result)) {
		echo "<div class='comments_content'>";
		echo "<h4><a href='delete.php?id=" . $row['id'] . "'> X</a></h4>";
		echo "<h1>" . $row['name'] . "</h1>";
		echo "<h2>" . $row['date_publish'] . "</h2><br><br>";
		echo "<h3>" . $row['comments'] . "</h3>";
		echo "</div>";
	}
	mysqli_close($conn);

?>
