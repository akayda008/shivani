document.addEventListener('DOMContentLoaded', () => {
    const registerForm = document.getElementById('registerForm');
    const loginForm = document.getElementById('loginForm');

    if (registerForm) {
        registerForm.addEventListener('submit', registerUser);
    }

    if (loginForm) {
        loginForm.addEventListener('submit', loginUser);
    }
});

function registerUser(event) {
    event.preventDefault(); // Prevent form from submitting

    const fullName = document.getElementById('fullName').value.trim();
    const username = document.getElementById('username').value.trim();
    const email = document.getElementById('email').value.trim();
    const phone = document.getElementById('phone').value.trim();
    const password = document.getElementById('password').value.trim();
    const portfolioInterest = document.getElementById('portfolioInterest').value;

    if (validateRegistration(fullName, username, email, phone, password, portfolioInterest)) {
        const newUser = {
            fullName,
            username,
            email,
            phone,
            password,
            portfolioInterest
        };

        let users = JSON.parse(localStorage.getItem('users')) || []; // Retrieve existing users or initialize an empty array
        users.push(newUser); // Add new user to the array

        localStorage.setItem('users', JSON.stringify(users)); // Save the updated array back to localStorage
        alert('Registration successful!');
        window.location.href = 'login.html'; // Redirect to login page after registration
    }
}

function validateRegistration(fullName, username, email, phone, password, portfolioInterest) {
    if (password.length < 8) {
        alert('Password must be at least 8 characters long.');
        return false;
    }
    if (phone && !/^\d{10}$/.test(phone)) {
        alert('Phone number must be 10 digits.');
        return false;
    }
    if (!portfolioInterest) {
        alert('Please select an area of interest.');
        return false;
    }
    return true;
}

function loginUser(event) {
    event.preventDefault(); // Prevent form from submitting

    const loginUsername = document.getElementById('loginUsername').value.trim();
    const loginPassword = document.getElementById('loginPassword').value.trim();

    const users = JSON.parse(localStorage.getItem('users')) || []; // Retrieve the array of users

    const user = users.find(user => user.username === loginUsername && user.password === loginPassword);

    if (user) {
        document.getElementById('welcomeMessage').innerText = `Welcome, ${user.fullName}!`;
        window.location.href = 'index.html'; // Redirect to home page (index.html) after login
    } else {
        alert('Invalid username or password.');
    }
}
