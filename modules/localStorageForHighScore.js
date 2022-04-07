let highScore = JSON.parse(localStorage.getItem("record")) || 0;
export function initHighScore() {
  document.querySelector(
    ".high-score"
  ).textContent = `Ваш рекорд: ${highScore}`;
}
export function checkerHighScore(score) {
  if (score > highScore) {
    alert("Новый рекорд!");
    localStorage.setItem("record", JSON.stringify(score));
  }
}
