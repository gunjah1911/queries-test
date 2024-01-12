<?php

namespace App\Controllers;

use App\DB\UsersQueries;
use App\Views\InitialFormView;

class DeleteQuery implements IFormHandleStrategy
{
    /**
     * Обработка GET-параметра action=delete
     * @param array $params
     * В метод должны передаваться
     * - ID пользователя $params['user']
     * - ID запроса $params['query_id']
     */
    function doFormHandle($params = null)
    {
        $model = new UsersQueries();
        if ($model->deleteQueryById($params['query_id'])) {
            $viewVars = ['queries' => $model->getUserQueries($params['user'])];
            $view = new InitialFormView($viewVars); //шаблон не используется, выводится через ajax
            $view->ShowUserQueries();
        }
    }
}