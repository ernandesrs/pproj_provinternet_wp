<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" />

    <title>
        <?= CONF_NAME ?>
    </title>
</head>

<body>

    <header id="jsHeader" class="w-full min-h-[100px] bg-basi-11 py-2 border-b-2 border-primary-4 flex items-center">
        <div class="container flex">
            <a href="<?= \Helpers\Url::url() ?>" title="<?= CONF_NAME ?> Página Inicial">
                <img src="<?= \Helpers\Url::asset('img/logo.svg') ?>" alt="<?= CONF_NAME ?> Logo">
            </a>

            <div class="w-full flex items-center">
                <nav class="w-full xl:w-auto max-w-[80vw] sm:max-w-[250px] xl:max-w-none h-full xl:h-auto border xl:border-none shadow-lg xl:shadow-none fixed xl:relative top-0 left-0 z-50 px-4 xl:px-0 py-6 xl:py-0 bg-gray-50 xl:bg-transparent text-primary-1 flex flex-col xl:flex-row duration-300 -translate-x-full xl:translate-x-0 xl:ml-auto"
                    id="jsNavigation">
                    <?php

                    $navigations = [
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
                            'text' => 'Contato/Localização',
                            'href' => '#contact',
                            'title' => 'Entrar em contato'
                        ]
                    ];

                    foreach ($navigations as $nav):
                        $nav = (object) $nav;
                        ?>
                        <a class="px-6 py-3 hover:pl-7 xl:hover:pl-6 hover:text-primary-4 duration-300"
                            href="<?= $nav->href ?? '' ?>" target="<?= $nav->target ?? '_self' ?>"
                            title="<?= $nav->title ?? $nav->text ?>">
                            <?= $nav->text ?>
                        </a>
                        <?php
                    endforeach;
                    ?>
                </nav>

                <!-- button -->
                <?php
                \Helpers\Template::renderComponent('button', [
                    'style' => 'ml-auto xl:ml-10',
                    'size' => 'base',
                    'text' => 'Eu quero internet',
                    'href' => 'https://api.whatsapp.com/send?phone=' . CONF_WHATSAPP_NUMBER,
                    'prependIcon' => \Helpers\Url::asset('icon/whatsapp-white.svg'),
                    'target' => '_blank'
                ]);
                ?>

                <button class="xl:hidden text-basi-4 pl-4" id="jsNavigationToggler">
                    <?php \Helpers\Template::renderComponent('icon', [
                        'style' => 'pointer-events-none',
                        'icon' => 'menu'
                    ]) ?>
                </button>
            </div>
        </div>
    </header>