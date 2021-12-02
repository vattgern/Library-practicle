// КОГДА ДОКУМЕНТ ПРОГРУЗИЛСЯ
$(document).ready(function(event){
    // GET-ЗАПРОС ДЛЯ ЗАПОЛНЕНИЯ АДМИН-ПАНЕЛИ КНИГАМИ
    // --------------------------------------------------
    $.ajax({
        method: 'GET',
        url: '../php/view_books.php'
    }).done((data)=>{
        document.querySelector(".table_books").innerHTML = data
    })
    // --------------------------------------------------
    // --------------------------------------------------
    // GET-ЗАПРОС ДЛЯ ЗАПОЛНЕНИЯ АДМИН-ПАНЕЛЬ ПОЛЬЗОВАТЕЛЯМИ
    $.ajax({
        method: 'GET',
        url: '../php/view_users.php'
    }).done((data)=>{
        document.querySelector(".table_users").innerHTML = data
    })
    // --------------------------------------------------
    // --------------------------------------------------
    // КОГДА ФОРМА ОТПРАВЛЕНА
    $('#form-book').on('submit', function (event) {
        // НЕ ЗНАЮ ЧТО ЭТО НО ЭТО НЕЛЬЗЯ УДАЛЯТЬ
        // --------------------------------------
        // БЕЗ ЭТОГО РАБОТАТЬ НЕ БУДЕТ
        event.preventDefault();
        // --------------------------------------
        // ПЕРЕКИДЫВАЕМ ДАННЫЕ С ПОМОЩЬЮ ОБЪЕКТА FORMDATA
        let fd = new FormData($('#form-book')[0])
        // --------------------------------------
        // POST-ЗАПРОС ДЛЯ УДАЛЕНИЯ КНИГИ
        $.ajax({
            method: 'POST',
            url: '../php/delete_book.php',
            data: fd,
        }).done(function (){
            // ОБНОВЛЕНИЯ КНИГ ДЛЯ ТАБЛИЦЫ АДМИН-ПАНЕЛИ
            // --------------------------------------
            $.ajax({
                method: 'GET',
                url: '../php/view_books.php'
            }).done((data)=>{
                document.querySelector(".table_books").innerHTML = data
            })
            // --------------------------------------
        })
        // --------------------------------------
        // ПОПАН УБРАТЬ
        document.querySelector(".area-popOn").classList.remove("popOnOpen")
    })
    // --------------------------------------
    // ФОРМА ДОБАВЛЕНИЯ КНИГИ
    $('#form-add').on('submit', function (event) {
        event.preventDefault();
        // ДАННЫЕ ИЗ ФОРМЫ ПЕРЕДАЧА ЧЕРЕЗ FORMDATA
        let fd = new FormData($('#form-add')[0])
        // --------------------------------------
        // POST-ЗАПРОС ДОБАВЛЕНИЯ ДАННЫХ
        $.ajax({
            method: 'POST',
            url: '../php/add_book.php',
            data: fd,
            contentType: false,
            processData: false,
            success: function (){
                // ОБНОВЛЕНИЯ ДАННЫХ ДЛЯ АДМИН-ПАНЕЛИ
                // --------------------------------------
                $.ajax({
                    method: 'GET',
                    url: '../php/view_books.php'
                }).done((data)=>{
                    document.querySelector(".table_books").innerHTML = data
                })
                // --------------------------------------
            }
        })
        // --------------------------------------
        document.querySelector(".area-popOn").classList.remove("popOnOpen")
    })
    // --------------------------------------
    // РЕДАКТИРОВАНИЕ НЕ ДЕДАЛ ПРОСТО ЗАДАЛ GET-ЗАПРОС НА ОБНОВЛЕНИЕ ДАННЫХ
    document.querySelector(".edit").addEventListener("click",()=>{
        $.ajax({
            method: 'GET',
            url: '../php/view_books.php'
        }).done((data)=>{
            document.querySelector(".table_books").innerHTML = data
        })
    })
})