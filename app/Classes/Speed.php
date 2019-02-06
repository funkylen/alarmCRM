<?php

namespace App\Classes;

class Speed
{
    protected $kph;

    public function __construct($kph)
    {
        $this->kph = $kph;
    }

    public function kphToMph()
    {
        $mph = round(($this->kph * 1000) / 3600, 2);
        return "{$this->kph} км/ч = {$mph} м/c";
    }
}