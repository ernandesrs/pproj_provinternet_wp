<?php

namespace Helpers;

class ThemeDataProvider
{
    private static $pages = [
        'home' => \Helpers\HomeDataProvider::class,
        'terms' => \Helpers\PrivacyTermsDataProvider::class
    ];

    /**
     * Seo
     *
     * @param string $page
     * @return \CoffeeCode\Optimizer\Optimizer
     */
    static function seo(string $page = 'home')
    {
        return (new \CoffeeCode\Optimizer\Optimizer())
            ->optimize(
                \Helpers\ThemeDataProvider::siteName() . ' - ' . cfs()->get('titulo', get_the_ID()) ?? '',
                cfs()->get('descricao', get_the_ID()) ?? '',
                get_permalink() ?? '',
                cfs()->get('capa', get_the_ID()) ?? '',
                cfs()->get('permitir_indexacao', get_the_ID()) ?? ''
            );
    }

    /**
     * Get the site name
     *
     * @return string
     */
    static function siteName()
    {
        return get_bloginfo('name');
    }

    /**
     * Get header logo url
     *
     * @return string
     */
    static function headerLogo()
    {
        $customLogo = wp_get_attachment_image_src(get_theme_mod('custom_logo', null), 'full');

        return $customLogo ? current($customLogo) : \Helpers\Url::asset('img/header-logo.svg');
    }

    /**
     * Get footer logo url
     *
     * @return string
     */
    static function footerLogo()
    {
        return self::headerLogo();
    }

    /**
     * Return the header nav
     *
     * @return array
     */
    static function headerNav()
    {
        $headerNav = wp_get_nav_menu_items('header-menu');

        if ($headerNav) {
            $headerNav = array_map(function ($hn) {
                return [
                    'text' => $hn->title,
                    'href' => $hn->url,
                    'title' => 'Ir para ' . $hn->title
                ];
            }, $headerNav);
        }

        return $headerNav ? $headerNav : [
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
        $footerNav = wp_get_nav_menu_items('footer-menu');

        if ($footerNav) {
            $footerNav = array_map(function ($hn) {
                return [
                    'text' => $hn->title,
                    'href' => $hn->url,
                    'title' => 'Ir para ' . $hn->title
                ];
            }, $footerNav);
        }

        return $footerNav ? $footerNav : static::headerNav();
    }

    /**
     * Return the footer links
     *
     * @return array
     */
    static function footerLinks()
    {
        $footerLinks = wp_get_nav_menu_items('footer-links');

        if ($footerLinks) {
            $footerLinks = array_map(function ($hn) {
                return [
                    'text' => $hn->title,
                    'href' => $hn->url,
                    'title' => 'Ir para ' . $hn->title
                ];
            }, $footerLinks);
        }

        return $footerLinks ? $footerLinks : [
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
    static function socials(string $iconStyle = 'primary')
    {
        $siteData = static::getSiteData();

        $socials = [];

        if ($siteData) {
            $socialsMeta = cfs()->get('redes_sociais', $siteData->ID);

            if (!is_array($socialsMeta)) {
                $socialsMeta = [];
            }

            $socials = array_map(function ($s) use ($iconStyle) {
                return [
                    'text' => $s['nome_da_rede_social'],
                    'href' => $s['link_do_perfil_na_rede_social'],
                    'title' => $s['nome_da_rede_social'],
                    'icon' => empty($s['icone_da_rede_social']) ? static::getIconBySocialUrl($s['link_do_perfil_na_rede_social'], $iconStyle) : $s['icone_da_rede_social'],
                    'target' => '_blank'
                ];
            }, $socialsMeta);
        }

        return $siteData ? $socials : [
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
            return [
                ...$s
            ];
        }, static::socials('gray'));

        $siteData = static::getSiteData();
        $contacts = [];

        if ($siteData) {
            $contacts = [
                [
                    'text' => $numberFmt(cfs()->get('whatsapp_suporte', $siteData->ID)),
                    'href' => \Helpers\Url::whatsappUrl('Olá, preciso de ajuda.', 'support'),
                    'title' => 'Contato via Whatsapp',
                    'icon' => \Helpers\Url::asset('icon/whatsapp-gray.svg'),
                    'target' => '_blank'
                ],
                [
                    'text' => cfs()->get('email_para_contatos', $siteData->ID),
                    'href' => 'mailto:' . cfs()->get('email_para_contatos', $siteData->ID),
                    'title' => 'Contato via email',
                    'icon' => \Helpers\Url::asset('icon/envelope-gray.svg'),
                    'target' => '_blank'
                ],
                [
                    'text' => $numberFmt(cfs()->get('numero_para_ligacoes', $siteData->ID)),
                    'href' => 'tel:' . cfs()->get('numero_para_ligacoes', $siteData->ID),
                    'title' => 'Ligue para nós',
                    'icon' => \Helpers\Url::asset('icon/telephone-gray.svg'),
                    'target' => '_blank'
                ]
            ];
        }

        return array_merge($socials, $siteData ? $contacts : [
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
        $siteData = static::getSiteData();
        $address = [];

        if ($siteData) {
            $address = [
                'map_location' => cfs()->get('localizacao_no_mapa', $siteData->ID),
                'address' => [
                    'street' => cfs()->get('nome_da_rua', $siteData->ID),
                    'street_number' => cfs()->get('numero_da_rua', $siteData->ID),
                    'city' => cfs()->get('nome_da_cidade', $siteData->ID),
                    'state' => cfs()->get('sigla_do_estado', $siteData->ID),
                    'neighborhood' => cfs()->get('nome_do_bairro', $siteData->ID),
                ]
            ];
        }

        return $siteData ? $address : [
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

    /**
     * Get defined whatsapp numbers
     *
     * @return array
     */
    static function whatsappNumbers()
    {
        $siteData = static::getSiteData();

        $whatsNumbers = null;
        if ($siteData) {
            $whatsNumbers = [
                'support' => cfs()->get('whatsapp_suporte', $siteData->ID),
                'subscription' => cfs()->get('whatsapp_assinaturas', $siteData->ID)
            ];
        }

        return $whatsNumbers ? $whatsNumbers : CONF_WHATSAPP_NUMBERS;
    }

    /**
     * Get site data
     *
     * @return null|\WP_Post
     */
    static function getSiteData()
    {
        $siteData = current(get_posts([
            'post_type' => 'dados-do-site'
        ]));

        return $siteData ? $siteData : null;
    }

    /**
     * Get icon by socil href
     *
     * @param string $url
     * @param string $color
     * @return string
     */
    static function getIconBySocialUrl(string $url, string $color = 'primary')
    {
        $socialName = explode('.', parse_url($url, PHP_URL_HOST))[0];
        $icon = '';

        if (file_exists(__DIR__ . '/../../assets/icon/' . $socialName . '-' . $color . '.svg')) {
            $icon = \Helpers\Url::asset('icon/' . $socialName . '-' . $color . '.svg');
        }

        return $icon;
    }
}