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
        return home_url() . ($path ? (str_starts_with($path, '/') ? $path : '/' . $path) : '');
    }

    /**
     * Get whatsapp url with number and message
     *
     * @param string $message
     * @param string $channel
     * @return string
     */
    static function whatsappUrl(string $message, string $channel = 'subscription')
    {
        $number = \Helpers\ThemeDataProvider::whatsappNumbers()[$channel] ?? 'subscription';

        return 'https://api.whatsapp.com/send?phone=' . $number . '&text=' . $message;
    }

    /**
     * Terms page url
     *
     * @return string
     */
    static function urlPrivacyTermsPage()
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
        return get_stylesheet_directory_uri() . '/assets' . (str_starts_with($resource, '/') ? $resource : '/' . $resource);
    }
}

