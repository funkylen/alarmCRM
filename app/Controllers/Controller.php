<?php

namespace App\Controllers;

use App\Classes\Speed;
use App\Classes\Zodiac;
use App\Validator;
use App\View;


class Controller
{
    protected $view;
    protected $validator;

    public function __construct()
    {
        $this->view = new View();
        $this->validator = new Validator();
    }

    public function action($uri)
    {
        $action = ucfirst(strtolower(str_replace('/', '', $uri)));

        if (empty($action)) {
            return $this->view->render('home.twig');
        }

        $methodName = 'action' . $action;
        return $this->$methodName();
    }

    public function actionSpeed()
    {
        if (isset($_POST['speed'])) {

            $validation = $this->validator->speedValidate($_POST['speed']);

            if (!$validation) {
                $output = [
                    'alert' =>'Введите число'
                ];
            } else {
                $speed = new Speed($_POST['speed']);
                $output = [
                    'message' => $speed->kphToMph()
                ];
            }

            return $this->view->render('speed.twig', $output);
        }

        return $this->view->render('speed.twig');
    }

    public function actionZodiac()
    {
        if (isset($_POST['zodiac'])) {

            $validation = $this->validator->zodiacValidate($_POST['zodiac']);

            if (!$validation) {
                $output = [
                    'alert' =>'Введите корректную дату в формате dd.mm.yyyy'
                ];
            } else {
                $zodiac = new Zodiac($_POST['zodiac']);
                $output = [
                    'message' =>'Ваш знак зодиака "' . $zodiac->determineZodiac() . '"'
                ];
            }

            return $this->view->render('zodiac.twig', $output);
        }

        return $this->view->render('zodiac.twig');
    }
}