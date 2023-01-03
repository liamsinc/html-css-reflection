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
            <?php

            $servername = "127.0.0.1";
            $username = "root";
            $password = "";

            try {
                echo "Hello\n";
                $conn = new PDO("mysql:host=$servername;dbname=netmatters", $username, $password);
                // set the PDO error mode to exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                echo "Connected successfully";
            } catch(PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }

            
            ?>
            
            <section class="breadcrumb__section">
                <div class="navspan">
                    <div class="navspan__content container">
                        <p class="navspan__text"><a href="index.php">Home</a>&nbsp;&nbsp;/&nbsp;&nbsp;Our Offices</p>
                    </div>
                </div>
            </section>

            <section class="offices__section container">
                <h1 class="offices__heading">Our Offices</h1>
                
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