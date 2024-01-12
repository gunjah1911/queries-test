<?php

namespace App\Controllers;

use App\DB\UsersQueries;
use App\Views\EditFormView;

class ShowEditForm implements IFormHandleStrategy
{
    /**
     * Обработка GET-параметра action=edit
     * @param array $params
     * В метод должен передаваться ID выбранного запроса $params['query_id']
     */
    function doFormHandle($params = null)
    {
        $model = new UsersQueries();
        $viewVars = $model->getQueryById($params['query_id']);

        $view = new EditFormView($viewVars[0], __DIR__ . '/../../templates/edit_form.php', __DIR__ . '/../../templates/header.php', __DIR__ . '/../../templates/footer.php');
        $view->Render();
    }
}