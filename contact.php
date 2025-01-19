<?php
require './config.php';

$firstName = $lastName = $email = $message = $logging = '';
$firstName_err = $lastName_err = $email_err = $message_err = '';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Validate firstName
    if (empty(trim($_POST['firstName']))) {
        $firstName_err = 'First name is required.';
    } elseif (!preg_match('/^[a-zA-Z]{3,}$/', trim($_POST['firstName']))) {
        $firstName_err = 'First name should be at least 3 characters and contain only letters.';
    } else {
        $firstName = trim($_POST['firstName']);
    }

    // Validate lastName
    if (empty(trim($_POST['lastName']))) {
        $lastName_err = 'Last name is required.';
    } elseif (!preg_match('/^[a-zA-Z]{3,}$/', trim($_POST['lastName']))) {
        $lastName_err = 'Last name should be at least 3 characters and contain only letters.';
    } else {
        $lastName = trim($_POST['lastName']);
    }

    // Validate email
    if (empty(trim($_POST['email']))) {
        $email_err = 'An email is required.';
    } elseif (!filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL)) {
        $email_err = 'Please enter a valid email address (e.g., example@example.com).';
    } else {
        $email = trim($_POST['email']);
    }

    // Validate message
    if (empty(trim($_POST['message']))) {
        $message_err = 'A message is required.';
    } elseif (strlen(trim($_POST['message'])) < 10) {
        $message_err = 'The message must be at least 10 characters long.';
    } else {
        $message = trim($_POST['message']);
    }
    if(empty($firstName_err) && empty($lastName_err) && empty($email_err) && empty($message_err)){
        $sql = "INSERT INTO message (firstName, lastName, email, message) VALUES(:firstName, :lastName, :email, :message)";
        if($stmt = $conn->prepare($sql)){
            $stmt->bindParam(':firstName', $firstName, PDO::PARAM_STR);
            $stmt->bindParam(':lastName', $lastName, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':message', $message,PDO::PARAM_STR);

            if($stmt->execute()){
                $logging = "Message sent succesfully";
                $firstName = '';
                $lastName = '';
                $email = '';
            }else{
                $logging =  "Message colud not be sent";
            }
            unset($stmt);
        }
    }
    unset($conn);
}
?>


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
                            <p><?php echo htmlspecialchars($logging); ?></p>
                            <h3><span>contact us</span></h3>
                            <p>send us a message</p>
                        </div>
                        <div class="form-group-container">
                            <form action="" method="POST">
                                <fieldset>
                                    <legend class="visually-hidden">send us a message</legend>
                                
                                    <div class="form-group">
                                        <label for="firstName">First Name:</label>
                                        <div class="form-field">
                                            <span class="form-field-container">
                                                <input type="text" name="firstName" id="firstName"  value="<?php echo htmlspecialchars($firstName); ?>" placeholder="e.g. Afia" maxlength="55"  accesskey="f" required>       
                                            </span>
                                            <p class="form-help-firstname" aria-live="polite"></p>
                                            <p class="red-text"><?php echo htmlspecialchars($firstName_err); ?></p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="lastName">last name:</label>
                                        <div class="form-field">
                                            <span class="form-field-container">
                                                <input type="text" id="lastName" name="lastName" value="<?php echo htmlspecialchars($lastName); ?>" placeholder="e.g Davis"  maxlength="55"  accesskey="l" required>
                                            </span>
                                            <p class="form-help-lastname" aria-live="polite"></p>
                                            <p class="red-text"><?php echo htmlspecialchars($lastName_err); ?></p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">email:</label>
                                        <div class="form-field">
                                            <span class="form-field-container">
                                                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>" placeholder="example@example.com"   maxlength="55"  accesskey="e" required>
                                                
                                            </span>
                                            <p class="form-help-email" aria-live="polite"></p>
                                            <p class="red-text"><?php echo htmlspecialchars($email_err); ?></p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="message">message:</label>
                                        <div class="form-field">
                                            <span class="form-field-container">
                                                <textarea name="message" class="message" id="message" value="<?php echo htmlspecialchars($message); ?>" rows="8" cols="32" minlength="10" maxlength="500" placeholder="write your message"></textarea>
                                            </span> 
                                            <p class="form-help-message" aria-live="polite"></p>
                                            <p class="red-text"><?php echo htmlspecialchars($message_err) ?></p>
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