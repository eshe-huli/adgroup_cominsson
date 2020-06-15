<?php
$errors = [];
$name = $_POST[‘name’] || false;
$myemail = "contact@adgroupe.io";
$appName = "commingSoon Application";
$message = $_POST[‘message’] || false;
$email_address = $_POST[’email’] || false;
$validEmailChecker = “/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i”;

if(!$email)
	$errors['email'] = "l'addresse Email est requise";
 if(!$message)
	$errors['message'] = "le Message est requis");
if (!preg_match($validEmailChecker, $email_address))
	$errors['email_invalid'] = "Addresse email invalide");

if(!empty($errors)) {
	$to = $myemail;
	$subject = "Contact form submission: ${name}";
	$body = "You have received a new message from ${appName}.\n
	  Here are the details:\n
	  Name: ${name} \n.
	  Email: ${email_address}\n
	  Message:\n
	  \t$message";
	$headers = "From: ${myemail}\n";
	$headers .= "Reply-To: ${email_address}";

	mail($to,$subject,$body,$headers);
}
header("Location: ./index.html");
