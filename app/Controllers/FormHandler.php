<?php


namespace App\Controllers;

use App\DB\UsersQueries,
    App\Views\InitialFormView;

class FormHandler {
    private $formHandleStrategy;
    protected $params;
    
    //private $model;
    //private $view;

    public function __construct($params, IFormHandleStrategy $strategy)
    {
        $this->formHandleStrategy = $strategy;
        $this->params = $params;

        $this->formHandleStrategy->doFormHandle($this->params);
    }

}

interface IFormHandleStrategy
{
    function doFormHandle ();
}


class InitialState implements IFormHandleStrategy
{
//$user_id, $query_name, $query


    public function doFormHandle()
    {
        $model = new UsersQueries();
        $viewVars = ['users'=>$model->getUsers()];
        $view = new InitialFormView($viewVars,__DIR__.'/../../templates/header.php', __DIR__.'/../../templates/footer.php',__DIR__.'/../../templates/main.php');
        $view->Render();
    }
}

/*class ShowUserQueries implements IFormHandleStrategy
//user_id
//query id, query name
{

}

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

