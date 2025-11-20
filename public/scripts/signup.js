const submitButton = document.getElementById('signup-button');
const password = document.getElementById('password');
const passwordConfirm = document.getElementById('password-confirm');

function checkPasswords() {
    
    if (password.value === passwordConfirm.value) {
        submitButton.disabled = false;
        return;
    }
    if (!submitButton.disabled) {
        submitButton.disabled = true;
    }
}