<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
        <meta name="author" content="Abradu Frimpong Kwame">
        <meta name="description" content="An interactive platform where students can practice objective questions to enhance their exam preparation and improve their chances of success.">
        <title>Contact Us - PassOneTouch</title>
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
                            <h3><span>contact us</span></h3>
                            <p>send us a message</p>
                        </div>
                        <div class="form-group-container">
                            <form action="" method="">
                                <fieldset>
                                    <legend class="visually-hidden">send us a message</legend>
                                
                                    <div class="form-group">
                                        <label for="your-first-name">First Name:</label>
                                        <div class="form-field">
                                            <span class="form-field-container">
                                                <input type="text" name="your-first-name" id="your-first-name" pattern="^[A-Za-zÀ-ž'\-\s]{3,}$" placeholder="e.g. Afia" maxlength="55" autocomplete="on" accesskey="f" required>
                                                
                                            </span>
                                            <p class="form-help-firstname" aria-live="polite"></p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="your-last-name">last name:</label>
                                        <div class="form-field">
                                            <span class="form-field-container">
                                                <input type="text" id="your-last-name" name="your-last-name" placeholder="e.g Davis" pattern="^[A-Za-zÀ-ž'\-\s]{3,}" maxlength="55" autocomplete="on" accesskey="l" required>
                                            </span>
                                            <p class="form-help-lastname" aria-live="polite"></p>
                                        </div>
                                    </div>
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
                                        <label for="message">message:</label>
                                        <div class="form-field">
                                            <span class="form-field-container">
                                                <textarea name="message" class="message" id="message" rows="8" cols="32" minlength="10" maxlength="500" placeholder="write your message"></textarea>
                                            </span> 
                                            <p class="form-help-message" aria-live="polite"></p>
                                        </div>
                                        </div>
                                    <div class="form-group">
                                        <input type="submit" value="submit" class="primary-button">
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-group-contact">
                                        <p>or</p>
                                        <a class="fa fa-phone" href="tel:+233552343560"> click to call</a>
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
        
    </body>
</html>