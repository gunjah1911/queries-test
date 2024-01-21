<?php

namespace App\Controllers;

use App\DB\UsersQueries;

class SaveQuery implements IFormHandleStrategy
{
    protected $params;

    /**
     * Обрабортка параметров из формы
     * @param null $params
     * @return mixed|null
     */
    //TODO: Сделать проверку сущесвтвования нужных параметров
    function setParams($params = null)
    {
        return $this->params = $params;
    }
    /**
     * Обработка GET-параметра action=saveas
     * В метод должен передаваться
     * - ID запроса $params['user']
     * - Наименование запроса
     * - Тело запроса
     */

    function doFormHandle()
    {
        $model = new UsersQueries();
        if ($model->saveQuery($this->params['query_id'], $this->params['query_name'], $this->params['query'])){
            echo 'Запрос сохранен';
        }
    }
}