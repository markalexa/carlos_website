<?php
	$conn = mysqli_connect("localhost","root","ilovemyself");
	if(mysqli_connect_errno()) {
		echo "Failed to connect to database: " . mysqli_connect_error();
	}
?>
