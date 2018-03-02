<?php

namespace App;

require_once '../vendor/autoload.php';

use function App\Renderer\render;

date_default_timezone_set('Europe/Moscow');

$app = new Application();

$app->setRoute('/cinema/', function () {
    $db = new \App\Databases\Database();
    return render('index'/*, [
        'listOfFilms' => $db->select('*', 'films')
    ]*/);
});

$app->setRoute('/cinema/admin', function () {
    $db = new \App\Databases\Database();
    return render('admin'/*, [
        'listOfFilms' => $db->select('*', 'seances')
    ]*/);
});

$app->run();

