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

    private const ERROR_HTML_1 = "<p class='enquiry__error'>";
    private const ERROR_HTML_2 = "</p>";

    /**
     * Displays the PHP errors to the user.
     * Based on the field and the reason, it will determine which error(s) to display.
     * 
     * @param string $field - the field name.
     * @param string $reason - the reason the validation failed.
     */
    function show_errors($field, $reason)
    {   

        $field = trim(strtolower($field));
        $reason = trim(strtolower($reason));

        switch ($field) {
            case 'name':
                if ($reason === 'empty') {
                    echo self::ERROR_HTML_1 . self::NAME_ERRORS["NULL"] . self::ERROR_HTML_2; 
                } else {
                    echo self::ERROR_HTML_1 . self::NAME_ERRORS["LENGTH"] . self::ERROR_HTML_2;
                }
                break;

            case 'company':
                echo self::ERROR_HTML_1 . self::COMPANY_ERROR  . self::ERROR_HTML_2;
                break;

            case 'email':
                if ($reason === 'empty') {
                    echo self::ERROR_HTML_1 . self::EMAIL_ERRORS["NULL"] . self::ERROR_HTML_2;
                } else if ($reason === 'length') {
                    echo self::ERROR_HTML_1 . self::EMAIL_ERRORS["LENGTH"] . self::ERROR_HTML_2;
                } else {
                    echo self::ERROR_HTML_1 . self::EMAIL_ERRORS["FORMAT"] . self::ERROR_HTML_2;
                }
                break;

            case 'phone':
                if ($reason === 'empty') {
                    echo self::ERROR_HTML_1 . self::PHONE_ERRORS["NULL"] . self::ERROR_HTML_2;
                } else if ($reason === 'length') {
                    echo self::ERROR_HTML_1 . self::PHONE_ERRORS["LENGTH"] . self::ERROR_HTML_2;
                } else if ($reason === 'nan') {
                    echo self::ERROR_HTML_1 . self::PHONE_ERRORS["NAN"] . self::ERROR_HTML_2;
                } else {
                    echo self::ERROR_HTML_1 . self::PHONE_ERRORS["FORMAT"] . self::ERROR_HTML_2;
                }
                break;

            case 'subject':
                if ($reason === 'empty') {
                    echo self::ERROR_HTML_1 . self::SUBJECT_ERRORS["NULL"] . self::ERROR_HTML_2;
                } else {
                    echo self::ERROR_HTML_1 . self::SUBJECT_ERRORS["LENGTH"] . self::ERROR_HTML_2;
                }
                break;

            case 'message':
                if ($reason === 'empty') {
                    echo self::ERROR_HTML_1 . self::MESSAGE_ERRORS["NULL"] . self::ERROR_HTML_2;
                } else {
                    echo self::ERROR_HTML_1 . self::MESSAGE_ERRORS["LENGTH"] . self::ERROR_HTML_2;
                }
                break;
        } 
    }
}

?>