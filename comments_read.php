<?php

use App\Controllers\CommentsController;

require __DIR__ . '/vendor/autoload.php';

$controller = new CommentsController();
echo $controller->getComments();
