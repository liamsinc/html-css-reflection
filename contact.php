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