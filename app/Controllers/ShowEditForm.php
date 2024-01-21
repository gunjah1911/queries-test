<?php

namespace App\Controllers;

use App\DB\UsersQueries;
use App\Views\EditFormView;

class ShowEditForm implements IFormHandleStrategy
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
     * Обработка GET-параметра action=edit
     * В метод должен передаваться ID выбранного запроса $params['query_id']
     */
    function doFormHandle()
    {
        $model = new UsersQueries();
        $viewVars = $model->getQueryById($this->params['query_id']);

        $view = new EditFormView($viewVars[0], __DIR__ . '/../../templates/edit_form.php', __DIR__ . '/../../templates/header.php', __DIR__ . '/../../templates/footer.php');
        $view->Render();
    }

}