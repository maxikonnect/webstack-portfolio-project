<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
        <meta name="author" content="Abradu Frimpong Kwame">
        <meta name="description" content="An interactive platform where students can practice objective questions to enhance their exam preparation and improve their chances of success.">
        <title>forgotPassword - PassOneTouch</title>
        <!--FONT AWESOME-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

        <!--Google Fonts-->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&display=swap" rel="stylesheet">
        
        <!--Bootstrap-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
        <!--LINK TO STYLESHEET-->
        <link rel="stylesheet" href="./style/style.css">
        <link rel="stylesheet" href="./style/mediaquery.css">
    </head>
    <body>
       <section class="signup" id="signup">
            <div class="form-container">
                <div class="form-row">
                    <div class="header-text">
                        <h1>Forgot Your Password?</h1>
                        <p class="para">To reset your password, please enter your email address.</p>
                        <p class="para">passonetouch.com will send the password reset instructions to the email address for this account.</p>
                        <p class="para">If you don't know the email address or is no longer valid, please <a href="./contact.php">contact us</a> for further assistance.</p>
                    </div>
                    <div class="form-group-container">
                        <form action="" method="">
                            <fieldset>
                                <legend class="visually-hidden">forgot your password?</legend>
                                <div class="form-group">
                                    <label for="your-email">email:</label>
                                    <div class="form-field">
                                        <span class="form-field-container">
                                            <input type="email" id="your-email" name="your-email" placeholder="example@example.com" pattern="[a-z0-9%+_.\-]+@[a-z0-9.\-]+\.[a-z]{2,}$"  maxlength="55" autocomplete="on" accesskey="e" required>
                                            
                                        </span>
                                        <p class="form-help-email" aria-live="polite"></p>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="submit" class="primary-button">
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>


            </div>
       </section>
       <script src="js/loginValidator.js"></script> 
       <script src="js/signupvalidator.js"></script>
       <script src=""></script>
    </body>
</html>