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
            }
        } else {
            confirmPassword.setCustomValidity('');
            if (passwordError) {
                passwordError.textContent = '';
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
