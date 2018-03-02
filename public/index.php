<?php

namespace App;

require_once '../vendor/autoload.php';

use function App\Renderer\render;

date_default_timezone_set('Europe/Moscow');

$app = new Application();

$app->get('/cinema/', function () {
    return render('index');
});

$app->get('/cinema/admin', function () {
    return render('admin');
});

$app->get('/cinema/random', function () {
    return render('random');
});

$app->put('/cinema/random', function () {
    $db = new \App\Databases\Database();
    $insert = $db->insert(
        'films',
        ['name', 'length', 'price'],
        [$_POST['name'], $_POST['length'], $_POST['price']]
    );
    return render('random', ['response' => $insert]);
});

$app->run();

