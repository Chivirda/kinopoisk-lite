<?php

require_once __DIR__.'/vendor/autoload.php';

define('APP_PATH', __DIR__);

use App\App;

(new App)->run();
