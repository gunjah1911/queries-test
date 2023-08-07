<?php

require_once __DIR__."/vendor/autoload.php";

use App\DB;

$t = new App\DB\UsersQueries(__DIR__. "/conf/user_queries_db_config.json");
//$arUserQueries = $t->getUserQueries(1);
$arUsers = $t->getUsers();
//print_r($arUsers);

;?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>...</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.2/css/bootstrap.min.css" integrity="sha512-rt/SrQ4UNIaGfDyEXZtNcyWvQeOq0QLygHluFQcSjaGB04IxWhal71tKuzP6K8eYXYB6vJV4pHkXcmFGGQ1/0w==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.6.2/js/bootstrap.bundle.min.js" integrity="sha512-igl8WEUuas9k5dtnhKqyyld6TzzRjvMqLC79jkgT3z02FvJyHAuUtyemm/P/jYSne1xwFI06ezQxEwweaiV7VA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="/js/main.js"></script>
</head>
<body>
<p><? //var_dump($t);?></p>
<div class="container">
    <div class="row">
        <div class="col">
        </div>
        <div class="col-sm-10">
            <h2>Выбор пользователя и запроса</h2>
            <form id="myform" method="post" action="app/FormHandlers.php">

                  <?//тут должен быть вывод экземпляра вида для списка пользователей
                if (!empty($arUsers)):?>
                <div class="form-group col-sm-4">
                    <label for="user">Пользователь</label>
                        <select id="user" name="user" class="form-control custom-select" size="4">
                        <?foreach ($arUsers as $user):?>
                            <option value="<?=$user["id"]?>"><?=$user["name"]?></option>
                        <?endforeach?>
                        </select>
                </div>
                <?endif?>
                <div class="form-group col-sm-4">
                    <label for="user_queries">Запросы пользователя</label>
                    <select id="user_queries" name="user_queries" class="form-control custom-select" size="6">
                    </select>
                </div>

                <div class="form-group">
                    <button id="add" disabled type="submit" class="form-group btn btn-secondary btn-sm" formaction="app/EditFormHandler.php" name="action" value="add">Добавить</button>
                    <button id="edit" disabled type="submit" class="form-group btn btn-secondary btn-sm" name="action" value="edit">Редактировать</button>
                    <button id="delete" disabled type="submit" class="form-group btn btn-secondary btn-sm" name="action" value="delete">Удалить</button>
                </div>

            </form>
        </div>
        <div class="col">
        </div>
    </div><?//row?>
</div>

</body>
</html>