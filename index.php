<?php

require_once __DIR__."/vendor/autoload.php";

use App\Controllers\FormHandler;

//ini_set('display_errors', 1);
//echo '<pre>'.print_r($_GET).'</pre>';

if (isset($_POST["action"]))
{
    $params = $_POST;

    switch ($_POST["action"])
    {

        case 'get_queries': //показываем запросы выбранного пользователя
            new FormHandler(new \App\Controllers\UserQueries(), $params);
            break;

        case 'delete': //уделение запроса
            new FormHandler(new \App\Controllers\DeleteQuery(), $params);
            break;

        case 'add': //показываем форму добавления нового запроса
            new FormHandler(new \App\Controllers\ShowAddForm(), $params);
            break;

        case 'edit': //показываем форму редактирования существующего запроса
            new FormHandler(new \App\Controllers\ShowEditForm(), $params);
            break;

        case 'run': //Запускаем запрос
            new FormHandler(new \App\Controllers\RunQuery(), $params);
            break;

        case 'saveas': //Сохраняем новый
            new FormHandler(new \App\Controllers\SaveAsQuery(), $params);
            break;

        case 'save': //Сохраняем существующий
            new FormHandler(new \App\Controllers\SaveQuery(), $params);
            break;
    }
}
else //initial form state
{
    new FormHandler (new \App\Controllers\InitialState(), null);
} ?>