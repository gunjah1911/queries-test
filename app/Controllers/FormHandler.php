<?php
//TODO Перенести классы и интерфейс в отдельные файлы
namespace App\Controllers;

use App\DB\UsersQueries;
use App\Views\View,
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
    function doFormHandle ($params = null);
}


class InitialState implements IFormHandleStrategy
{
    /**
     * Начальное состояние: отображение формы и получение списка пользователей.
     * @param array $params
     * В данную реализацию должен передаваться ID пользователя $params['user']
     */
    public function doFormHandle($params = null)
    {
        $model = new UsersQueries();
        $viewVars = ['users'=>$model->getUsers()];
        //$view = new View($viewVars,__DIR__.'/../../templates/header.php', __DIR__.'/../../templates/footer.php',__DIR__.'/../../templates/main.php');
        $view = new InitialFormView($viewVars, __DIR__.'/../../templates/main.php', __DIR__.'/../../templates/header.php', __DIR__.'/../../templates/footer.php');
        $view->Render();
    }
}

class UserQueries implements IFormHandleStrategy
{
    /**
     * Обработка GET-параметра action=get_queries
     * @param array $params
     * В данную реализацию должен передаваться ID пользователя $params['user']
     */
    public function doFormHandle($params = null)
    {
        $model = new UsersQueries();
        $viewVars = ['queries'=>$model->getUserQueries($params['user'])]; //TODO обработка пустого $params
        //echo '<pre>'.print_r($viewVars).'</pre>';

        $view = new InitialFormView($viewVars); //шаблон не используется, выводится через ajax
        $view->ShowUserQueries();
    }
}

class DeleteQuery implements IFormHandleStrategy
{
    /**
     * Обработка GET-параметра action=delete
     * @param array $params
     * В данную реализацию должен передаваться ID пользователя $params['user'] и ID запроса $params['query_id']
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
//user_id
{
    /**
     * Обработка GET-параметра action=add
     * @param array $params
     * В данную реализацию должен передаваться ID пользователя $params['user']
     */
    function doFormHandle($params = null)
    {
        //$model = new UsersQueries();
        //$params['buttons'] = ['run', 'saveas'];
        $view = new EditFormView($params, __DIR__.'/../../templates/add_form.php', __DIR__.'/../../templates/header.php', __DIR__.'/../../templates/footer.php');
        $view->Render();
    }
}

class ShowEditForm implements IFormHandleStrategy
//user_id, query_id
//query_name, query
{
    /**
     * Обработка GET-параметра action=add
     * @param array $params
     * В данную реализацию должен передаваться ID пользователя $params['user']
     */
    function doFormHandle($params = null)
    {
        //TODO ВЫгрузить из БД запрос
        $model = new UsersQueries();
        $viewVars = ['query'=>$model->getQueryById($params['query_id'])];
        //$params['buttons'] = ['run', 'save','saveas'];
        $view = new EditFormView($viewVars, __DIR__.'/../../templates/edit_form.php', __DIR__.'/../../templates/header.php', __DIR__.'/../../templates/footer.php');
        $view->Render();
    }
}



/*

class RunQuery implements IFormHandleStrategy
//query (может не быть в базе)
{

}

class SaveQuery implements IFormHandleStrategy
//$query_id, $query_name, $query
{

}

class SaveAsQuery implements IFormHandleStrategy
//$user_id, $query_name, $query
{
*/

