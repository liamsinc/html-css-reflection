<?php


require("Validation.php");
require("View.php");
require("Functions.php");
require("DatabaseModel.php");

$view = new View();
$util = new Functions();
$validator = new Validation();
$db = new DatabaseModel('localhost', 'netmatters', 'root');

if (isset($_POST)) {
    $name = trim(htmlspecialchars($_POST["name"]));
    $company = trim(htmlspecialchars($_POST["company"]));

    $inputs = filter_input_array(INPUT_POST, [
        "email" => FILTER_SANITIZE_EMAIL,
        "phone" => FILTER_SANITIZE_NUMBER_INT
    ]);

    $email = trim($inputs["email"]);
    $phone = trim($inputs["phone"]);
    
    $subject = trim(htmlspecialchars($_POST["subject"]));
    $message = trim(htmlspecialchars($_POST["message"]));
    $marketing = trim(htmlspecialchars($_POST["marketing"]));

    $inputValues = array($name, $company, $email, $phone, $subject, $message, $marketing);

    $results = $util->validate($inputValues, $validator);

    $formValid = $util->error_handler($results, $view, $validator);

    if ($formValid) {
        $db->insert($inputValues);
    } else {
        echo "Form invalid.";
    }

    
}


?>