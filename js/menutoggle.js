document.addEventListener("DOMContentLoaded", ()=>{
    const menutoggle = document.querySelector("#menu-toggle");
    const menu = document.querySelector(".menu");

    menutoggle.onclick = ()=>{
        menutoggle.classList.toggle("fa-times");
        menutoggle.classList.toggle("actve");
        menu.classList.toggle("active");
    }
});

