<?php

namespace App\Controllers;

use App\DB\UsersQueries;
use App\Views\InitialFormView;

class DeleteQuery implements IFormHandleStrategy
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
     * Обработка GET-параметра action=delete
     * В метод должны передаваться
     * - ID пользователя $params['user']
     * - ID запроса $params['query_id']
     */
    function doFormHandle()
    {
        $model = new UsersQueries();
        if ($model->deleteQueryById($this->params['query_id'])) {
            $viewVars = ['queries' => $model->getUserQueries($this->params['user'])];
            $view = new InitialFormView($viewVars); //шаблон не используется, выводится через ajax
            $view->ShowUserQueries();
        }
    }
}