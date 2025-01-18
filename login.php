<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
        <meta name="author" content="Abradu Frimpong Kwame">
        <meta name="description" content="An interactive platform where students can practice objective questions to enhance their exam preparation and improve their chances of success.">
        <title>Login - PassOneTouch</title>
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
    <?php require 'headerlogsign.php' ?>  
        <main>
            <h1 class="visually-hidden">Homepage</h1>
            <section class="signup" id="signup">
                <div class="form-container">
                    <div class="form-row">
                        <div class="header-text">
                            <h3><span>login</span></h3>
                            <p>login to continue</p>
                        </div>
                        <div class="form-group-container">
                            <form action="" method="">
                                <fieldset>
                                    <legend class="visually-hidden">login information</legend>
                                
                            
                                    
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
                                        <label for="your-password">password:</label>
                                        <div class="form-field">
                                            <span class="form-field-container">
                                                <input type="password" id="your-password" name="your-password" placeholder="Enter your password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Password must be at least 8 characters, including an uppercase letter, a lowercase letter, and a number." autocomplete="on" accesskey="p" required>
                                                <i class="form-field-icon"></i>
                                            </span> 
                                            <p class="form-help-password" aria-live="polite"></p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="confirm-password">confirm password:</label>
                                        <div class="form-field">
                                            <span class="form-field-container">
                                                <input type="password" id="confirm-password" name="confirm-password" placeholder="Re-enter your password"  autocomplete="off" accesskey="c" required>
                                                <i class="form-field-icon"></i>
                                            </span> 
                                            <p id="password-error" class="form-help" aria-live="polite"></p>
                                        </div>
                                        </div>
                                    <div class="form-group">
                                        <input type="submit" value="submit" class="primary-button">
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-group-login">
                                        <p>don't have an account?<a href="signup.html"> signup</a></p>
                                        <a href="forgotPassword.html"><p>forgot password?</p></a>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </section>              
        </main>

        <!-- footer start -->
        <?php require 'footer.php' ?>
        <!--footer ends-->

        <!--Link to javascripts used-->
        <!--Date update-->
        <script src="js/date.js"></script>

        <!--Toggle menu-->
        <script src="js/menutoggle.js"></script>

        <!--password validation -->
        <script src="js/passwordvalidation.js"></script>

        <!--signup validator-->
        <script src="js/loginValidator.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
        <script>
            AOS.init({
            duration: 600,
            delay: 200,
            });
        </script>   
    </body>
</html>