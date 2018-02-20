<?php
require 'vendor/autoload.php';

use dastanaron\extension\RuDate;

$date = RuDate::init('2018-10-18 19:43');

var_dump($date->format('l, d F Y M D')); // string(50) "Вторник, 20 Февраля 2018 Фев Вт"



