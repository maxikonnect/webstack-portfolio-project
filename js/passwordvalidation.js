document.addEventListener(DOMContentLoaded, ()=>{
    const password = document.getElementById('your-password')
    const confirmPassword = document.getElementById('confirm-password')
    const form = document.querySelector('form');

    confirmPassword.addEventListener('input', ()=>{
        if(confirmPassword.value !== password.value){
            confirmPassword.setCustomValidity('Passwords do not match.');
        }else{
            confirmPassword.setCustomValidity('');
        }
    });

    form.addEventListener('submit', (event)=>{
        if (confirmPassword.value !== passwordField.value) {
            event.preventDefault();
            alert('Passwords do not match. Please correct this before submitting.');
        }
    });
})