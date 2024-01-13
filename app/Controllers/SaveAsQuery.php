<?php

namespace App\Controllers;

use App\DB\UsersQueries;

class SaveAsQuery implements IFormHandleStrategy
{
    /**
     * Обработка GET-параметра action=saveas
     * @param array $params
     * В метод должен передаваться
     * - ID пользователя $params['user']
     * - Наименование запроса
     * - Тело запроса
     */

    function doFormHandle($params = null)
    {
        $model = new UsersQueries();
        if ($model->addNewQuery($params['user'], $params['query_name'], $params['query'])){
            echo 'Запрос добавлен';
        }
    }
}