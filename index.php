<?php

namespace App;

require_once 'vendor/autoload.php';

use function App\Renderer\render;

$app = new Application();

$app->setRoute('/cinema/', function () {
    return render('index', ['msg' => "Hello, World!"]);
});

$app->run();