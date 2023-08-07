$("document").ready(function(){
/*--------- index.php --------------------*/

    // Выбран пользователь
    $("#user").change(function(e) {
        //e.preventDefault();

        let fData = $("#myform").serialize()+'&action=get_queries'; //сделать "относительный" селектор, который обращается к родительской форме
        //let fData = $(this).parent("form").serialize()+'&action=get_queries'; //сделать "относительный" селектор, который обращается к родительской форме
        console.log(fData);

        $.ajax({
            url: $("#myform").attr('action'),
            method: $("#myform").attr('method'),
            dataType: 'html',
            data: fData,
            success: function(data) {
                //console.log(data);
                $("#user_queries").html(data);
                $("#add").attr('disabled', false);
            }
        });
    });

    // Выбран запрос
    $("#user_queries").change(function(e) {
        //e.preventDefault();
        $("#edit").attr('disabled', false);
        $("#delete").attr('disabled', false);
    });

    //Обработка кнопок Добавить, Изменить и Удалить
    var button = null;

    $("#add").click(function() {
        button = $(this).val();
    });
    $("#edit").click(function() {
        button = $(this).val();
    });
    $("#delete").click(function() {
        button = $(this).val();
    });

    //Отправка формы по любой из кнопок
    $("#myform").submit(function(e) {
        //e.preventDefault();

        let fData = $(this).serialize()+'&action='+button;
        //let fData = $("button").val();
            console.log(fData);

        $.ajax({
            url: '/app/EditFormHandler.php',
            method: $(this).attr('method'),
            //dataType: 'json',
            dataType: 'html',
            data: fData,
            success: function(data) {
                //console.log(data);
            }
        });
    });

    /*---------------edit.php--------------*/

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