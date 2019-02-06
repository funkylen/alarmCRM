<?php

namespace App\Classes;

class Zodiac
{
    protected $date;
    protected $zodiacMap = [];

    public function __construct($date)
    {
        $dayAndMonth = mb_substr($date, 0, 5);
        $this->date = \DateTime::createFromFormat('d.m', $dayAndMonth);

        $this->zodiacMap = [
            'aries' => [
                \DateTime::createFromFormat('d.m', '21.03'),
                \DateTime::createFromFormat('d.m', '20.04')
            ],
            'taurus' => [
                \DateTime::createFromFormat('d.m', '21.04'),
                \DateTime::createFromFormat('d.m', '20.05')
            ],
            'gemini' => [
                \DateTime::createFromFormat('d.m', '21.05'),
                \DateTime::createFromFormat('d.m', '21.06')
            ],
            'cancer' => [
                \DateTime::createFromFormat('d.m', '22.06'),
                \DateTime::createFromFormat('d.m', '22.07')
            ],
            'leo' => [
                \DateTime::createFromFormat('d.m', '23.07'),
                \DateTime::createFromFormat('d.m', '23.08')
            ],
            'virgo' => [
                \DateTime::createFromFormat('d.m', '24.08'),
                \DateTime::createFromFormat('d.m', '23.09')
            ],
            'libra' => [
                \DateTime::createFromFormat('d.m', '24.09'),
                \DateTime::createFromFormat('d.m', '23.10')
            ],
            'scorpio' => [
                \DateTime::createFromFormat('d.m', '24.10'),
                \DateTime::createFromFormat('d.m', '22.11')
            ],
            'sagittarius' => [
                \DateTime::createFromFormat('d.m', '23.11'),
                \DateTime::createFromFormat('d.m', '21.12')
            ],
            'capricorn' => [
                \DateTime::createFromFormat('d.m', '22.12'),
                \DateTime::createFromFormat('d.m', '20.01')
            ],
            'aquarius' => [
                \DateTime::createFromFormat('d.m', '21.01'),
                \DateTime::createFromFormat('d.m', '20.02')
            ],
            'pisces' => [
                \DateTime::createFromFormat('d.m', '21.02'),
                \DateTime::createFromFormat('d.m', '20.03')
            ]
        ];
    }

    public function determineZodiac()
    {
        $birthday = $this->date;
        $zodiac = array_filter($this->zodiacMap, function ($offset) use ($birthday) {
            if ($birthday >= $offset[0] && $birthday <= $offset[1]) {
                return $birthday;
            }
        });
        var_dump($zodiac);
    }
}