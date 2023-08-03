$("document").ready(function(){

    $("#myform").submit(function(e) {
        e.preventDefault();

        let fData = $(this).serialize();

        $.ajax({
            url: $(this).attr('action'),         /* Куда отправить запрос */
            method: $(this).attr('method'),             /* Метод запроса (post или get) */
            dataType: 'json',          /* Тип данных в ответе (xml, json, script, html). */
            data: fData,
            success: function(data) {   /* функция которая будет выполнена после успешного запроса.  */

            }
        });

    })
})
/*
myform.onsubmit = async (e) => {
    e.preventDefault();

    let response = await fetch('app/FormHandlers.php', {
        method: 'POST',
        body: new FormData(myform)
    });

    let result = await response.json();

    console.log(result);
};*/