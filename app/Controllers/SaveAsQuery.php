<?php

namespace App\Controllers;

use App\DB\UsersQueries;

class SaveAsQuery implements IFormHandleStrategy
{
    protected $params;

    /**
     * Обрабортка параметров из формы
     * @param null $params
     * @return mixed|null
     */
    public function setParams($params = null)
    {

        if (empty($params['user'])) {
            die('Некорректный параметр user');
        }
        if (empty($params['query_name'])) {
            die('Некорректный параметр query_name');
        }
        if (empty($params['query'])) {
            die('Некорректный параметр запроса query');
        }
        else { //какая-то обработка параметра query
            $params['query'] = trim($params['query']);
        }

        return $this->params = $params;
    }

    /**
     * Обработка GET-параметра action=saveas
     * В метод должен передаваться
     * - ID пользователя $params['user']
     * - Наименование запроса
     * - Тело запроса
     */

    function doFormHandle()
    {
        $model = new UsersQueries();
        if ($model->addNewQuery($this->params['user'], $this->params['query_name'], $this->params['query'])){
            echo 'Запрос добавлен';
        }
    }
}