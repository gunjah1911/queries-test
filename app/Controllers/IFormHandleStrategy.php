<?php

namespace App\Controllers;

/**
 * Интерфейс для реализации паттерна Strategy.
 */
interface IFormHandleStrategy
{
    /**
     * Обработка и инициализаця массива параметров, которые приходят из формы
     * Вызывается в конструкторе класса FormHandler
     * @param null $params
     * @return mixed
     *
     */
    function setParams($params = null);

    /**
     * Основной метод обработки данных из форм, в зависимости от action
     * Неявно получает массив данных после вызова метода setParams
     * @return mixed
     */
    function doFormHandle();
}