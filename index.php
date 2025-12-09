<?php

require_once 'autoload.php';

use App\Dispatcher;

$uri = $_SERVER['REQUEST_URI'];

new Dispatcher($uri);