<?php

class Calculator
{
    public $hexRAW = null; // неупорядоченный шестнадцатичный массив
    public $decRAW = null; // неупорядоченный десятичный массив

    public function __construct($str)
    {
        $this->hexRAW = str_split($str, 2); // разрезаем сырые данные на неупорядоченный массив по 2 символа
        $waste = array_shift($this->hexRAW); //костыль, убирающий 0x в начале
        $this->decArray($this->hexRAW); // конвертируем неупорядоченный массив hex в десятичные значения
    }
    public function calcMask($arr) // высчитываем маску, отдаёт число
    {
        return array_shift($arr);
    }

    /**
     * @param $this
     */
    public function decArray($hexRAW)  // преобразуем неупорядоченный массив из шестнадцатеричных в неупорядоченный десятичный
    {
        function convert($raw) // функция конвертации
        {
            return hexdec($raw);
        }
        $this->decRAW = array_map('convert', $hexRAW); // применяем функцию конвертации ко всему массиву
    }
}