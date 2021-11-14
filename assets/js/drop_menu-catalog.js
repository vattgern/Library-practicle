let menu = document.querySelector(".drop__menu");
let button = document.querySelector(".menu__icon");
//ОТКРЫТИЕ И ЗАКРЫТИЕ ПОПАНА
button.addEventListener("click",()=>{
    menu.classList.toggle("open");
    button.classList.toggle("button__done");
})