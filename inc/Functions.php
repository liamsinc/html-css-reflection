<?php

class Functions
{   
    /**
     * Handles any errors and determines validity of form.
     * If the errors array is empty, $formValid will remain true and that will be returned.
     * If the errors array contains values, it will determine the invalid field, and the reason it failed.
     * It then sets $formValid to false, and calls a method of the $validator object which shows the PHP errors.
     * 
     * @param array $errors - An array containing any errors. Can be empty.
     * @param object $view - An instance of the View class. Used to call a method.
     * @param object $validator - An instance of the Validator class. Used to retrieve properties.
     * 
     * @return boolean $formValid - A boolean indicating if the form is valid.
     */
    function error_handler ($errors, $view, $validator)
    {   
        $formValid = true;
        foreach ($errors as $index => $value) {
            switch($index) {
                case 0:
                    if ($value === $validator::IS_EMPTY) {
                        $formValid = false;
                        $view->show_errors('name', 'empty');
                    } else if ($value === $validator::TOO_LONG){
                        $formValid = false;
                        $view->show_errors('name', 'length');
                    }
                    break;
                case 1:
                    if ($value === $validator::TOO_LONG) {
                        $formValid = false;
                        $view->show_errors('subject', 'length');
                    }
                    break;
                case 2:
                    if ($value === $validator::IS_EMPTY) {
                        $formValid = false;
                        $view->show_errors('email', 'empty');
                    } else if ($value === $validator::TOO_LONG){
                        $formValid = false;
                        $view->show_errors('email', 'length');
                    } else if ($value === $validator::FAILED_REGEX) {
                        $formValid = false;
                        $view->show_errors('email', 'format');
                    }
                    break;
                case 3:
                    if ($value === $validator::IS_EMPTY) {
                        $formValid = false;
                        $view->show_errors('phone', 'empty');
                    } else if ($value === $validator::TOO_LONG) {
                        $formValid = false;
                        $view->show_errors('phone', 'length');
                    } else if ($value === $validator::NOT_A_NUMBER) {
                        $formValid = false;
                        $view->show_errors('phone', 'nan');
                    } else if ($value === $validator::FAILED_REGEX) {
                        $formValid = false;
                        $view->show_errors('phone', 'format');
                    }
                    break;
                case 4:
                    if ($value === $validator::IS_EMPTY) {
                        $formValid = false;
                        $view->show_errors('subject', 'empty');
                    } else if ($value === $validator::TOO_LONG){
                        $formValid = false;
                        $view->show_errors('subject', 'length');
                    }
                    break;
                case 5:
                    if ($value === $validator::IS_EMPTY) {
                        $formValid = false;
                        $view->show_errors('message', 'empty');
                    } else if ($value === $validator::TOO_LONG){
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
     * @param object $validator - An instance of the Validator class. Used to call methods.
     * 
     * @return array $results - An array of strings containing validation results.
     */
    function validate($inputValues, $validator) 
    {   
        $results = array();

        foreach($inputValues as $index => $value) {
            switch($index) {
                case 0:
                    $res = $validator->check_name($value);
                    array_push($results, $res);
                    break;
                case 1:
                    $res = $validator->check_company($value);
                    array_push($results, $res);
                    break;
                case 2:
                    $res = $validator->check_email($value);
                    array_push($results, $res);
                    break;
                case 3:
                    $res = $validator->check_phone($value);
                    array_push($results, $res);
                    break;
                case 4:
                    $res = $validator->check_subject($value);
                    array_push($results, $res);
                    break;
                case 5:
                    $res = $validator->check_message($value);
                    array_push($results, $res);
                    break;
            }
        }
        return $results;
    }
}

?>