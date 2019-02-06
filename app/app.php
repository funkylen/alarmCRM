<?php

namespace App;

use App\Classes\Speed;
use App\Classes\Zodiac;

$output = [];

if (isset($_POST['speed'])) {
    $speed = new Speed($_POST['speed']);
    $inMph = $speed->kphToMph();
}

if (isset($_POST['zodiac'])) {
    $zodiac = new Zodiac($_POST['zodiac']);
    $zodiac->determineZodiac();
}

require __DIR__ . '/template.html';