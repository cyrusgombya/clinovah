document.addEventListener("DOMContentLoaded", function () {
  const scrollspyEl = document.querySelector(".scrollspy-box");

  scrollspyEl.addEventListener("activate.bs.scrollspy", function (event) {
    const activeLink = document.querySelector(".nav-pills .nav-link.active");
    if (activeLink && activeLink.scrollIntoView) {
      activeLink.scrollIntoView({
        behavior: "smooth",
        inline: "center",
        block: "nearest",
      });
    }
  });
});
