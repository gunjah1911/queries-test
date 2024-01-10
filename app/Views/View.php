<?php


namespace App\Views;


class View
{
    private $header;
    private $footer;
    private $template;
    private $vars;

    public function __construct($vars, $header = null, $footer = null, $template = null)
    {
        $this->vars = $vars;
        $this->header = $header;
        $this->footer = $footer;
        $this->template = $template;
    }

    public function Render()
    {
        $templateVars = $this->vars;
        require_once ($this->header);
        require_once ($this->template);
        require_once ($this->footer);
    }
}

class UserQueriesView extends View
//обрабатывает
{
    public function Render()
    {
        parent::Render();

        foreach ($templateVars as $item) {
            echo '<option value="'.$item["id"].'">'.$item["query_name"].'</option>';
        }
    }
}