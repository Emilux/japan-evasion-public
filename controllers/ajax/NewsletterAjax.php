<?php

$newsletter = new Newsletter();  


$name_newsletter = $_POST['name'];
$email_newsletter = $_POST['email'];



$newsletter->setName($name_newsletter);

$newsletter->setEmail($email_newsletter);

$result = $newsletter->AddNewsletter();
echo json_encode($result);


