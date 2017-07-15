<?php

	if (isset($_POST['submit'])) {
		require_once('PHPMailer-master/class.phpmailer.php');
		$name = $errorMsg = $sucMsg = $errMsg = "";
		$email = $headers = $subject = $emailErr = $message = "";
	
		function test_input($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;	
		}
		$name = test_input($_POST['fullName']);
		
		if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
			$emailErr = "Your email address is not valid !";		
		} else {
		$email = $_POST['email'];  
		}
		$subject = test_input($_POST['subject']);
		$message = test_input($_POST['message']);	
		$to = "mark.alexa.uk@gmail.com";
		$from = "From: webmaster@ubuntuserver";
		$headers = 'From: '.$email."\r\n".'Reply-To: '.$email."\r\n".'X-Mailer: PHP/'
		.phpversion();
		
	if($emailErr == "") {
			if (mail($to, $subject, $message, $headers)) {
				$sucMsg = "<p>The email was sent successfully !</p>";	
			} else {
				$errMsg = "<p>The email could not be sent !</p>";
			}
	}
	
	}
		
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Get in touch with Carlos</title>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
  	<link href="https://fonts.googleapis.com/css?family=Gloria+Hallelujah" rel="stylesheet">
  	<link href="https://fonts.googleapis.com/css?family=Bahiana|Gloria+Hallelujah" rel="stylesheet">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
  	<link href="animate.min.css" type="text/css" rel="stylesheet">
  	<style>
		body {background-image: url("pics/img3.jpg");background-repeat: no-repeat;background-size: cover;}
		* {padding: 0;margin: 0;}
		li {font-family: 'Bahiana', Verdana;font-size: 40px;}
		#highlight_underline {color: #6699ff;text-decoration: underline;}
		#details {list-style: none; text-align: center; margin-top: 120px;}
		#red {color: red; text-align: center; font-family: 'Gloria Hallelujah', sans-serif;font-size: 50px;}
		#first {font-size: 25px; margin-top: 60px;}
		#details li p {font-family: calibri, arial;font-size: 25px;color: yellow;font-weight: bold;}
		#details li {padding: 20px 5px;}
		#details img:first-child {margin-bottom: 10px;}
		#created {text-decoration: none;color: turquoise;}
		#credits {font-family: arial;font-size: 12;color  <li><a href="upcoming.php">upcoming events</a></li>: white;}
		#hover a:hover {color: #3333ff;}
		#message {padding-bottom: 80px;}		
		#form {margin-bottom: 40px;margin-left: 10px;background: none;padding: 10px 10px;color: turquoise;width: 600px !important;margin-top: 80px;border: 5px solid turquoise;border-radius: 10px;}
		#submit {margin-top: 10px;width: 100%;}
		/*#errMsg {display: none;}
		#successMsg {display: none;}*/
		p {margin-top: 6px;}		
		@media (max-width:400px) {
			#form {margin-left: 10px;background: none;padding: 10px 10px;color: turquoise;width: 300px !important;margin-top: 100px;border: 5px solid turquoise;border-radius: 10px;}
		}
	</style>
</head>
<body>

<nav class="navbar navbar-inverse navbar-fixed-top" id="my-navbar">
<div class="container">
<div class="header">
  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
  <span class="icon-bar"></span>
  <span class="icon-bar"></span>
  <span class="icon-bar"></span>
  </button>
</div>
<div class="collapse navbar-collapse" id="navbar-collapse">
<ul class="nav navbar-nav" id="hover">
  <li><a href="index.html">home</a></li>
  <li><a href="about.html">about me</a></li>
  <li><a href="my_work.html">my work</a></li>
  <li><a href="videogalery.html">Videogalery</a></li>
  <li><a href="contact.html" id="highlight_underline">contact me</a></li>
</ul>
</div>
</div>
</nav>

<div class="container" id="form">

	<!--<div id="successMsg" class="alert alert-success" role="alert">--><?php echo $sucMsg; ?>
	<!--<div id="errMsg" class="alert alert-danger" role="alert">--><?php echo $errMsg; ?>
<form method="POST" action="contact.php">
	<fieldset class="form-group">
		<label for="fullName">Full name</label>
		<input type="text" class="form-control" name="fullName" id="fullName" placeholder="full name" required>
	</fieldset>
	<fieldset class="form-group">
		<label for="email">Email</label>
		<input type="email" id="email" placeholder="email" name="email" class="form-control" required>
		<small id="emailHelp"  class="form-text text-muted">I won't share your email with anyone</small>
	</fieldset>
	<fieldset class="form-group">
		<label for="subject">Subject</label>
		<input type="text" class="form-control" name="subject" id="subject" placeholder="subject" required>	
	</fieldset>
	<fieldset class="form-group">
		<label for="message">Your message</label>
		<input type="text" class="form-control" name="message" id="message" placeholder="message" required>
		
		<input type="submit" id="submit" name="submit" class="btn btn-success" value="Submit">
	
	</fieldset>
</form>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>

</body>
</html>