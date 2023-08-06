$("document").ready(function(){

    $("#myform").submit(function(e) {
        e.preventDefault();

        //let fData = $(this).serializeArray();
        //fData.push({action: 'get_queries'});
        //let fData = [action: 'get_queries'];
        let fData = $(this).serialize()+'&action=get_queries';
        console.log(fData);

        $.ajax({
            url: $(this).attr('action'),         /* Куда отправить запрос */
            method: $(this).attr('method'),      /* Метод запроса (post или get) */
            //dataType: 'json',          /* Тип данных в ответе (xml, json, script, html). */
            dataType: 'json',          /* Тип данных в ответе (xml, json, script, html). */
            data: fData,
            success: function(data) {   /* функция которая будет выполнена после успешного запроса.  */
                console.log(data);
            }
        });
    });

    $("#user").change(function(e) {
        //e.preventDefault();

        let fData = $("#user").serialize()+'&action=get_queries';
        //let fData = $("#myform").serialize();
        console.log(fData);

        $.ajax({
            url: $("#myform").attr('action'),
            method: $("#myform").attr('method'),
            dataType: 'json',
            data: fData,
            success: function(data) {
                console.log(data);

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