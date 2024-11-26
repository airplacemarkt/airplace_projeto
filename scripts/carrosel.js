let slideIndex = 0;

function showSlides() {
    const slides = document.querySelectorAll('.carrossel-slide');
    if (slideIndex >= slides.length) {
        slideIndex = 0;
    } else if (slideIndex < 0) {
        slideIndex = slides.length - 1;
    }
    for (let i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slides[slideIndex].style.display = "block";
}

function moveSlide(n) {
    slideIndex += n;
    showSlides();
}

// Inicializa o carrossel
showSlides();
let currentIndex = 0;

function updateCarousel() {
    const carousel = document.querySelector('.carousel');
    const items = document.querySelectorAll('.carousel-item');
    const offset = -currentIndex * (items[0].offsetWidth + 30); // 30 é a soma das margens laterais
    carousel.style.transform = `translateX(${offset}px)`;
}

function nextSlide() {
    const items = document.querySelectorAll('.carousel-item');
    currentIndex = (currentIndex + 1) % items.length; // Avança e volta ao início após o último
    updateCarousel();
}

function prevSlide() {
    const items = document.querySelectorAll('.carousel-item');
    currentIndex = (currentIndex - 1 + items.length) % items.length; // Retrocede e volta ao último após o primeiro
    updateCarousel();
}