<?php
// проверка значений ourForm__inp конструкцией switch
$inp = $_POST['ourForm__inp'];

switch ($inp) { // иструкция для пары случаев
    case 'Гарри':
        echo 'Гриффиндор';
        break;
    case 'Гермиона':
        echo 'Ко мне в кабинет';
        break;
    default: // блок
        echo 'Фу, магл';

}
//проверка значений для обработки данных
