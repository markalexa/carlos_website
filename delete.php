<?php
		require_once('db.php');
		
		if(isset($_GET['id'])) {
			$id = $_GET['id'];
			mysqli_query($conn, "delete from comments where id='$id'");
			header("location: index.php");
		}
		mysqli_close($conn);
?>
