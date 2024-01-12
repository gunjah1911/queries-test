<?php
//TODO Перенести классы и интерфейс в отдельные файлы
namespace App\Controllers;

use App\DB\UsersQueries,
    App\DB\WorkDBQuery,
    App\Views\InitialFormView,
    App\Views\EditFormView;

class FormHandler {
    /**
     * @var IFormHandleStrategy Интерфейс, реализующий стратегию обработки запросов из формы
     */
    private $formHandleStrategy;
    /**
     * @var array Массив параметров (обычно для формирования запроса в БД)
     */
    protected $params;

    public function __construct(IFormHandleStrategy $strategy, $params)
    {
        $this->formHandleStrategy = $strategy;
        $this->params = $params;

        $this->formHandleStrategy->doFormHandle($this->params);
    }
}

/**
 * Интерфейс для реализации паттерна Strategy.
 */
interface IFormHandleStrategy
{
    //TODO: добавить метод setParams, который проверяет, готовит и передает параметры для  doFormHandle
    function doFormHandle ($params = null);
}


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
        $viewVars = ['users'=>$model->getUsers()];

        $view = new InitialFormView($viewVars, __DIR__.'/../../templates/main.php', __DIR__.'/../../templates/header.php', __DIR__.'/../../templates/footer.php');
        $view->Render();
    }
}

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
        $viewVars = ['queries'=>$model->getUserQueries($params['user'])]; //TODO обработка пустого $params

        $view = new InitialFormView($viewVars); //шаблон не используется, выводится через ajax
        $view->ShowUserQueries();
    }
}

class DeleteQuery implements IFormHandleStrategy
{
    /**
     * Обработка GET-параметра action=delete
     * @param array $params
     * В метод должны передаваться
     * - ID пользователя $params['user']
     * - ID запроса $params['query_id']
     */
    function doFormHandle($params = null)
    {
            $model = new UsersQueries();
            if ($model->deleteQueryById($params['query_id'])) {
                $viewVars = ['queries'=>$model->getUserQueries($params['user'])];
                $view = new InitialFormView($viewVars); //шаблон не используется, выводится через ajax
                $view->ShowUserQueries();
            }
    }
}

class ShowAddForm implements IFormHandleStrategy
{
    /**
     * Обработка GET-параметра action=add
     * @param array $params
     * В метод должен передаваться ID выбранного пользователя $params['user']
     */
    function doFormHandle($params = null)
    {
        $view = new EditFormView($params, __DIR__.'/../../templates/add_form.php', __DIR__.'/../../templates/header.php', __DIR__.'/../../templates/footer.php');
        $view->Render();
    }
}

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

        $view = new EditFormView($viewVars[0], __DIR__.'/../../templates/edit_form.php', __DIR__.'/../../templates/header.php', __DIR__.'/../../templates/footer.php');
        $view->Render();
    }
}

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

        $view = new EditFormView($viewVars, __DIR__.'/../../templates/run_query_result.php', __DIR__.'/../../templates/header.php', __DIR__.'/../../templates/footer.php');
        $view->Render();
    }
}

class SaveAsQuery implements IFormHandleStrategy
{
    /**
     * Обработка GET-параметра action=saveas
     * @param array $params
     * В метод должен передаваться
     * - ID пользователя $params['user']
     * - Наименование запроса
     * - Тело запроса
     */

    function doFormHandle($params = null)
    {
        $model = new UsersQueries();
        $model->addNewQuery($params['user'],$params['query_name'],$params['query']);

        echo 'Запрос добавлен';
    }
}

class SaveQuery implements IFormHandleStrategy
{
    /**
     * Обработка GET-параметра action=saveas
     * @param array $params
     * В метод должен передаваться
     * - ID запроса $params['user']
     * - Наименование запроса
     * - Тело запроса
     */

    function doFormHandle($params = null)
    {
        $model = new UsersQueries();
        $model->saveQuery($params['query_id'],$params['query_name'],$params['query']);

        echo 'Запрос сохранен';
    }
}


