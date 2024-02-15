jQuery(function($) {

    /* -----------------------------------------
    Preloader
    ----------------------------------------- */
    $('#preloader').delay(1000).fadeOut();
    $('#loader').delay(1000).fadeOut("slow");

    /* -----------------------------------------
    Navigation
    ----------------------------------------- */
    $('.menu-toggle').click(function() {
        $(this).toggleClass('open');
    });
    

    /* -----------------------------------------
    Rtl Check
    ----------------------------------------- */
    $.RtlCheck = function () {
        if ($('body').hasClass("rtl")) {
            return true;
        } else {
            return false;
        }
    }
    $.RtlSidr = function () {
        if ($('body').hasClass("rtl")) {
            return 'right';
        } else {
            return 'left';
        }
    }
    /* -----------------------------------------
    Header Search
    ----------------------------------------- */
    $('.header-search-wrap').find(".search-submit").bind('keydown', function(e) {
        var tabKey = e.keyCode === 9;
        if (tabKey) {
            e.preventDefault();
            $('.header-search-icon').focus();
        }
    });

    $('.header-search-icon').on('keydown', function(e) {
        var tabKey = e.keyCode === 9;
        var shiftKey = e.shiftKey;
        if ($('.header-search-wrap').hasClass('show')) {
            if (shiftKey && tabKey) {
                e.preventDefault();
                $('.header-search-wrap').removeClass('show');
                $('.header-search-icon').focus();
            }
        }
    });

    /* -----------------------------------------
    Keyboard Navigation
    ----------------------------------------- */
    $(window).on('load resize', function() {
        if ($(window).width() < 1200) {
            $('.main-navigation').find("li").last().bind('keydown', function(e) {
                if (e.which === 9) {
                    e.preventDefault();
                    $('#masthead').find('.menu-toggle').focus();
                }
            });
        } else {
            $('.main-navigation').find("li").unbind('keydown');
        }
    });

    var primary_menu_toggle = $('#masthead .menu-toggle');
    primary_menu_toggle.on('keydown', function(e) {
        var tabKey = e.keyCode === 9;
        var shiftKey = e.shiftKey;

        if (primary_menu_toggle.hasClass('open')) {
            if (shiftKey && tabKey) {
                e.preventDefault();
                $('.main-navigation').toggleClass('toggled');
                primary_menu_toggle.removeClass('open');
            };
        }
    });

    $('.header-search-wrap').find(".search-submit").bind('keydown', function(e) {
        var tabKey = e.keyCode === 9;
        if (tabKey) {
            e.preventDefault();
            $('.header-search-icon').focus();
        }
    });

    $('.header-search-icon').on('keydown', function(e) {
        var tabKey = e.keyCode === 9;
        var shiftKey = e.shiftKey;
        if ($('.header-search-wrap').hasClass('show')) {
            if (shiftKey && tabKey) {
                e.preventDefault();
                $('.header-search-wrap').removeClass('show');
                $('.header-search-icon').focus();
            }
        }
    });

    /* -----------------------------------------
    Search
    ----------------------------------------- */
    var searchWrap = $('.header-search-wrap');
    $(".header-search-icon").click(function(e) {
        e.preventDefault();
        searchWrap.toggleClass("show");
        searchWrap.find('input.search-field').focus();
    });
    $(document).click(function(e) {
        if (!searchWrap.is(e.target) && !searchWrap.has(e.target).length) {
            $(".header-search-wrap").removeClass("show");
        }
    });
    /* -----------------------------------------
    Banner slider  
    ----------------------------------------- */
    $('.banner-slider').slick({
        autoplay: false,
        autoplaySpeed: 3000,
        dots: false,
        arrows: true,
        rtl: $.RtlCheck(),
        nextArrow: '<button class="fa-solid fa-angle-right slick-next"></button>',
        prevArrow: '<button class="fa-solid fa-angle-left slick-prev"></button>',
    });

    /* -----------------------------------------
    Post Carousel
    ----------------------------------------- */
    $('.post-carousel').each(function(index) {
        var slidesToShow = 3;
        var widgetArea = $(this).closest('.ascendoor-widget-area');
        
        if (widgetArea.hasClass('above-footer-widgets-section') || widgetArea.hasClass('below-banner-widgets-section') || widgetArea.hasClass('primary-widgets-section') || widgetArea.hasClass('normal-layout')) {
            slidesToShow = 3;
        } else if (widgetArea.hasClass('wide-layout')) {
            slidesToShow = 4;
        } else {
            slidesToShow = 1;
        }
        
        var sliderId = 'post-carousel-' + Math.floor(Math.random() * 1000); // generate a random ID for the carousel
        var thumbnailId = sliderId + '-thumbnails';
        
        $(this).addClass(sliderId);
        $('.post-carousel_dots').eq(index).addClass(thumbnailId);
        
        $('.' + sliderId).slick({
            autoplay: false,
            autoplaySpeed: 3000,
            dots: false,
            arrows: true,
            adaptiveHeight: true,
            slidesToShow: slidesToShow,
            rtl: $.RtlCheck(),
            nextArrow: '<button class="fa-solid fa-angle-right slick-next"></button>',
            prevArrow: '<button class="fa-solid fa-angle-left slick-prev"></button>',
            responsive: [
            {
                breakpoint: 1025,
                settings: {
                    slidesToShow: (slidesToShow > 3) ? 3 : 2,
                }
            },
            {
                breakpoint: 600,
                settings: {
                        slidesToShow: (slidesToShow > 1) ? 2 : 1, // set to 2 if slidesToShow is greater than 1, otherwise set to 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: (slidesToShow > 1) ? 1 : slidesToShow, // set to 1 if slidesToShow is 1, otherwise keep the same value
                    }
                }
                ]
        });
        
        $('.' + thumbnailId).slick({
            infinite: true,
            slidesToShow: 3,
            slidesToScroll: 1,
            asNavFor: '.' + sliderId,
            arrows: false,
            dots: false,
            rtl: $.RtlCheck(),
            centerMode: true,
            focusOnSelect: true,
            centerPadding: '20%',
        });
    });
    
    
    /* -----------------------------------------
    Trending Carousel
    ----------------------------------------- */
    $('.magazine-trending-carousel-section-wrapper.style-1').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        infinite: true,
        loop: true,
        vertical: true,
        verticalSwiping: true,
        dots: false,
        prevArrow: false,
        nextArrow: false,
    });

    /* -----------------------------------------
    Marquee
    ----------------------------------------- */
    $('.marquee').marquee({
        speed: 600,
        gap: 0,
        delayBeforeStart: 0,
        direction: $.RtlSidr(),
        duplicated: true,
        pauseOnHover: true,
        startVisible: true
    });

    /* -----------------------------------------
    Scroll Top
    ----------------------------------------- */
    var scrollToTopBtn = $('.magazine-scroll-to-top');

    $(window).scroll(function() {
        if ($(window).scrollTop() > 400) {
            scrollToTopBtn.addClass('show');
        } else {
            scrollToTopBtn.removeClass('show');
        }
    });

    scrollToTopBtn.on('click', function(e) {
        e.preventDefault();
        $('html, body').animate({
            scrollTop: 0
        }, '300');
    });

    (function($) { "use strict";
      
     $(document).ready(function(){"use strict";
         
		//Scroll back to top
      
      var progressPath = document.querySelector('.progress-wrap path');
      if (progressPath !== null) {
        var pathLength = progressPath.getTotalLength();
        progressPath.style.transition = progressPath.style.WebkitTransition = 'none';
        progressPath.style.strokeDasharray = pathLength + ' ' + pathLength;
        progressPath.style.strokeDashoffset = pathLength;
        progressPath.getBoundingClientRect();
        progressPath.style.transition = progressPath.style.WebkitTransition = 'stroke-dashoffset 10ms linear';		
        var updateProgress = function () {
            var scroll = $(window).scrollTop();
            var height = $(document).height() - $(window).height();
            var progress = pathLength - (scroll * pathLength / height);
            progressPath.style.strokeDashoffset = progress;
        }
        updateProgress();
        $(window).scroll(updateProgress);	
    }
});
     
 })(jQuery); 

});