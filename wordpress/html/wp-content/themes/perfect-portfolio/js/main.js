(function ($) {
  "use strict";

  var cfg = {
    scrollDuration: 800, // smoothscroll duration
    mailChimpURL: ''   // mailchimp url
  },

    $WIN = $(window);

  // Add the User Agent to the <html>
  // will be used for IE10/IE11 detection (Mozilla/5.0 (compatible; MSIE 10.0; Windows NT 6.2; Trident/6.0; rv:11.0))
  var doc = document.documentElement;
  doc.setAttribute('data-useragent', navigator.userAgent);

  /* Preloader
   * -------------------------------------------------- */
  var ssPreloader = function () {

    $("html").addClass('ss-preload');

    $WIN.on('load', function () {

      //force page scroll position to top at page refresh
      $('html, body').animate({ scrollTop: 0 }, 'normal');

      // will first fade out the loading animation 
      $("#loader").fadeOut("slow", function () {
        // will fade out the whole DIV that covers the website.
        $("#preloader").delay(300).fadeOut("slow");
      });

      // for hero content animations 
      $("html").removeClass('ss-preload');
      $("html").addClass('ss-loaded');

    });
  };

  /* Mobile Menu
   * ---------------------------------------------------- */
  var ssMobileMenu = function () {

    var toggleButton = $('.header-menu-toggle'),
      nav = $('.header-nav-wrap');

    toggleButton.on('click', function (event) {
      event.preventDefault();

      toggleButton.toggleClass('is-clicked');
      nav.slideToggle();
    });

    if (toggleButton.is(':visible')) nav.addClass('mobile');

    $WIN.on('resize', function () {
      if (toggleButton.is(':visible')) nav.addClass('mobile');
      else nav.removeClass('mobile');
    });

    nav.find('a').on("click", function () {

      if (nav.hasClass('mobile')) {
        toggleButton.toggleClass('is-clicked');
        nav.slideToggle();
      }
    });

  };

  /* Smooth Scrolling
   * ------------------------------------------------------ */
  var ssSmoothScroll = function () {

    $('.smoothscroll').on('click', function (e) {
      var target = this.hash,
        $target = $(target);

      e.preventDefault();
      e.stopPropagation();

      $('html, body').stop().animate({
        'scrollTop': $target.offset().top
      }, cfg.scrollDuration, 'swing').promise().done(function () {

        // check if menu is open
        if ($('body').hasClass('menu-is-open')) {
          $('.header-menu-toggle').trigger('click');
        }

        window.location.hash = target;
      });
    });

  };

  /* Animate On Scroll
   * ------------------------------------------------------ */
  var ssAOS = function () {

    AOS.init({
      offset: 200,
      duration: 600,
      easing: 'ease-in-sine',
      delay: 300,
      once: true,
      disable: 'mobile'
    });

  };

  /* Initialize
   * ------------------------------------------------------ */
  (function clInit() {

    ssPreloader();
    ssMobileMenu();
    ssSmoothScroll();
    ssAOS();

  })();

})(jQuery);
