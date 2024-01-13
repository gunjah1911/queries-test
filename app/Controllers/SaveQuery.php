<?php

namespace App\Controllers;

use App\DB\UsersQueries;

class SaveQuery implements IFormHandleStrategy
{
    /**
     * Обработка GET-параметра action=saveas
     * @param array $params
     * В метод должен передаваться
     * - ID запроса $params['user']
     * - Наименование запроса
     * - Тело запроса
     */

    function doFormHandle($params = null)
    {
        $model = new UsersQueries();
        if ($model->saveQuery($params['query_id'], $params['query_name'], $params['query'])){
            echo 'Запрос сохранен';
        }
    }
}