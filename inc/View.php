<?php 

class View
{
    private const NAME_ERRORS = array(
        "NULL" => "The name field is required.",
        "LENGTH" => "The name field cannot exceed 100 characters."
    );

    private const COMPANY_ERROR = "The company field cannot exceed 100 characters.";

    private const EMAIL_ERRORS = array(
        "NULL" => "The email field is required.",
        "LENGTH" => "The email field cannot exceed 320 characters.",
        "FORMAT" => "The email field must be in the correct format."
    );

    private const PHONE_ERRORS = array(
        "NULL" => "The phone field is required.",
        "LENGTH" => "The phone field cannot exceed 11 characters.",
        "NAN" => "The phone field only accepts numbers.",
        "FORMAT" => "The phone field must be in the correct format."
    );

    private const SUBJECT_ERRORS = array(
        "NULL" => "The subject field is required.",
        "LENGTH" => "The subject field cannot exceed 200 characters."
    );

    private const MESSAGE_ERRORS = array(
        "NULL" => "The message field is required.",
        "LENGTH" => "The message field cannot exceed 2000 characters."
    );


    function show_errors($field, $reason)
    {   

        $field = trim(strtolower($field));
        $reason = trim(strtolower($reason));

        switch ($field) {
            case 'name':
                if ($reason === 'empty') {
                    echo self::NAME_ERRORS["NULL"]; 
                } else {
                    echo self::NAME_ERRORS["LENGTH"];
                }
                break;

            case 'company':
                echo self::COMPANY_ERROR;
                break;

            case 'email':
                if ($reason === 'empty') {
                    echo self::EMAIL_ERRORS["NULL"];
                } else if ($reason === 'length') {
                    echo self::EMAIL_ERRORS["LENGTH"];
                } else {
                    echo self::EMAIL_ERRORS["FORMAT"];
                }
                break;

            case 'phone':
                if ($reason === 'empty') {
                    echo self::PHONE_ERRORS["NULL"];
                } else if ($reason === 'length') {
                    echo self::PHONE_ERRORS["LENGTH"];
                } else if ($reason === 'nan') {
                    echo self::PHONE_ERRORS["NAN"];
                } else {
                    echo self::PHONE_ERRORS["FORMAT"];
                }
                break;

            case 'subject':
                if ($reason === 'empty') {
                    echo self::SUBJECT_ERRORS["NULL"];
                } else {
                    echo self::SUBJECT_ERRORS["LENGTH"];
                }
                break;

            case 'message':
                if ($reason === 'empty') {
                    echo self::MESSAGE_ERRORS["NULL"];
                } else {
                    echo self::MESSAGE_ERRORS["LENGTH"];
                }
                break;
        } 
    }
}

?>