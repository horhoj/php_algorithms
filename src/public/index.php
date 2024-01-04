<?php

declare(strict_types=1);
ini_set('display_errors', E_ALL);

use App\Core;

require_once __DIR__ . '/../vendor/autoload.php';

$app = Core::makeCore();

$app->run();






