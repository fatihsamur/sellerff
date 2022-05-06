(function () {
  'use strict';

  // ======= Sticky
  window.onscroll = function () {
    const ud_header = document.querySelector('.ud-header');
    const sticky = ud_header.offsetTop;
    const logo = document.querySelector('.header-logo');

    if (window.pageYOffset > sticky) {
      ud_header.classList.add('sticky');
    } else {
      ud_header.classList.remove('sticky');
    }

    // === logo change
    const siteUrl = 'http://127.0.0.1:8000/';
    if (ud_header.classList.contains('sticky')) {
      logo.src = siteUrl + 'themes/tailwind/images/landing/logo/logo.svg';
    } else {
      logo.src = siteUrl + 'themes/tailwind/images/landing/logo/logo-white.svg';
    }

    // show or hide the back-top-top button
    const backToTop = document.querySelector('.back-to-top');
    if (
      document.body.scrollTop > 50 ||
      document.documentElement.scrollTop > 50
    ) {
      backToTop.style.display = 'flex';
    } else {
      backToTop.style.display = 'none';
    }
  };

  // ===== responsive navbar
  let navbarToggler = document.querySelector('#navbarToggler');
  const navbarCollapse = document.querySelector('#navbarCollapse');

  navbarToggler.addEventListener('click', () => {
    navbarToggler.classList.toggle('navbarTogglerActive');
    navbarCollapse.classList.toggle('hidden');
  });

  //===== close navbar-collapse when a  clicked
  document
    .querySelectorAll('#navbarCollapse ul li:not(.submenu-item) a')
    .forEach((e) =>
      e.addEventListener('click', () => {
        navbarToggler.classList.remove('navbarTogglerActive');
        navbarCollapse.classList.add('hidden');
      })
    );

  // ===== Sub-menu
  const submenuItems = document.querySelectorAll('.submenu-item');
  submenuItems.forEach((el) => {
    el.querySelector('a').addEventListener('click', () => {
      el.querySelector('.submenu').classList.toggle('hidden');
    });
  });

  // ===== Faq accordion
  const faqs = document.querySelectorAll('.single-faq');
  faqs.forEach((el) => {
    el.querySelector('.faq-btn').addEventListener('click', () => {
      el.querySelector('.icon').classList.toggle('rotate-180');
      el.querySelector('.faq-content').classList.toggle('hidden');
    });
  });

  // ===== wow js
  new WOW().init();

  // ====== scroll top js
  function scrollTo(element, to = 0, duration = 500) {
    const start = element.scrollTop;
    const change = to - start;
    const increment = 20;
    let currentTime = 0;

    const animateScroll = () => {
      currentTime += increment;

      const val = Math.easeInOutQuad(currentTime, start, change, duration);

      element.scrollTop = val;

      if (currentTime < duration) {
        setTimeout(animateScroll, increment);
      }
    };

    animateScroll();
  }

  Math.easeInOutQuad = function (t, b, c, d) {
    t /= d / 2;
    if (t < 1) return (c / 2) * t * t + b;
    t--;
    return (-c / 2) * (t * (t - 2) - 1) + b;
  };

  document.querySelector('.back-to-top').onclick = () => {
    scrollTo(document.documentElement);
  };

  /* pop up youtube */
  /* Video Lightbox - Magnific Popup */
  $('.popup-youtube, .popup-vimeo').magnificPopup({
    disableOn: 700,
    type: 'iframe',
    mainClass: 'mfp-fade',
    removalDelay: 160,
    preloader: false,
    fixedContentPos: false,
    iframe: {
      patterns: {
        youtube: {
          index: 'youtube.com/',
          id: function (url) {
            var m = url.match(/[\\?\\&]v=([^\\?\\&]+)/);
            if (!m || !m[1]) return null;
            return m[1];
          },
          src: 'https://www.youtube.com/embed/%id%?autoplay=1',
        },
        vimeo: {
          index: 'vimeo.com/',
          id: function (url) {
            var m = url.match(
              /(https?:\/\/)?(www.)?(player.)?vimeo.com\/([a-z]*\/)*([0-9]{6,11})[?]?.*/
            );
            if (!m || !m[5]) return null;
            return m[5];
          },
          src: 'https://player.vimeo.com/video/%id%?autoplay=1',
        },
      },
    },
  });

  /* Details Lightbox - Magnific Popup */
  $('.popup-with-move-anim').magnificPopup({
    type: 'inline',
    fixedContentPos: false /* keep it false to avoid html tag shift with margin-right: 17px */,
    fixedBgPos: true,
    overflowY: 'auto',
    closeBtnInside: true,
    preloader: false,
    midClick: true,
    removalDelay: 300,
    mainClass: 'my-mfp-slide-bottom',
  });
})();
