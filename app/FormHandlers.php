<?php
/*
 * toDO: Переписать на ООП/MVC контроллер
 */
require_once '../vendor/autoload.php';

if (isset($_POST["user"])) $user_id = $_POST["user"];
$header = file_get_contents('../templates/header.php');
$form_add = '';
$footer = file_get_contents('../templates/footer.php');


if (isset($_POST)):

    switch ($_POST["action"]) {

        case 'get_queries':
            $t = new App\DB\UsersQueries('../conf/user_queries_db_config.json');
            $arUserQueries = $t->getUserQueries($_POST["user"]);
            //echo print_r($arUserQueries); 

            foreach ($arUserQueries as $item):?>
                <option value="<?=$item["id"]?>"><?=$item["query_name"]?></option>
            <?php endforeach;
            break;

        case 'add':
            $user_id = $_POST["user"];
            echo $header;?>
            <div class="row">
                <div class="col">
                </div>
                <div class="col-sm-8">
                    <h2>Добавление запроса</h2>
                    <form id="edit_form" method="post" action="EditFormHandler.php">
                        <div class="row">
                            <div class="form-group col-sm-9">
                                <input type="hidden" name="user" value="<?=$user_id?>">
                                <label for="query_name">Название запроса</label>
                                <input type="input" name="query_name" class="form-control" id="query_name" aria-describedby="" placeholder="" required>
                            </div>
                            <div class="form-group col-sm-9">
                                <textarea id="query" name="query" class="form-control" style="min-height:10rem"></textarea>
                            </div>
                            <div class="col-sm-3">

                                <button id="run" type="button" class="form-group btn btn-secondary btn-sm" name="action" value="run">Выполнить</button>
                                <button id="saveas" type="button" class="form-group btn btn-secondary btn-sm" name="action" value="saveas">Сохранить как</button>
                                <a href="/?user=<?=$user_id?>" class="btn btn-link">Назад</a>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col">
                </div>
            </div><?//row?>
            <div id="run_table" class="row">
            </div>
            <?php echo $footer;
            break;

        case 'edit':
            $query_id = $_POST["user_queries"];
            $t = new App\DB\UsersQueries('../conf/user_queries_db_config.json');
            $arQuery = $t->getQueryById($query_id);
            echo $header;?>
            <div class="row">
                <div class="col">
                </div>
                <div class="col-sm-8">
                    <h2>Изменение запроса</h2>
                    <form id="edit_form" method="post" action="EditFormHandler.php">
                        <div class="row">

                            <div class="form-group col-sm-9">
                                <input type="hidden" name="query_id" value="<?=$query_id?>">
                                <input type="hidden" name="user" value="<?=$user_id?>">
                                <label for="query_name">Название запроса</label>
                                <input type="input" name="query_name" class="form-control" id="query_name" aria-describedby="" placeholder="" value="<?=trim($arQuery[0]["query_name"]);?>">
                            </div>

                            <div class="form-group col-sm-9">
                                <textarea id="query" name="query" class="form-control" style="min-height:11rem"><?=trim($arQuery[0]["query"]);?></textarea>
                            </div>

                            <div class="col-sm-3">
                                <button id="run" type="button" class="form-group btn btn-secondary btn-sm" name="action" value="run">Выполнить</button>
                                <button id="save" type="button" class="form-group btn btn-secondary btn-sm" name="action" value="save">Сохранить</button>
                                <button id="saveas" type="button" class="form-group btn btn-secondary btn-sm" name="action" value="saveas">Сохранить как</button>
                                <a href="/?user=<?=$user_id?>" class="btn btn-link">Назад</a>
                            </div>

                        </div>
                    </form>
                </div>
                <div class="col">
                </div>
            </div><?//row?>
            <div id="run_table" class="row">
            </div>
            <?php echo $footer;
            break;

        case 'delete'://удаляем по запросу, добавить модалку с сообщением
            $queryID = $_POST["user_queries"];
            $t = new App\DB\UsersQueries('../conf/user_queries_db_config.json');
            if ($t->deleteQueryById($queryID)):

                $arUserQueries = $t->getUserQueries($_POST["user"]);
                foreach ($arUserQueries as $item):?>
                <option value="<?=$item["id"]?>"><?=$item["query_name"]?></option>
                <?php endforeach;

            endif;
            break;

        case 'run': //Запускаем запрос
            $query = $_POST["query"];
            $t = new App\DB\WorkDBQuery('../conf/work_db_config.json');
            $arResult = $t->runQuery($query);
            if (!empty($arResult)):?>

                    <table class="table">
                        <thead class="thead-light">
                        <tr>
                        <?php foreach ($arResult[0] as $key => $value):?>
                            <th scope="col"><?=$key?></th>
                        <?php endforeach;?>
                        </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($arResult as $item_key => $item):?>
                            <tr>
                                <?php foreach ($item as $key=> $value):?>
                                    <td><?=$value?></td>
                                <?php endforeach;?>
                            </tr>
                            <?php endforeach;?>
                        </tbody>
                    </table>

            <?php endif;
            break;

        case 'saveas': //Сохраняем новый
            $query_name = $_POST["query_name"];
            $query = $_POST["query"];
            $t = new App\DB\UsersQueries('../conf/user_queries_db_config.json');
            $arResult = $t->addNewQuery($user_id, $query_name, $query);
            echo 'Запрос добавлен';
            break;

        case 'save': //Сохраняем существующий
            $query_id = $_POST["query_id"];
            $query_name = $_POST["query_name"];
            $query = $_POST["query"];

            $t = new App\DB\UsersQueries('../conf/user_queries_db_config.json');
            $arResult = $t->saveQuery($query_id, $query_name, $query);
            /*if (!empty($arResult)):
                echo $header;
            endif;*/
            echo 'Запрос сохранен';
            break;
}?>

<?php endif;
