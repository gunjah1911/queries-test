<?php

namespace App\Controllers;

use App\DB\WorkDBQuery;
use App\Views\EditFormView;

class RunQuery implements IFormHandleStrategy
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
     * Обработка GET-параметра action=run
     * В метод должен передаваться ID выбранного запроса $params['query_id']
     */

    function doFormHandle()
    {
        $model = new WorkDBQuery();
        $viewVars['query_result'] = $model->runQuery($this->params['query']);

        $view = new EditFormView($viewVars, __DIR__ . '/../../templates/run_query_result.php', __DIR__ . '/../../templates/header.php', __DIR__ . '/../../templates/footer.php');
        $view->Render();
    }
}