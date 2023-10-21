<?php

/**
 * Url
 *
 * @param string|null $path
 * @return string
 */
function url(?string $path = null)
{
    return CONF_URL . ($path ? (str_starts_with($path, '/') ? $path : '/' . $path) : '');
}

/**
 * Asset
 *
 * @param string $resource
 * @return string
 */
function asset(string $resource)
{
    return url() . '/assets' . (str_starts_with($resource, '/') ? $resource : '/' . $resource);
}

/**
 * Load component
 *
 * @param string $path
 * @param array $data
 * @return void
 */
function render_component(string $path, array $data = [])
{
    foreach ($data as $key => $value) {
        $$key = $value;
    }

    ob_start();
    include __DIR__ . '/components/' . $path . '.php';
    $cmpnt = ob_get_contents();
    ob_end_clean();

    echo $cmpnt;

    return;
}