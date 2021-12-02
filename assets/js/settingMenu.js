// ПЕРЕКЛЮЧЕНИЯ СТРАНИЦ В НАСТРОЙКАХ ПОЛЬЗОВАТЕЛЯ
document.addEventListener("DOMContentLoaded",()=>{
    const settingMenu = document.querySelectorAll(".setting__menu li");
    const pages = document.querySelectorAll("article > div");
    settingMenu[0].classList.add("chooseSetting");
    pages[1].classList.add("invisiblePage")
    settingMenu[0].addEventListener("click",()=>{
        settingMenu[0].classList.add("chooseSetting");
        settingMenu[1].classList.remove("chooseSetting");
        pages[1].classList.add("invisiblePage")
        pages[0].classList.remove("invisiblePage")
    })
    settingMenu[1].addEventListener("click",()=>{
        settingMenu[0].classList.remove("chooseSetting");
        settingMenu[1].classList.add("chooseSetting");
        pages[0].classList.add("invisiblePage")
        pages[1].classList.remove("invisiblePage")
    })
})