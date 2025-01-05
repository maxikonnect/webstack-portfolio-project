document.addEventListener("DOMContentLoaded", () => {
    const firstName = document.getElementById("your-first-name");
    const outputFirstName = document.querySelector(".form-help-firstname");

    const lastName = document.getElementById("your-last-name");
    const outputLastName = document.querySelector(".form-help-lastname");
    const nameExp = /^[A-Za-zÀ-ž'\-\s]{3,}$/;

    const emailExp = /^[a-z0-9%+_.\-]+@[a-z0-9.\-]+\.[a-z]{2,}$/;
    const emailInput = document.getElementById("your-email");
    const emailOutput = document.querySelector(".form-help-email");

    // Validate first name
    function validateFirstName() {
        const firstValue = firstName.value.trim();
        const result = nameExp.test(firstValue);
        let response = "";

        if (!result) {
            response = "First name should be at least 3 characters and only contain letters.";
            outputFirstName.style.color = "red";
        } else {
            response = "Valid first name";
            outputFirstName.style.color = "green";
        }

        outputFirstName.textContent = response;
        return result;
    }

    // Validate last name
    function validateLastName() {
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
    }

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
            emailOutput.style.color = "blue";
        }

        emailOutput.textContent = response;
        return result;
    }

    // Attach event listeners for real-time validation
    firstName.addEventListener("input", validateFirstName);
    lastName.addEventListener("input", validateLastName);
    emailInput.addEventListener("input", validateEmail);

    // Validate on form submission
    document.querySelector("form").addEventListener("submit", (event) => {
        const isFirstNameValid = validateFirstName();
        const isLastNameValid = validateLastName();
        const isEmailValid = validateEmail();

        if (!isFirstNameValid || !isLastNameValid || !isEmailValid) {
            event.preventDefault(); // Prevent form submission
            alert("Please correct the errors before submitting the form.");
        }
    });
});
