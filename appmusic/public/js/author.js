document.addEventListener('DOMContentLoaded', () => {
    const loginButton = document.getElementById('loginButton');
    const registerButton = document.getElementById('registerButton');
    const loginForm = document.getElementById('loginForm');
    const registerForm = document.getElementById('registerForm');
    const headerRight = document.querySelector('.header-right');

    loginButton.addEventListener('click', () => {
        loginForm.classList.toggle('hidden');
        registerForm.classList.add('hidden');
    });

    registerButton.addEventListener('click', () => {
        registerForm.classList.toggle('hidden');
        loginForm.classList.add('hidden');
    });

    loginForm.addEventListener('submit', (e) => {
        e.preventDefault();
        headerRight.classList.remove('hidden');
        loginForm.classList.add('hidden');
    });

    registerForm.addEventListener('submit', (e) => {
        e.preventDefault();
        headerRight.classList.remove('hidden');
        registerForm.classList.add('hidden');
    });
});
