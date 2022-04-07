import { checkerEndGame } from "./checkerEndGame.js";

let openedIndexes = [];

export function bindDiv(imgArr, i, timerId) {
  if (imgArr[i].style.visibility == "hidden") {
    imgArr[i].style.visibility = "";
    openedIndexes.push(i);
  }
  if (
    openedIndexes[1] !== undefined &&
    imgArr[openedIndexes[0]].src !== imgArr[openedIndexes[1]].src
  ) {
    document.querySelector(".container").style.pointerEvents = "none";
    setTimeout(() => {
      imgArr[openedIndexes[0]].style.visibility = "hidden";
      imgArr[openedIndexes[1]].style.visibility = "hidden";
      openedIndexes = [];
      document.querySelector(".container").style.pointerEvents = "auto";
    }, 1000);
  } else if (
    openedIndexes[1] !== undefined &&
    imgArr[openedIndexes[0]].src === imgArr[openedIndexes[1]].src
  ) {
    document.querySelector(".container").style.pointerEvents = "none";
    openedIndexes = [];
    setTimeout(() => {
      document.querySelector(".container").style.pointerEvents = "auto";
    }, 10);
  }
  checkerEndGame(imgArr, timerId);
}
