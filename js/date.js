const creditpara = document.querySelector(".credit-para");
const creditspan =creditpara.querySelector(".credit-span");

const date = new Date();
creditspan.textContent = date.getFullYear();