<?php

namespace Helpers;

class ThemeDataProvider
{
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
     * Get defined socials profile
     *
     * @return array
     */
    static function socials()
    {
        return [
            [
                'text' => 'Facebook',
                'href' => CONF_SOCIALS['facebook'],
                'title' => 'Facebook',
                'icon' => \Helpers\Url::asset('icon/facebook-primary.svg'),
                'target' => '_blank'
            ],
            [
                'text' => 'Instagram',
                'href' => CONF_SOCIALS['instagram'],
                'title' => 'Instagram',
                'icon' => \Helpers\Url::asset('icon/instagram-primary.svg'),
                'target' => '_blank'
            ]
        ];
    }

    /**
     * Get defined contacts profile
     *
     * @return array
     */
    static function contacts()
    {
        $numberFmt = function ($number) {
            $fmted = '+' . substr($number, 0, 2);
            $fmted .= ' ' . substr($number, 2, 2);
            $fmted .= ' ' . substr($number, 4, 5);
            $fmted .= '-' . substr($number, 9);

            return $fmted;
        };

        $socials = array_map(function ($s) {

            $socialName = explode('.', parse_url($s['href'], PHP_URL_HOST))[0];
            $icon = '';

            if (file_exists(__DIR__ . '/../../assets/icon/' . $socialName . '-gray.svg')) {
                $icon = \Helpers\Url::asset('icon/' . $socialName . '-gray.svg');
            }

            return [
                ...$s,
                'icon' => $icon,
            ];
        }, static::socials());

        return array_merge($socials, [
            [
                'text' => $numberFmt(CONF_WHATSAPP_NUMBERS['support']),
                'href' => \Helpers\Url::whatsappUrl('Olá, preciso de ajuda.', 'support'),
                'title' => 'Contato via Whatsapp',
                'icon' => \Helpers\Url::asset('icon/whatsapp-gray.svg'),
                'target' => '_blank'
            ],
            [
                'text' => CONF_CONTACT_EMAIL,
                'href' => 'mailto:' . CONF_CONTACT_EMAIL,
                'title' => 'Contato via email',
                'icon' => \Helpers\Url::asset('icon/envelope-gray.svg'),
                'target' => '_blank'
            ],
            [
                'text' => $numberFmt(CONF_CONTACT_NUMBER),
                'href' => 'tel:' . CONF_CONTACT_NUMBER,
                'title' => 'Ligue para nós',
                'icon' => \Helpers\Url::asset('icon/telephone-gray.svg'),
                'target' => '_blank'
            ]
        ]);
    }

    /**
     * Get defined address and map location
     *
     * @return array
     */
    static function address()
    {
        return [
            'map_location' => CONF_MAP_LOCATION,
            'address' => [
                'street' => CONF_ADDRESS['street'],
                'street_number' => CONF_ADDRESS['street_number'],
                'city' => CONF_ADDRESS['city'],
                'state' => CONF_ADDRESS['state'],
                'neighborhood' => CONF_ADDRESS['neighborhood'],
            ]
        ];
    }
}