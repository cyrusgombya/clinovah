// ===== header ====== //
window.addEventListener("scroll", function () {
  if (window.scrollY > 300) {
    document.querySelector("header").classList.add("sticky");
  } else {
    document.querySelector("header").classList.remove("sticky");
  }
});

var swiper = new Swiper(".home-slider", {
  slidesPerView: 5,
  centeredSlides: true,
  loop: true,
  // autoplay: {
  //   delay: 3000,
  //   disableOnInteraction: false,
  // },
  breakpoints: {
    0: {
      slidesPerView: 1.5,
    },
    700: {
      slidesPerView: 4,
    },
    1200: {
      slidesPerView: 5,
    },
  },
});
var swiper = new Swiper(".other-pages", {
  slidesPerView: 3.5,
  spaceBetween: 30,
  breakpoints: {
    0: {
      slidesPerView: 1.5,
    },
    700: {
      slidesPerView: 2.5,
    },
    992: {
      slidesPerView: 3.5,
    },
  },
});

document.querySelectorAll(".counter-count").forEach(function (counter) {
  let countTo = parseInt(counter.textContent, 10);
  let countFrom = 0;

  function animateCount() {
    let startTime = null;

    function step(timestamp) {
      if (!startTime) startTime = timestamp;
      let progress = timestamp - startTime;
      let countValue = Math.min(
        Math.ceil(countFrom + (countTo - countFrom) * (progress / 4000)),
        countTo
      );

      counter.textContent = countValue;

      if (progress < 4000) {
        window.requestAnimationFrame(step);
      }
    }

    window.requestAnimationFrame(step);
  }

  animateCount();
});

// tooltip js
document.addEventListener("DOMContentLoaded", function () {
  function myFunction(e) {
    var x = e.clientX;
    var y = e.clientY;
    var tooltip = document.getElementById("tooltip");
    var offsetX = 0;
    var offsetY = -100;

    tooltip.style.left = x + offsetX + "px";
    tooltip.style.top = y + offsetY + "px";
    tooltip.style.display = "block";
    console.dir(e.target);

    var tooltipText = e.target.getAttribute("data-tooltip");

    if (!tooltipText) {
      tooltip.style.opacity = 0;
      return;
    }

    if (tooltipText !== null) {
      tooltip.innerHTML = tooltipText;
      tooltip.style.opacity = 1;
    } else {
      tooltip.innerHTML = "No tooltip text";
    }
  }

  document.querySelectorAll(".hoverable").forEach(function (element) {
    element.addEventListener("mousemove", myFunction);
    element.addEventListener("mouseleave", function () {
      document.getElementById("tooltip").style.display = "none";
    });
  });
});
