document.addEventListener("DOMContentLoaded", function () {
  const containers = document.querySelectorAll(".stepper");

  containers.forEach((container) => {
    container.addEventListener("click", () => {
      container.classList.add("active");
    });
  });
});
