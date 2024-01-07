<?php

require_once __DIR__."/vendor/autoload.php";

use App\DB,
    App\Controllers,
    App\Views;

echo file_get_contents(__DIR__.'/templates/header.php');


//echo '<pre>'.print_r($_GET).'</pre>';

if (isset($_POST["action"]))
{

    switch ($_POST["action"])
    {

        case 'get_queries':

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
    $t = new App\DB\UsersQueries(__DIR__. "/conf/user_queries_db_config.json");
    $arUsers = $t->getUsers();
    require_once(__DIR__ . '/templates/main.php');
    new FormHandler ($params,
        new Controllers\InitialState(), //strategy
        new App\DB\UsersQueries(__DIR__. "/conf/user_queries_db_config.json")
    );
} ?>

<?php echo file_get_contents(__DIR__.'/templates/footer.php');?>