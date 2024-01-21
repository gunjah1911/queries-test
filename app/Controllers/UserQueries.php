<?php

namespace App\Controllers;

use App\DB\UsersQueries;
use App\Views\InitialFormView;

class UserQueries implements IFormHandleStrategy
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

        return $this->params = $params;
    }

    /**
     * Обработка GET-параметра action=get_queries
     * В метод должен передаваться ID выбранного пользователя $params['user']
     */
    public function doFormHandle()
    {
        $model = new UsersQueries();
        $viewVars = ['queries' => $model->getUserQueries($this->params['user'])]; //TODO обработка пустого $params

        $view = new InitialFormView($viewVars); //шаблон не используется, выводится через ajax
        $view->ShowUserQueries();
    }
}