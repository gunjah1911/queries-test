<?php

require_once __DIR__."/vendor/autoload.php";

use App\Controllers\FormHandler;
//TODO: Перенести классы из 1 файла FormHandler в разные

ini_set('display_errors', 1);
//echo '<pre>'.print_r($_GET).'</pre>';

if (isset($_POST["action"]))
{

    switch ($_POST["action"])
    {

        case 'get_queries':
            $params = ['user'=>$_POST['user']];
            new FormHandler(new App\Controllers\UserQueries(), $params);
            break;

        case 'delete':
            $params = [
                'user'=>$_POST['user'],
                'query_id'=>$_POST['user_queries'],
            ];
            new FormHandler(new App\Controllers\DeleteQuery(), $params);
            break;

        case 'add':
            $params = ['user'=>$_POST['user']];
            new FormHandler(new App\Controllers\ShowAddForm(), $params);
            break;

        case 'edit':
            $params = [
                //'user'=>$_POST['user'],
                'query_id'=>$_POST['user_queries']
            ];
            new FormHandler(new App\Controllers\ShowEditForm(), $params);
            break;

        case 'run': //Запускаем запрос
            $params = ['query'=>$_POST['query']];
            new FormHandler(new App\Controllers\RunQuery(), $params);
            break;

        case 'saveas': //Сохраняем новый

            break;

        case 'save': //Сохраняем существующий

            break;
    }
}
else //initial form state
{
    new FormHandler (new App\Controllers\InitialState(), null);
} ?>