<?php

namespace App\Controllers;

use App\Views\EditFormView;

class ShowAddForm implements IFormHandleStrategy
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
     * Обработка GET-параметра action=add

     * В метод должен передаваться ID выбранного пользователя $params['user']
     */
    function doFormHandle()
    {
        $view = new EditFormView($this->params, __DIR__ . '/../../templates/add_form.php', __DIR__ . '/../../templates/header.php', __DIR__ . '/../../templates/footer.php');
        $view->Render();
    }
}