<?php

header('location: ../contact.php');

$filteredInputs = filter_input_array(INPUT_POST, [
    "phone" => FILTER_SANITIZE_NUMBER_INT,
    "email" => FILTER_SANITIZE_EMAIL
]);

$phone = $filteredInputs["phone"];
$email = $filteredInputs["email"];

/*
I would have filtered all the inputs using filter_input / filter_input_array functions but
the FILTER_SANITIZE_STRING flag has been depreceated. Using htmlspecialchars for inputs where 
that flag would have been used.
*/ 

$name = htmlspecialchars($_POST["name"]);
$company = htmlspecialchars($_POST["company"]); 
$subject = htmlspecialchars($_POST["subject"]);
$message = htmlspecialchars($_POST["message"]);
$marketing = htmlspecialchars($_POST["marketing"]);

$inputs = array($name, $company, $email, $phone, $subject, $message, $marketing);

var_dump($inputs);

for ($i = 0; $i < count($inputs); $i++) {
    echo $inputs[$i] . "<br>";
}






?>