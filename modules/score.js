import { checkerHighScore } from "./localStorageForHighScore.js";
let scoreTimer;
let score;
export function calcScore(time) {
  score = 10000;
  score -= 125;
  scoreTimer = setInterval(() => {
    // if (
    //   (document.querySelector(".timer").textContent = "Оставшееся время: 0")
    // ) {
    //   returnScore();
    // }
    score -= 125;
  }, 1000);
}
export function returnScore() {
  clearTimeout(scoreTimer);
  alert(`Ваш счёт: ${score}`);
  checkerHighScore(score);
  location.href = "./CheckerScore.php?score=" + score;
}
