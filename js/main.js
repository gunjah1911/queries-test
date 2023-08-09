$("document").ready(function(){
    /*--------- index.php --------------------*/

    var modal = $('#modal_deleted').modal({ keyboard: false, show: false, backdrop: 'static' });

    $("#test-button").click(function() {
        modal.modal('show');
    });

    // Выбран пользователь
    $("#user").change(function() {
        let fData = $(this).parents("form").serialize()+'&action=get_queries';
        //console.log(fData);

        $.ajax({
            url: $(this).parents("form").attr('action'),
            method: $(this).parents("form").attr('method'),
            dataType: 'html',
            data: fData,
            success: function(data) {
                $("#user_queries").html(data);
                $("#add").attr('disabled', false);
            }
        });
    });

    // Выбран запрос
    $("#user_queries").change(function() {
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
        let fData = $(this).parents("form").serialize()+'&action=delete';
        //console.log(fData);

        $.ajax({
            url: $(this).parents("form").attr('action'),
            method: $(this).parents("form").attr('method'),
            dataType: 'html',
            data: fData,
            success: function(data) {
                $("#user_queries").html(data);
                modal.modal('show');
            }
        });

    });

    //Кнопка Запустить
    $("#run").click(function(e) {
        button = $(this).val();
    });

    //Отправка формы по любой из кнопок
    $("form").submit(function(e) {
        //e.preventDefault();
        let fData = $(this).serialize()+'&action='+button;
        console.log(fData);
    });


    $("#run").click(function(e) {
        //let fData = $(this).parents("form").serialize()+'&action=run';
        let fData = $("#edit_form").serialize()+'&action=run';
        //e.preventDefault();
        console.log(fData);

        $.ajax({
            url: '/app/FormHandlers.php',
            method: $(this).parents("form").attr('method'),
            dataType: 'html',
            data: fData,
            success: function(data) {
                console.log(data);
                $(".container").html(data);
            }
        });

    });

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