<?php

namespace App\Controllers;

use App\DB\UsersQueries;
use App\Views\InitialFormView;

class InitialState implements IFormHandleStrategy
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
     * Начальное состояние: отображение формы и получение списка пользователей.
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