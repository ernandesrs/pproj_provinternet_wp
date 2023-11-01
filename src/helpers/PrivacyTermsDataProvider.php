<?php

namespace Helpers;

class PrivacyTermsDataProvider
{
    /**
     * Privacy terms page seo
     *
     * @return array
     */
    static function seo()
    {
        return [
            'title' => 'Termos de privacidade',
            'description' => 'Veja nossos termos de privacidade, entenda quais dados são obtidos e como serão utilizados.',
            'url' => \Helpers\Url::url('?page=terms'),
            'cover' => '',
            'index' => false
        ];
    }
}