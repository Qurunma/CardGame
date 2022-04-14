"use strict";
const inpLogin = document.querySelector(".login");
const inpPass = document.querySelector(".pass");
const btn = document.querySelector(".sign-in");
btn.setAttribute("disabled", true);
inpLogin.addEventListener("input", () => {
  if (inpLogin.value == "" || inpPass.value == "") {
    btn.setAttribute("disabled", true);
  } else {
    btn.removeAttribute("disabled");
  }
});
inpPass.addEventListener("input", () => {
  if (inpLogin.value == "" || inpPass.value == "") {
    btn.setAttribute("disabled", true);
  } else {
    btn.removeAttribute("disabled");
  }
});
