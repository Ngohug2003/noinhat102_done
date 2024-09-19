$(function() {

    $('.navbar-toggler').click(function() {
        $('.navbar-collapse.mobile').addClass('active');
        $('.overlay-mobile').addClass('show');
    });

    $('.overlay-mobile').click(function() {
        $('.navbar-collapse.mobile').removeClass('active');
        $('.overlay-mobile').removeClass('show');
    });



    $('.main-menu li').click(function(e) {
        e.preventDefault();
        $('.main-menu li').removeClass('active');
        $(this).addClass('active');
    });

    $('.dropdown').click(function() {
        $('#mega-menu').fadeToggle(600);
        $('.overlay-mobile').toggleClass('active');
    });

    $('.overlay-mobile').click(function() {
        $('.overlay-mobile').removeClass('active');
        $('#mega-menu').fadeOut();
    });

    $('.navbar-toggler').click(function() {
        $('.navbar.mobile').addClass('active');
        $('.overlay-mobile').addClass('show');
    });

    $('.overlay-mobile').click(function() {
        $('.navbar.mobile').removeClass('active');
        $('.overlay-mobile').removeClass('show');
    });


    //menu mobile
    $('.btn-dropmenu').click(function(event) {
        event.preventDefault();
        $(this).parent().find('ul:first').slideToggle();
        $(this).find('i').toggleClass('rotate');
    });

    // $('.video-sidebar .video').hide();
    // $('.video-link').click(function(e) {
    //     e.preventDefault();
    //     $('.video-link').hide();
    //     $('.video-sidebar .video').show();
    //     $(".video-sidebar .video iframe")[0].src += "?&autoplay=1";
    // });

    $('.comment-reply-link').click(function(e) {
        e.preventDefault();
        $(this).parents('.comment-item').find('.reply-form').addClass('show');
    });

    $('.cancel-comment-reply-link').click(function(e) {
        e.preventDefault();
        $(this).parents('.comment-item').find('.reply-form').removeClass('show');
    });


    $('.back-to-top').click(function(){
        $("body,html").animate({scrollTop: '0px'},1000);
    });



    // Slider home
    var swiper = new Swiper(".slide-home", {
        spaceBetween: 0,
        loop: true,
        navigation: {
            nextEl: ".swiper-button-next.slide-home-next",
            prevEl: ".swiper-button-prev.slide-home-prev",
        },
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        speed: 1000,
        loop: true,
    });


    // Project home
    function initializeSwipers() {
        var options = {
            spaceBetween: 0,
            loop: true,
            observer: true,
            observeParents: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            speed: 1000,
        };

        var swiper = new Swiper(".home-project-slide", {
            ...options,
            navigation: {
                nextEl: ".swiper-button-next.project-home-next",
                prevEl: ".swiper-button-prev.project-home-prev",
            },
        });

        var swiper2 = new Swiper(".home-project-slide-2", {
            ...options,
            navigation: {
                nextEl: ".swiper-button-next.project-home-next-2",
                prevEl: ".swiper-button-prev.project-home-prev-2",
            },
        });
    }
    initializeSwipers();


    $('a[data-toggle="pill"]').on('shown.bs.tab', function(e) {
        initializeSwipers();
    });

    // Slider about
    var swiper = new Swiper(".about-image-slide", {
        spaceBetween: 0,
        loop: true,
        navigation: {
            nextEl: ".swiper-button-next.about-slide-next",
            prevEl: ".swiper-button-prev.about-slide-prev",
        },
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        speed: 1000,
        loop: true,
    });

    //testimonials
    var swiper = new Swiper(".testimonials-slide", {

        slidesPerView: 3,
        spaceBetween: 30,
        pagination: {
            el: ".swiper-pagination.testimonials-pagination",
            clickable: true,
        },
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        speed: 1000,
        loop: true,

        navigation: {
            nextEl: ".swiper-button-next.testimonials-next",
            prevEl: ".swiper-button-prev.testimonials-prev",
        },
        breakpoints: {
            320: {
                slidesPerView: 1,
                spaceBetween: 10,
            },
            640: {
                slidesPerView: 1,
                spaceBetween: 10,
            },
            768: {
                slidesPerView: 2,
                spaceBetween: 20,
            },
            1024: {
                slidesPerView: 3,
                spaceBetween: 30,
            },
        },
    });


    //Partner
    var swiper = new Swiper(".swiper-container.partner-slide", {

        slidesPerView: 6,
        spaceBetween: 20,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        slidesPerColumn: 2,
        slidesPerColumnFill: 'column',
        loopFillGroupWithBlank: true,
        speed: 1000,
        loop: true,
        navigation: {
            nextEl: ".testimonials-next",
            prevEl: ".testimonials-prev",
        },
        breakpoints: {
            320: {
                slidesPerView: 2,
                spaceBetween: 10,
            },
            640: {
                slidesPerView: 4,
                spaceBetween: 10,
            },
            768: {
                slidesPerView: 4,
                spaceBetween: 10,
            },
            1024: {
                slidesPerView: 6,
                spaceBetween: 10,
            },
        },
    });

    //Project gallery
    var swiper = new Swiper(".project-gallery-slide", {
        slidesPerView: 2.10,
        spaceBetween: 20,
        autoplay: {
            delay: 6000,
            disableOnInteraction: false,
        },
        speed: 1000,
        centeredSlides: true,
        loop: true,
        navigation: {
            nextEl: ".project-gallery-next",
            prevEl: ".project-gallery-prev",
        },
        breakpoints: {
            320: {
                slidesPerView: 1,
                spaceBetween: 10,
            },
            640: {
                slidesPerView: 1,
                spaceBetween: 10,
            },
            768: {
                slidesPerView: 2,
                spaceBetween: 10,
            },
            1024: {
                slidesPerView: 2.10,
                spaceBetween: 10,
            },
        },
    });


    var swiper = new Swiper(".gallery-2", {
        speed: 1000,
        spaceBetween: 10,
        slidesPerView: 4,
        freeMode: true,
        watchSlidesVisibility: true,
        watchSlidesProgress: true,
        observer: true,
        observeParents: true,

    });
    var swiper2 = new Swiper(".gallery-1", {
        loop: true,
        speed: 1000,
        spaceBetween: 10,
        thumbs: {
            swiper: swiper,
        },
        navigation: {
            nextEl: ".gallery-next-2",
            prevEl: ".gallery-prev-2",
        },
        observer: true,
        observeParents: true,
    });


    //Similar-product
    var swiper = new Swiper(".similar-product-slide", {

        slidesPerView: 4,
        spaceBetween: 20,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        speed: 1000,
        loop: true,

        navigation: {
            nextEl: ".similar-product-next",
            prevEl: ".similar-product-prev",
        },
        breakpoints: {
            320: {
                slidesPerView: 1,
                spaceBetween: 10,
            },
            640: {
                slidesPerView: 1,
                spaceBetween: 10,
            },
            768: {
                slidesPerView: 3,
                spaceBetween: 20,
            },
            1024: {
                slidesPerView: 4,
                spaceBetween: 20,
            },
        },
    });

    //Tin tức
    var swiper = new Swiper(".swiper-container.news-slide", {

        slidesPerView: 4,
        spaceBetween: 30,
        pagination: {
            el: ".swiper-pagination.news-slide-pagination",
            clickable: true,
        },
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        speed: 1000,
        loop: true,

        // navigation: {
        //     nextEl: ".product-sale-next",
        //     prevEl: ".product-sale-prev",
        // },
        breakpoints: {
            320: {
                slidesPerView: 1,
                spaceBetween: 10,
            },
            640: {
                slidesPerView: 1,
                spaceBetween: 10,
            },
            768: {
                slidesPerView: 3,
                spaceBetween: 20,
            },
            1024: {
                slidesPerView: 4,
                spaceBetween: 30,
            },
        },
    });


});