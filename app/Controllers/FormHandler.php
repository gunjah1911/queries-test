<?php


namespace App\Controllers;

class FromHandler {
    private $formHandleStrategy;
    protected $params;

    public function __construct($params, IFormHandleStrategy $strategy)
    {
        $this->formHandleStrategy = $strategy;
        $this->params = $params;
    }
}

interface IFormHandleStrategy
{
    function doFormHandle ($params);
}

class ShowUsers implements IFormHandleStrategy
{

}

class ShowUserQueries implements IFormHandleStrategy
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

}