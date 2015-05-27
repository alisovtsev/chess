<?php

//получаем переменные из GET
if (empty($_SESSION['figureSelectedId'])) {//если в сессии отсутсвует значение выбранной фигуры то задаем по умолчанию false
    $_SESSION['figureSelectedId'] = false;
}
$action = !empty($_GET['action']) ? $_GET['action'] : false;//задаем переменнную действия
$figureSelectedId = !empty($_GET['figureSelectedId']) ? $_GET['figureSelectedId'] : $_SESSION['figureSelectedId'];//задаем переменную выбранной фигуры если она есть в GET в противном случае берем из значение из сесиии
$clickX = !empty($_GET['x']) ? $_GET['x'] : 1;//задаем x координату если она есть в GET
$clickY = !empty($_GET['y']) ? $_GET['y'] : 1;//задаем y координату если она есть в GET
$figures = !empty($_SESSION['figures']) ? $_SESSION['figures'] : $figuresDefault;//задаем массив фигур либо из сессии, либо из массива по умолчанию


/**
 * Создаем массив фигур на доске
 * @return array
 */
function getFigureDefaults()
{
    $figuresDefault = array(
        1 => array(//id фигуры
            'img' => 'img/ladyablack.png',//картинка фигуры
            'x' => 1,//x координата фигуры по умолчанию
            'y' => 1,//y координата фигуры по умолчанию
        ),
        2 => array(
            'img' => 'img/ferzwhite.png',
            'x' => 3,
            'y' => 1,
        ),
        //...и так далее можем сколько угодно добавить фигур
    );
    return $figuresDefault;
}