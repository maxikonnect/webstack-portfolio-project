document.addEventListener('DOMContentLoaded', () => {
    const password = document.getElementById('your-password');
    const confirmPassword = document.getElementById('confirm-password');
    const passwordError = document.getElementById('password-error'); // Ensure this element exists in your HTML
    const form = document.querySelector('form');


    confirmPassword.addEventListener('input', () => {
        if (confirmPassword.value !== password.value) {
            confirmPassword.setCustomValidity('Passwords do not match.');
            if (passwordError) {
                passwordError.textContent = 'Passwords do not match.';
                passwordError.style.color = "red";
            }
        } else {
            confirmPassword.setCustomValidity('Password match');
            if (passwordError) {
                passwordError.textContent = 'Password match';
                passwordError.style.color = "green";
            }
        }
    });

    form.addEventListener('submit', (event) => {
        if (confirmPassword.value !== password.value) {
            event.preventDefault();
            if (passwordError) {
                passwordError.textContent = 'Passwords do not match. Please correct this before submitting.';
            }
        }
    });
});
