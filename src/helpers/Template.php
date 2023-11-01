<?php

namespace Helpers;

class Template
{
    /**
     * Load component
     *
     * @param string $path
     * @param array $data
     * @return void
     */
    static function renderComponent(string $path, array $data = [])
    {
        foreach ($data as $key => $value) {
            $$key = $value;
        }

        ob_start();
        include __DIR__ . '/../components/' . $path . '.php';
        $cmpnt = ob_get_contents();
        ob_end_clean();

        echo $cmpnt;

        return;
    }

    /**
     * Get the site name
     *
     * @return string
     */
    static function siteName()
    {
        return CONF_NAME;
    }

    /**
     * Get defined socials profile
     *
     * @return array
     */
    static function socials()
    {
        return [
            [
                'icon' => \Helpers\Url::asset('icon/facebook-primary.svg'),
                'title' => 'Facebook',
                'href' => CONF_SOCIALS['facebook']
            ],
            [
                'icon' => \Helpers\Url::asset('icon/instagram-primary.svg'),
                'title' => 'Instagram',
                'href' => CONF_SOCIALS['instagram']
            ]
        ];
    }

    /**
     * Return the header nav
     *
     * @return array
     */
    static function headerNav()
    {
        return [
            [
                'text' => 'Início',
                'href' => \Helpers\Url::url(),
                'title' => 'Início'
            ],
            [
                'text' => 'Planos',
                'href' => '#plans',
                'title' => 'Nossos planos'
            ],
            [
                'text' => 'Contato e Localização',
                'href' => '#contact',
                'title' => 'Entrar em contato'
            ]
        ];
    }

    /**
     * Return the footer nav
     *
     * @return array
     */
    static function footerNav()
    {
        return static::headerNav();
    }

    /**
     * Return the footer links
     *
     * @return array
     */
    static function footerLinks()
    {
        return [
            [
                'text' => 'Termos de privacidade',
                'href' => \Helpers\Url::urlPrivacyTermsPage(),
                'title' => 'Termos de privacidade'
            ]
        ];
    }

    /**
     * Get data to banner section
     *
     * @return array
     */
    static function sectionBanner()
    {
        return [
            'features' => [
                [
                    'icon' => 'router',
                    'text' => 'Roteador Dual Band'
                ],
                [
                    'icon' => 'speed',
                    'text' => 'Alta Velocidade e Baixa Latência'
                ],
                [
                    'icon' => 'wifi_tethering',
                    'text' => 'Via Fibra Ou Rádio'
                ]
            ],
            'headline' => 'Assista, navegue e jogue ao mesmo tempo!',
            'subheadline' => 'É isso mesmo! Nossa internet via fibra possui alta estabilidade e baixa latência, permitindo que você faça <span class="text-primary-1">tudo ao mesmo tempo</span>!'
        ];
    }
}