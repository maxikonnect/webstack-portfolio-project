document.addEventListener("DOMContentLoaded", () => {

    const emailExp = /^[a-z0-9%+_.\-]+@[a-z0-9.\-]+\.[a-z]{2,}$/;
    const emailInput = document.getElementById("your-email");
    const emailOutput = document.querySelector(".form-help-email");

    const passwordExp = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/;
    const passwordInput = document.getElementById("your-password");
    const passwordOutput = document.querySelector(".form-help-password");

    // Validate email
    function validateEmail() {
        const emailValue = emailInput.value.trim();
        const result = emailExp.test(emailValue);
        let response = "";

        if (!result) {
            response = "Enter a valid email like 'example@gmail.com'";
            emailOutput.style.color = "red";
        } else {
            response = "Valid email";
            emailOutput.style.color = "green";
        }

        emailOutput.textContent = response;
        return result;
    }


    function validatePassword() {
        const passwordValue = passwordInput.value.trim();
        const result = passwordExp.test(passwordValue);
        let response = "";

        if (!result) {
            response = "Enter atleast 8 characters, including an uppercase letter, a lowercase letter, and a number.";
            passwordOutput.style.color = "red";
        } else {
            response = "Valid password";
            passwordOutput.style.color = "green";
        }

        passwordOutput.textContent = response;
        return result;
    }
    // Attach event listeners for real-time validation
    
    emailInput.addEventListener("input", validateEmail);
    passwordInput.addEventListener("input", validatePassword);

});
