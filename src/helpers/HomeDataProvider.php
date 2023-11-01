<?php

namespace Helpers;

class HomeDataProvider
{
    /**
     * Home page seo
     *
     * @return array
     */
    static function seo()
    {
        return [
            'title' => 'Velocidade, baixa latência e baixo preço',
            'description' => 'Internet via fibra ótica em Lorem City',
            'url' => \Helpers\Url::url(),
            'cover' => '',
            'index' => true
        ];
    }

    /**
     * Get data to banner section
     *
     * @return array
     */
    static function sectionBanner()
    {
        $sectionBanner = [
            'headline' => cfs()->get('titulo_do_banner', get_the_ID()),
            'subheadline' => cfs()->get('subtitulo_do_banner', get_the_ID()),
        ];

        $features = cfs()->get('destaques_do_banner', get_the_ID());
        if (!is_array($features)) {
            $features = [];
        }

        $sectionBanner['features'] = array_map(function ($f) {
            return [
                'icon' => $f['icone_do_destaque'],
                'text' => $f['texto_do_destaque']
            ];
        }, $features);

        return isset($sectionBanner['headline']) && !empty($sectionBanner['headline']) ? $sectionBanner : [
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
        $features = cfs()->get('destaques', get_the_ID());
        if (!is_array($features)) {
            $features = [];
        }

        $features = array_map(function ($f) {
            return [
                'icon' => $f['icone_do_destaque'],
                'title' => $f['titulo_do_destaque'],
                'description' => $f['descricao_do_destaque']
            ];
        }, $features);

        return count($features) > 0 ? $features : [
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
        $calcSpeed = function ($speed, $speedType) {
            if ($speedType == 'megas') {
                $speed = $speed / 8;
            }

            return $speed;
        };

        /**
         * 
         * Allowed values to recurrence_period field:
         * monthly, yearly
         * 
         */
        $recurrencePeriods = [
            'mensal' => 'monthly',
            'anual' => 'yearly'
        ];

        $speedTypes = [
            'megas' => 'MB/s',
            'megabits' => 'Mb/s'
        ];

        $plansSection = [
            'title' => cfs()->get('titulo_da_secao', get_the_ID()),
            'subtitle' => cfs()->get('subtitulo_da_secao', get_the_ID())
        ];

        $plans = cfs()->get('lista_de_planos', get_the_ID());
        if (!is_array($plans)) {
            $plans = [];
        }

        $plans = array_map(function ($planId) use ($recurrencePeriods, $speedTypes, $calcSpeed) {
            $plan = get_post_custom($planId);

            return [
                'title' => $plan['velocidade_do_download'][0] . ' ' . strtoupper($plan['tipo_de_medida_de_velocidade'][0]),
                'features' => [
                    'Download: ' . $calcSpeed($plan['velocidade_do_download'][0], $plan['tipo_de_medida_de_velocidade'][0]) . ' ' . $speedTypes['megabits'],
                    'Upload: ' . $calcSpeed($plan['velocidade_do_download'][0], $plan['tipo_de_medida_de_velocidade'][0]) . ' ' . $speedTypes['megabits'],
                    $plan['a_instalacao_e_gratuita'][0] ? 'Instalação grátis' : 'Instalação com taxa',
                    $plan['o_roteador_e_gratuito'][0] ? 'Roteador grátis' : 'Roteador pago',
                ],
                'price' => $plan['preco_do_plano'][0],
                'recurrence_period' => $recurrencePeriods[$plan['periodo_de_recorrencia'][0]],
                'highlight' => false
            ];
        }, $plans);

        return isset($plansSection['title']) && !empty($plansSection['title']) ? array_merge($plansSection, [
            'plans' => $plans
        ]) : [
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
                    ],
                    'price' => 50,
                    'recurrence_period' => 'monthly',
                    'highlight' => false
                ],
                [
                    'title' => '75 MEGAS',
                    'features' => [
                        'Download: 12,25 MB/s',
                        'Upload: 12,25 MB/s',
                        'Instalação grátis',
                        'Roteador grátis*',
                    ],
                    'price' => 70,
                    'recurrence_period' => 'monthly',
                    'highlight' => true
                ],
                [
                    'title' => '125 MEGAS',
                    'features' => [
                        'Download: 16,25 MB/s',
                        'Upload: 16,25 MB/s',
                        'Instalação grátis',
                        'Roteador grátis*',
                    ],
                    'price' => 100,
                    'recurrence_period' => 'monthly',
                    'highlight' => false
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
        $sectionTestmonials = [
            'title' => cfs()->get('titulo_da_secao', get_the_ID()),
            'subtitle' => cfs()->get('subtitulo_da_secao', get_the_ID()),
            'testmonials' => []
        ];

        $testmonials = cfs()->get('lista_de_depoimentos', get_the_ID());
        if (!is_array($testmonials)) {
            $testmonials = [];
        }

        $sectionTestmonials['testmonials'] = array_map(function ($t) {
            return [
                'client_name' => $t['nome_do_cliente'],
                'title' => $t['destaque_do_depoimento'],
                'testmonial' => $t['detalhes_do_depoimento'],
                'avatar' => $t['foto_do_cliente']
            ];
        }, $testmonials);

        return isset($sectionTestmonials['title']) && !empty($sectionTestmonials['title']) ? $sectionTestmonials : [
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

    /**
     * Get data to contact and location section
     *
     * @return array
     */
    static function sectionLocationAndContact()
    {
        return array_merge(
            \Helpers\ThemeDataProvider::address(),
            ['contacts' => \Helpers\ThemeDataProvider::contacts()]
        );
    }
}