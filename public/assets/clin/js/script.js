/*-----------------------------------------------------------------------------------

 Template Name:PHYSIC
 Template URI: themes.pixelstrap.net/physic/template
 Description: This is a social website
 Author: Pixelstrap
 Author URI: https://themeforest.net/user/pixelstrap

 ----------------------------------------------------------------------------------- */
/*  01. Ratio js
    02. footer according js
    03. toggle nav js
    04. title change js
    05. Header Sticky js
    06. Header responsive js
    07. Tooltip js
    08. Tost js
    09. Wishlist card js
    10. patients remove js
*/

/*====================
       01. Ratio js
   =======================*/
window.addEventListener("load", () => {
  const bgImg = document.querySelectorAll(".bg-img");
  for (i = 0; i < bgImg.length; i++) {
    let bgImgEl = bgImg[i];

    if (bgImgEl.classList.contains("bg-top")) {
      bgImgEl.parentNode.classList.add("b-top");
    } else if (bgImgEl.classList.contains("bg-bottom")) {
      bgImgEl.parentNode.classList.add("b-bottom");
    } else if (bgImgEl.classList.contains("bg-center")) {
      bgImgEl.parentNode.classList.add("b-center");
    } else if (bgImgEl.classList.contains("bg-left")) {
      bgImgEl.parentNode.classList.add("b-left");
    } else if (bgImgEl.classList.contains("bg-right")) {
      bgImgEl.parentNode.classList.add("b-right");
    }

    if (bgImgEl.classList.contains("blur-up")) {
      bgImgEl.parentNode.classList.add("blur-up", "lazyload");
    }

    if (bgImgEl.classList.contains("bg_size_content")) {
      bgImgEl.parentNode.classList.add("b_size_content");
    }

    bgImgEl.parentNode.classList.add("bg-size");
    const bgSrc = bgImgEl.src;
    bgImgEl.style.display = "none";
    bgImgEl.parentNode.setAttribute(
      "style",
      `
        background-image: url(${bgSrc});
        background-size:cover;
        background-position: center;
        background-repeat: no-repeat;
        display: block;
        `
    );
  }
});
/*====================
       02. footer according
   =======================*/
const footerButton = document.querySelectorAll(".footer-content h5");
const showNav = document.querySelector(".nav");
for (var i = 0; i < footerButton.length; ++i) {
  footerButton[i].addEventListener("click", function () {
    this.parentNode.classList.toggle("open");
  });
}
/*============================
    03.toggle nav
 ============================*/
document.querySelectorAll(".toggle-nav").forEach(btn => {
  btn.addEventListener("click", function () {
    const navbar = document.querySelector("nav .main-navbar .sm-horizontal");
    if (navbar) {
      navbar.classList.add("open");
    }
  });
});

const backBtn = document.querySelector("nav .main-navbar .sm-horizontal .back-btn");
if (backBtn) {
  backBtn.addEventListener("click", function () {
    const navbar = document.querySelector("nav .main-navbar .sm-horizontal");
    if (navbar) {
      navbar.classList.remove("open");
    }
  });
}
/*====================
       04. title change 
   =======================*/
var title = document.title;
window.addEventListener("focus", function () {
  document.title = title;
});
window.addEventListener("blur", function () {
  document.title = "🎉 Come Back...";
});
document.querySelectorAll(".view-html").forEach(function (element) {
  element.addEventListener("click", function () {
    var htmlSource = this.closest(".card");
    var htmlChild = htmlSource.querySelector(".card-body");
    htmlChild.classList.toggle("show-source");
    this.classList.toggle("fa-eye");
  });
});
/*====================
       05. Header Sticky 
   =======================*/
const mainHeaders = document.querySelectorAll(".main-header");

window.addEventListener("scroll", () => {
  if (document.body.classList.contains("dermatology-demo")) {
    if (mainHeaders.length > 1) {
      mainHeaders[1].classList.toggle("sticky", window.scrollY > 300);
    }
  } else {
    if (mainHeaders.length > 0) {
      mainHeaders[0].classList.toggle("sticky", window.scrollY > 300);
    }
  }
});
/*====================
      06. Header responsive 
   =======================*/
document.addEventListener("DOMContentLoaded", () => {
  function handleNavClick(event) {
    const clickedElement = event.target.closest("li");

    if (clickedElement && !clickedElement.classList.contains("mobile-back")) {
      const isActive = clickedElement.classList.contains("show");
      document.querySelectorAll("#sm-horizontal li").forEach(li => {
        li.classList.remove("show");
        if (li.querySelector(".nav-link")) {
          li.querySelector(".nav-link").classList.remove("show");
        }
        if (li.querySelector(".sub-menu")) {
          li.querySelector(".sub-menu").classList.remove("show");
        }
        if (li.querySelector(".mega-menu")) {
          li.querySelector(".mega-menu").classList.remove("show");
        }
        if (li.querySelector(".mega-menu-2")) {
          li.querySelector(".mega-menu-2").classList.remove("show");
        }
      });
      if (!isActive) {
        clickedElement.classList.add("show");
        if (clickedElement.querySelector(".nav-link")) {
          clickedElement.querySelector(".nav-link").classList.add("show");
        }
        if (clickedElement.querySelector(".sub-menu")) {
          clickedElement.querySelector(".sub-menu").classList.add("show");
        }
        if (clickedElement.querySelector(".mega-menu")) {
          clickedElement.querySelector(".mega-menu").classList.add("show");
        }
        if (clickedElement.querySelector(".mega-menu-2")) {
          clickedElement.querySelector(".mega-menu-2").classList.add("show");
        }
      }
    }
  }

  function handleResize() {
    if (window.innerWidth <= 1200) {
      document.getElementById("sm-horizontal").addEventListener("click", handleNavClick);
    } else {
      document.getElementById("sm-horizontal").removeEventListener("click", handleNavClick);
      document.querySelectorAll("#sm-horizontal li").forEach(li => {
        li.classList.remove("show");
        if (li.querySelector(".nav-link")) {
          li.querySelector(".nav-link").classList.remove("show");
        }
        if (li.querySelector(".sub-menu")) {
          li.querySelector(".sub-menu").classList.remove("show");
        }
        if (li.querySelector(".mega-menu")) {
          li.querySelector(".mega-menu").classList.remove("show");
        }
        if (li.querySelector(".mega-menu-2")) {
          li.querySelector(".mega-menu-2").classList.remove("show");
        }
      });
    }
  }
  handleResize();
  window.addEventListener("resize", handleResize);
});
/*====================
        07. Tooltip 
   =======================*/
document.addEventListener("DOMContentLoaded", function () {
  var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
  var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
    return new bootstrap.Tooltip(tooltipTriggerEl);
  });
});

/*============================
        08. Tost js 
   ============================*/

document.querySelectorAll(".wishlist-icon").forEach(function (element) {
  element.addEventListener("click", function () {
    Toastify({
      text: "Awesome! Item Added to Wishlist!",
      duration: 2500,
      close: true,
    }).showToast();
    i++;
  });
});

/*====================
      09. Wishlist card
   =======================*/
const wishlistProduct = document.querySelectorAll(".product-wishlist");
wishlistProduct.forEach(el => {
  const deleteButton = el.querySelector(".delete-button");
  if (deleteButton) {
    deleteButton.addEventListener("click", function () {
      const parentCol = this.closest(".col-lg-3");
      if (parentCol) {
        parentCol.style.display = "none";
      }
    });
  } else {
    console.warn("Delete button not found for this product:", el);
  }
});
document.addEventListener("click", function (event) {
  if (event.target.classList.contains("delete-2")) {
    let li = event.target.closest("li");
    if (li) {
      li.remove();
    }
  }
});

/*====================
     10. patients remove
   =======================*/

const cartBox = document.querySelectorAll(".patient-remove");
const noItemFound = document.querySelector(".no-found-item");

cartBox?.forEach(el => {
  const deleteButton = el.querySelector(".decline");

  deleteButton.addEventListener("click", function () {
    this.closest(".patient-remove").style.display = "none";
    const allRowsHidden = Array.from(cartBox).every(row => row.style.display === "none");
    if (allRowsHidden) {
      noItemFound.style.display = "block";
    }
  });
});

document.addEventListener("DOMContentLoaded", function () {
  const selectItems = document.querySelectorAll(".select-item");
  const button = document.querySelector(".select-button");

  selectItems.forEach(item => {
    item.addEventListener("click", function (e) {
      e.preventDefault();

      const selectedText = this.textContent.trim();
      const nodes = button.childNodes;

      // Replace text inside button (Most Popular)
      for (let i = 0; i < nodes.length; i++) {
        if (nodes[i].nodeType === 3 && nodes[i].textContent.trim() !== "" && !nodes[i].textContent.includes("Sort By")) {
          nodes[i].textContent = " " + selectedText + " ";
          break;
        }
      }

      // Remove 'active' from all <li>
      document.querySelectorAll(".select-menu li a").forEach(li => li.classList.remove("active"));

      // Add 'active' to the clicked item's parent <li>
      this.closest("li a").classList.add("active");
    });
  });
});

