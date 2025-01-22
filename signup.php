<?php
require_once 'config.php';

$username = $email = $examtype = $password = $momoNumber = '';
$username_err = $email_err = $examtype_err = $password_err = $confirmPassword_err = $momoNumber_err = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validate username
    if (empty(trim($_POST['username']))) {
        $username_err = 'Username is required';
    } elseif (!preg_match('/^[a-zA-Z0-9_]{3,}$/', trim($_POST['username']))) {
        $username_err = 'Username should be at least 3 characters and only contain letters, numbers, and underscores.';
    } else {
        $username = trim($_POST['username']);
    }

    // Validate email
    if (empty(trim($_POST['email']))) {
        $email_err = 'An email is required';
    } elseif (!filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL)) {
        $email_err = 'Email must be a valid email address.';
    } else {
        $email = trim($_POST['email']);
        
        // Check if email already exists
        $sql = "SELECT id FROM users WHERE email = :email";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            if ($stmt->execute()) {
                if ($stmt->rowCount() > 0) {
                    $email_err = "This email is already registered.";
                }
            } else {
                echo "Error checking email.";
            }
            unset($stmt);
        }
    }

    // Validate password
    if (empty(trim($_POST['password']))) {
        $password_err = "Password is required";
    } elseif (!preg_match('/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/', trim($_POST['password']))) {
        $password_err = 'Password must be at least 8 characters, including an uppercase letter, a lowercase letter, and a number.';
    } else {
        $password = trim($_POST['password']);
    }

    // Validate exam type
    if (empty($_POST['examtype'])) {
        $examtype_err = 'Please select an exam type';
    } else {
        $allowed_exam_types = ['principal_superintendent', 'assistant_director_II', 'assistant_director_I', 'deputy_director'];
        if (in_array($_POST['examtype'], $allowed_exam_types)) {
            $examtype = $_POST['examtype'];
        } else {
            $examtype_err = 'Invalid exam type selected';
        }
    }

    // Validate MoMo number
    if (empty(trim($_POST['momoNumber']))) {
        $momoNumber_err = 'MoMo number is required';
    } elseif (!preg_match('/^[0-9]{10}$/', trim($_POST['momoNumber']))) {
        $momoNumber_err = 'MoMo number must be a valid 10-digit number';
    } else {
        $momoNumber = trim($_POST['momoNumber']);
    }

    // Check for errors and insert into database
    if (empty($username_err) && empty($email_err) && empty($examtype_err) && 
        empty($password_err) && empty($momoNumber_err)) {
        
        $sql = "INSERT INTO users (username, email, examtype, password, momoNumber) VALUES (:username, :email, :examtype, :password, :momoNumber)";
        
        if ($stmt = $conn->prepare($sql)) {
            // Bind parameters
            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':examtype', $examtype, PDO::PARAM_STR);
            $stmt->bindParam(':password', $param_password, PDO::PARAM_STR);
            $stmt->bindParam(':momoNumber', $momoNumber, PDO::PARAM_STR);

            // Hash the password
            $param_password = password_hash($password, PASSWORD_DEFAULT);

            if ($stmt->execute()) {
                header("Location: login.php");
                exit();
            } else {
                echo "Something went wrong. Please try again.";
            }
            unset($stmt);
        }
    }
    unset($conn);
}
?>

<?php 
$pageTitle = "SignUp - PassOneTouch";
include './includes/header.php';
?>
    <?php require './includes/subnav.php' ?>
        <main>
            <h1 class="visually-hidden">Homepage</h1>
            <section class="signup" id="signup">
                <div class="form-container">
                    <div class="form-row">
                        <div class="header-text">
                            <h3><span>sign up</span></h3>
                            <p>sign up to continue</p>
                        </div>
                        <div class="form-group-container">
                            <form action="" method="POST">
                                <fieldset>
                                    <legend class="visually-hidden">sign up information</legend>
                                
                                    <div class="form-group">
                                        <label for="username">username:</label>
                                        <div class="form-field">
                                            <span class="form-field-container">
                                                <input type="text" name="username" id="username" value="<?php echo htmlspecialchars($username)?>"pattern="^[A-Za-zÀ-ž'\-\s]{3,}$" placeholder="e.g. Afia" maxlength="55" autocomplete="on" accesskey="f" required>
                                                
                                            </span>
                                            <p class="form-help-username" aria-live="polite"></p>
                                            <p class="red-text"><?php echo htmlspecialchars($username_err); ?></p>
                                        </div>
                                    </div>
                                    <!--
                                    <div class="form-group">
                                        <label for="your-last-name">last name:</label>
                                        <div class="form-field">
                                            <span class="form-field-container">
                                                <input type="text" id="your-last-name" name="your-last-name" placeholder="e.g Davis" pattern="^[A-Za-zÀ-ž'\-\s]{3,}" maxlength="55" autocomplete="on" accesskey="l" required>
                                            </span>
                                            <p class="form-help-lastname" aria-live="polite"></p>
                                        </div>
                                    </div>
                                -->
                                    <div class="form-group">
                                        <label for="your-email">email:</label>
                                        <div class="form-field">
                                            <span class="form-field-container">
                                                <input type="email" id="email" name="email" value = "<?php echo htmlspecialchars($email) ?>" placeholder="example@example.com" pattern="[a-z0-9%+_.\-]+@[a-z0-9.\-]+\.[a-z]{2,}$"  maxlength="55" autocomplete="on" accesskey="e" required>
                                                
                                            </span>
                                            <p class="form-help-email" aria-live="polite"></p>
                                            <p class="red-text"><?php echo htmlspecialchars($email_err); ?></p>
                                            
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="your-course">choose exams type:</label>
                                        <div class="form-field">
                                            <span class="form-field-container">
                                            <select name="examtype" id="exam-type">
                                                <option value="" disabled selected>Choose Promotions</option>
                                                <option value="principal_superintendent" <?php echo ($examtype == 'principal_superintendent') ? 'selected' : ''; ?>>Principal Superintendent</option>
                                                <option value="assistant_director_II" <?php echo ($examtype == 'assistant_director_II') ? 'selected' : ''; ?>>Assistant Director II</option>
                                                <option value="assistant_director_I" <?php echo ($examtype == 'assistant_director_I') ? 'selected' : ''; ?>>Assistant Director I</option>
                                                <option value="deputy_director" <?php echo ($examtype == 'deputy_director') ? 'selected' : ''; ?>>Deputy Director</option>
                                            </select>   
                                            </span>
                                            <p class="form-help-course" aria-live="polite"></p>
                                            <p class="red-text"><?php echo htmlspecialchars($examtype_err); ?></p>
                                            
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="your-password">password:</label>
                                        <div class="form-field">
                                            <span class="form-field-container">
                                                <input type="password" id="your-password" name="password"  placeholder="Enter your password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Password must be at least 8 characters, including an uppercase letter, a lowercase letter, and a number." autocomplete="on" accesskey="p" required>
                                            </span> 
                                            <p class="form-help-password" aria-live="polite"></p>
                                            <p class="red-text"><?php echo htmlspecialchars($password_err); ?></p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="confirm-password">confirm password:</label>
                                        <div class="form-field">
                                            <span class="form-field-container">
                                                <input type="password" id="confirm-password" name="confirmPassword"  placeholder="Re-enter your password" autocomplete="off" accesskey="c" required>
                                                <i class="form-field-icon"></i>
                                            </span> 
                                            <p id="password-error" class="form-help" aria-live="polite"></p>
                                            <p class="red-text"><?php echo htmlspecialchars($confirmPassword_err); ?></p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <hr>
                                        <h1>PAYMENT INFORMATION</h1>
                                    </div>
                                    <div class="form-group">
                                        <label for="your-momo-number">momo number:</label>
                                        <div class="form-field">
                                            <span class="form-field-container">
                                                <input type="text" id="your-momo-number" name="momoNumber" placeholder="enter momo number" pattern="^[0-9]{10}$"  maxlength="10" autocomplete="on" accesskey="m" required>
                                                
                                            </span>
                                            <p class="form-help-momo" aria-live="polite"></p>
                                            <p class="red-text"><?php echo htmlspecialchars($momoNumber_err); ?></p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <p class="momo-amount">amount:</p>
                                        
                                    </div>
                                    <!--
                                    <div class="form-group">
                                        
                                        <div class="form-field">
                                            <span class="form-field-container">
                                                <button type="submit" class="your-momo-pay" title="Click To Pay MOMO">Pay Momo</button>
                                                
                                            </span>
                                            
                                        </div>
                                    </div>
                                    -->
                                    <div class="form-group">
                                        <input type="submit" value="submit" class="primary-button">
                                    </div>
                                </fieldset>
                                <fieldset>
                                    <div class="form-group-login">
                                        <p>already have an account?<a href="login.html"> login</a></p>
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

        <script src="./js/signupvalidator.js"></script>
    </body>
</html>