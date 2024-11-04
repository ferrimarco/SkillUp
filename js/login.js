document.getElementById('toggle-login').addEventListener('click', function() {
    const registrationForm = document.querySelector('.registration-form');
    const loginForm = document.querySelector('.login-form');
    const heroTitle = document.getElementById('hero-title');

    // Toggle the visibility of forms
    registrationForm.classList.toggle('hidden');
    loginForm.classList.toggle('hidden');

    // Change hero title based on current form
    if (loginForm.classList.contains('hidden')) {
        heroTitle.textContent = 'Iscriviti a Skill-Up!';
    } else {
        heroTitle.textContent = 'Accedi a Skill-Up!';
    }
});

document.getElementById('toggle-sign-up').addEventListener('click', function() {
    const registrationForm = document.querySelector('.registration-form');
    const loginForm = document.querySelector('.login-form');
    const heroTitle = document.getElementById('hero-title');

    // Toggle the visibility of forms
    registrationForm.classList.toggle('hidden');
    loginForm.classList.toggle('hidden');

    // Change hero title based on current form
    if (loginForm.classList.contains('hidden')) {
        heroTitle.textContent = 'Iscriviti a Skill-Up!';
    } else {
        heroTitle.textContent = 'Accedi a Skill-Up!';
    }
});