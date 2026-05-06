/*===========================
       dark mood button
  ==========================*/
document.addEventListener("DOMContentLoaded", () => {
  const body = document.body;
  const isDark = localStorage.getItem("mode") === "dark";

  body.classList.toggle("dark", isDark);
  body.classList.toggle("light", !isDark);

  document.querySelectorAll(".mode").forEach(btn => {
    btn.addEventListener("click", () => {
      const darkMode = body.classList.toggle("dark");
      body.classList.toggle("light", !darkMode);
      localStorage.setItem("mode", darkMode ? "dark" : "light");
    });
  });
});

/*===================
18. Theme Setting js
=======================*/
const themeBtnParent = document.querySelector(".theme-btns");
const rtlBtn = document.querySelector("#rtl-btn");
const html = document.querySelector("html");
const rtlLink = document.querySelector("#rtl-link");

themeBtnParent?.addEventListener("click", function (e) {
  e.preventDefault();
  const clicked = e.target.closest(".btntheme")?.id;
  if (!clicked) return;

  if (clicked === "rtl-btn") {
    rtlBtn.id = "ltr-btn";
    html.setAttribute("dir", "rtl");
    rtlLink.href = "../assets/css/vendors/bootstrap.rtl.css";
    rtlBtn.classList.add("rtlBtnEl");
    localStorage.setItem("rtlcss", "../assets/css/vendors/bootstrap.rtl.css");
    localStorage.setItem("dir", "rtl");
    localStorage.setItem("rtlBtnId", "ltr-btn");
  }
  if (clicked === "ltr-btn") {
    rtlBtn.id = "rtl-btn";
    html.setAttribute("dir", "");
    rtlLink.href = "../assets/css/vendors/bootstrap.css";
    localStorage.setItem("rtlcss", "../assets/css/vendors/bootstrap.css");
    localStorage.setItem("dir", "");
    localStorage.setItem("rtlBtnId", "rtl-btn");
  }
});

// Apply stored RTL settings
rtlBtn.id = localStorage.getItem("rtlBtnId") || "rtl-btn";
html.setAttribute("dir", localStorage.getItem("dir") || "");
rtlLink.href = localStorage.getItem("rtlcss") || "../assets/css/vendors/bootstrap.css";
