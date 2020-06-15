<?php
$errors = [];
$myemail = "info@adgroupe.io";
$name = $_POST[‘name’] || false;
$message = $_POST[‘message’] || false;
$email_address = $_POST[’email’] || false;
$validEmailChecker = “/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i”;

if(!$email)
	$errors['email'] = "Email is required";
 if(!$message)
	$errors['message'] = "Message is required");
if (!preg_match($validEmailChecker, $email_address))
	$errors['email_invalid'] = "Invalid email address");

if(!empty($errors)) {
	$to = $myemail;
	$subject = "Contact form submission: ${name}";
	$body = "You have received a new message.\n
	  Here are the details:\n
	  Name: ${name} \n.
	  Email: ${email_address}\n
	  Message:\n
	  $message";
	$headers = "From: ${myemail}\n";
	$headers .= "Reply-To: ${email_address}";

	mail($to,$subject,$body,$headers);

}
	header("Location: ./index.html");
