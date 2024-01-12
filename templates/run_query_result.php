<?php
/** @var array $templateVars
 * Массив переменных представления
 */
?>

<table class="table">
    <thead class="thead-light">
        <tr>
            <?php foreach ($templateVars['query_result'][0] as $key => $value):?>
                <th scope="col"><?=$key?></th>
            <?php endforeach;?>
        </tr>
    </thead>
    <tbody>
    <?php foreach ($templateVars['query_result'] as $item_key => $item):?>
        <tr>
            <?php foreach ($item as $key=> $value):?>
                <td><?=$value?></td>
            <?php endforeach;?>
        </tr>
    <?php endforeach;?>
    </tbody>
</table>