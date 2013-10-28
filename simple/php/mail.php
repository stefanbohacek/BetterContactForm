<?php
	$name = $_POST['name'];
	$email = $_POST['email'];
	$message = $_POST['message'];
	$trap = $_POST['fullname'];
	$trap == '' or die();
	$formcontent="A message from $name ($email)\n$message";
	$recipient = "your@email.com";
	$subject = "A message from $name ($email)";
	$mailheader = "From: $email \r\n";
/*
	Either set the header below to yoursite.com or delete this comment to redirect to the mail.php
	header("Location: //yoursite.com");	
*/
	$mailsent = mail($recipient, $subject, $formcontent, $mailheader);
	if ($mailsent){
		if(filter_var($email, FILTER_VALIDATE_EMAIL)){
			$confirmation = "Your email to YOUR@EMAIL.COM has been sent. Here is a copy of your message:\n" . $message;
			mail($email, "Your message to " . $recipient . " was delivered", $confirmation, $mailheader);
		}	
	}else{
		die("Your message could not be sent. Sorry.<br/><a hef='http://YOURSITE.COM' title='Return'>Return to the main page</a>");
	}		
	echo "Your message was sent.<br/><a href=\"http://YOURSITE.COM\">Return to the main page</a>.";
?>

