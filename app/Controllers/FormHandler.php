<?php

namespace App\Controllers;

/**
 * Базовый класс-контроллер обработки формы, через интерфейс, реализующий паттерн Стратегия
 */
class FormHandler {
    /**
     * @var IFormHandleStrategy Интерфейс, реализующий стратегию обработки запросов из формы
     */
    private $formHandleStrategy;
    /**
     * @var array Массив параметров (обычно для формирования запроса в БД)
     */
    protected $params;

    public function __construct(IFormHandleStrategy $strategy, $params)
    {
        $this->formHandleStrategy = $strategy;
        $this->formHandleStrategy->setParams($params);

        $this->formHandleStrategy->doFormHandle();
    }
}


