<?php

namespace dastanaron\ruDate;

/**
 * Class DateDictionary
 * @package frontend\components
 */
class RuDate extends \DateTime
{

    /**
     * @var \stdClass
     */
    public $object;

    /**
     * @var string
     */
    public $format;

    /**
     * DateDictionary constructor.
     * @param $date
     */
    public function __construct($date)
    {
        parent::__construct($date);

        $this->object = new \stdClass();

        $this->object->day = (int) $this->date->format('j');
        $this->object->week = (int) $this->date->format('N');
        $this->object->month = (int) $this->date->format('n');
        $this->object->year = (int) $this->date->format('Y');
    }

    public function format($format)
    {

    }

    /**
     * @param $date
     * @return RuDate
     */
    public static function init($date)
    {
        return new self($date);
    }

    /**
     * @return array
     */
    public function week()
    {
        return [
            1 => [
                'full' => 'Понедельник',
                'short' => 'Пн',
            ],
            2 => [
                'full' => 'Вторник',
                'short' => 'Вт',
            ],
            3 => [
                'full' => 'Среда',
                'short' => 'Ср',
            ],
            4 => [
                'full' => 'Четверг',
                'short' => 'Чт',
            ],
            5 => [
                'full' => 'Пятница',
                'short' => 'Пт',
            ],
            6 => [
                'full' => 'Суббота',
                'short' => 'Сб',
            ],
            7 => [
                'full' => 'Воскресенье',
                'short' => 'Вс',
            ]
        ];
    }

    /**
     * @return array
     */
    public function month()
    {
        return [
            1 => [
                'full' => 'Январь',
                'short' => 'Янв',
            ],
            2 => [
                'full' => 'Февраль',
                'short' => 'Фев',
            ],
            3 => [
                'full' => 'Март',
                'short' => 'Мар',
            ],
            4 => [
                'full' => 'Апрель',
                'short' => 'Апр',
            ],
            5 => [
                'full' => 'Май',
                'short' => 'Май',
            ],
            6 => [
                'full' => 'Июнь',
                'short' => 'Июн',
            ],
            7 => [
                'full' => 'Июль',
                'short' => 'Июл',
            ],
            8 => [
                'full' => 'Август',
                'short' => 'Авг',
            ],
            9 => [
                'full' => 'Сентябрь',
                'short' => 'Сен',
            ],
            10 => [
                'full' => 'Октябрь',
                'short' => 'Окт',
            ],
            11 => [
                'full' => 'Ноябрь',
                'short' => 'Ноя',
            ],
            12 => [
                'full' => 'Декабрь',
                'short' => 'Дек',
            ],
        ];
    }

    /**
     * @return array
     */
    public function genitiveMonth()
    {
        return [
            1 => 'Января',
            2 => 'Февраля',
            3 => 'Марта',
            4 => 'Апреля',
            5 => 'Мая',
            6 => 'Июня',
            7 => 'Июля',
            8 => 'Августа',
            9 => 'Сентября',
            10 => 'Октября',
            11 => 'Ноября',
            12 => 'Декабря',
        ];
    }

}