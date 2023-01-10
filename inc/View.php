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
    private const SUCCESS_HTML = "<p class='enquiry__success'>Enquiry sent successfully!</p>";

    private const NEWS_HTML_1 = "<div class='news__item ni-1'>
                                    <div class='news__type'>
                                        <p id='news__type-1'>Careers</p>
                                    </div>
                                    <div>
                                        <div class='news__img__container'>
                                            <img src='img/news-1.jpg' alt='news item'>
                                        </div>
                                        <div class='news__content'>
                                            <h3 class='news__title'>
                                                Experienced Web Developer / Team Leader
                                            </h3>
                                            <p>
                                                Salary Range £28-50K DOE + Bonus + Benefits 
                                                Hours 40 per week, Mon - Fri. Flexible working hou...
                                            </p>
                                            <button class='news__button'>Read More</button>
                                            <div class='news__footer'>
                                                <div class='news__author__img'>
                                                    <img src='img/news-author-image-2.jpg' alt='news author'>
                                                </div>
                                                <div class='news__author__msg'>
                                                    <p class='news__author__msg__head'>Posted by Simon Wright</p>
                                                    <p class='news__author__msg__date'>22nd September 2022</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>"
    ;

    private const NEWS_HTML_2 = "<div class='news__item ni-2'>
                                    <div class='news__type'>
                                        <p id='news__type-2'>Technologies</p>
                                    </div>
                                    <div>
                                        <div class='news__img__container'>
                                            <img src='img/news-2.jpg' alt='news image'>
                                        </div>
                                        <div class='news__content'>
                                            <h3 class='news__title'>Shopify Explained: Why You Should Be Building...</h3>
                                            <p>
                                                Shopify is an all-in-one eCommerce website-building platform 
                                                that allows users to run, start and gro...
                                            </p>
                                            <button class='news__button'>Read More</button>
                                            <div class='news__footer'>
                                                <div class='news__author__img'>
                                                    <img src='img/news-author-image-1.jpg' alt='news author'>
                                                </div>
                                                <div class='news__author__msg'>
                                                    <p class='news__author__msg__head'>Posted by Netmatters</p>
                                                    <p class='news__author__msg__date'>21st September 2022</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>"
    ;

    private const NEWS_HTML_3 = "<div class='news__item ni-3'>
                                    <div class='news__type'>
                                        <p id='news__type-3'>News</p>
                                    </div>
                                    <div>
                                        <div class='news__img__container'>
                                            <img src='img/news-3.jpg' alt='news image'>
                                        </div>
                                        <div class='news__content'>
                                            <h3 class='news__title'>Chris Waldie - Netmatters 5 Year Legend</h3>
                                            <p>
                                                The Netmatters team would like to congratulate Chris Waldie on joining  
                                                our ever-growing list of 'Leg...
                                            </p>
                                            <button class='news__button'>Read More</button>
                                            <div class='news__footer'>
                                                <div class='news__author__img'>
                                                    <img src='img/news-author-image-1.jpg' alt='news author'>
                                                </div>
                                                <div class='news__author__msg'>
                                                    <p class='news__author__msg__head'>Posted by Netmatters</p>
                                                    <p class='news__author__msg__date'>16th September 2022</p>
                                                </div>
                                            </div>
                                        </div> 
                                    </div>
                                </div>"
    ;

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

    /**
     * Displays a success message to the user.
     */
    function show_success()
    {
        echo self::SUCCESS_HTML;
    }


    function show_news()
    {
        echo self::NEWS_HTML_1;
        echo self::NEWS_HTML_2;
        echo self::NEWS_HTML_3;
    }
}

?>