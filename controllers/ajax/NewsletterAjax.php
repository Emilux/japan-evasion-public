<?php

$newsletter = new Newsletter();  


$name_newsletter = $_POST['name'];
$email_newsletter = $_POST['email'];


$msg = "Hi ".$name_newsletter. "\nThank you for subscribing to our newsletter!";
mail($email_newsletter,"The message", $msg);

$newsletter->setName($name_newsletter);

$newsletter->setEmail($email_newsletter);

$result = $newsletter->AddNewsletter();
echo json_encode($result);


