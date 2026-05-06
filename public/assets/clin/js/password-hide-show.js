/*----------------------------------------
   password show hide
   ----------------------------------------*/
(function () {
  "use strict";
  document.querySelector(".show-hide").style.display = "block";
  document.querySelector(".show-hide span").classList.add("show");

  document
    .querySelector(".show-hide span")
    .addEventListener("click", function () {
      if (this.classList.contains("show")) {
        document
          .querySelector('input[name="login[password]"]')
          .setAttribute("type", "text");
        this.classList.remove("show");
      } else {
        document
          .querySelector('input[name="login[password]"]')
          .setAttribute("type", "password");
        this.classList.add("show");
      }
    });
})();
