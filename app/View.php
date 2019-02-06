<?php

namespace App;

class View
{
    public function render($template, $data = [])
    {
        $loader = new \Twig_Loader_Filesystem(__DIR__ . DIRECTORY_SEPARATOR . 'Views');
        $twig = new \Twig_Environment($loader, [
            'cache' => false,
        ]);
        return $twig->render($template, $data);
    }
}