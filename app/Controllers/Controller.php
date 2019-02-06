<?php

namespace App\Controllers;


class Controller
{
    protected $view;

    public function __construct()
    {
        $loader = new \Twig_Loader_Filesystem(__DIR__ . DIRECTORY_SEPARATOR .'Views/');
        $this->view = new \Twig_Environment($loader, [
            'cache' => false,
        ]);
    }

    public function action($action)
    {
        $methodName = 'action' . $action;
        return $this->$methodName;
    }

    public function actionSpeed()
    {
        if (isset($_POST['speed'])) {
            $speed = new Speed($_POST['speed']);
            $output = $speed->kphToMph();
        }
        $this->view('speed.twig', $output);
    }

    public function actionZodiac()
    {
        if (isset($_POST['zodiac'])) {
            $zodiac = new Zodiac($_POST['zodiac']);
            $output = 'Ваш знак зодиака "' . $zodiac->determineZodiac() . '"';
        }
        $this->view('zodiac.twig', $output);
    }
}