import { returnScore } from "./score.js";
import { clearTime } from "./timer.js";

export function checkerEndGame(imgArr, timerId) {
  let allRight = true;

  for (let i = 0; i < imgArr.length; i++) {
    if (imgArr[i].style.visibility === "hidden") {
      allRight = false;
      break;
    }
  }
  if (allRight) {
    setTimeout(() => {
      alert("Вы победили!");
      clearTime();
      returnScore();
      document.querySelector(".container").innerHTML = "";
      location.reload();
    }, 11);
  }
}
