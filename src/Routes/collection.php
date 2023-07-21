<?php

use Guedes\Agenda\Controllers\ContactController;

$app->get('/', [ContactController::class, 'index']);
$app->get('/create', [ContactController::class, 'create']);
$app->get('/contact/{id}', [ContactController::class, 'get']);
$app->get('/contact/edit/{id}', [ContactController::class, 'edit']);

$app->post('/store', [ContactController::class, 'store']);
$app->post('/update/{id}', [ContactController::class, 'update']);
$app->post('/delete/{id}', [ContactController::class, 'delete']);

$app->get('/setup-db', [ContactController::class, 'setUpDb']);