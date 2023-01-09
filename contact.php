<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us | Netmatters</title>
    <script src="https://kit.fontawesome.com/99c00af02e.js" crossorigin="anonymous"></script>
    <script src="https://cookieconsent.popupsmart.com/src/js/popper.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="img/favicon.ico">
</head>
<body>
    <div class="page-container">
        <div class="overlay"></div>
        <div class="main__content">
            <?php require "inc/header.php"; ?>

            <section class="breadcrumb__section">
                <div class="breadcrumb__wrapper container">
                    <p class="breadcrumb__text">
                        <a class="breadcrumb__link" href="index.php">Home</a>
                        &nbsp;/&nbsp; Our Offices
                    </p> 
                </div>
            </section>

            <section class="xs__heading__section">
                <div class="xs__heading__wrapper container">
                    <h2 class="xs__heading__title">Our Offices</h2>  
                </div>
            </section>

            <section class="xl__heading__section">
                <div class="xl__heading__wrapper container">
                    <h2 class="xl__heading__title">Our Offices</h2>  
                </div>
            </section>

            <section class="location__section">
                <div class="location__wrapper container">
                    <div class="location__group">
                        <div class="location__item">
                            <img src="img/cambridge.jpg" alt="Cambridge Office">
                            <div class="location__content">
                                <p class="location__title"><a href="#">Cambridge Office</a></p>
                                <ul class="location__address">
                                    <li>Unit 1.31,</li>
                                    <li>St John's Innovation Centre,</li>
                                    <li>Cowley Road, Milton,</li>
                                    <li>Cambridge,</li>
                                    <li>CB4 0WS</li>
                                </ul>
                                <a class="location__phone" href="tel:01223375772">01223 37 57 72</a>
                                <br>
                                <button class="location__btn">View More</button>
                            </div>
                        </div>
                        <div class="location__map">
                            <img src="img/cambridge-map.png" alt="Cambridge Office Location">
                            <img src="img/cambridge-map-square.png" alt="Cambridge Office Location">
                        </div>
                    </div>
                    <div class="location__group">
                        <div class="location__item">
                            <img src="img/wymondham.jpg" alt="Wymondham Office">
                            <div class="location__content">
                                <p class="location__title"><a href="#">Wymondham Office</a></p>
                                <ul class="location__address">
                                    <li>Unit 15,</li>
                                    <li>Penfold Drive,</li>
                                    <li>Gateway 11 Business Park,</li>
                                    <li>Wymondham, Norfolk,</li>
                                    <li>NR18 0WZ</li>
                                </ul>
                                <a class="location__phone" href="tel:01603704020">01603 70 40 20</a>
                                <br>
                                <button class="location__btn">View More</button>
                            </div>
                        </div>
                        <div class="location__map">
                            <img src="img/wymondham-map.png" alt="Wymondham Office Location">
                            <img src="img/wymondham-map-square.png" alt="Wymondham Office Location">
                        </div>
                    </div>
                    <div class="location__group">
                        <div class="location__item">
                            <img src="img/yarmouth.jpg" alt="Great Yarmouth Office">
                            <div class="location__content">
                                <p class="location__title"><a href="#">Great Yarmouth Office</a></p>
                                <ul class="location__address">
                                    <li>Suite F23,</li>
                                    <li>Beacon Innovation Centre,</li>
                                    <li>Beacon Park, Gorleston,</li>
                                    <li>Great Yarmouth, Norfolk,</li>
                                    <li>NR31 7RA</li>
                                </ul>
                                <a class="location__phone" href="tel:01493603204">01493 60 32 04</a>
                                <br>
                                <button class="location__btn">View More</button>
                            </div>
                        </div>
                        <div class="location__map">
                            <img src="img/yarmouth-map.png" alt="Great Yarmouth Office Location">
                            <img src="img/yarmouth-map-square.png" alt="Great Yarmouth Office Location">
                        </div>
                    </div>
                </div>
            </section>

            <div class="info__form__container container">
                <section class="info__section">
                    <div class="info__wrapper">
                        <div class="info__content">
                            <p class="info__text">Email us on:</p>
                            <a class="info__email" href="mailto:sales@netmatters.com">sales@netmatters.com</a>
                            <p class="info__text">Business hours:</p>
                            <p class="info__text">Monday - Friday 07:00 - 18:00</p>
                        </div>
                        <p class="info__btn">Out of Hours IT Support <i class="fa-solid fa-chevron-down"></i></p>
                        <div class="info__dropdown">
                            <p class="info__text">Netmatters IT are offering an Out of Hours service for Emergency and Critical tasks.</p>
                            <p class="info__hours">Monday - Friday 18:00 - 22:00</p>
                            <p class="info__hours">Saturday 08:00 - 16:00</p>
                            <p class="info__hours">Sunday 10:00 - 18:00</p>
                            <p class="info__text">
                                To log a critical task, you will need to call our main line number and select Option 2 to leave an Out of Hours voicemail.
                                A technician will contact you on the number provided within 45 minutes of your call.
                            </p>
                        </div>
                    </div>
                </section>

                <section class="enquiry__section">
                    <div class="enquiry__wrapper">
                        <form class="enquiry__form" action="contact.php" method="post">

                        <?php
                        require("inc/Validation.php");
                        require("inc/View.php");
                        require("inc/Functions.php");
                        require("inc/DatabaseModel.php");
                        
                        $view = new View();
                        $util = new Functions();
                        $validator = new Validation();
                        $db = new DatabaseModel('localhost', 'netmatters', 'root');

                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            if (isset($_POST)) {
                                $name = trim(htmlspecialchars($_POST["e-fname"]));
                                $company = trim(htmlspecialchars($_POST["e-cname"]));
                            
                                $inputs = filter_input_array(INPUT_POST, [
                                    "e-email" => FILTER_SANITIZE_EMAIL,
                                    "e-phone" => FILTER_SANITIZE_NUMBER_INT
                                ]);
                            
                                $email = trim($inputs["e-email"]);
                                $phone = trim($inputs["e-phone"]);
                                
                                $subject = trim(htmlspecialchars($_POST["e-subject"]));
                                $message = trim(htmlspecialchars($_POST["e-message"]));

                                // Will be empty if JS disabled:
                                $marketing = trim(htmlspecialchars($_POST["e-checkbox-input"]));

                                // If JS is disabled extrapolate if the checkbox is ticked.
                                if ($marketing === "") {
                                    if (isset($_POST["e-checkbox"])) {
                                        $marketing = "true";
                                    } else {
                                        $marketing = "false";
                                    }
                                }
                                
                                $inputValues = array($name, $company, $email, $phone, $subject, $message, $marketing);
                            
                                $results = $util->validate($inputValues, $validator);
                            
                                $formValid = $util->error_handler($results, $view, $validator);
                            
                                if ($formValid) {
                                    $db->insert($inputValues);
                                }
                            }
                        }
                        ?>
                            <div class="enquiry_group enquiry__group-flex">
                                <div class="enquiry__group-inner">
                                    <label for="e-fname" class="enquiry__label required">Your Name</label>
                                    <input type="text" id="e-fname" name="e-fname" class="enquiry__input">
                                </div>
                                <div class="enquiry__group-inner">
                                    <label for="e-cname" class="enquiry__label">Company Name</label>
                                    <input type="text" id="e-cname" name="e-cname" class="enquiry__input">
                                </div>
                            </div>
                            <div class="enquiry_group enquiry__group-flex">
                                <div class="enquiry__group-inner">
                                    <label for="e-email" class="enquiry__label required">Your Email</label>
                                    <input type="text" id="e-email" name="e-email" class="enquiry__input">
                                </div>
                                <div class="enquiry__group-inner">
                                    <label for="e-phone" class="enquiry__label required">Your Telephone Number</label>
                                    <input type="text" id="e-phone" name="e-phone" class="enquiry__input">
                                </div>
                            </div>
                            <div class="enquiry_group">
                                <label for="e-subject" class="enquiry__label required">Subject</label>
                                <input type="text" id="e-subject" name="e-subject" class="enquiry__input">
                                <label for="e-message" class="enquiry__label required">Message</label>
                                <textarea cols="50" rows="5" id="e-message" name="e-message" class="enquiry__area"></textarea>
                            </div>
                            <div class="enquiry_group">
                            <div class="enquriy__checkbox">
                                    <input class="enquiry__check" type="checkbox" id="e-checkbox" name="e-checkbox" value="True">
                                    <input type="hidden" type="text" id="e-checkbox-input" name="e-checkbox-input">
                                    <i class="fa-solid fa-check checkbox-tick"></i>
                                </div>
                                <div class="enquiry__text">
                                    <label class="marketing__label-1" for="checkbox-2">Please tick this box if you wish to receive marketing information from us.</label>
                                    <label class="marketing__label-2">Please see our <a class="form__link" href="#">Privacy Policy</a> for more information on how we keep your data safe.</label>
                                </div>
                            </div>
                            <div class="enquiry__group enquiry__group-inline">
                                <input type="submit" id="e-submit">
                                <p class="enquiry__required"> Fields Required</p>
                            </div>
                        </form>
                    </div>
                </section>

                <!-- <section class="form__section">
                    <div class="form__wrapper">
                        <form class="form__form" method="post" action="inc/test.php">
                            <div class="form__group-2 form__group-2-flex">
                                <div class="form__input__group">
                                    <label for="name" class="form__label required">Your Name</label>
                                    <input type="text" id="name" class="form__input" name="name" value="">
                                </div>
                                <div class="form__input__group">
                                    <label for="company" class="form__label">Company Name</label>
                                    <input type="text" id="company" class="form__input" name="company" value="">
                                </div>
                            </div>
                            <div class="form__group-2 form__group-2-flex">
                                <div class="form__input__group">
                                    <label for="email" class="form__label required">Your Email</label>
                                    <input type="text" id="email" class="form__input" name="email" value="">
                                </div>
                                <div class="form__input__group">
                                    <label for="phone" class="form__label required">Your Telephone Number</label>
                                    <input type="tel" id="phone" class="form__input" name="phone" value="">
                                </div>
                            </div>
                            <div class="form__group-2">
                                <label for="subject" class="form__label required">Subject</label>
                                <input type="text" id="subject" class="form__input" name="subject" value="">
                                <label for="message" class="form__label required">Message</label>
                                <textarea cols="50" rows="10" id="message" class="form__input form__input-message" name="message" value=""></textarea>
                            </div>
                            <div class="form__group-2">
                                <div class="marketing__wrapper">
                                    <div class="marketing__checkbox">
                                        <input class="form__checkbox" type="checkbox" id="checkbox-2">
                                        <input type="hidden" type="text" id="checkbox-2-input" name="marketing" value="">
                                        <i class="fa-solid fa-check checkbox-tick"></i>
                                    </div>
                                    <div class="marketing__text">
                                        <label class="marketing__label-1" for="checkbox-2">Please tick this box if you wish to receive marketing information from us.</label>
                                        <label class="marketing__label-2">Please see our <a class="form__link" href="#">Privacy Policy</a> for more information on how we keep your data safe.</label>
                                    </div>
                                </div> 
                                <div class="form__group-2 form__group-2-inline">
                                    <input class="form__button-2" type="submit" name="submit" value="Send Enquiry">
                                    <p class="enquiry__required"> Fields Required</p>
                                </div>
                            </div>
                        </form>
                    </div>
                </section> -->
            </div>

            <?php
                require "inc/newsletter.php";
                require "inc/footer.php"; 
            ?>
        </div>
        <?php require "inc/sidemenu.php"; ?>
    </div>
    <script src="js/jquery-3.6.1.min.js"></script>
    <script type="module" src="js/index.js"></script>
    <script type="module" src="js/contact.js"></script>
</body>
</html>