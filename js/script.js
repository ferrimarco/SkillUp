const hamburger = document.querySelector('.hamburger');
const navlinks = document.querySelector('.navlinks');
const userLog = document.querySelector('.user-log');

hamburger.addEventListener('click', () => {
    navlinks.classList.toggle('active');
    userLog.classList.toggle('active');
});
