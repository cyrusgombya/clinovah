let timerIntervals = new Map();

function startCallTimer(timerEl) {
  if (!timerEl) return;

  const id = timerEl.dataset.timerId || crypto.randomUUID();
  timerEl.dataset.timerId = id;

  let seconds = 0;
  clearInterval(timerIntervals.get(id));

  const interval = setInterval(() => {
    seconds++;
    const mins = String(Math.floor(seconds / 60)).padStart(2, "0");
    const secs = String(seconds % 60).padStart(2, "0");
    timerEl.textContent = `${mins}:${secs}`;
  }, 1000);

  timerIntervals.set(id, interval);
}

document.querySelectorAll(".Voice-call-modal, .video-call-modal").forEach(modal => {
  modal.addEventListener("shown.bs.modal", () => {
    const timerEls = modal.querySelectorAll(".call-timer");
    timerEls.forEach(timerEl => {
      timerEl.textContent = "00:00";
      startCallTimer(timerEl);
    });
  });

  modal.addEventListener("hidden.bs.modal", () => {
    const timerEls = modal.querySelectorAll(".call-timer");
    timerEls.forEach(timerEl => {
      const id = timerEl.dataset.timerId;
      if (id) {
        clearInterval(timerIntervals.get(id));
        timerIntervals.delete(id);
      }
    });
  });
});

const path = window.location.pathname;
if (path.includes("voice-call.html") || path.includes("video-call.html")) {
  window.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll(".call-timer").forEach(timerEl => {
      timerEl.textContent = "00:00";
      startCallTimer(timerEl);
    });
  });
}
