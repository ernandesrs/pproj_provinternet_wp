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
     * Terms page url
     *
     * @return string
     */
    static function url_privacy_terms_page()
    {
        return static::url('?page=terms');
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

