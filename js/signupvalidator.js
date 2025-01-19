document.addEventListener("DOMContentLoaded", () => {
    const username = document.getElementById("username");
    const outputusername = document.querySelector(".form-help-username");

    /* const lastName = document.getElementById("your-last-name");
    const outputLastName = document.querySelector(".form-help-lastname"); */
    const nameExp = /^[A-Za-z0-9_]{3,}$/; 

    const emailExp = /^[a-z0-9%+_.\-]+@[a-z0-9.\-]+\.[a-z]{2,}$/;
    const emailInput = document.getElementById("email");
    const emailOutput = document.querySelector(".form-help-email");

    const passwordExp = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/;
    const passwordInput = document.getElementById("your-password");
    const passwordOutput = document.querySelector(".form-help-password");

    /*validate momo number*/
    const momoExp = /^[0-9]{10}$/; // Regex for 10-digit numbers
    const momoInput = document.getElementById("your-momo-number");
    const momoOutput = document.querySelector(".form-help-momo");

    const messageInput = document.getElementById("message");
    const messageOutput = document.querySelector(".form-help-message"); 


    //Exam type
    const examTypeSelect = document.getElementById("exam-type");

    // Access the specific option with value "principal_superintendent"
    const principalSuperintendent = Array.from(examTypeSelect.options).find(
    (option) => option.value === "principal_superintendent"
    );

    const assistantDirectorI = Array.from(examTypeSelect.options).find(
        (option) => option.value === "assistant_director_I"
    );

    const assistantDirectorII = Array.from(examTypeSelect.options).find(
        (option) => option.value === "assistant_director_II"
    );

    const deputy_director = Array.from(examTypeSelect.options).find(
        (option) => option.value === "deputy_director"
    );

    const momoAmount = document.querySelector(".momo-amount");
    examTypeSelect.addEventListener("change", () => {
        const selectedValue = examTypeSelect.value; // Get selected value
        if (
            selectedValue === "principal_superintendent" ||
            selectedValue === "assistant_director_I" ||
            selectedValue === "assistant_director_II" ||
            selectedValue === "deputy_director"
        ) {
            momoAmount.textContent = `MoMo Amount To Pay: 50 Cedis`; // Update text
        } else {
            momoAmount.textContent = `MoMo Amount: Not Applicable`; // Default case
        }
    });

    // Validate contact message
    function validateMessage() {
        const messageValue = messageInput.value.trim();
        let result = true;
        let response = "";
    
        if (messageValue === "") {
            response = "Enter a message";
            messageOutput.style.color = "red";
            messageOutput.textContent = response;
            result = false;
        } else if (messageValue.length < 10) {
            response = "Message is too short";
            messageOutput.style.color = "red";
            messageOutput.textContent = response;
            result = false;
        } else {
            response = "Message looks good";
            messageOutput.style.color = "green";
            messageOutput.textContent = response;
            result = true;
        }
        return result;
    }
    
    // Validate first name
    function validateusername() {
        const firstValue = username.value.trim();
        const result = nameExp.test(firstValue);
        let response = "";

        if (!result) {
            response = "Username should be at least 3 characters and only contain letters, numbers or underscore.";
            outputusername.style.color = "red";
        } else {
            response = "Valid username";
            outputusername.style.color = "green";
        }

        outputusername.textContent = response;
        return result;
    }

    // Validate last name
    /* function validateLastName() {
        const lastValue = lastName.value.trim();
        const result = nameExp.test(lastValue);
        let response = "";

        if (!result) {
            response = "Last name should be at least 3 characters and only contain letters.";
            outputLastName.style.color = "red";
        } else {
            response = "Valid last name";
            outputLastName.style.color = "green";
        }

        outputLastName.textContent = response;
        return result;
    } */

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

    // Validate password
    function validatePassword() {
        const passwordValue = passwordInput.value.trim();
        const result = passwordExp.test(passwordValue);
        let response = "";

        if (!result) {
            response = "Enter at least 8 characters, including an uppercase letter, a lowercase letter, and a number.";
            passwordOutput.style.color = "red";
        } else {
            response = "Valid password";
            passwordOutput.style.color = "green";
        }

        passwordOutput.textContent = response;
        return result;
    }

    function validateMomoNumber() {
        const momoInputValue = momoInput.value.trim();
        const isValid = momoExp.test(momoInputValue);
        let message = "";

        if (!isValid) {
            message = "Enter a valid 10-digit mobile number.";
            momoOutput.style.color = "red";
        } else {
            message = "Valid MoMo number.";
            momoOutput.style.color = "green";
        }

        momoOutput.textContent = message;
        return isValid;
    }
    // Attach event listeners for real-time validation
    username.addEventListener("input", validateusername);
    //lastName.addEventListener("input", validateLastName);
    emailInput.addEventListener("input", validateEmail);
    passwordInput.addEventListener("input", validatePassword);
    messageInput.addEventListener("input", validateMessage);
    momoInput.addEventListener("input", validateMomoNumber);
});
