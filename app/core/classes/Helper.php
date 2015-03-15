<?php

// TODO: A class is probably the wrong way to utilize helpers. Either way a Date class would make more sense and dd should be a function.
class Helper
{
    protected $date_format = array(
        // 'am/pm' => 'a',
        // 'AM/PM' => 'A',
        'dd' => 'd',
        'DayShort' => 'D',
        'DayLong' => 'l',
        'DayFull' => 'l',
        'DayNameShort' => 'D',
        'DayNameLong' => 'l',
        'DayNameFull' => 'l',
        'DayOfWeekShort' => 'D',
        'DayOfWeekLong' => 'l',
        'DayOfWeekFull' => 'l',
        'DayDateNum' => 'j',
        'DayDateNumTxt' => 'jS',
        'MonthShort' => 'M',
        'MonthLong' => 'F',
        'MonthFull' => 'F',
        'MonthNameShort' => 'M',
        'MonthNameLong' => 'F',
        'MonthNameFull' => 'F',
        'MonthOfYearShort' => 'M',
        'MonthOfYearLong' => 'F',
        'MonthOfYearFull' => 'F',
        'yyyy' => 'Y',
        'yy' => 'y',
        'YearFourDigits' => 'Y',
        'YearTwoDigits' => 'y'
    );

    public function get_year($format)
    {
        return date($this->date_format[$format]);
    }

    public function year($format)
    {
        echo $this->get_year($format);
    }

    /**
     * TODO: Move to a function instead
     * @deprecated 3.3.1
     */
    public function dd($var)
    {
        echo '<pre>', var_dump($var), '</pre>';
    }

}