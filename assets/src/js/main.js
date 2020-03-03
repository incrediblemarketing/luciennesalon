(function($, window, document, undefined) {
    'use strict';

    $(document).ready(function() {
        var $cache = {
            window: $(window),
            document: $(document),
            html: $('html').eq(0),
            body: $('body').eq(0),
            jsToTop: $('.js-to-top'),
            jsScrollTo: $('.js-scroll-to'),
            siteWrap: $('.site-wrap'),
            siteNavSticky: $('.site-nav-sticky').eq(0)
        };

        var IM = {
            init: function() {
                this.utils.init();
            },
            utils: {
                init: function() {
                    this.scrollTo();
                    this.dataCss();
                    this.stickySiteNav();
                    this.scrollMagic();
                    this.galleryCarousel();
                    this.heroRotator();
                    this.miniGallery();
                    this.primaryOverlay();
                    this.procedureToggle();
                    this.proceduresHover();
                    this.proceduresRotator();
                    this.recentPosts();
                    this.stickyHeader();
                    this.testimonialsRotator();
                    this.scrollingSidebar();
                },
                scrollingSidebar: function() {
                    var $sidebar = $('.sidebar-scroll');

                    if ($sidebar.length > 0) {
                        var $sidebarTop = $sidebar.offset().top - 70;
                        var $contentHeight = $('.content .pad-v-md').height();
                        var $sidebarHeight = $('.sidebar-right .pad-v-md').height();

                        if ($sidebarTop > 0 && $contentHeight > $sidebarHeight) {
                            $cache.window.scroll(function() {
                                if ($cache.window.scrollTop() >= $sidebarTop) {
                                    $sidebar.addClass('scrolling');
                                } else {
                                    $sidebar.removeClass('scrolling');
                                }
                            });
                        }
                    }
                },
                scrollTo: function() {
                    // Animate the scroll to top
                    $cache.jsToTop.on('click', function(e) {
                        e.preventDefault();
                        $('html, body').animate({scrollTop: 0}, 300);
                    });

                    // Animate scroll to id
                    $cache.jsScrollTo.on('click', function(e) {
                        e.preventDefault();
                        var href = $(this).attr('href'),
                            scrollPoint = $(href).offset();
                        $('html, body').animate({scrollTop: scrollPoint.top}, 300);
                    });
                },
                dataCss: function() {
                    $('[data-bg]').each(function() {
                        var bg = $(this).data('bg');
                        $(this).css('background', '#fff url("' + bg + '") top center/cover no-repeat');
                    });

                    $('[data-bgc]').each(function() {
                        var bgcolor = $(this).data('bgc');
                        $(this).css('background-color', bgcolor);
                    });

                    $('[data-color]').each(function() {
                        var color = $(this).data('color');
                        $(this).css('color', color);
                    });

                    $('[data-size]').each(function() {
                        var size = $(this).data('size');
                        $(this).css('font-size', size);
                    });
                },
                stickySiteNav: function() {
                    var stickyTop = $cache.siteNavSticky.height() + 200;
                    var header4 = $('#header.header4');
                    var header3 = $('#header.header3');

                    $cache.window.scroll(function() {
                        if ($cache.window.scrollTop() >= stickyTop) {
                            $cache.siteNavSticky.addClass('visible');
                        } else {
                            $cache.siteNavSticky.removeClass('visible');
                        }
                    });

                    if (header3.length > 0) {
                        $('body').addClass('h3-header');

                        $cache.window.scroll(function() {
                            if ($cache.window.scrollTop() > 0) {
                                $('.h3-header').addClass('scrolling');
                            } else {
                                $('.h3-header').removeClass('scrolling');
                            }
                        });
                    }
                    if (header4.length > 0) {
                        $('body').addClass('h4-header');

                        $cache.window.scroll(function() {
                            if ($cache.window.scrollTop() >= header4.outerHeight()) {
                                $('.h4-header').addClass('scrolling');
                            } else {
                                $('.h4-header').removeClass('scrolling');
                            }
                        });
                    }
                },
                scrollMagic: function() {
                    var $blocks = $cache.siteWrap.children('.block'),
                        controller = new ScrollMagic.Controller();

                    $blocks.each(function(i, item) {
                        new ScrollMagic.Scene({
                            triggerElement: item,
                            duration: item.outerHeight,
                            triggerHook: 0.9,
                            reverse: false
                        })
                            .on('enter', function() {
                                var $current = $blocks.eq(i);
                                // Example usage
                                // if ($current.hasClass('hero')) {
                                //     var tl = new TimelineMax({ paused: true, force3D: true, ease: Circ.easeInOut }),
                                //         bg = $current.children('.bg-image'),
                                //         parallaxer = $current.find('.parallax').children(),
                                //         opts = { delay: 0.6 },
                                //         duration = 1.5,
                                //         fromOpts = { drawSVG: '0' },
                                //         toOpts = { drawSVG: '100% 0', visibility: 'visible', ease: Circ.easeInOut },
                                //         path = document.querySelectorAll('.hero svg path');

                                //     if (winWidth >= mobile) {
                                //         var scene = document.getElementById('scene'),
                                //             parallax = new Parallax(scene);
                                //     }

                                //     tl.to(bg, 0.6, { autoAlpha: 1 });
                                //     tl.to(parallaxer, 0.6, { opacity: 1 }, '-=0.3');
                                //     tl.set(path, { fill: '#343130', attr: { 'fill-opacity': 0 } });
                                //     tl.fromTo(path, duration, fromOpts, toOpts);
                                //     tl.to(path, 0.6, { attr: { 'fill-opacity': 1 } });
                                //     tl.play();
                                // }
                            })
                            // Comment "addIndicators()" in/out to use
                            // .addIndicators()
                            .addTo(controller);
                    });
                },

                stickyHeader: function() {
                    var stickyTop = $('#header').height() + 200;

                    $(window).scroll(function() {
                        if ($(window).scrollTop() >= stickyTop) {
                            $('#stickyHeader').addClass('slideDown');
                        } else {
                            $('#stickyHeader').removeClass('slideDown');
                        }
                    });
                },
                procedureToggle: function() {
                    $('.procedure-header').click(function() {
                        if (!$(this).hasClass('active')) {
                            $('.procedure-info.active').toggle('slow');
                            $('.procedure-info.active').toggleClass('active');
                            $('.procedure-header.active').toggleClass('active');
                        }
                        $(this)
                            .next('.procedure-info')
                            .toggle('slow');
                        $(this)
                            .next('.procedure-info')
                            .toggleClass('active');
                        $(this).toggleClass('active');
                    });
                },
                proceduresHover: function() {
                    if ($('.procedures-accordian').length > 0) {
                        $('.procedures > li').hover(
                            function() {
                                $('.procedures').addClass('active');
                                $('.procedures')
                                    .find('.active')
                                    .removeClass('active');
                                $(this).addClass('active');
                            },
                            function() {
                                $('.procedures').removeClass('active');
                                $(this).removeClass('active');
                            }
                        );
                    }
                },
                miniGallery: function() {
                    var mySwiper = new Swiper('.mini-gallery', {
                        slidesPerView: 1,
                        spaceBetween: 0,
                        loop: true,
                        mousewheel: true,
                        navigation: {
                            nextEl: '.swiper-button-next',
                            prevEl: '.swiper-button-prev'
                        }
                    });
                },
                recentPosts: function() {
                    var mySwiper = new Swiper('.postsslider', {
                        slidesPerView: 4,
                        spaceBetween: 0,
                        loop: true,
                        mousewheel: false,
                        navigation: {
                            nextEl: '.swiper-button-next',
                            prevEl: '.swiper-button-prev'
                        }
                    });
                },
                testimonialsRotator: function() {
                    var mySwiper = new Swiper('.testimonials-rotator', {
                        slidesPerView: 1,
                        spaceBetween: 0,
                        loop: true,
                        mousewheel: true,
                        navigation: {
                            nextEl: '.swiper-button-next',
                            prevEl: '.swiper-button-prev'
                        }
                    });
                },
                proceduresRotator: function() {
                    var mySwiper = new Swiper('.procedures-rotator', {
                        autoHeight: true,
                        slidesPerView: 'auto',
                        spaceBetween: 0,
                        mousewheel: false,
                        freeMode: false,
                        navigation: {
                            nextEl: '.swiper-button-next',
                            prevEl: '.swiper-button-prev'
                        }
                    });

                    var mySwiper = new Swiper('.single-gallery', {
                        slidesPerView: 1,
                        spaceBetween: 15,
                        navigation: {
                            nextEl: '.swiper-button-next',
                            prevEl: '.swiper-button-prev'
                        }
                    });

                    var mySwiper = new Swiper('.procedures-half-rotator', {
                        slidesPerView: 'auto',
                        spaceBetween: 0,
                        mousewheel: true,
                        freeMode: true,
                        navigation: {
                            nextEl: '.swiper-button-next',
                            prevEl: '.swiper-button-prev'
                        }
                    });

                    if ($cache.window.width() < 767) {
                        var mySwiper = new Swiper('.procedure__grid--container', {
                            slidesPerView: 'auto',
                            spaceBetween: 30,
                            centeredSlides: true,
                            mousewheel: true,
                            navigation: {
                                nextEl: '.swiper-button-next',
                                prevEl: '.swiper-button-prev'
                            }
                        });
                    }

                    $('.procedures-hover').hover(function() {
                        $(this)
                            .find('.info, .cover')
                            .fadeToggle(300);
                    });
                },
                primaryOverlay: function() {
                    if ($('.primary-overlay').length > 0) {
                        $('.primary-overlay').each(function() {
                            var t = $(this);
                            t.addClass('hasOverlay');
                            t.append('<div class="primary-overlay"></div>');
                            t.removeClass('primary-overlay');
                        });
                    }
                },
                heroRotator: function() {
                    var swiper2 = new Swiper('.hero-rotator', {
                        autoplay: {
                            delay: 6000,
                            disableOnInteraction: false
                        },
                        loop: true,
                        navigation: {
                            nextEl: '.swiper-button-next',
                            prevEl: '.swiper-button-prev'
                        }
                    });
                },
                galleryCarousel: function() {
                    var swiper = new Swiper('.gallery-carousel', {
                        navigation: {
                            nextEl: '.swiper-button-next',
                            prevEl: '.swiper-button-prev'
                        }
                    });

                    var swiper = new Swiper('.gallery-carousel-archive', {
                        slidesPerView: 3,
                        navigation: {
                            nextEl: '.swiper-button-next',
                            prevEl: '.swiper-button-prev'
                        },
                        breakpoints: {
                            1201: {
                                slidesPerView: 3
                            },
                            991: {
                                slidesPerView: 2
                            },
                            580: {
                                slidesPerView: 1
                            }
                        }
                    });
                }
            }
        };

        IM.init();
    });
})(jQuery, window, document);
