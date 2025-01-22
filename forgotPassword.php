<?php
$pageTitle = "ForgotPassword - PassOneTouch";
include './includes/header.php';

// Include the PHPMailer autoloader
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
require './config.php';
$forgotPassword_message = '';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];

    // Check if email exists in the database
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);

    if ($stmt->rowCount() > 0) {
        // User exists, generate a unique token for password reset
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        $token = bin2hex(random_bytes(50));  // Generate a unique token

        // Save the token in the database (along with expiration time)
        $expiry = time() + 3600;  // Token expires in 1 hour
        $updateStmt = $conn->prepare("UPDATE users SET reset_token = ?, reset_expiry = ? WHERE email = ?");
        $updateStmt->execute([$token, $expiry, $email]);

        // Send reset email with the token
        $reset_link = "http://localhost:3000/resetpassword.php?token=" . $token;

        // Setup PHPMailer
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->isSMTP();
            $mail->Host = 'in-v3.mailjet.com';  // Mailjet SMTP server
            $mail->SMTPAuth = true;
            $mail->Username = 'ea429b5e5083e66930acd66c339b98ae';  // Your Mailjet API key
            $mail->Password = '6345e078b405511ba3b7bd3b7cef32e7';  // Your Mailjet Secret key
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            //Recipients
            $mail->setFrom('tribillio@gmail.com', 'No Reply');
            $mail->addAddress($email);  // Add the recipient email

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Password Reset Request';
            $mail->Body    = 'To reset your password, click the following link: <a href="' . $reset_link . '">Reset Password</a>';

            // Send the email
            $mail->send();
            $forgotPassword_message = "Check your email for a password reset link.";
        } catch (Exception $e) {
            $forgotPassword_message = "Message could not be sent. Check network";
        }
    } else {
        $forgotPassword_message = "No account found with that email address.";
    }
}
?>

<body>
   <section class="signup" id="signup">
        <div class="form-container">
            <div class="form-row">
                <div class="header-text">
                    <h1>Forgot Your Password?</h1>
                    <p class="para">To reset your password, please enter your email address.</p>
                    <p class="para">passonetouch.com will send the password reset instructions to the email address for this account.</p>
                    <p class="para">If you don't know the email address or it is no longer valid, please <a href="./contact.php">contact us</a> for further assistance.</p>
                </div>
                <div class="form-group-container">
                    <form action="" method="POST">
                        <fieldset>
                            <legend class="visually-hidden">Forgot your password?</legend>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <div class="form-field">
                                    <span class="form-field-container">
                                        <input type="email" id="email" name="email" placeholder="example@example.com" pattern="[a-z0-9%+_.\-]+@[a-z0-9.\-]+\.[a-z]{2,}$" maxlength="55" autocomplete="on" accesskey="e" required>
                                    </span>
                                    <p class="form-help-email" aria-live="polite"></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Submit" class="primary-button">
                                <div class="form-field">
                                    <p class="para"><?php echo htmlspecialchars($forgotPassword_message)?></p>
                            
                                </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
   </section>
   <script src="js/loginValidator.js"></script> 
   <script src="js/signupvalidator.js"></script>
</body>
</html>
