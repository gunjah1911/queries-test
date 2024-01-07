<?php


namespace App\Views;


class View
{
    private $header;
    private $footer;
    private $template;
    private $vars;

    public function __construct($vars,$header, $footer, $template)
    {
        $this->header = $header;
        $this->footer = $footer;
        $this->template = $template;
    }

    public function Render()
    {
        require_once ($this->$header);
        require_once ($this->$template);
        require_once ($this->$header);
    }
}