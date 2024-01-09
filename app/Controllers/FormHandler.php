<?php


namespace App\Controllers;

use App\DB\UsersQueries,
    App\Views\InitialFormView;

class FormHandler {
    private $formHandleStrategy;
    protected $params;
    
    //private $model;
    //private $view;

    public function __construct(IFormHandleStrategy $strategy, $params)
    {
        $this->formHandleStrategy = $strategy;
        $this->params = $params;

        $this->formHandleStrategy->doFormHandle($this->params);
    }

}

interface IFormHandleStrategy
{
    function doFormHandle ($params = null);
}


class InitialState implements IFormHandleStrategy
{
    public function doFormHandle($params = null)
    {
        $model = new UsersQueries();
        $viewVars = ['users'=>$model->getUsers()];
        $view = new InitialFormView($viewVars,__DIR__.'/../../templates/header.php', __DIR__.'/../../templates/footer.php',__DIR__.'/../../templates/main.php');
        $view->Render();
    }
}

class ShowUserQueries implements IFormHandleStrategy
{
//user_id
//query id, query name
    public function doFormHandle($params = null)
    {
        $model = new UsersQueries();
        $arUserQueries = $model->getUserQueries($params);

        foreach ($arUserQueries as $item):?>
            <option value="<?=$item["id"]?>"><?=$item["query_name"]?></option>
        <?php endforeach;

        //$viewVars = ['users'=>$model->getUsers()];
        //$view = new InitialFormView($viewVars,__DIR__.'/../../templates/header.php', __DIR__.'/../../templates/footer.php',__DIR__.'/../../templates/main.php');
        //$view->Render();
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

