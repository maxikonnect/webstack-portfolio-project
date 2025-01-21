<?php
// resetpage.php - Page where the user can reset their password after clicking the reset link
$pageTitle = "Reset Password - PassOneTouch";
include './includes/header.php';
require_once "config.php";

$new_password = $confirm_password = "";
$new_password_err = $confirm_password_err = "";

// Validate the token in the URL
if (isset($_GET['token'])) {
    $token = $_GET['token'];

    // Ensure $current_time is a variable before passing it by reference
    $current_time = time(); // Store current time in a variable

    // Check if the token exists and is valid (not expired)
    $sql = "SELECT id FROM users WHERE reset_token = :token AND reset_expiry > :current_time";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':token', $token, PDO::PARAM_STR);
    $stmt->bindParam(':current_time', $current_time, PDO::PARAM_INT); // Bind the variable here
    $stmt->execute();

    if ($stmt->rowCount() == 1) {
        // Token is valid, proceed with password reset form
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Validate new password
            if (empty(trim($_POST['new_password']))) {
                $new_password_err = "Password is required";
            } elseif (!preg_match('/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/', trim($_POST['new_password']))) {
                $new_password_err = 'Password must be at least 8 characters, including an uppercase letter, a lowercase letter, and a number.';
            } else {
                $new_password = trim($_POST['new_password']);
            }

            // Validate confirm password
            if (empty(trim($_POST["confirm_password"]))) {
                $confirm_password_err = "Please confirm the password.";
            } else {
                $confirm_password = trim($_POST["confirm_password"]);
                if ($new_password != $confirm_password) {
                    $confirm_password_err = "Passwords do not match.";
                }
            }

            // Check input errors before updating the database
            if (empty($new_password_err) && empty($confirm_password_err)) {
                // Update the password in the database
                $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

                // Update the password, reset token, and expiry
                $sql = "UPDATE users SET password = :password, reset_token = NULL, reset_expiry = NULL WHERE reset_token = :token";
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(':password', $hashed_password, PDO::PARAM_STR);
                $stmt->bindParam(':token', $token, PDO::PARAM_STR);

                if ($stmt->execute()) {
                    header("location: ./login.php");
                    echo "Your password has been updated successfully. <a href='login.php'>Click here to login.</a>";
                } else {
                    echo "Oops! Something went wrong. Please try again later.";
                }
            }
        }
    } else {
        echo "Invalid or expired token.";
        exit();
    }
} else {
    echo "No token provided.";
    exit();
}
?>


<body>
   <section class="signup" id="signup">
        <div class="form-container">
            <div class="form-row">
                <div class="header-text">
                    <h2>Reset Password</h2>
                    <p class="para">Please fill out this form to reset your password.</p>
                </div>
                <div class="form-group-container">
                    <form action="" method="POST">
                        <fieldset>
                            <legend class="visually-hidden">Forgot your password?</legend>
                            <div class="form-group">
                                <label for="new_password">password:</label>
                                <div class="form-field">
                                    <span class="form-field-container">
                                        <input type="password" id="new_password" name="new_password"  placeholder="Enter your password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Password must be at least 8 characters, including an uppercase letter, a lowercase letter, and a number." autocomplete="on" accesskey="p" required>
                                    </span> 
                                    <p class="form-help-password" aria-live="polite"></p>
                                    <p class="red-text"><?php echo htmlspecialchars($new_password_err) ?></p>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="confirm-password">confirm password:</label>
                                <div class="form-field">
                                    <span class="form-field-container">
                                        <input type="password" id="confirm_password" name="confirm_password"  placeholder="Re-enter your password" autocomplete="off" accesskey="c" required>
                                        <i class="form-field-icon"></i>
                                    </span> 
                                    <p id="password-error" class="form-help" aria-live="polite"></p>
                                    <p class="red-text"><?php echo htmlspecialchars($confirm_password_err) ?></p>
                                </div>
                            </div>      
                            <div class="form-group">
                                <input type="submit" value="Submit" class="primary-button">
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
   </section>
</body>
</html>