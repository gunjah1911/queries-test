<?php

namespace App\Controllers;

use App\DB\UsersQueries;
use App\Views\InitialFormView;

class UserQueries implements IFormHandleStrategy
{
    /**
     * Обработка GET-параметра action=get_queries
     * @param array $params
     * В метод должен передаваться ID выбранного пользователя $params['user']
     */
    public function doFormHandle($params = null)
    {
        $model = new UsersQueries();
        $viewVars = ['queries' => $model->getUserQueries($params['user'])]; //TODO обработка пустого $params

        $view = new InitialFormView($viewVars); //шаблон не используется, выводится через ajax
        $view->ShowUserQueries();
    }
}