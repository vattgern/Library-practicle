$(document).ready(function(event){
    $.ajax({
        method: 'GET',
        url: '../php/view_books.php'
    }).done((data)=>{
        document.querySelector(".table_books").innerHTML = data
    })
    $.ajax({
        method: 'GET',
        url: '../php/view_users.php'
    }).done((data)=>{
        document.querySelector(".table_users").innerHTML = data
    })
    $('#form-book').on('submit', function (event) {
        event.preventDefault();
        let fd = new FormData($('#form-book')[0])

        $.ajax({
            method: 'POST',
            url: '../php/delete_book.php',
            data: fd,
        }).done(function (){
            $.ajax({
                method: 'GET',
                url: '../php/view_books.php'
            }).done((data)=>{
                document.querySelector(".table_books").innerHTML = data
            })
        })
        document.querySelector(".area-popOn").classList.remove("popOnOpen")
    })
    $('#form-add').on('submit', function (event) {
        event.preventDefault();
        let fd = new FormData($('#form-add')[0])
        $.ajax({
            method: 'POST',
            url: '../php/add_book.php',
            data: fd,
            contentType: false,
            processData: false,
            success: function (){
                $.ajax({
                    method: 'GET',
                    url: '../php/view_books.php'
                }).done((data)=>{
                    document.querySelector(".table_books").innerHTML = data
                })
            }
        })
        document.querySelector(".area-popOn").classList.remove("popOnOpen")
    })
    document.querySelector(".edit").addEventListener("click",()=>{
        $.ajax({
            method: 'GET',
            url: '../php/view_books.php'
        }).done((data)=>{
            document.querySelector(".table_books").innerHTML = data
        })
    })
})