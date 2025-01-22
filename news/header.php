<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
        <meta name="author" content="Abradu Frimpong Kwame">
        <meta name="description" content="An interactive platform where students can practice objective questions to enhance their exam preparation and improve their chances of success.">
        <title>News - PassOneTouch</title>
        <!--FONT AWESOME-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

        <link rel="icon" type="image/png" href="../Assets/images/favicon/newfavicon.png">
        <!--Google Fonts-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&display=swap" rel="stylesheet">
        
        <!--Bootstrap-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
        <!--LINK TO STYLESHEET-->
        <link rel="stylesheet" href="../style/style.css">
        
    </head>
    <body>
        <header class="header" id="header">
          <div class="header-container">
            <div class="socialicons">
                <p>Follow us</p>
                <a href="#" class="fab fa-youtube" aria-hidden="true" aria-label="YouTube"></a>
                <a href="#" class="fab fa-facebook-f" aria-hidden="true" aria-label="Facebook"></a>
                <a href="#" class="fab fa-twitter" aria-hidden="true" aria-label="Twitter"></a>
                <a href="#" class="fab fa-instagram" aria-hidden="true" aria-label="Instagram"></a>
                <a href="#" class="fab fa-linkedin" aria-hidden="true" aria-label="LinkedIn"></a>
            </div>
            <div class="super-sub-container">
              <div class="sub-container">
                <div class="logo-container">
                    <a href="../index.php" class="logo">passOneTouch</a>
                </div>
                <div class="menu">
                    <div class="start-test main-menu">
                        <a href="#">start test</a>
                        <i class="fas fa-chevron-down" aria-hidden="true"></i>
                        <div class="dropdown" role="menu" aria-labelledby="start-test">
                            <a href="../teachersexams.php">Teachers Exams</a>
                            <!--<a href="#">Wassce</a>
                            <a href="#">BECE</a>-->
                        </div>
                    </div>
                </div>
                <div class="signupLogin">
                    <a href="../login.php" class="login">log in</a>
                    <a href="../signup.php" class="signup btn">sign up</a>
                </div>
                <div id="menu-toggle" class="fas fa-bars">
                </div>
              </div>
            </div>
          </div>
        </header>