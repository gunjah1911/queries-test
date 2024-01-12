<?php

namespace App\Controllers;

use App\Views\EditFormView;

class ShowAddForm implements IFormHandleStrategy
{
    /**
     * Обработка GET-параметра action=add
     * @param array $params
     * В метод должен передаваться ID выбранного пользователя $params['user']
     */
    function doFormHandle($params = null)
    {
        $view = new EditFormView($params, __DIR__ . '/../../templates/add_form.php', __DIR__ . '/../../templates/header.php', __DIR__ . '/../../templates/footer.php');
        $view->Render();
    }
}