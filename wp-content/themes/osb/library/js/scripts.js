/*
 * Bones Scripts File
 * Author: Eddie Machado
 *
 * This file should contain any js scripts you want to add to the site.
 * Instead of calling it in the header or throwing it inside wp_head()
 * this file will be called automatically in the footer so as not to
 * slow the page load.
 *
 * There are a lot of example functions and tools in here. If you don't
 * need any of it, just remove it. They are meant to be helpers and are
 * not required. It's your world baby, you can do whatever you want.
 */


/*
 * Get Viewport Dimensions
 * returns object with viewport dimensions to match css in width and height properties
 * ( source: http://andylangton.co.uk/blog/development/get-viewport-size-width-and-height-javascript )
 */
function updateViewportDimensions() {
    var w = window, d = document, e = d.documentElement, g = d.getElementsByTagName('body')[0], x = w.innerWidth || e.clientWidth || g.clientWidth, y = w.innerHeight || e.clientHeight || g.clientHeight;
    return {width: x, height: y};
}
// setting the viewport width
var viewport = updateViewportDimensions();


/*
 * Throttle Resize-triggered Events
 * Wrap your actions in this function to throttle the frequency of firing them off, for better performance, esp. on mobile.
 * ( source: http://stackoverflow.com/questions/2854407/javascript-jquery-window-resize-how-to-fire-after-the-resize-is-completed )
 */
var waitForFinalEvent = (function () {
    var timers = {};
    return function (callback, ms, uniqueId) {
        if (!uniqueId) {
            uniqueId = "Don't call this twice without a uniqueId";
        }
        if (timers[uniqueId]) {
            clearTimeout(timers[uniqueId]);
        }
        timers[uniqueId] = setTimeout(callback, ms);
    };
})();

// how long to wait before deciding the resize has stopped, in ms. Around 50-100 should work ok.
var timeToWaitForLast = 100;


/*
 * Here's an example so you can see how we're using the above function
 *
 * This is commented out so it won't work, but you can copy it and
 * remove the comments.
 *
 *
 *
 * If we want to only do it on a certain page, we can setup checks so we do it
 * as efficient as possible.
 *
 * if( typeof is_home === "undefined" ) var is_home = $('body').hasClass('home');
 *
 * This once checks to see if you're on the home page based on the body class
 * We can then use that check to perform actions on the home page only
 *
 * When the window is resized, we perform this function
 * $(window).resize(function () {
 *
 *    // if we're on the home page, we wait the set amount (in function above) then fire the function
 *    if( is_home ) { waitForFinalEvent( function() {
 *
 *	// update the viewport, in case the window size has changed
 *	viewport = updateViewportDimensions();
 *
 *      // if we're above or equal to 768 fire this off
 *      if( viewport.width >= 768 ) {
 *        console.log('On home page and window sized to 768 width or more.');
 *      } else {
 *        // otherwise, let's do this instead
 *        console.log('Not on home page, or window sized to less than 768.');
 *      }
 *
 *    }, timeToWaitForLast, "your-function-identifier-string"); }
 * });
 *
 * Pretty cool huh? You can create functions like this to conditionally load
 * content and other stuff dependent on the viewport.
 * Remember that mobile devices and javascript aren't the best of friends.
 * Keep it light and always make sure the larger viewports are doing the heavy lifting.
 *
 */

/*
 * We're going to swap out the gravatars.
 * In the functions.php file, you can see we're not loading the gravatar
 * images on mobile to save bandwidth. Once we hit an acceptable viewport
 * then we can swap out those images since they are located in a data attribute.
 */
function loadGravatars() {
    // set the viewport using the function above
    viewport = updateViewportDimensions();
    // if the viewport is tablet or larger, we load in the gravatars
    if (viewport.width >= 768) {
        jQuery('.comment img[data-gravatar]').each(function () {
            jQuery(this).attr('src', jQuery(this).attr('data-gravatar'));
        });
    }
} // end function


/*
 * Put all your regular jQuery in here.
 */
jQuery(document).ready(function ($) {



    /*
     * Smooth scroll
     */


    // Select all links with hashes
    $('a[href*="#"]')
    // Remove links that don't actually link to anything
        .not('[href="#"]')
        .not('[href="#0"]')
        .click(function (event) {
            // On-page links
            if (
                location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
                &&
                location.hostname == this.hostname
            ) {
                // Figure out element to scroll to
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                // Does a scroll target exist?
                if (target.length) {
                    // Only prevent default if animation is actually gonna happen
                    event.preventDefault();
                    $('html, body').animate({
                        scrollTop: target.offset().top
                    }, 1000, function () {
                        // Callback after animation
                        // Must change focus!
                        var $target = $(target);
                        $target.focus();
                        if ($target.is(":focus")) { // Checking if the target was focused
                            return false;
                        } else {
                            $target.attr('tabindex', '-1'); // Adding tabindex for elements not focusable
                            $target.focus(); // Set focus again
                        }
                        ;
                    });
                }
            }
        });


    /* SLIDER Partenaires */
    var visuelActif_landing,
        nbVisuels_landing,
        firstSlide_landing,
        firstCommand_landing,
        lastSlide_landing,
        lastCommand_landing,
        gotoslide_landing,
        class_slide;
    visuelActif_landing = 2;
    nbVisuels_landing = $('.slideshow_landing .slider_landing li').length;
    firstSlide_landing = $('.slideshow_landing .slider_landing li:first-child').html();
    lastSlide_landing = $('.slideshow_landing .slider_landing li:last-child').html();
    class_slide = $('.slideshow_landing .slider_landing li:first-child').attr('class');
    largeurslider_landing = $('.slideshow_landing').width();
    $('.slideshow_landing .slider_landing').append('<li class="' + class_slide + '">' + firstSlide_landing + '</li>');
    $('.slideshow_landing .slider_landing').prepend('<li>' + lastSlide_landing + '</li>');
    $('.slideshow_landing li').css('width', largeurslider_landing + 'px');
    $('.slideshow_landing .slider_landing').css('width', (largeurslider_landing * (nbVisuels_landing + 2)) + 'px');
    $('.slideshow_landing .slider_landing').css('margin-left', '-' + (largeurslider_landing) + 'px');


    $(function () {
        setInterval(function () {
            if (visuelActif_landing <= nbVisuels_landing) {
                $('.slideshow_landing .slider_landing').animate({'margin-left': '-' + ((visuelActif_landing) * largeurslider_landing) + 'px'}, 800, function () {
                    visuelActif_landing++;
                });
            } else {
                $('.slideshow_landing .slider_landing').animate({'margin-left': '-' + ((visuelActif_landing) * largeurslider_landing) + 'px'}, 800, function () {
                    visuelActif_landing = 2;
                    $('.slideshow_landing .slider_landing').css('margin-left', '-' + (largeurslider_landing) + 'px');
                });
            }
        }, 5000);
    });

    /* SLIDER Partenaires */
    var visuelActif,
        nbVisuels,
        firstSlide,
        firstCommand,
        lastSlide,
        lastCommand,
        gotoslide;
    visuelActif = 2;
    nbVisuels = $('.slideshow .slider li').length;
    firstSlide = $('.slideshow .slider li:first-child').html();
    lastSlide = $('.slideshow .slider li:last-child').html();
    largeurslider = $('.slideshow').width();
    $('.slideshow .slider').append('<li>' + firstSlide + '</li>');
    $('.slideshow .slider').prepend('<li>' + lastSlide + '</li>');
    $('.slideshow li').css('width', largeurslider + 'px');
    $('.slideshow .slider').css('width', (largeurslider * (nbVisuels + 2)) + 'px');
    $('.slideshow .slider').css('margin-left', '-' + (largeurslider) + 'px');

    $(function () {
        setInterval(function () {
            if (visuelActif <= nbVisuels) {
                $('.slideshow .slider').animate({'margin-left': '-' + ((visuelActif) * largeurslider) + 'px'}, 800, function () {
                    visuelActif++;
                });
            } else {
                $('.slideshow .slider').animate({'margin-left': '-' + ((visuelActif) * largeurslider) + 'px'}, 800, function () {
                    visuelActif = 2;
                    $('.slideshow .slider').css('margin-left', '-' + (largeurslider) + 'px');
                });
            }
        }, 5000);
    });

    $('.next_btn').bind('click', function () {
        if (visuelActif <= nbVisuels) {
            $('.slideshow .slider').animate({'margin-left': '-' + ((visuelActif) * largeurslider) + 'px'}, 500, function () {
                visuelActif++;
            });
        } else {
            $('.slideshow .slider').animate({'margin-left': '-' + ((visuelActif) * largeurslider) + 'px'}, 500, function () {
                visuelActif = 2;
                $('.slideshow .slider').css('margin-left', '-' + (largeurslider) + 'px');
            });
        }
    })
    $('.previous_btn').bind('click', function () {
        if (visuelActif > 1) {
            visuelActif--;
            $('.slideshow .slider').animate({'margin-left': '-' + ((visuelActif - 1) * largeurslider) + 'px'}, 500);
        } else {
            $('.slideshow .slider').css('margin-left', '-' + ((nbVisuels) * largeurslider) + 'px');
            visuelActif = nbVisuels;
            $('.slideshow .slider').animate({'margin-left': '-' + ((visuelActif - 1) * largeurslider) + 'px'}, 500);
        }
    });


    /*plus de tag*/
    $('#plus_de_tag').on('click', function () {
        $('.filtreSelector').toggleClass('active');
    });

    /*SIDEBAR ESPACE PERSO*/

    $('.hamburger-icon-desk').on('click', function () {

        $(this).hide();
    })


    $("#bouton_sidebar").on("click", function () {

        if ($(window).width() < 768) {

            if ($('.sidebar__all').hasClass('active')) {
                $('.sidebar__all').removeClass('active');
            }

            else {

                $('#content').toggleClass('active');
                $('.footer').toggleClass('active');
            }
        } else {

            $('.hamburger-icon-desk').toggle('slow');

            if ($('.sidebar__all').hasClass('active')) {
                $('.sidebar__all').removeClass('active');
            }

            else {

                $('.sidebar_1').toggleClass('active');
                $('#content').toggleClass('active');
                $('.footer').toggleClass('active');
            }
        }

        $('.sidebar_soutenir').toggleClass('active');

    });

    $("#actions_culturelles").on("click", function () {


        if ($(window).width() < 768) {
            if ($('.sidebar__all').hasClass('active')) {

                $('.sidebar__all').removeClass('active');

            }

            else {
                $('#content').toggleClass('active');
                $('.footer').toggleClass('active');
            }
        }
        else {

            $('.hamburger-icon-desk').toggle('slow');
            if ($('.sidebar__all').hasClass('active')) {

                $('.sidebar__all').removeClass('active');

            }

            else {
                $('.sidebar_1').toggleClass('active');
                $('#content').toggleClass('active');
                $('.footer').toggleClass('active');
            }
        }

        $('.sidebar_actions_culturelles').toggleClass('active');

    });

    $("#saison").on("click", function () {

        if ($(window).width() < 768) {
            if ($('.sidebar__all').hasClass('active')) {
                $('.sidebar__all').removeClass('active');

            }


            else {
                $('#content').toggleClass('active');
                $('.footer').toggleClass('active');
            }
        } else {

            $('.hamburger-icon-desk').toggle('slow');

            if ($('.sidebar__all').hasClass('active')) {
                $('.sidebar__all').removeClass('active');

            }


            else {
                $('.sidebar_1').toggleClass('active');
                $('#content').toggleClass('active');
                $('.footer').toggleClass('active');
            }
        }

        $('.sidebar_saison').toggleClass('active');


    });

    $("#decouvrir").on("click", function () {
        if ($(window).width() < 768) {
            if ($('.sidebar__all').hasClass('active')) {
                $('.sidebar__all').removeClass('active');

            }

            else {
                $('#content').toggleClass('active');
                $('.footer').toggleClass('active');
            }
        }

        else {
            $('.hamburger-icon-desk').toggle('slow');

            if ($('.sidebar__all').hasClass('active')) {
                $('.sidebar__all').removeClass('active');

            }

            else {
                $('.sidebar_1').toggleClass('active');
                $('#content').toggleClass('active');
                $('.footer').toggleClass('active');
            }
        }

        $('.sidebar_decouvrir').toggleClass('active');

    });

    $("#ressource").on("click", function () {

        if ($(window).width() < 768) {
            if ($('.sidebar__all').hasClass('active')) {
                $('.sidebar__all').removeClass('active');

            }

            else {
                $('#content').toggleClass('active');
                $('.footer').toggleClass('active');
            }
        } else {
            $('.hamburger-icon-desk').toggle('slow');

            if ($('.sidebar__all').hasClass('active')) {
                $('.sidebar__all').removeClass('active');

            }

            else {
                $('.sidebar_1').toggleClass('active');
                $('#content').toggleClass('active');
                $('.footer').toggleClass('active');
            }
        }

        $('.sidebar_ressources').toggleClass('active');

    });


    /* Event menu Scroll to fixed */
    //$('.section-menu-event').scrollToFixed();

    /* Hover photo_descrition event */

    $('.event-desc__image__play').on('click', function () {
        $('.event-desc__spotify').show('fast');
    })

    $('.event-desc__spotify__close').on('click', function () {
        $('.event-desc__spotify').hide('fast');
    })


    //Script Scroll page Historique
    $(function () {

        window.sr = ScrollReveal();

        if ($(window).width() < 768) {

            if ($('.timeline-content').hasClass('js--fadeInLeft')) {
                $('.timeline-content').removeClass('js--fadeInLeft').addClass('js--fadeInRight');
            }

            sr.reveal('.js--fadeInRight', {
                origin: 'right',
                distance: '300px',
                easing: 'ease-in-out',
                duration: 800,
            });

        } else {

            sr.reveal('.js--fadeInLeft', {
                origin: 'left',
                distance: '300px',
                easing: 'ease-in-out',
                duration: 800,
            });

            sr.reveal('.js--fadeInRight', {
                origin: 'right',
                distance: '300px',
                easing: 'ease-in-out',
                duration: 800,
            });

        }

        sr.reveal('.js--fadeInLeft', {
            origin: 'left',
            distance: '300px',
            easing: 'ease-in-out',
            duration: 800,
        });

        sr.reveal('.js--fadeInRight', {
            origin: 'right',
            distance: '300px',
            easing: 'ease-in-out',
            duration: 800,
        });


    });


    /*
     *  Desktop Menu
     */

    $('.hamburger-icon-desk').click(function (e) {

        e.preventDefault();
        $('.sidebar_1').toggleClass('active');
        $('.footer').toggleClass('active');
        $('#content').toggleClass('active');

        $this = $(this);
        if ($this.hasClass('is-opened')) {
            $this.addClass('is-closed').removeClass('is-opened');
        } else {
            $this.removeClass('is-closed').addClass('is-opened');
        }

        if ($('.sidebar__all').hasClass('active')) {
            $('.sidebar__all').removeClass('active')
        }
    });


    /*
     *  Mobile Menu
     */

    $('.hamburger-icon').click(function (e) {

        e.preventDefault();
        $('.sidebar_1').toggleClass('active');

        $this = $(this);
        if ($this.hasClass('is-opened')) {
            $this.addClass('is-closed').removeClass('is-opened');
        } else {
            $this.removeClass('is-closed').addClass('is-opened');
        }

        if ($('.sidebar__all').hasClass('active')) {
            $('.sidebar__all').removeClass('active')
        }
    });

    /*
     *  Toogle Orchestre
     */

    $('.musiciens__dep').on('click', function () {

        $('.musiciens__dep__items', this).toggle('fast');
        $('.musiciens__dep__title__cross', this).toggle();
        $('.musiciens__dep__title__arrow', this).toggle();
        $('.musiciens__dep__separator', this).toggle();


    });


    if ($(window).width() < 768) {
        $('.select_filter').attr('size', '8');
    }


    //Google Maps JS - Page Salle

    //google.maps.event.trigger(map, 'resize');


});
/* end of as page load scripts */
