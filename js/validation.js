const submitBtn = document.getElementById('submitBtn');

function validatePassword() {

    const passwordField = document.getElementById('password');
    const passwordError = document.getElementById('password-error');
    const password = passwordField.value;

    if (password.length < 8) {
        passwordError.style.display = 'inline';
        passwordError.innerText = "Password must be at least 8 characters long";
        submitBtn.disabled = true;
    }
    else if (!/(?=.*[a-z])/.test(password)) {
        passwordError.style.display = 'inline';
        passwordError.innerText = "Password must be contain at least one lowercase letter";
        submitBtn.disabled = true;
    }

    else if (!/(?=.*[A-Z])/.test(password)) {
        passwordError.style.display = 'inline';
        passwordError.innerText = "Password must be contain at least one uppercase letter";
        submitBtn.disabled = true;
    }

    else if (!/(?=.*\d)/.test(password)) {
        passwordError.style.display = 'inline';
        passwordError.innerText = "Password must be contain at least one number.";
        submitBtn.disabled = true;
    }

    else {
        passwordError.style.display = 'none';
        submitBtn.disabled = false;
    }

}

function validateRpassword() {

    const rPasswordError = document.getElementById('rPassword-error');
    const password = document.getElementById('password').value;
    const rPassword = document.getElementById('rPassword').value;

    if (password === rPassword) {
        rPasswordError.style.display = 'none';
        submitBtn.disabled = false;
    }
    else {
        rPasswordError.style.display = 'inline';
        submitBtn.disabled = true;
        rPasswordError.innerText = "Password doesn't match";
    }
}

function validateUsername() {

    const username = document.getElementById('username').value;
    const usernameError = document.getElementById('username-error');

    if (!/^[a-zA-Z0-9_]{3,10}$/.test(username)) {
        usernameError.style.display = 'inline';
        usernameError.innerText = "Username must be between 3 and 10 characters and contain only letters, numbers, and underscores).";
    }

    else {
        usernameError.style.display = 'none';
    }

}