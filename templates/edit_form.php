<?php
/** @var array $templateVars
* Массив переменных представления
*/
?>

<div class="row">
    <div class="col">
    </div>
    <div class="col-sm-8">
        <h2>Изменение запроса</h2>
        <form id="edit_form" method="post" action="index.php">
            <div class="row">

                <div class="form-group col-sm-9">
                    <input type="hidden" name="user" value="<?=$templateVars['user_id']?>">
                    <input type="hidden" name="query_id" value="<?=$templateVars['id']?>">
                    <label for="query_name">Название запроса</label>
                    <input type="input" name="query_name" class="form-control" id="query_name" aria-describedby="" placeholder="" value="<?=trim($templateVars['query_name']);?>">
                </div>

                <div class="form-group col-sm-9">
                    <textarea id="query" name="query" class="form-control" style="min-height:11rem"><?=trim($templateVars['query']);?></textarea>
                </div>

                <div class="col-sm-3">
                    <button id="run" type="button" class="form-group btn btn-secondary btn-sm" name="action" value="run">Выполнить</button>
                    <button id="save" type="button" class="form-group btn btn-secondary btn-sm" name="action" value="save">Сохранить</button>
                    <button id="saveas" type="button" class="form-group btn btn-secondary btn-sm" name="action" value="saveas">Сохранить как</button>
                    <a href="/?user=<?=$templateVars['user_id']?>" class="btn btn-link">Назад</a>
                </div>

            </div>
        </form>
    </div>
    <div class="col">
    </div>
</div><?//row?>
<div id="run_table" class="row">
</div>