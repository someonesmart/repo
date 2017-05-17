<?php
	
	$first = $_GET['first'];
	$last = $_GET['last'];
	$gender = $_GET['gender'];
	$message = $_GET['message'];
	$email = 'jane@doe.com';
	
	$mailmessage = 'You have got a mail from'.$first.' '.$last.'who said: \r\n'.$message;
	$to = 'john@doe.com';
	$subject = 'My website contact form';
	$header = 'From: '$email;
	
	mail($to,$subject,$message,$header);
	header('Location: index.html');
?>
