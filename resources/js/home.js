<script src="https://unpkg.com/swiper/swiper-bundle.min.js" > </script>

var slides = [];
var swiper;

function updateSlides() {
    if (window.innerWidth <= 768) {
        // Mobile slides
        slides = [{
            image: 'images/home/slider/slidem1.jpg',
            alt: 'Mobile Slide 1',
            link: '#'
        },
        {
            image: 'images/home/slider/slidem2.jpg',
            alt: 'Mobile Slide 1',
            link: '#'
        },
        {
            image: 'images/home/slider/slidem3.jpg',
            alt: 'Mobile Slide 1',
            link: '#'
        },
        {
            image: 'images/home/slider/slidem4.jpg',
            alt: 'Mobile Slide 1',
            link: '#'
        },
        {
            image: 'images/home/slider/slidem5.jpg',
            alt: 'Mobile Slide 1',
            link: '#'
        },
        {
            image: 'images/home/slider/slidem6.jpg',
            alt: 'Mobile Slide 1',
            link: '#'
        },
            // Add more mobile slides as needed
        ];
    } else {
        // Desktop slides
        slides = [{
            image: 'images/home/slider/slide1.jpg',
            alt: 'Desktop Slide 1',
            link: '#'
        },
        {
            image: 'images/home/slider/slide2.jpg',
            alt: 'Desktop Slide 2',
            link: '#'
        },
        {
            image: 'images/home/slider/slide2.jpg',
            alt: 'Desktop Slide 3',
            link: '#'
        },
        {
            image: 'images/home/slider/slide2.jpg',
            alt: 'Desktop Slide 4',
            link: '#'
        },
        {
            image: 'images/home/slider/slide2.jpg',
            alt: 'Desktop Slide 5',
            link: '#'
        },
        {
            image: 'images/home/slider/slide2.jpg',
            alt: 'Desktop Slide 6',
            link: '#'
        },
            // Add more desktop slides as needed
        ];
    }

    var swiperWrapper = document.querySelector('.swiper-wrapper');
    swiperWrapper.innerHTML = ''; // Clear existing slides

    slides.forEach(function (slide) {
        var slideHtml = `
                    <div class="swiper-slide relative">
                        <a href="${slide.link}">
                            <img src="${slide.image}" alt="${slide.alt}" class="slide-image">
                        </a>
                    </div>
                `;
        swiperWrapper.innerHTML += slideHtml;
    });

    if (swiper) {
        swiper.destroy(); // Destroy existing Swiper instance
    }

    swiper = new Swiper('.swiper-container-responsive', {
        slidesPerView: 1,
        loop: true,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
    });
}

// Initial update and event listener
updateSlides();
window.addEventListener('resize', updateSlides);




const toggleButtons = document.querySelectorAll('.toggle-icon');
const questionLinks = document.querySelectorAll('.faqbutton a'); // Select all the question links

toggleButtons.forEach(button => {
    button.addEventListener('click', () => {
        const answer = button.parentElement.nextElementSibling;
        toggleAnswer(answer, button);
    });
});

questionLinks.forEach(link => {
    link.addEventListener('click', (event) => {
        event.preventDefault(); // Prevent the default link behavior
        const answer = link.parentElement.nextElementSibling;
        const toggleButton = link.parentElement.querySelector('.toggle-icon');
        toggleAnswer(answer, toggleButton);
    });
});

function toggleAnswer(answer, button) {
    if (answer.classList.contains('hidden')) {
        answer.classList.remove('hidden');
        button.textContent = '-';
        button.classList.add('bg-gray-600');
    } else {
        answer.classList.add('hidden');
        button.textContent = '+';
        button.classList.remove('bg-gray-600');
    }
}


// Function to initialize Swiper on desktop
function initDesktopSwiper() {
    new Swiper('.custom-swiper-container', {
        slidesPerView: 3.6, // Show 3 slides on desktop
        spaceBetween: 16,
        loop: true,
        autoplay: {
            delay: 3000,
        },
    });
}

// Function to initialize Swiper on mobile
function initMobileSwiper() {
    new Swiper('.custom-swiper-container', {
        slidesPerView: 1.6, // Show 1 slide at a time on mobile
        spaceBetween: 16,
        loop: true,
        autoplay: {
            delay: 3000,
        },
    });
}

// Check the screen width and initialize the appropriate Swiper instance
function initSwiperBasedOnScreenWidth() {
    if (window.innerWidth < 640) {
        // Mobile screen
        initMobileSwiper();
    } else {
        // Desktop screen
        initDesktopSwiper();
    }
}

// Initial initialization based on screen width
initSwiperBasedOnScreenWidth();

// Update Swiper when the window is resized
window.addEventListener('resize', initSwiperBasedOnScreenWidth);
src = "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.12/js/intlTelInput.min.js"
const phoneInput = document.querySelector("#phoneInput");

const iti = window.intlTelInput(phoneInput, {
    initialCountry: "ae", // Set default country
    separateDialCode: true,
    utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.12/js/utils.js",
});

phoneInput.addEventListener("blur", () => {
    const phoneNumber = iti.getNumber();
    phoneInput.value = phoneNumber;
});


document.addEventListener('DOMContentLoaded', function () {
    var companyLogoSwiper = new Swiper('.companylogo-carousel', {
        slidesPerView: 3,
        spaceBetween: 14,
        loop: true,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        breakpoints: {
            640: {
                slidesPerView: 6,
                spaceBetween: 14,
            },
        },
    });

    // Manually clone the slides for desktop version
    var desktopSlides = document.querySelectorAll('.companylogo-carousel .swiper-slide');
    var desktopSlideCount = desktopSlides.length;

    if (window.innerWidth > 640) {
        for (var i = 0; i < desktopSlideCount; i++) {
            var cloneSlide = desktopSlides[i].cloneNode(true);
            cloneSlide.classList.add('swiper-slide-duplicate');
            companyLogoSwiper.wrapperEl.appendChild(cloneSlide);
        }
    }
});



const searchButton = document.getElementById('searchButton');
const searchBar = document.getElementById('searchBar');
const menuButton = document.getElementById('menuButton');
const mobileMenu = document.getElementById('mobileMenu');
const closeMenuButton = document.getElementById('closeMenuButton');

searchButton.addEventListener('click', () => {
    searchBar.classList.toggle('hidden');
});

// Toggle menu visibility using existing classes
menuButton.addEventListener('click', () => {
    mobileMenu.classList.toggle('translate-x-full');
});

closeMenuButton.addEventListener('click', () => {
    mobileMenu.classList.add('translate-x-full');
});