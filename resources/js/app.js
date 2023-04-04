import 'bootstrap';
import 'swiper/swiper-bundle.min.css';
import Swiper, { Navigation, Pagination } from 'swiper';
import 'swiper/swiper-bundle.css';

// Add this line
import '/node_modules/alpinejs/dist/cdn.min.js';

window.Alpine = Alpine;
Alpine.start();

document.addEventListener('DOMContentLoaded', () => {
    Swiper.use([Navigation, Pagination]);

    new Swiper('.swiper-container', {
        slidesPerView: 1,
        centeredSlides: true,
        autoplay: {
            delay: 3000,
            stopOnLastSlide: false,
            disableOnInteraction: false,
            reverseDirection: false
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        pagination: {
            el: '.swiper-pagination',
            type: 'bullets',
            clickable: true,
        },

    });
});
