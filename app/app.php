<?php

namespace App;

use App\Classes\Speed;
use App\Classes\Zodiac;

$loader = new \Twig_Loader_Filesystem(__DIR__ . DIRECTORY_SEPARATOR .'Views/');
$twig = new \Twig_Environment($loader, [
    'cache' => false,
]);

if (isset($_POST['speed'])) {
    $speed = new Speed($_POST['speed']);
    $output = $speed->kphToMph();
}

if (isset($_POST['zodiac'])) {
    $zodiac = new Zodiac($_POST['zodiac']);
    $output = 'Ваш знак зодиака "' . $zodiac->determineZodiac() . '"';
}

echo $twig->render('template.html');