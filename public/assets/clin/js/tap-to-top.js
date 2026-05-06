document.addEventListener("click", function (event) {
  if (event.target.classList.contains("scroll-top")) {
    window.scrollTo({ top: 0, behavior: "smooth" });
    event.preventDefault();
  }
});
function scrollIndicator() {
  var scrollTop = document.documentElement.scrollTop;
  var scrollProgress = document.querySelector(".scroll-progress");
  if (scrollTop > 100) {
    scrollProgress.classList.add("visible");
  } else {
    scrollProgress.classList.remove("visible");
  }
  var scrollHeight = document.documentElement.scrollHeight;
  var windowHeight = document.documentElement.clientHeight;
  var maxScrollTop = scrollHeight - windowHeight;
  var scrollPercentage = (scrollTop / (maxScrollTop - 200)) * 100;

  var scrollPoint = document.querySelector(".scroll-point");
  scrollPoint.style.height = Math.min(scrollPercentage, 100) + "%";
}
window.addEventListener("scroll", scrollIndicator);
