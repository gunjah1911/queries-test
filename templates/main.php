<?php
/** @var array $templateVars
 * Массив переменных представления
 */

?>

<div class="row">
    <div class="col">
    </div>
    <div class="col-sm-10">
        <h2>Выбор пользователя и запроса</h2>

        <form id="myform" method="post" action="app/FormHandlers.php"> <?//action="index.php?>

            <?php
            if (!empty($templateVars['users'])):?>
                <div class="form-group col-sm-4">
                    <label for="user">Пользователь</label>
                    <select id="user" name="user" class="form-control custom-select" size="4">
                        <?php foreach ($templateVars['users'] as $user):?>
                            <option value="<?=$user["id"]?>"><?=$user["name"]?></option>
                        <?php endforeach?>
                        <?/*php Выбор нужного пользователя по нажатии кнопки Назад
                        if (!empty($_GET["user"])) {$user_id = $_GET["user"]; echo $user_id;}?>
                        <?php foreach ($templateVars as $user):
                            if ($user["id"] == $user_id):?>
                                <option selected value="<?=$user["id"]?>"><?=$user["name"]?></option>
                            <?php else:?>
                                <option value="<?=$user["id"]?>"><?=$user["name"]?></option>
                            <?php endif;?>
                        <?php endforeach*/?>
                    </select>
                </div>
            <?php endif?>
            <div class="form-group col-sm-4">
                <label for="user_queries">Запросы пользователя</label>
                <select id="user_queries" name="user_queries" class="form-control custom-select" size="6">
                </select>
            </div>

            <div class="form-group">
                <button id="add" disabled type="submit" class="form-group btn btn-secondary btn-sm" name="action" value="add">Добавить</button>
                <button id="edit" disabled type="submit" class="form-group btn btn-secondary btn-sm" name="action" value="edit">Редактировать</button>
                <button id="delete" disabled type="button" class="form-group btn btn-secondary btn-sm" name="action" value="delete">Удалить</button>
            </div>

        </form>
    </div>
    <div class="col">
    </div>
</div><?php //row?>