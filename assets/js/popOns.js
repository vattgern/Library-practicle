// КНОПКА ДЛЯ ОТКРЫТИЯ ФОРМЫ ДОБАЛЕНИЯ КНИГИ
let btnOpen = document.querySelector(".add")
btnOpen.addEventListener("click",()=>{
    document.querySelector('.popOnAdd').style.display = 'block'
    document.querySelector('.popOnDelete').style.display = 'none'
    document.querySelector(".area-popOn").classList.add("popOnOpen")
})
// КНОПКА ДЛЯ ЗАКРЫТИЯ ФОРМЫ ДОБАВЛЕНИЯ КНИГИ
let btnExit = document.querySelector(".btnExit")
btnExit.addEventListener("click",()=>{
    document.querySelector(".area-popOn").classList.remove("popOnOpen")
})
// КНОПКА ДЛЯ ОТКРЫТИЯ ФОРМЫ УДАЛЕНИЯ КНИГИ
let btnDelOpen = document.querySelector(".delete")
btnDelOpen.addEventListener("click",()=>{
    document.querySelector('.popOnAdd').style.display = 'none'
    document.querySelector('.popOnDelete').style.display = 'block'
    document.querySelector('.area-popOn').classList.add("popOnOpen")
})