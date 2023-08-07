$("document").ready(function(){

    /*$("#myform").submit(function(e) {
        e.preventDefault();

        //let fData = $(this).serializeArray();
        //fData.push({action: 'get_queries'});
        //let fData = [action: 'get_queries'];
        let fData = $(this).serialize()+'&action=get_queries';
        console.log(fData);

        $.ajax({
            url: $(this).attr('action'),
            method: $(this).attr('method'),
            //dataType: 'json',
            dataType: 'html',
            data: fData,
            success: function(data) {
                console.log(data);
            }
        });
    });
*/

    // Выбран пользователь
    $("#user").change(function(e) {
        //e.preventDefault();

        let fData = $("#myform").serialize()+'&action=get_queries'; //сделать "относительный" селектор, который обращается к родительской форме
        //console.log(fData);

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