<?php

namespace App;

require __DIR__ . '/vendor/autoload.php';

$app = new \App\Controllers\Controller;

echo $app->action($_SERVER['REQUEST_URI']);