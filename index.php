<?php

require_once __DIR__."/vendor/autoload.php";

use App\DB,
    App\Controllers,
    App\Views;

//echo '<pre>'.print_r($_GET).'</pre>';

if (isset($_POST["action"]))
{

    switch ($_POST["action"])
    {

        case 'get_queries':
            $params = ['user'=>$_POST['user']];
            new Controllers\FormHandler (new Controllers\ShowUserQueries(), $params);
            break;

        case 'add':

            break;

        case 'edit':

            break;

        case 'delete'://удаляем по запросу, добавить модалку с сообщением

            break;

        case 'run': //Запускаем запрос

            break;

        case 'saveas': //Сохраняем новый

            break;

        case 'save': //Сохраняем существующий

            break;
    }
}
else //initial form state
{
    //$t = new App\DB\UsersQueries();
    //$arUsers = $t->getUsers();
    //require_once(__DIR__ . '/templates/main.php');
    new Controllers\FormHandler (new Controllers\InitialState(), //strategy)
    null);
} ?>