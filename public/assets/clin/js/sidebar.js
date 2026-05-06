/*====================
  filter sidebar js
=======================*/
const filterButton = document.querySelector(".filter-btn");
const filterSideBar = document.querySelector(".sidebar-resposnive");
const filterOverlay = document.querySelector(".sidebar-overlay");
const closeBtns = document.querySelectorAll(".close-btn");

// Add class to the element
filterButton.addEventListener("click", function () {
  filterSideBar.classList.add("open");
  filterOverlay.classList.add("show");
});

// Loop through each close button and add event listener
closeBtns.forEach(function (closeBtn) {
  closeBtn.addEventListener("click", function () {
    filterSideBar.classList.remove("open");
    filterOverlay.classList.remove("show");
  });
});

filterOverlay.addEventListener("click", function () {
  filterSideBar.classList.remove("open");
  filterOverlay.classList.remove("show");
});
