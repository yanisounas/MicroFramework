<?php

require "vendor/autoload.php";


$app = new \MicroFramework\WebApp(__DIR__, \App\Controller\HomeController::class);

$app->start();