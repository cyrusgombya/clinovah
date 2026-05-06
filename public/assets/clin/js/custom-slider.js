// Home Slider
var swiper = new Swiper(".doctor-team", {
  spaceBetween: 20,
  slidesPerView: 1,
  loop: true,
  navigation: {
    nextEl: ".team-button-next",
    prevEl: ".team-button-prev",
  },
  breakpoints: {
    992: {
      spaceBetween: 50,
      slidesPerView: 2,
    },
    1399: {
      spaceBetween: 70,
      slidesPerView: 2,
    },
  },
});
var swiper = new Swiper(".blog-box-slide", {
  spaceBetween: 30,
  slidesPerView: 3,
  loop: true,
  breakpoints: {
    0: {
      spaceBetween: 0,
      slidesPerView: 1,
    },
    499: {
      spaceBetween: 15,
      slidesPerView: 2,
    },
    768: {
      spaceBetween: 20,
      slidesPerView: 2,
    },
    991: {
      spaceBetween: 15,
    },
    1200: {
      spaceBetween: 30,
    },
  },
});
var swiper = new Swiper(".bran-logo", {
  spaceBetween: 30,
  slidesPerView: 4,
  loop: true,
  breakpoints: {
    0: {
      slidesPerView: 1,
    },
    480: {
      slidesPerView: 2,
    },
    991: {
      slidesPerView: 3,
    },
    1200: {
      slidesPerView: 4,
    },
  },
});
var swiper = new Swiper(".brand-logo-1", {
  slidesPerView: 6,
  loop: true,
  breakpoints: {
    0: {
      slidesPerView: 2,
    },
    580: {
      slidesPerView: 3,
    },
    991: {
      slidesPerView: 4,
    },
    1200: {
      slidesPerView: 6,
    },
  },
});
var swiper = new Swiper(".layout-three-brand", {
  spaceBetween: 30,
  slidesPerView: 5,
  loop: true,
  autoplay: {
    delay: 1500,
    disableOnInteraction: false,
  },
  breakpoints: {
    0: {
      slidesPerView: 1,
    },
    480: {
      slidesPerView: 2,
    },
    991: {
      slidesPerView: 3,
    },
    1200: {
      slidesPerView: 4,
    },
  },
});
var swiper = new Swiper(".service-section", {
  slidesPerView: 4.5,
  spaceBetween: 30,
  // autoplay: {
  //   delay: 2500,
  //   disableOnInteraction: false,
  // },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  breakpoints: {
    0: {
      slidesPerView: 1,
    },
    400: {
      slidesPerView: 1.5,
    },
    600: {
      slidesPerView: 2,
    },
    992: {
      slidesPerView: 3.5,
    },
    1400: {
      slidesPerView: 4.5,
    },
  },
});
var swiper = new Swiper(".testimonial", {
  slidesPerView: 1,
  loop: true,
  autoplay: {
    delay: 2500,
    disableOnInteraction: false,
  },
  navigation: {
    nextEl: ".testimonial-button-next",
    prevEl: ".testimonial-button-prev",
  },
});
var swiper = new Swiper(".testimonial-1", {
  spaceBetween: 0,
  slidesPerView: 1,
  loop: true,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});
var swiper = new Swiper(".doctor-advices", {
  effect: "fade",
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});
var swiper = new Swiper(".blog-section-slider", {
  spaceBetween: 50,
  slidesPerView: 2,
  loop: true,
  breakpoints: {
    0: {
      slidesPerView: 1,
    },
    992: {
      slidesPerView: 2,
      spaceBetween: 15,
    },
    1200: {
      spaceBetween: 20,
    },
    1300: {
      spaceBetween: 50,
    },
  },
});
var swiper = new Swiper(".awesome-gallery", {
  slidesPerView: 4,
  spaceBetween: 50,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  breakpoints: {
    0: {
      slidesPerView: 1,
    },
    576: {
      slidesPerView: 2,
    },
    992: {
      slidesPerView: 3,
    },
    1200: {
      slidesPerView: 4,
    },
  },
});
var swiper = new Swiper(".cosmetic-customer", {
  slidesPerView: 1,
  spaceBetween: 30,
});
var swiper = new Swiper(".cosmetic-doctors", {
  spaceBetween: 40,
  slidesPerView: 4,
  loop: true,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  breakpoints: {
    0: {
      slidesPerView: 1,
    },
    480: {
      slidesPerView: 2,
      spaceBetween: 20,
    },
    1200: {
      slidesPerView: 4,
    },
  },
});
var swiper = new Swiper(".cart-slider", {
  spaceBetween: 10,
  slidesPerView: 3,
  loop: true,
  freeMode: true,
  watchSlidesProgress: true,
});
var swiper2 = new Swiper(".cart-slider-2", {
  spaceBetween: 10,
  loop: true,
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  thumbs: {
    swiper: swiper,
  },
});
var swiper = new Swiper(".doctor-team-1", {
  spaceBetween: 30,
  slidesPerView: 5,
  loop: true,
  breakpoints: {
    0: {
      slidesPerView: 1,
    },
    510: {
      slidesPerView: 2,
    },
    768: {
      slidesPerView: 3,
    },
    1200: {
      slidesPerView: 4,
    },
    1400: {
      slidesPerView: 5,
    },
  },
});
var swiper = new Swiper(".testimonial-2", {
  spaceBetween: 30,
  slidesPerView: 2,
  loop: true,
  breakpoints: {
    0: {
      slidesPerView: 1,
    },
    992: {
      slidesPerView: 2,
    },
  },
});
var swiper = new Swiper(".online-status", {
  spaceBetween: 15,
  slidesPerView: 5,
  loop: true,
  breakpoints: {
    0: {
      slidesPerView: 4,
    },
    575: {
      slidesPerView: 5,
    },
  },
});
var swiper = new Swiper(".history-slider", {
  slidesPerView: 4,
  breakpoints: {
    0: {
      slidesPerView: 1,
    },
    500: {
      slidesPerView: 2,
    },
    767: {
      slidesPerView: 3,
    },
    1200: {
      slidesPerView: 4,
    },
  },
});
var swiper = new Swiper(".product-2", {
  spaceBetween: 10,
  slidesPerView: 5,
  loop: true,
  freeMode: true,
  watchSlidesProgress: true,
});
var swiper2 = new Swiper(".product", {
  spaceBetween: 10,
  loop: true,
  thumbs: {
    swiper: swiper,
  },
});
var swiper = new Swiper(".shop-slider", {
  spaceBetween: 30,
  slidesPerView: 7,
  loop: true,
  breakpoints: {
    0: {
      slidesPerView: 2,
    },
    576: {
      slidesPerView: 3,
    },
    992: {
      slidesPerView: 5,
    },
    1200: {
      slidesPerView: 7,
    },
  },
});
var swiper = new Swiper(".surgeons-slider", {
  spaceBetween: 40,
  slidesPerView: 4,
  loop: true,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  breakpoints: {
    0: {
      slidesPerView: 1,
    },
    768: {
      slidesPerView: 2,
    },
    992: {
      slidesPerView: 3,
      spaceBetween: 20,
    },
    1400: {
      slidesPerView: 4,
      spaceBetween: 40,
    },
  },
});
var swiper = new Swiper(".patient-testimonial-slider", {
  slidesPerView: 3,
  loop: true,
  centeredSlides: true,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  breakpoints: {
    0: {
      slidesPerView: 1,
    },
    768: {
      slidesPerView: 2,
    },
    1200: {
      slidesPerView: 3,
    },
  },
});
var swiper = new Swiper(".achievement-slider", {
  slidesPerView: 2,
  spaceBetween: 30,
  loop: true,
  pagination: {
    el: ".achievement-pagination",
    clickable: true,
  },
  navigation: {
    nextEl: ".achievement-button",
    prevEl: ".achievement-button",
  },
  breakpoints: {
    0: {
      slidesPerView: 1,
    },
    1200: {
      slidesPerView: 2,
    },
  },
});
var swiper = new Swiper(".blog-slid", {
  slidesPerView: 1,
  spaceBetween: 30,
  loop: true,
  pagination: {
    el: ".blog-pagination",
    clickable: true,
  },
  navigation: {
    nextEl: ".blog-button",
    prevEl: ".blog-button",
  },
});
var swiper = new Swiper(".nutrition-slider", {
  slidesPerView: 1,
  spaceBetween: 30,
  loop: true,
  pagination: {
    el: ".nutrition-pagination",
    type: "fraction",
  },
  navigation: {
    nextEl: ".nutrition-button-next",
    prevEl: ".nutrition-button-prev",
  },
});
var swiper = new Swiper(".about-slider", {
  slidesPerView: 3,
  spaceBetween: 20,
  speed: 500,
  centeredSlides: true,
  loop: true,
  autoplay: {
    delay: 2000,
    disableOnInteraction: false,
  },
  pagination: {
    el: ".about-pagination",
    clickable: "true",
  },
  navigation: {
    nextEl: ".about-button-next",
    prevEl: ".about-button-prev",
  },
  breakpoints: {
    0: {
      slidesPerView: 2,
      spaceBetween: 10,
      centeredSlides: false,
    },
    767: {
      slidesPerView: 3,
      spaceBetween: 20,
    },
  },
});
var swiper = new Swiper(".living-slider", {
  slidesPerView: 5,
  spaceBetween: 15,
  loop: true,
  autoplay: {
    delay: 3000,
    disableOnInteraction: false,
  },
  breakpoints: {
    0: {
      slidesPerView: 2,
    },
    576: {
      slidesPerView: 3,
    },
    992: {
      slidesPerView: 4,
    },
    1200: {
      slidesPerView: 5,
    },
  },
});
var swiper = new Swiper(".client-slider", {
  slidesPerView: 1,
  loop: true,
  pagination: {
    el: ".client-review-pagination",
    clickable: true,
  },
  navigation: {
    nextEl: ".client-review-next",
    prevEl: ".client-review-prev",
  },
});
var swiper = new Swiper(".dental-slider", {
  slidesPerView: 1,
  effect: "fade",
  speed: 1000,
  autoplay: {
    delay: 3000,
    disableOnInteraction: false,
  },
  loop: true,
  centeredSlides: true,
  pagination: {
    el: ".dental-pagination",
    clickable: true,
  },
});
var swiper = new Swiper(".cosmetic-banner", {
  slidesPerView: 1,
  loop: true,
  navigation: {
    nextEl: ".cosmetic-button-next",
    prevEl: ".cosmetic-button-prev",
  },
});
var swiper = new Swiper(".client_feedback", {
  slidesPerView: 2,
  spaceBetween: 20,
  loop: true,
  navigation: {
    nextEl: ".feedback-next",
    prevEl: ".feedback-prev",
  },
  breakpoints: {
    0: {
      slidesPerView: 1,
    },
    1200: {
      slidesPerView: 2,
    },
  },
});
var swiper = new Swiper(".instagram-slider", {
  slidesPerView: 5,
  loop: true,
  autoplay: {
    delay: 2500,
    disableOnInteraction: false,
  },
  breakpoints: {
    0: {
      slidesPerView: 2,
    },
    767: {
      slidesPerView: 3,
    },
    991: {
      slidesPerView: 4,
    },
    1399: {
      slidesPerView: 5,
    },
  },
});
// var swiper = new Swiper(".booking-slider", {
//   slidesPerView: 7,
//   loop: true,
//   spaceBetween: 15,
// });
