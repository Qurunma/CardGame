import { bindDiv } from "./bindDiv.js";
import { calcScore } from "./score.js";
import { timer } from "./timer.js";
import { initHighScore } from "./localStorageForHighScore.js";

let timerWork = false;
let imgArr = [];
const iconsArr = [
  { url: "backlazhan", uses: 0, opened: false },
  { url: "corn", uses: 0, opened: false },
  { url: "kapusta", uses: 0, opened: false },
  { url: "mushroom", uses: 0, opened: false },
  { url: "pumpkin", uses: 0, opened: false },
  { url: "tomato", uses: 0, opened: false },
];

export function initCards() {
  let timerId;
  let time;
  for (let i = 0; i < iconsArr.length * 2; i++) {
    const div = document.createElement("div");
    imgArr[i] = document.createElement("img");
    let icon = Math.floor(Math.random() * iconsArr.length);
    div.classList.add("card");
    if (iconsArr[icon].uses != 2) {
      imgArr[i].setAttribute("src", `Icons/${iconsArr[icon].url}.png`);
      iconsArr[icon].uses++;
      imgArr[i].style.visibility = "hidden";
      div.append(imgArr[i]);
      document.querySelector(".container").append(div);

      div.addEventListener("click", () => {
        if (!timerWork) {
          time = timer(imgArr);
          calcScore(time);
          timerWork = true;
        }
        document.querySelector(".timer").style.display = "block";
        bindDiv(imgArr, i, timerId);
      });
    } else {
      i -= 1;
    }
  }
  document.querySelector(".timer").style.display = "none";
  initHighScore();
}
