<?php

class Functions
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

    /**
     * Handles any errors and determines validity of form.
     * If the errors array is empty, $formValid will remain true and that will be returned.
     * If the errors array contains values, it will determine the invalid field, and the reason it failed.
     * It then sets $formValid to false, and calls a method of the $validator object which shows the PHP errors.
     * 
     * @param array $errors - An array containing any errors. Can be empty.
     * @param object $view - An instance of the View class. Used to call a method.
     * 
     * @return boolean $formValid - A boolean indicating if the form is valid.
     */
    function error_handler ($errors, $view)
    {   
        $formValid = true;
        foreach ($errors as $index => $value) {
            switch($index) {
                case 0:
                    if ($value === self::IS_EMPTY) {
                        $formValid = false;
                        $view->show_errors('name', 'empty');
                    } else if ($value === self::TOO_LONG){
                        $formValid = false;
                        $view->show_errors('name', 'length');
                    }
                    break;
                case 1:
                    if ($value === self::TOO_LONG) {
                        $formValid = false;
                        $view->show_errors('subject', 'length');
                    }
                    break;
                case 2:
                    if ($value === self::IS_EMPTY) {
                        $formValid = false;
                        $view->show_errors('email', 'empty');
                    } else if ($value === self::TOO_LONG){
                        $formValid = false;
                        $view->show_errors('email', 'length');
                    } else if ($value === self::FAILED_REGEX) {
                        $formValid = false;
                        $view->show_errors('email', 'format');
                    }
                    break;
                case 3:
                    if ($value === self::IS_EMPTY) {
                        $formValid = false;
                        $view->show_errors('phone', 'empty');
                    } else if ($value === self::TOO_LONG) {
                        $formValid = false;
                        $view->show_errors('phone', 'length');
                    } else if ($value === self::NOT_A_NUMBER) {
                        $formValid = false;
                        $view->show_errors('phone', 'nan');
                    } else if ($value === self::FAILED_REGEX) {
                        $formValid = false;
                        $view->show_errors('phone', 'format');
                    }
                    break;
                case 4:
                    if ($value === self::IS_EMPTY) {
                        $formValid = false;
                        $view->show_errors('subject', 'empty');
                    } else if ($value === self::TOO_LONG){
                        $formValid = false;
                        $view->show_errors('subject', 'length');
                    }
                    break;
                case 5:
                    if ($value === self::IS_EMPTY) {
                        $formValid = false;
                        $view->show_errors('message', 'empty');
                    } else if ($value === self::TOO_LONG){
                        $formValid = false;
                        $view->show_errors('message', 'length');
                    }
                    break;
            }
        }
        return $formValid;
    }

    /**
     * Takes an array of values and for each value, calls the relevant validation method.
     * Pushes the result ($res) to the $results array.
     * 
     * @param array $inputValues - An array containing the filtered form inputs.
     * 
     * @return array $results - An array of strings containing validation results.
     */
    function validate($inputValues)
    {   
        $results = array();

        foreach($inputValues as $index => $value) {
            switch($index) {
                case 0:
                    $res = $this->check_name($value);
                    array_push($results, $res);
                    break;
                case 1:
                    $res = $this->check_company($value);
                    array_push($results, $res);
                    break;
                case 2:
                    $res = $this->check_email($value);
                    array_push($results, $res);
                    break;
                case 3:
                    $res = $this->check_phone($value);
                    array_push($results, $res);
                    break;
                case 4:
                    $res = $this->check_subject($value);
                    array_push($results, $res);
                    break;
                case 5:
                    $res = $this->check_message($value);
                    array_push($results, $res);
                    break;
            }
        }
        return $results;
    }
}

?>