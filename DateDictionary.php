<?php

namespace dastanaron\ruDate;

/**
 * Class DateDictionary
 *
 * Класс русскоязычных форматов дат.
 *
 * Все даты в русскоязычных форматах, будут обозначаться кириллицей, в ином случае, формат будет возвращен в соответствии со
 * спецификацией \DateTime->format() или функцией date()
 *
 * 0д - порядковый номер дня, с ведущим нулем
 * д - порядковый номер дня без ведущего нуля
 *
 * м - название месяца в им. падеже
 * -м - Короткое название месяца
 * М - название месяца в родительном падеже
 *
 * н - название дня недели в им. падеже
 * -н - короткое название недели
 *
 * г - год короткое написание (18)
 * Г - год полное написание (2018)
 *
 *
 * @package frontend\components
 */
class DateDictionary
{

    /**
     * @var \DateTime
     */
    public $date;

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
        $this->date = new \DateTime($date);

        $this->object = new \stdClass();

        $this->object->day = (int) $this->date->format('j');
        $this->object->week = (int) $this->date->format('N');
        $this->object->month = (int) $this->date->format('n');
        $this->object->year = (int) $this->date->format('Y');
    }

    /**
     * DateDictionary constructor static alternative
     * @param $date
     * @return DateDictionary
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

    /**
     * @param $string
     * @return string
     */
    public function format($string)
    {

        $this->format = $string;

        $delimeter = $this->getDelimeter();

        $output = '';

        $elements = explode($delimeter, $this->format);

        $iteration = 1;

        $count_elements = count($elements);

        foreach($elements as $element) {
            if($iteration < $count_elements) {
                $output .= $this->buildFormat($element).$delimeter;
            }
            else {
                $output .= $this->buildFormat($element);
            }

            $iteration++;
        }

        return $output;

    }

    /**
     * @param $element
     * @return bool
     */
    public function buildFormat($element)
    {

        switch ($element) {
            case '0д':
                $this->object->day = $this->date->format('d');
                return $this->object->day;
            case 'д':
                return $this->object->day;
            case 'н':
                return $this->week()[$this->object->week]['full'];
            case '-н':
                return $this->week()[$this->object->week]['short'];
            case '-м':
                $this->object->month = $this->month()[$this->object->month]['short'];
                return $this->object->month;
            case 'м':
                $this->object->month = $this->month()[$this->object->month]['full'];
                return $this->object->month;
            case 'М':
                $this->object->month = $this->genitiveMonth()[$this->object->month];
                return $this->object->month;
            case 'Г':
                return $this->object->year;
            case 'г':
                $this->object->year = (int) $this->date->format('y');
                return $this->object->year;
            default :
                return false;
        }

    }


    /**
     * @return bool
     */
    private function getDelimeter()
    {
        if(preg_match('#([\\-_\.\,\/\s\ ])#', $this->format, $delimeter)) {
            return $delimeter[0];
        }
        else {
            return false;
        }
    }

}