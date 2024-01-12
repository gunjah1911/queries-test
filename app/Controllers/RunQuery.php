<?php

namespace App\Controllers;

use App\DB\WorkDBQuery;
use App\Views\EditFormView;

class RunQuery implements IFormHandleStrategy
{
    /**
     * Обработка GET-параметра action=run
     * @param array $params
     * В метод должен передаваться ID выбранного запроса $params['query_id']
     */

    function doFormHandle($params = null)
    {
        $model = new WorkDBQuery();
        $viewVars['query_result'] = $model->runQuery($params['query']);

        $view = new EditFormView($viewVars, __DIR__ . '/../../templates/run_query_result.php', __DIR__ . '/../../templates/header.php', __DIR__ . '/../../templates/footer.php');
        $view->Render();
    }
}