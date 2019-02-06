<?php

namespace App\Classes;

class Zodiac
{
    protected $date;
    protected $month;
    protected $zodiacMap = [];

    public function __construct($date)
    {
        $this->dayAndMonth = mb_substr($date, 0, 5);
        $this->date = \DateTime::createFromFormat('d.m', $this->dayAndMonth);

        $this->zodiacMap = [
            'Овен' => [
                \DateTime::createFromFormat('d.m', '21.03'),
                \DateTime::createFromFormat('d.m', '20.04')
            ],
            'Телец' => [
                \DateTime::createFromFormat('d.m', '21.04'),
                \DateTime::createFromFormat('d.m', '20.05')
            ],
            'Близнецы' => [
                \DateTime::createFromFormat('d.m', '21.05'),
                \DateTime::createFromFormat('d.m', '21.06')
            ],
            'Рак' => [
                \DateTime::createFromFormat('d.m', '22.06'),
                \DateTime::createFromFormat('d.m', '22.07')
            ],
            'Лев' => [
                \DateTime::createFromFormat('d.m', '23.07'),
                \DateTime::createFromFormat('d.m', '23.08')
            ],
            'Дева' => [
                \DateTime::createFromFormat('d.m', '24.08'),
                \DateTime::createFromFormat('d.m', '23.09')
            ],
            'Весы' => [
                \DateTime::createFromFormat('d.m', '24.09'),
                \DateTime::createFromFormat('d.m', '23.10')
            ],
            'Скорпион' => [
                \DateTime::createFromFormat('d.m', '24.10'),
                \DateTime::createFromFormat('d.m', '22.11')
            ],
            'Стрелец' => [
                \DateTime::createFromFormat('d.m', '23.11'),
                \DateTime::createFromFormat('d.m', '21.12')
            ],
            'Козерог' => [
                \DateTime::createFromFormat('d.m', '22.12'),
                \DateTime::createFromFormat('d.m', '20.01')
            ],
            'Водолей' => [
                \DateTime::createFromFormat('d.m', '21.01'),
                \DateTime::createFromFormat('d.m', '20.02')
            ],
            'Рыбы' => [
                \DateTime::createFromFormat('d.m', '21.02'),
                \DateTime::createFromFormat('d.m', '20.03')
            ]
        ];
    }

    public function determineZodiac()
    {
        $birthday = $this->date;

        $zodiac = array_keys(array_filter($this->zodiacMap, function ($offset) use ($birthday) {
            if ($birthday >= $offset[0] && $birthday <= $offset[1]) {
                return $birthday;
            }
        }))[0];

        return !empty($zodiac) ? $zodiac : 'Козерог';
    }
}