<?php
/**
 * Google Analytics card-widget
 *
 * Places card-like widget with recent analytics of the page
 *
 * PHP version 5.3+
 *
 * @author     Dmitriy Lezhnev <lezhnev.work@gmail.com>
 * @copyright  2016 Dmitriy Lezhnev
 */

require __DIR__ . "/../vendor/autoload.php";

// fake real path to point it to the root (for test purposes)
$_SERVER['REQUEST_URI'] = "/";

\AnalyticsCard\Classes\Runtime::execute('card',__DIR__ . "/views", __DIR__ . "/cache", __DIR__ . "/config.php");



