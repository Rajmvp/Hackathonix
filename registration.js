document.getElementById('registrationForm').addEventListener('submit', function(event) {
    event.preventDefault();

    // form elements
    const name = document.getElementById('name');
    const email = document.getElementById('email');
    const uname = document.getElementById('uname');
    const pass = document.getElementById('pass');

    //  error elements
    const nameError = document.getElementById('nameError');
    const emailError = document.getElementById('emailError');
    const unameError = document.getElementById('unameError');
    const passError = document.getElementById('passError');

    // Clear previous error messages
    nameError.textContent = '';
    emailError.textContent = '';
    unameError.textContent = '';
    passError.textContent = '';

    // Flag to check if form is valid
    let isValid = true;

    // Name validation
    if (name.value.trim() === '') {
        nameError.textContent = 'Name is required.';
        isValid = false;
    }

    // Email validation
    const emailPattern = /^[a-zA-Z0-9._%+-]+@(gmail\.com|yahoo\.com|outlook\.com|hotmail\.com|aol\.com|zoho\.com|protonmail\.com|icloud\.com|mail\.com|gmx\.com|yandex\.com)$/;
    if (email.value.trim() === '') {
        emailError.textContent = 'Email is required.';
        isValid = false;
    } else if (!emailPattern.test(email.value)) {
        emailError.textContent = 'Enter a valid email address.';
        isValid = false;
    }

    // Username validation
    if (uname.value.trim() === '') {
        unameError.textContent = 'Username is required.';
        isValid = false;
    }

    // Password validation
    if (pass.value.trim() === '') {
        passError.textContent = 'Password is required.';
        isValid = false;
    } else if (pass.value.length < 6) {
        passError.textContent = 'Password must be at least 6 characters long.';
        isValid = false;
    }

    // If form is valid, you can proceed with form submission
    if (isValid) {
        this.submit();  // Submit the form if all fields are valid
    }
});
