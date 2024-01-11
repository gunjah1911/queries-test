<?php


namespace App\Views;


class UserQueriesView extends View
{
    public function Render()
    {
        parent::Render();
        //echo '<pre>'.print_r($this->getTemplateVars()).'</pre>';

        //TODO можно сделать шаблон для ответа
        $templateVars = $this->getTemplateVars();
        if (!empty($templateVars['queries'])) {
            foreach ($templateVars['queries'] as $item) {
                echo '<option value="'.$item['id'].'">'.$item['query_name'].'</option>';
            }
        }
    }
}