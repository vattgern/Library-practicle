$(document).ready(function(){
    $('#btnFormDelete').on('click', function () {
        let nameBook = $('#name-booker').val()
        $.ajax({
            method: 'POST',
            url: '../php/delete_book.php',
            data: {
                name_book: nameBook,
            },
        }).done(function (msg){
            alert("Book deleted " + msg)
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
                alert("Data saved!!!");
            }
        })
        document.querySelector(".area-popOn").classList.remove("popOnOpen")
    })

})