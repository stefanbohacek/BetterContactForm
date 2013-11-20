<?php
	function str_sanitize($str, $allow_nl){
/*
	Function for preventing email header injection. Feel free to modify this code if you know what you are doing.
*/
		$remove = array("%0A", "%0D", "%0a", "%0d");

		if (!$allow_nl){
		//	New line characters are allowed in message body, otherwise stripped
			array_push($remove, "\r", "\n");
		}
		$str = str_replace($remove, "", $str);
		//	HTML tags are stripped
		$str = strip_tags($str);
	    return $str;
	}

	if (isset($_POST['name']))
		$name = str_sanitize($_POST['name'], false);
	else
		$name = "Name not provided";

	if (isset($_POST['email'])) 
		$email = str_sanitize($_POST['email'], false);
	else
		$email = "Contact not provided";

	if (isset($_POST['message']))
		$message = str_sanitize($_POST['message'], true);
	else
		$message = "No message";

	$trap = $_POST['fullname'];
	$trap == '' or die("");
	$formcontent="A message from $name ($email)\n$message";
	//	Change $recipient to your email
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
			$confirmation = "Your email to " . $recipient . " has been sent. Here is a copy of your message:\n" . $message;
			mail($email, "Your message to " . $recipient . " was delivered", $confirmation, $mailheader);
		}	
	}else{
		die("Your message could not be sent. Sorry.<br/><a hef='http://YOURSITE.COM' title='Return'>Return to the main page</a>");
	}		
	echo "Your message was sent.<br/><a href=\"http://YOURSITE.COM\">Return to the main page</a>.";
?>