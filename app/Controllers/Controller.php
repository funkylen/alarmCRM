<?php

namespace App\Controllers;

use App\Classes\Speed;
use App\Classes\Zodiac;
use App\View;


class Controller
{
    protected $view;

    public function __construct()
    {
        $this->view = new View();
    }

    public function action($uri)
    {
        $action = ucfirst(strtolower(str_replace('/', '', $uri)));

        if (empty($action)) {
            return $this->view->render('app.twig');
        }

        $methodName = 'action' . $action;
        return $this->$methodName();
    }

    public function actionSpeed()
    {
        if (isset($_POST['speed'])) {
            $speed = new Speed($_POST['speed']);
            $output = [
                'speed' => $speed->kphToMph()
            ];
            return $this->view->render('speed.twig', $output);
        }
        return $this->view->render('speed.twig');

    }

    public function actionZodiac()
    {
        if (isset($_POST['zodiac'])) {
            $zodiac = new Zodiac($_POST['zodiac']);
            $output = [
                'zodiac' =>'Ваш знак зодиака "' . $zodiac->determineZodiac() . '"'
            ];
            return $this->view->render('zodiac.twig', $output);
        }
        return $this->view->render('zodiac.twig');
    }
}