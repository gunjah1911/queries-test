<?php


namespace App\Controllers;

use App\DB,
    App\Views\InitialForm;

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
        // TODO: Implement doFormHandle() method.
        $t = new App\DB\UsersQueries(__DIR__. "/conf/user_queries_db_config.json");
        $arVars = $t->getUsers();
        $view = new View($arVars,'../templates/header.php', '../templates/footer.php','../templates/main.php');
        $view->Render;
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

