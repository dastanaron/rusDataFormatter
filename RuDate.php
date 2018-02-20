<?php

namespace dastanaron\extension;

/**
 * Class DateDictionary
 *
 * l - Полное наименование дня,
 * D - Короткое название дня недели
 * F - Полное наименование месяца,
 * M - Короткое наименование месяца
 *
 *
 * @package frontend\components
 */
class RuDate extends \DateTime
{
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
    }

    public function format($format)
    {
        $formatted = parent::format($format);

        $out = str_replace($this->enMonth(), $this->genitiveMonth(), $formatted);

        $out = str_replace($this->enWeek(), $this->ruWeek(), $out);

        $out = str_replace($this->shortEnMonth(), $this->shortRuMonth(), $out);
        $out = str_replace($this->shortEnWeek(), $this->shortRuWeek(), $out);

        return $out;
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
    public function ruWeek()
    {
        return [
            'Понедельник',
            'Вторник',
            'Среда',
            'Четверг',
            'Пятница',
            'Суббота',
            'Воскресенье'
        ];
    }

    public function shortEnMonth()
    {
        return [
            'Jan',
            'Feb',
            'Mar',
            'Apr',
            'May',
            'Jun',
            'Jul',
            'Aug',
            'Sep',
            'Oct',
            'Nov',
            'Dec'
        ];
    }

    public function shortRuMonth()
    {
        return [
            "Янв",
            "Фев",
            "Мар",
            "Апр",
            "Май",
            "Июн",
            "Июл",
            "Авг",
            "Сен",
            "Окт",
            "Ноя",
            "Дек"
        ];
    }

    /**
     * @return array
     */
    public function genitiveMonth()
    {
        return [
            'January' => 'Января',
            'February' => 'Февраля',
            'March' => 'Марта',
            'April' => 'Апреля',
            'May' => 'Мая',
            'June' => 'Июня',
            'July' => 'Июля',
            'August' => 'Августа',
            'September' => 'Сентября',
            'October' => 'Октября',
            'November' => 'Ноября',
            'December' => 'Декабря',
        ];
    }

    public function enMonth() {
        return [
            'January',
            'February',
            'March',
            'April',
            'May',
            'June',
            'July',
            'August',
            'September',
            'October',
            'November',
            'December',
        ];
    }

    public function enWeek()
    {
        return [
            'Monday',
            'Tuesday',
            'Wednesday',
            'Thursday',
            'Friday',
            'Saturday',
            'Sunday'
        ];
    }

    public function shortEnWeek()
    {
        return [
            'Mon',
            'Tue',
            'Wed',
            'Thu',
            'Fri',
            'Sat',
            'Sun'
        ];
    }

    public function shortRuWeek()
    {
        return [
            "Пн",
            "Вт",
            "Ср",
            "Чт",
            "Пт",
            "Сб",
            "Вс"
        ];
    }

}