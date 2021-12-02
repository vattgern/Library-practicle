function searchBooks() {
    let input = document.querySelector("#search");
    let filter = input.value.toUpperCase();
    let books = document.querySelectorAll(".books")
    let authors = document.querySelectorAll(".authors");
    for (let index = 0; index < books.length; index++){
        if(authors[index].innerText.toUpperCase().indexOf(filter) > -1){
            books[index].style.display = '';
        } else{
            books[index].style.display = 'none';
        }
    }
}
/*
* ПОИСКОВИК ИЩЕМ КНИГИ ПО АВТОРАМ
* */