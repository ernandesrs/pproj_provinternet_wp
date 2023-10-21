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
    return url() . '/assets/' . (str_starts_with($resource, '/') ? $resource : '/' . $resource);
}