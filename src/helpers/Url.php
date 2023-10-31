<?php

namespace Helpers;

class Url
{
    /**
     * Url
     *
     * @param string|null $path
     * @return string
     */
    static function url(?string $path = null)
    {
        return CONF_URL . ($path ? (str_starts_with($path, '/') ? $path : '/' . $path) : '');
    }

    /**
     * Asset
     *
     * @param string $resource
     * @return string
     */
    static function asset(string $resource)
    {
        return static::url() . '/assets' . (str_starts_with($resource, '/') ? $resource : '/' . $resource);
    }
}

