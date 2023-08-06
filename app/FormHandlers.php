<?php
use App\DB;
print_r($_POST);
//$T = $_POST['action'];
/*if ($_POST["action"] == 'get_queries'){
    $t = new App\DB\UsersQueries(__DIR__. "/conf/user_queries_db_config.json");
    $arUserQueries = $t->getUserQueries($_POST["user"]);
}

/*$arr = array(
    "foo" => "bar",
    "bar" => "foo",
);
*/

//echo json_encode($arUserQueries);
echo json_encode($_POST);
