import { returnScore } from "./score.js";

let timerId;
let time = 80;
export function timer(imgArr) {
  if (!timerId) {
    document.querySelector(".timer").textContent = `Оставшееся время: ${time}`;
    timerId = setInterval(() => {
      time--;
      document.querySelector(
        ".timer"
      ).textContent = `Оставшееся время: ${time}`;
      if (time === 0) {
        clearTimeout(timerId);
        alert("You lose");
        returnScore();
      }
    }, 1000);
  }
  return time;
}
export function clearTime() {
  clearTimeout(timerId);
  time = 80;
  document.querySelector(".timer").textContent = "Оставшееся время: 80";
}
