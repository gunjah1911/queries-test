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

    //Отправка формы по любой из кнопок
    $("#myform").submit(function(e) {
        //e.preventDefault();

        let fData = $(this).serialize()+'&action='+button;
        //let fData = $("button").val();
        //console.log(fData);
        //console.log($("#myform").attr('action'));
        /*
                $.ajax({
                    url: 'app/EditFormHandler.php',
                    method: $(this).attr('method'),
                    //dataType: 'json',
                    dataType: 'html',
                    data: fData,
                    success: function(data) {
                        //console.log(data);
                    }
                });*/
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