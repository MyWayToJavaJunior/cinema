<?php

namespace App;

require_once 'vendor/autoload.php';

use function App\Renderer\render;

date_default_timezone_set('Europe/Moscow');

$app = new Application();

$app->setRoute('/cinema/', function () use ($connectDB) {
    return render('index', [
        'listOfFilms' => 'list'
    ]);
});

$app->run();