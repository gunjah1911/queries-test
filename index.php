<?php

require_once __DIR__."/vendor/autoload.php";

//use App\DB;

$t = new App\DB\UsersQueries(__DIR__. "/conf/user_queries_db_config.json");
//$arUserQueries = $t->getUserQueries(1);
$arUsers = $t->getUsers();
//print_r($arUsers);

;?>
<!doctype html>
<html lang="ru">
<head>
    <!-- Кодировка веб-страницы -->
    <meta charset="utf-8">
    <!-- Настройка viewport -->
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
<div class="container">
    <h2>Vertical (basic) form</h2>
    <form id="myform" method="post" action="app/FormHandlers.php">

        <div class="form-group col-sm-8">
        <?//тут должен быть вывод экземпляра вида для списка пользователей
        if (!empty($arUsers)):?>
                <select id="user" name="user" class="custom-select col-sm-4" size="4">
            <?foreach ($arUsers as $user):?>
                <option value="<?=$user["id"]?>"><?=$user["name"]?></option>
            <?endforeach?>
                </select>
        <?endif?>

            <select id="user_queries" name="user_queries" class="custom-select col-sm-4" size="4">>

            </select>

            <button type="button" class="btn btn-secondary btn-sm" value="add">Добавить</button>
            <button type="button" class="btn btn-secondary btn-sm" value="edit">Редактировать</button>
            <button type="button" class="btn btn-secondary btn-sm" value="delete">Удалить</button>
        </div>

        <div class="form-group">
                <input type="text" class="form-control col-sm-4" id="email" placeholder="Enter name" name="name">
        </div>
        <div class="form-group">

                <input type="text" class="form-control col-sm-4" id="pwd" placeholder="Enter text" name="text">
        </div>
        <div class="checkbox">
            <label><input type="checkbox" name="remember"> Remember me</label>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

</body>
</html>