document.querySelectorAll('.counter-count').forEach(function(counter) {
    let countTo = parseInt(counter.textContent, 10);
    let countFrom = 0;
  
    function animateCount() {
      let startTime = null;
  
      function step(timestamp) {
        if (!startTime) startTime = timestamp;
        let progress = timestamp - startTime;
        let countValue = Math.min(Math.ceil(countFrom + (countTo - countFrom) * (progress / 4000)), countTo);
  
        counter.textContent = countValue;
  
        if (progress < 4000) {
          window.requestAnimationFrame(step);
        }
      }
  
      window.requestAnimationFrame(step);
    }
  
    animateCount();
  });
  