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

                <section class="form__section">
                    <div class="form__wrapper">
                        <div class="form__form">
                            <h1>Hello</h1>
                        </div>
                    </div>
                </section>
            </div>

            <?php
                require "inc/newsletter.php";
                require "inc/footer.php"; 
            ?>
        </div>
        <?php require "inc/sidemenu.php"; ?>
    </div>
    <script src="js/jquery-3.6.1.min.js"></script>
    <script src="js/app.js"></script>
</body>
</html>