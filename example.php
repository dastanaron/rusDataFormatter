<?php
require 'DateDictionary.php';

use dastanaron\ruDate\DateDictionary;

$date = DateDictionary::init(date('Y-m-d'));
var_dump($date->format('н д М Г')); //string(37) "Вторник 20 Февраля 2018"

$date = DateDictionary::init('2018-02-20 12:57:58');
var_dump($date->format('д.-м.г')); //string(12) "20.Фев.18"

//Вывод с временем
$date = DateDictionary::init('2018-02-20 12:57:58');
var_dump($date->format('н д М').' ' . $date->date->format('H:i')); //string(38) "Вторник 20 Февраля 12:57"
