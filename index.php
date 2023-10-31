<?php

$page = 'home';
if ($p = $_GET['page'] ?? null) {
    if (!file_exists(__DIR__ . '/src/pages/' . $p . '.php')) {
        header('Location: ' . \Helpers\Url::url());
        exit;
    }

    $page = $p;
}

/**
 * 
 * Load header
 * 
 */
include __DIR__ . '/src/includes/header.php';

/**
 * 
 * Load main content
 * 
 */

include __DIR__ . '/src/includes/main.php';

/**
 * 
 * Load footer
 * 
 */
include __DIR__ . '/src/includes/footer.php';

?>