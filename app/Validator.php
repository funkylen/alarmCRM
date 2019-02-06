<?php

namespace App;


class Validator
{
    public function zodiacValidate($date)
    {
        list($day, $month, $year) = explode('.', $date);

        $match = preg_match('/^\d{2}\.\d{2}.\d{4}/', $date);

        if ($match === 0) {
            return false;
        } elseif ($day < 1 || $day > 31) {
            return false;
        } elseif ($month < 1 || $month > 12) {
            return false;
        } elseif ($year < 1900 || $year > date('Y')) {
            return false;
        }

        return true;
    }

    public function speedValidate($speed)
    {
        if (!is_numeric($speed)) {
            return false;
        }
        return true;
    }
}