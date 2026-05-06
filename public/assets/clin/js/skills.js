function progressBarAndCountNumber() {
    const progress = document.querySelectorAll(".progress");
    let count = 0;
    // You must put the maximum number in the MAX variable.
    let MAX = 96;
  
    let run = setInterval(() => {
      count++;
      progress.forEach((element) => {
        if (count <= element.dataset.progress) {
          element.parentElement.style.background = `conic-gradient(#3368c6 ${count}%, #e8e8e8 0)`;
          element.firstElementChild.textContent = `${count}%`;
        }
        if (count == MAX) {
          clearInterval(run);
        }
      });
    }, 20);
  }
  
  progressBarAndCountNumber();
  