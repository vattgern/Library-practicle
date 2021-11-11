let btnOpen = document.querySelector(".add")
btnOpen.addEventListener("click",()=>{
    document.querySelector(".area-popOn").classList.add("popOnOpen")
})
let btnExit = document.querySelector(".btnExit")
btnExit.addEventListener("click",()=>{
    document.querySelector(".area-popOn").classList.remove("popOnOpen")
})