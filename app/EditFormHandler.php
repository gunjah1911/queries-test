<?php /*удалить
require_once '../vendor/autoload.php';
var_dump($_POST);
if (isset($_POST)):?>

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
<div class="container">

<?php
switch ($_POST["action"]) {
    case 'add':?>
        <div class="row">
        <div class="col">
        </div>
        <div class="col-sm-8">
            <h2>Добавление</h2>
            <form id="edit_form" method="post" action="app/EditFormHandler.php">
                <div class="row">

                    <div class="form-group col-sm-9">
                        <textarea id="query" class="form-control" style="min-height:10rem">

                        </textarea>
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

    </div><?//row
        break;
    case 'edit':
        echo 'edit';
        break;
    case 'delete':
        echo 'delete';
        break;
}?>
</div>
</body>
</html>
<?php endif;?>

<?php /* TEST!!!
$t = new App\DB\WorkDBQuery('../conf/work_db_config.json');
$q = 'select * from test_table';
$test = $t->runQuery($q);
echo '<pre>';
print_r($test);
echo '</pre>';
echo json_encode(["message" => "ok"]);
*/?>

