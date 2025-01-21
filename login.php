<?php
session_start();
require 'config.php';

$email = $password = '';
$email_err = $password_err = $login_err = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty(trim($_POST["email"]))) {
        $email_err = "Please enter your email";
    } else {
        $email = trim($_POST["email"]);
    }

    if (empty(trim($_POST["password"]))) {
        $password_err = "Please enter your password.";
    } else {
        $password = trim($_POST["password"]);
    }

    if (empty($email_err) && empty($password_err)) {
        $sql = "SELECT id, username, email, password, examtype FROM users WHERE email = :email";

        if ($stmt = $conn->prepare($sql)) {
            // Bind parameters
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);

            // Execute the prepared statement
            if ($stmt->execute()) {
                // Check if email exists
                if ($stmt->rowCount() == 1) {
                    $row = $stmt->fetch(PDO::FETCH_ASSOC);
                    $id = $row['id'];
                    $username = $row['username'];
                    $hashed_password = $row['password'];
                    $examtype = $row['examtype'];

                    if (password_verify($password, $hashed_password)) {
                        // Password is correct, so start a new session
                        session_start();

                        // Store data in session variables
                        $_SESSION["loggedin"] = true;
                        $_SESSION["id"] = $id;
                        $_SESSION["username"] = $username;
                        $_SESSION["email"] = $email;
                        $_SESSION["examtype"] = $examtype;


                        // Redirect based on examtype
                        switch ($examtype) {
                            case 'principal_superintendent':
                                header("Location: ./pslogin/pshome.php");
                                break;
                            case 'assistant_director_II':
                                header("Location: adIIlogin/adIIhome.php");
                                break;
                            case 'assistant_director_I':
                                header("Location: adIlogin/adIhome.php");
                                break;
                            case 'deputy_director':
                                header("Location: ddlogin/ddhome.php");
                                break;
                            default:
                                header("Location: default_page.php");
                                break;
                        }
                        exit();
                    } else {
                        $login_err = "Invalid username or password.";
                    }
                } else {
                    $login_err = "Invalid username or password.";
                }
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
    }
}
?>



<?php 
$pageTitle = "Login - PassOneTouch";
include './includes/header.php';
?>
    <?php require './includes/subnav.php' ?>
        <main>
            <h1 class="visually-hidden">Homepage</h1>
            <section class="signup" id="signup">
                <div class="form-container">
                    <div class="form-row">
                        <?php
                        if (isset($_GET['message']) && $_GET['message'] == 'loggedout') {
                            echo '<div style="text-align:center"class="alert alert-success">You have successfully logged out.</div>';
                        }
                        ?>
                        <div class="header-text">
                            <h3><span>login</span></h3>
                            <p>login to continue</p>
                        </div>
                        <div class="form-group-container">
                            <form action="" method="POST">
                                <fieldset>
                                    <legend class="visually-hidden">login information</legend>
                                    <div class="form-group">
                                        <label for="email">email:</label>
                                        <div class="form-field">
                                            <span class="form-field-container">
                                                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($email)?>" placeholder="example@example.com" pattern="[a-z0-9%+_.\-]+@[a-z0-9.\-]+\.[a-z]{2,}$"  maxlength="55" autocomplete="on" accesskey="e" required>
                                                
                                            </span>
                                            <p class="form-help-email" aria-live="polite"></p>
                                            <p class="red-text"><?php echo htmlspecialchars($email_err) ?></p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">password:</label>
                                        <div class="form-field">
                                            <span class="form-field-container">
                                                <input type="password" id="password" name="password" placeholder="Enter your password" value="<?php echo htmlspecialchars($password)?>"pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Password must be at least 8 characters, including an uppercase letter, a lowercase letter, and a number." autocomplete="on" accesskey="p" required>
                                                <i class="form-field-icon"></i>
                                            </span> 
                                            <p class="form-help-password" aria-live="polite"></p>
                                            <p class="red-text"><?php echo htmlspecialchars($password_err) ?></p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="submit" class="primary-button">
                                        <div class="form-field">
                                        <p class="red-text"><?php echo htmlspecialchars($login_err); ?></p>
                                        </div> 
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-group-login">
                                        <p>don't have an account?<a href="signup.php"> signup</a></p>
                                        <a href="forgotPassword.php"><p>forgot password?</p></a>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </section>              
        </main>

        <!-- footer start -->
        <?php require './includes/footer.php' ?>
        <!--footer ends-->  
    </body>
</html>