/**
 * Template Name: SoftLand - v4.3.0
 * Template URL: https://bootstrapmade.com/softland-bootstrap-app-landing-page-template/
 * Author: BootstrapMade.com
 * License: https://bootstrapmade.com/license/
 */
(function () {
    "use strict";

    /**
     * Easy selector helper function
     */
    const select = (el, all = false) => {
        el = el.trim()
        if (all) {
            return [...document.querySelectorAll(el)]
        } else {
            return document.querySelector(el)
        }
    }

    /**
     * Easy event listener function
     */
    const on = (type, el, listener, all = false) => {
        let selectEl = select(el, all)
        if (selectEl) {
            if (all) {
                selectEl.forEach(e => e.addEventListener(type, listener))
            } else {
                selectEl.addEventListener(type, listener)
            }
        }
    }

    /**
     * Easy on scroll event listener 
     */
    const onscroll = (el, listener) => {
        el.addEventListener('scroll', listener)
    }

    /**
     * Toggle .header-scrolled class to #header when page is scrolled
     */
    let selectHeader = select('#header')
    if (selectHeader) {
        const headerScrolled = () => {
            if (window.scrollY > 0) {
                selectHeader.classList.add('header-scrolled')
            } else {
                selectHeader.classList.remove('header-scrolled')
            }
        }
        window.addEventListener('load', headerScrolled)
        onscroll(document, headerScrolled)
    }

    /**
     * Fires the scrollto function on click to links .scrollto
     */
    let selectScrollto = document.querySelectorAll('.scrollto');
    selectScrollto.forEach(el => el.addEventListener('click', function (event) {
        if (document.querySelector(this.hash)) {
            event.preventDefault();

            let mobileNavActive = document.querySelector('.mobile-nav-active');
            if (mobileNavActive) {
                mobileNavActive.classList.remove('mobile-nav-active');

                let navbarToggle = document.querySelector('.mobile-nav-toggle');
                navbarToggle.classList.toggle('bi-list');
                navbarToggle.classList.toggle('bi-x');
            }
            scrollto(this.hash);
        }
    }));

    /**
     * Mobile nav toggle
     */

    const mobileNavToogle = document.querySelector('.mobile-nav-toggle');
    if (mobileNavToogle) {
        mobileNavToogle.addEventListener('click', function (event) {
            event.preventDefault();

            document.querySelector('body').classList.toggle('mobile-nav-active');

            this.classList.toggle('bi-list');
            this.classList.toggle('bi-x');
        });
    }

    //  $(document).delegate("div", "click", function() {
    //   window.location = $(this).find("a").attr("href");
    // });

    /**
     * Back to top button
     */
    let backtotop = select('.back-to-top')
    if (backtotop) {
        const toggleBacktotop = () => {
            if (window.scrollY > 100) {
                backtotop.classList.add('active')
            } else {
                backtotop.classList.remove('active')
            }
        }
        window.addEventListener('load', toggleBacktotop)
        onscroll(document, toggleBacktotop)
    }

    /**
     * Mobile nav dropdowns activate
     */
    on('click', '.navbar .dropdown > a', function (e) {
        if (select('#navbar').classList.contains('navbar-mobile')) {
            e.preventDefault()
            this.nextElementSibling.classList.toggle('dropdown-active')
        }
    }, true)

    /**
     * Maps slider
     */
    new Swiper('.testimonials-slider', {
        speed: 600,
        loop: false,
        autoplay: {
          delay: 10000,
          disableOnInteraction: false
        },
        slidesPerView: 'auto',
        pagination: {
            el: '.swiper-pagination-maps',
            type: 'bullets',
            clickable: true
        }
    });

    new Swiper('.carousel', {
        slidesPerView: 'auto',
        pagination: {
            el: '.swiper-pagination-shop',
            type: 'bullets',
            clickable: true
        }
    });



    /**
     * Events slider
     */
    new Swiper('.events-slider', {
        speed: 600,
        loop: true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
        slidesPerView: 'auto',

    });

    /**
     * Clients Slider
     */
    new Swiper('.clients-slider', {
        speed: 400,
        loop: true,
        autoplay: {
            delay: 4000,
            disableOnInteraction: false
        },
        slidesPerView: 'auto',
        pagination: {
            el: '.swiper-pagination-ticket',
            type: 'bullets',
            clickable: true
        },
        breakpoints: {
            320: {
                slidesPerView: 1.3,
                spaceBetween: 40
            },
            480: {
                slidesPerView: 2.3,
                spaceBetween: 60
            },
            640: {
                slidesPerView: 2.5,
                spaceBetween: 40
            },
            800: {
                slidesPerView: 2.8,
                spaceBetween: 40
            },
            992: {
                slidesPerView: 3.3,
                spaceBetween: 40
            }
        }
    });

    /**
     * Ticket Slider
     */
    new Swiper('.tickets-slider', {
        speed: 400,
        loop: false,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false
        },
        limitProgress: '2',
        slidesPerView: 'auto',
        pagination: {
            el: '.swiper-pagination-ticket',
            type: 'bullets',
            clickable: true
        },

    });

    new Swiper('.clients-slider-media', {
        speed: 400,
        loop: true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false
        },
        slidesPerView: 'auto',
        pagination: {
            el: '.swiper-pagination',
            type: 'bullets',
            clickable: true
        },
        breakpoints: {
            320: {
                slidesPerView: 2,
                spaceBetween: 40
            },
            480: {
                slidesPerView: 2,
                spaceBetween: 60
            },
            768: {
                slidesPerView: 3,
                spaceBetween: 80
            },
            992: {
                slidesPerView: 3,
                spaceBetween: 240
            }
        }
    });

    new Swiper('.product-slider', {
        speed: 400,
        loop: false,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false
        },
        slidesPerView: 'auto',
        pagination: {
            el: '.swiper-pagination',
            type: 'bullets',
            clickable: true
        },
        breakpoints: {

            300: {
              slidesPerView: 1.8,
              spaceBetween: 0
            },
            465: {
              slidesPerView: 2.2,
              spaceBetween: 0
            },
            530: {
                slidesPerView: 2.5,
                spaceBetween: 0
            },
            768: {
                slidesPerView: 3.2,
                spaceBetween: 0
            },
            992: {
                slidesPerView: 4.7,
                spaceBetween: 0
            }
        }
    });


    /**
     * Porfolio isotope and filter
     */
    window.addEventListener('load', () => {
        let portfolioContainer = select('.portfolio-container');
        if (portfolioContainer) {
            let portfolioIsotope = new Isotope(portfolioContainer, {
                itemSelector: '.portfolio-item',
                layoutMode: 'fitRows'
            });

            let portfolioFilters = select('#portfolio-flters li', true);

            on('click', '#portfolio-flters li', function (e) {
                e.preventDefault();
                portfolioFilters.forEach(function (el) {
                    el.classList.remove('filter-active');
                });
                this.classList.add('filter-active');

                portfolioIsotope.arrange({
                    filter: this.getAttribute('data-filter')
                });
                portfolioIsotope.on('arrangeComplete', function () {
                    AOS.refresh()
                });
            }, true);
        }

    });

    /**
     * Animation on scroll
     */
    window.addEventListener('load', () => {
        AOS.init({
            duration: 1000,
            easing: 'ease-in-out',
            once: true,
            mirror: false
        })
    });

})()
