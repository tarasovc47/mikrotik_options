<?php
require 'Calculator.php';
class View
{
    public function init($RAW) // принимаем данные
    {
        $hex = new Calculator(); //создаём экземпляр калькулятора
        $hex->calc($RAW); // конвертрируем
        $this->renderRoutes($hex->decRAW); // отправляем в отрисовку
    }
    public function renderRoutes($decRAW)
    {
        while(count($decRAW))
        {
            $hex = new Calculator(); // вот от этого надо избавляться, много экземпляров создаётся
            $netmask = $hex->calcMask($decRAW); //тут получаем маску в 10чном виде
            if ($netmask == 0) { //0.0.0.0/0
                $mask = array_shift($decRAW);
                $block = array_splice($decRAW,0,4);
                echo "0.0.0.0/".
                    $mask.' '.
                    $block[0].'.'.
                    $block[1].'.'.
                    $block[2].'.'.
                    $block[3].' ';
                if (empty($decRAW))
                {
                    die();
                }
            }

            if (8 > $netmask && $netmask > 0) //2.0.0.0/4
            {
                $mask = array_shift($decRAW);
                $block = array_splice($decRAW,0,5);
                echo
                    $block[0].'.'.
                    '0'.'.'.
                    '0'.'.'.
                    '0'.'/'.
                    $mask.' '.
                    $block[1].'.'.
                    $block[2].'.'.
                    $block[3].'.'.
                    $block[4].' ';
                if (empty($decRAW))
                {
                    die();
                }
            }

            if ($netmask == 8) //10.0.0.0/8
            {
                $mask = array_shift($decRAW);
                $block = array_splice($decRAW,0,5);
                echo
                    $block[0].'.'.
                    '0'.'.'.
                    '0'.'.'.
                    '0'.'/'.
                    $mask.' '.
                    $block[1].'.'.
                    $block[2].'.'.
                    $block[3].'.'.
                    $block[4].' ';
                if (empty($decRAW))
                {
                    die();
                }
            }
            if (15 >= $netmask && $netmask > 8) //10.10.0.0/12
            {
                $mask = array_shift($decRAW);
                $block = array_splice($decRAW,0,6);
                echo
                    $block[0] . '.' .
                    $block[1] . '.' .
                    '0' . '.' .
                    '0' . '/' .
                    $mask . ' ' .
                    $block[2] . '.' .
                    $block[3] . '.'.
                    $block[4] . '.'.
                    $block[5].' ';
                if (empty($decRAW))
                {
                    die();
                }
            }
            if ($netmask == 16)  //192.168.0.0/16
            {
                $mask = array_shift($decRAW);
                $block = array_splice($decRAW,0,6);
                echo
                    $block[0] . '.' .
                    $block[1] . '.' .
                    '0' . '.' .
                    '0' . '/' .
                    $mask . ' ' .
                    $block[2] . '.' .
                    $block[3] . '.'.
                    $block[4] . '.'.
                    $block[5].' ';
                if (empty($hex))
                {
                    die();
                }
            }
            if (23 >= $netmask && $netmask > 16) //192.168.0.0/20
            {
                $mask = array_shift($decRAW);
                $block = array_splice($decRAW,0,7);
                echo
                    $block[0] . '.' .
                    $block[1] . '.' .
                    $block[2] . '.' .
                    '0' . '/' .
                    $mask . ' ' .
                    $block[3] . '.' .
                    $block[4] . '.'.
                    $block[5] . '.'.
                    $block[6].' ';
                if (empty($decRAW))
                {
                    die();
                }
            }
            if ($netmask == 24) //192.168.1.0/24
            {
                $mask = array_shift($decRAW);
                $block = array_splice($decRAW,0,7);
                echo
                    $block[0] . '.' .
                    $block[1] . '.' .
                    $block[2] . '.' .
                    '0' . '/' .
                    $mask . ' ' .
                    $block[3] . '.' .
                    $block[4] . '.'.
                    $block[5] . '.'.
                    $block[6].' ';
                if (empty($decRAW))
                {
                    die();
                }
            }
            if(32 >= $netmask && $netmask > 24) //192.168.1.0/27
            {
                $mask = array_shift($decRAW);
                $block = array_splice($decRAW,0,8);
                echo
                    $block[0] . '.' .
                    $block[1] . '.' .
                    $block[2] . '.' .
                    $block[3] . '/' .
                    $mask . ' ' .
                    $block[4] . '.' .
                    $block[5] . '.'.
                    $block[6] . '.'.
                    $block[7].' ';
                if (empty($decRAW))
                {
                    die();
                }
            }
        }
    }
}