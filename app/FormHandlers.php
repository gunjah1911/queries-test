<?php
require_once '../vendor/autoload.php';
/*echo '<pre>';
print_r($_POST);
echo '</pre>';*/

/*
$t = new App\DB\UsersQueries('../conf/user_queries_db_config.json');
$arUserQueries = $t->getUserQueries(1);
echo json_encode(["message" => "ok"]);
echo '<pre>';
print_r($arUserQueries);
echo '</pre>';
*/

if ($_POST["action"] === 'get_queries'){
    $t = new App\DB\UsersQueries('../conf/user_queries_db_config.json');
    $arUserQueries = $t->getUserQueries($_POST["user"]);
    echo json_encode($arUserQueries);
};