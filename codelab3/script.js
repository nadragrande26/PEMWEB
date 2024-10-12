document.getElementById('contactForm').addEventListener('submit', function (e) {
    e.preventDefault();  // Prevent form from submitting automatically

    const name = document.getElementById('name').value.trim();
    const email = document.getElementById('email').value.trim();
    const phone = document.getElementById('phone').value.trim();
    const address = document.getElementById('address').value.trim();
    const errorMsg = document.getElementById('error-msg');
    let isValid = true;
    let message = '';

    // Reset error message
    errorMsg.textContent = '';

    // Name validation (not empty)
    if (name === '') {
        isValid = false;
        message += 'Name cannot be empty. ';
    }

    // Email validation (basic format check)
    const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    if (!emailPattern.test(email)) {
        isValid = false;
        message += 'Please enter a valid email. ';
    }

    // Phone number validation (must be numeric)
    const phonePattern = /^[0-9]+$/;
    if (!phonePattern.test(phone)) {
        isValid = false;
        message += 'Phone number must contain only numbers. ';
    }

    // Address validation (not empty)
    if (address === '') {
        isValid = false;
        message += 'Address cannot be empty.';
    }

    // If valid, show success message; if not, show error message
    if (isValid) {
        alert('Form submitted successfully!');
    } else {
        // Display error message in both alert and below the form
        alert(message);
        errorMsg.textContent = message;
    }
});