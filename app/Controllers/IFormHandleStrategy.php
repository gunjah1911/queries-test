<?php

namespace App\Controllers;

/**
 * Интерфейс для реализации паттерна Strategy.
 */
interface IFormHandleStrategy
{
    //TODO: добавить метод setParams, который проверяет, готовит и передает параметры для  doFormHandle
    function doFormHandle($params = null);
}