<?php
//TODO Перенести классы и интерфейс в отдельные файлы
namespace App\Controllers;

use App\DB\UsersQueries;
use App\Views\View;
    use App\Views\InitialStateView;
    //use App\Views\UserQueriesView;

class FormHandler {
    private $formHandleStrategy;
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
        $view = new InitialStateView($viewVars,__DIR__.'/../../templates/header.php', __DIR__.'/../../templates/footer.php',__DIR__.'/../../templates/main.php');
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
        $viewVars = $model->getUserQueries($params['user']);

        $view = new UserQueriesView($viewVars); //шаблон не используется, выводится через ajax
        $view->Render();
    }
}
/*
class ShowAddForm implements IFormHandleStrategy
//user_id
{

}

class ShowEditForm implements IFormHandleStrategy
//user_id, query_id
//query_name, query
{

}

class DeleteQuery implements IFormHandleStrategy
//user_id, query_id
//query_name, query
{

}

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

