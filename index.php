<?php

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
$page = 'home';
if ($p = $_GET['page'] ?? null) {
    if (!file_exists(__DIR__ . '/src/pages/' . $p . '.php')) {
        header('Location: ' . url());
        exit;
    }

    $page = $p;
}

include __DIR__ . '/src/includes/main.php';

/**
 * 
 * Load footer
 * 
 */
include __DIR__ . '/src/includes/footer.php';

?>