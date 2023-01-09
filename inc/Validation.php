<?php 

class Validation
{   
    public const IS_EMPTY = "EMPTY";
    public const TOO_LONG = "LENGTH";
    public const NOT_A_NUMBER = "NAN";
    public const FAILED_REGEX = "REGEX";
    public const VALID = "VALID";
    private const EMAIL_REGEX = "/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i";
    private const PHONE_CHAR_REGEX = "/^[\d \-()]*$/";
    private const PHONE_FORMAT_REGEX = "/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/";


    /**
     * Returns an appropriate string based on the state of the input value.
     * 
     * @param string $name - The value of the name input field.
     * 
     * @return string - Can be "EMPTY", "LENGTH" or "VALID".
     */
    function check_name($name)  
    {
        if (empty($name)) {
            return self::IS_EMPTY;
        } else if (strlen($name) > 100) {
            return self::TOO_LONG;
        } else {
            return self::VALID;
        }
    }

    /**
     * Returns an appropriate string based on the state of the input value.
     * Company name is not a required field so an empty string can be valid.
     * 
     * @param string $company - The value of the company name input field.
     * 
     * @return string - Can be "LENGTH" or "VALID". 
     */
    function check_company($company) 
    {
        if (empty($company)) {
            return self::VALID;
        } else if (strlen($company) > 100) {
            return self::TOO_LONG;
        } else {
            return self::VALID;
        }
    }

    /**
     * Returns an appropriate string based on the state of the input value.
     * 
     * @param string $email - The value of the email input field.
     * 
     * @return string - Can be "EMPTY", "LENGTH", "REGEX" or "VALID".
     */
    function check_email($email)
    {
        if (empty($email)) {
            return self::IS_EMPTY;
        } else if (strlen($email) > 320) {
            return self::TOO_LONG;
        } else if (!preg_match(self::EMAIL_REGEX, $email)) {
            return self::FAILED_REGEX;
        } else {
            return self::VALID;
        }
    }

    /**
     * Returns an appropriate string based on the state of the input value.
     * 
     * @param string $phone - The value of the phone input field.
     * 
     * @return string - Can be "EMPTY", "LENGTH", "NAN", "REGEX" or "VALID".
     */
    function check_phone($phone)
    {
        if (empty($phone)) {
            return self::IS_EMPTY;
        } else if (strlen($phone) > 11) {
            return self::TOO_LONG;
        } else if (!is_numeric($phone)) {
            return self::NOT_A_NUMBER;
        } else if (!preg_match(self::PHONE_CHAR_REGEX, $phone)) {
            return self::FAILED_REGEX;
        } else if (!preg_match(self::PHONE_FORMAT_REGEX, $phone)) {
            return self::FAILED_REGEX;
        } else {
            return self::VALID;
        }
    }

    /**
     * Returns an appropriate string based on the state of the input value.
     * 
     * @param string $subject - The value of the subject input field.
     * 
     * @return string - Can be "EMPTY", "LENGTH" or "VALID".
     */
    function check_subject($subject)
    {
        if (empty($subject)) {
            return self::IS_EMPTY;
        } else if (strlen($subject) > 200) {
            return self::TOO_LONG;
        } else {
            return self::VALID;
        }
    }

    /**
     * Returns an appropriate string based on the state of the input value.
     * 
     * @param string $message - The value of the message text area.
     * 
     * @return string - Can be "EMPTY", "LENGTH" or "VALID".
     */
    function check_message($message) 
    {
        if (empty($message)) {
            return self::IS_EMPTY;
        } else if (strlen($message) > 2000) {
            return self::TOO_LONG;
        } else {
            return self::VALID;
        }
    }
    
    /**
     * Returns an appropriate string based on the state of the input value.
     * 
     * @param string $marketing - The value of the marketing input field.
     * 
     * @return string - Can be "EMPTY", "LENGTH" or "VALID".
     */
    function check_marketing($marketing) 
    {
        if (empty($marketing)) {
            return self::IS_EMPTY;
        } else if (strlen($marketing) > 5) {
            return self::TOO_LONG;
        } else {
            return self::VALID;
        }
    }
}

?>
