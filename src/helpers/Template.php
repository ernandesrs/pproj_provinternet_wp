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

    /**
     * Get data to features section
     *
     * @return array
     */
    static function sectionFeatures()
    {
        return [
            [
                'icon' => 'apps',
                'title' => 'Consetur adipicing',
                'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Impedit, veniam.',
            ],
            [
                'icon' => 'wifi',
                'title' => 'Consetur adipicing',
                'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Impedit, veniam.',
            ],
            [
                'icon' => 'support_agent',
                'title' => 'Consetur adipising',
                'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Impedit, veniam.',
            ]
        ];
    }

    /**
     * Get data to plans section
     *
     * @return array
     */
    static function sectionPlans()
    {
        return [
            'title' => 'Planos',
            'subtitle' => 'Confira todos os nossos planos',
            'plans' => [
                [
                    'title' => '50 MEGAS',
                    'features' => [
                        'Download: 6,25 MB/s',
                        'Upload: 6,25 MB/s',
                        'Instalação grátis',
                        'Roteador grátis*',
                    ]
                ],
                [
                    'title' => '75 MEGAS',
                    'features' => [
                        'Download: 12,25 MB/s',
                        'Upload: 12,25 MB/s',
                        'Instalação grátis',
                        'Roteador grátis*',
                    ]
                ],
                [
                    'title' => '125 MEGAS',
                    'features' => [
                        'Download: 16,25 MB/s',
                        'Upload: 16,25 MB/s',
                        'Instalação grátis',
                        'Roteador grátis*',
                    ]
                ]
            ]
        ];
    }

    /**
     * Get data to testmonials section
     *
     * @return array
     */
    static function sectionTestmonials()
    {
        return [
            'title' => 'Clientes',
            'subtitle' => 'Vejam o que alguns de nossos clientes dizem',
            'testmonials' => [
                [
                    'client_name' => 'Client Name',
                    'title' => 'Lorem ipsum dolor',
                    'testmonial' => 'Lorem ipsum dolor, natus dolor sitin datus. Only nutis uistu loken nadis ilastu unranin ila nanad uiqui.',
                    'avatar' => \Helpers\Url::asset('img/client-thumb.png')
                ],
                [
                    'client_name' => 'Client Name',
                    'title' => 'Lorem ipsum dolor',
                    'testmonial' => 'Lorem ipsum dolor, natus dolor sitin datus. Only nutis uistu loken nadis ilastu unranin ila nanad uiqui.',
                    'avatar' => \Helpers\Url::asset('img/client-thumb.png')
                ],
                [
                    'client_name' => 'Client Name',
                    'title' => 'Lorem ipsum dolor',
                    'testmonial' => 'Lorem ipsum dolor, natus dolor sitin datus. Only nutis uistu loken nadis ilastu unranin ila nanad uiqui.',
                    'avatar' => \Helpers\Url::asset('img/client-thumb.png')
                ],
                [
                    'client_name' => 'Client Name',
                    'title' => 'Lorem ipsum dolor',
                    'testmonial' => 'Lorem ipsum dolor, natus dolor sitin datus. Only nutis uistu loken nadis ilastu unranin ila nanad uiqui.',
                    'avatar' => \Helpers\Url::asset('img/client-thumb.png')
                ]
            ]
        ];
    }
}