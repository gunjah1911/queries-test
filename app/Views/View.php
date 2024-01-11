<?php


namespace App\Views;


class View
{
    private $header;
    private $footer;
    private $template;
    private $templateVars;

    public function __construct($vars, $template = null, $header = null, $footer = null)
    {
        $this->templateVars = $vars;
        $this->header = $header;
        $this->footer = $footer;
        $this->template = $template;
    }

    /**
     * @return mixed
     */
    public function getTemplateVars()
    {
        return $this->templateVars;
    }

    public function Render()
    {
        $templateVars = $this->getTemplateVars();

        if (!empty($this->header)) {
            require_once ($this->header);
        }
        if (!empty($this->template)) {
            require_once ($this->template);
        }
        if (!empty($this->footer)) {
            require_once ($this->footer);
        }
    }


}

