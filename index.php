<?php

namespace App;

require_once 'vendor/autoload.php';

$app = new Application();

$app->setRoute('/cinema/', function () {
    return '<h1>this is home</h1>';
});

$app->setRoute('/cinema/buy', function () {
    return '<h1>this is buy</h1>';
});

$app->run();