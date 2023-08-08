<?php
require_once '../vendor/autoload.php';
$header = '
<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>...</title>
    <!-- Bootstrap CSS (Cloudflare CDN) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.2/css/bootstrap.min.css" integrity="sha512-rt/SrQ4UNIaGfDyEXZtNcyWvQeOq0QLygHluFQcSjaGB04IxWhal71tKuzP6K8eYXYB6vJV4pHkXcmFGGQ1/0w==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <!-- jQuery (Cloudflare CDN) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Bootstrap Bundle JS (Cloudflare CDN) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.2/js/bootstrap.bundle.min.js" integrity="sha512-igl8WEUuas9k5dtnhKqyyld6TzzRjvMqLC79jkgT3z02FvJyHAuUtyemm/P/jYSne1xwFI06ezQxEwweaiV7VA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="/js/main.js"></script>
</head>
<body>
<p><? //var_dump($t);?></p>
<div class="container">';

if (isset($_POST)):
    switch ($_POST["action"]) {
        case 'get_queries':
            $t = new App\DB\UsersQueries('../conf/user_queries_db_config.json');
            $arUserQueries = $t->getUserQueries($_POST["user"]);
            echo print_r($arUserQueries); /*ВОЗВРАЩАЕТСЯ ОДИН И ТОТ ЖЕ id!!*/

            foreach ($arUserQueries as $item):?>
                <option value="<?=$item["id"]?>"><?=$item["query_name"]?></option>
            <?php endforeach;
        case 'add':
            $user_id = $_POST["user"];
            echo $header;?>
            <div class="row">
                <div class="col">
                </div>
                <div class="col-sm-8">
                    <h2>Добавление<?=$user_id?></h2>
                    <form id="edit_form" method="post" action="app/EditFormHandler.php">
                        <div class="row">

                            <div class="form-group col-sm-9">
                                <textarea id="query" class="form-control" style="min-height:10rem">

                                </textarea>
                            </div>
                            <div class="col-sm-3">

                                <button id="run" type="submit" class="form-group btn btn-secondary btn-sm" name="action" value="run">Выполнить</button>

                                <button id="saveas" type="submit" class="form-group btn btn-secondary btn-sm" name="action" value="saveas">Сохранить как</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col">
                </div>
            </div><?//row?>
        </div>
    </body>
    </html><?php
            break;
        case 'edit':
            $queryID = $_POST["user_queries"];
            echo $header;
            $t = new App\DB\UsersQueries('../conf/user_queries_db_config.json');
            $arQuery = $t->getQueryById($queryID);
            /*if (!empty($arUserQueries)){
                echo 'query';
                $key = array_search($user_queries, $arUserQueries);
                var_dump($arUserQueries["$key"]);
            }*/
            //var_dump( $arQuery);?>
            <div class="row">
                <div class="col">
                </div>
                <div class="col-sm-8">
                    <h2>Изменение запроса</h2>
                    <form id="edit_form" method="post" action="app/EditFormHandler.php">
                        <div class="row">

                            <div class="form-group col-sm-9">
                                <textarea id="query" class="form-control" style="min-height:10rem"><?=trim($arQuery[0]["query"]);?></textarea>
                            </div>
                            <div class="col-sm-3">

                                <button id="run" type="submit" class="form-group btn btn-secondary btn-sm" name="action" value="run">Выполнить</button>

                                <button id="save" type="submit" class="form-group btn btn-secondary btn-sm" name="action" value="save">Сохранить</button>

                                <button id="saveas" type="submit" class="form-group btn btn-secondary btn-sm" name="action" value="saveas">Сохранить как</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col">
                </div>
            </div><?//row?>
        </div>
    </body>
    </html><?php
            break;
        case 'delete'://удаляем по запросу
            $queryID = $_POST["user_queries"];
            $t = new App\DB\UsersQueries('../conf/user_queries_db_config.json');
            echo 'deleted';
            if ($t->deleteQueryById($queryID)) echo 'deleted';
            break;
}?>

<?php endif;

/*
if ($_POST["action"] === 'get_queries'){
    $t = new App\DB\UsersQueries('../conf/user_queries_db_config.json');
    $arUserQueries = $t->getUserQueries($_POST["user"]);

    foreach ($arUserQueries as $Item):?>
        <option value="<?=$Item["id"]?>"><?=$Item["query_name"]?></option>
    endforeach;
};
*/

/* TEST!!!
$t = new App\DB\WorkDBQuery('../conf/work_db_config.json');
$q = 'select * from test_table';
$test = $t->runQuery($q);
echo '<pre>';
print_r($test);
echo '</pre>';
echo json_encode(["message" => "ok"]);
*/