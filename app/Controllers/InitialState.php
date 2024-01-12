<?php

namespace App\Controllers;

use App\DB\UsersQueries;
use App\Views\InitialFormView;

class InitialState implements IFormHandleStrategy
{
    /**
     * Начальное состояние: отображение формы и получение списка пользователей.
     * @param array $params
     * В метод должен передаваться ID выбранного пользователя $params['user']
     */
    public function doFormHandle($params = null)
    {
        $model = new UsersQueries();
        $viewVars = ['users' => $model->getUsers()];

        $view = new InitialFormView($viewVars, __DIR__ . '/../../templates/main.php', __DIR__ . '/../../templates/header.php', __DIR__ . '/../../templates/footer.php');
        $view->Render();
    }
}