document.querySelector("#btn-form").addEventListener("click",()=>{
    const name_b = document.querySelector("#name-book");
    const name_a = document.querySelector("#name-author");
    const genre_b = document.querySelector("#genre-book");
    const description = document.querySelector("#description-book");
    const year_b = document.querySelector("#year-book");

    const url = "add_book.php";
    const params = "name-book="+name_b+"&name-author="+name_a+"&genre-book="+genre_b+"&description-book="+description+"&year-book="+year_b;
    const request = new XMLHttpRequest();
    request.open("POST",url,true);
    request.addEventListener("readystatechange", ()=>{
        if(request.readyState === 4 && request.status === 200){
            console.log(request.responseText);
        }
    });
// request.send(params);
});