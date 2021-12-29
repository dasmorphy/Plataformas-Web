document.addEventListener('DOMContentLoaded', () => {
    const carousel = document.querySelectorAll('.carousel');
    M.Carousel.init(carousel, {
        duration: 150
    });
});