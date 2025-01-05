document.addEventListener("DOMContentLoaded", () => {
    const firstName = document.getElementById("your-first-name");
    const outputFirstName = document.querySelector(".form-help-firstname");

    const lastName = document.getElementById("your-last-name"); 
    const outputLastName = document.querySelector(".form-help-lastname");
    const nameExp = /^[A-Za-zÀ-ž'\-\s]{3,}$/;

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

    firstName.addEventListener("input", () => {
        validateFirstName();
    });

    lastName.addEventListener("input", () => {
        validateLastName();
    });
});
