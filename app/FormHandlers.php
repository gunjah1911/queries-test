<?php
require_once '../vendor/autoload.php';

/* TEST!!!
$t = new App\DB\WorkDBQuery('../conf/work_db_config.json');
$q = 'select * from test_table';
$test = $t->runQuery($q);
echo '<pre>';
print_r($test);
echo '</pre>';
echo json_encode(["message" => "ok"]);
*/

if ($_POST["action"] === 'get_queries'){
    $t = new App\DB\UsersQueries('../conf/user_queries_db_config.json');
    $arUserQueries = $t->getUserQueries($_POST["user"]);

    foreach ($arUserQueries as $Item):?>
        <option value="<?=$Item["id"]?>"><?=$Item["query_name"]?></option>
    <?endforeach;
};?>