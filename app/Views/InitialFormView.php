<?php

namespace App\Views;

class InitialFormView extends View
{
    public function ShowUserQueries()
    {
        $this->Render();
        //TODO можно сделать шаблон для ответа
        $templateVars = $this->getTemplateVars();
        if (!empty($templateVars['queries'])) {
            foreach ($templateVars['queries'] as $item) {
                echo '<option value="'.$item['id'].'">'.$item['query_name'].'</option>';
            }
        }
    }
}

