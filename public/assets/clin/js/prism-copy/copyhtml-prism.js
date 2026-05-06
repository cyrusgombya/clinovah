/*=====================
        Copy html prism
    ==========================*/
(function () {
  const copy_btn = document.querySelectorAll(".copy-btn");
  const card_copy_header = document.querySelector(".card-copy-header");

  copy_btn.forEach((item) => {
    console.log(item);
    item.addEventListener("click", function (e) {
      const cardEl = item.closest(".card");
      const codeEl = cardEl.querySelector(".code-box-copy");
      const previewEl = cardEl.querySelector(".preview");
      const preview_avatarEl = cardEl.querySelector(".preview-none");

      codeEl.classList.toggle("show");
      previewEl.classList.toggle("show");
      preview_avatarEl.classList.toggle("remove");
    });
  });
})();

/*=====================
    Copy Js
==========================*/

// Copy Function
function copyFunction() {
  const BtnParentEl =
    this.closest(".copyparent").querySelector("pre").textContent;

  navigator.clipboard.writeText(BtnParentEl);
  this.innerHTML = `<i class="fa-solid fa-check-double"></i>`;
  setTimeout(() => {
    this.innerHTML = `<i class="fa-solid fa-check-double"></i>`;
  }, 1500);
}

const copybtn = document.querySelectorAll(".copybtn");
copybtn?.forEach((copybtn) => {
  copybtn.addEventListener("click", copyFunction);
});
