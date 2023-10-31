<?php

require __DIR__ . '/../config.php';

/**
 * 
 * Load class helpers
 * 
 */

$helpersPath = __DIR__ . '/helpers';
$classes = array_filter(scandir($helpersPath), function ($c) {
    return !in_array($c, ['.', '..']);
});

foreach ($classes as $class) {
    require $helpersPath . '/' . $class;
}
