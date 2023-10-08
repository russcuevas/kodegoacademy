// ACTIVE LINK NAVBAR
var currentPath = window.location.pathname;


var homeLink = document.getElementById('home-link');
var aboutLink = document.getElementById('about-link');
var courseLink = document.getElementById('course-link');
var contactLink = document.getElementById('contact-link');

if (currentPath.includes('/home')) {
    homeLink.classList.add('active-link');
} else if (currentPath.includes('/about')) {
    aboutLink.classList.add('active-link');
} else if (currentPath.includes('/courses')) {
    courseLink.classList.add('active-link');
} else if (currentPath.includes('/contact')) {
    contactLink.classList.add('active-link');
}

// FLIP ABOUT IMG
const autoFlipImage = document.getElementById('autoFlipImage');

setInterval(function () {
    autoFlipImage.classList.toggle('flip');
}, 1000);

// ANIMATION JS
const animatedElements = document.querySelectorAll('.animate__animated');

const observer = new IntersectionObserver((entries, observer) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('animate__fadeIn');
            observer.unobserve(entry.target);
        }
    });
});

animatedElements.forEach(element => {
    observer.observe(element);
});