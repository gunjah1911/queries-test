$("document").ready(function(){
    /*--------- index.php --------------------*/

    $("#test").change(function() {
        console.log('qqqq');
        let t = $("#myform").serialize();
        console.log(t);
    });

    $("#test-button").click(function() {
        //$("#modal_deleted").toggle();
        //$(".modal").modal('show');
        //$("#user").trigger("change");
        //$("#user").trigger('change');
        $("#test").change();
    });

    // Выбран пользователь
    $("#user").change(function() {

        //let fData = $("#myform").serialize()+'&action=get_queries'; //сделать "относительный" селектор, который обращается к родительской форме

        let fData = $(this).parents("form").serialize()+'&action=get_queries';
        //console.log('qqqq');
        console.log(fData);

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
        let fData = $("#myform").serialize()+'&action=delete';//$(this).parents("form").serialize()
        //console.log(fData);

        $.ajax({
            url: $("#myform").attr('action'),
            method: $("#myform").attr('method'),
            dataType: 'html',
            data: fData,
            success: function(data) {
                $("#user").trigger('change');
                //$(".modal").modal('show');
            }

        });$("#user").trigger('change');
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