<!-- banner -->
<?php

$featuresPositions = [
    '-top-8',
    '-left-20',
    '-right-20'
];

[
    'features' => $bannerFeatureData,
    'headline' => $bannerHeadline,
    'subheadline' => $bannerSubheadline
] = \Helpers\Template::sectionBanner() ?? [];

?>
<div class="container min-h-[85vh] flex items-center py-16 lg:py-9">
    <div class="flex flex-wrap justify-center">
        <div class="basis-full lg:basis-6/12 p-6 flex items-center justify-center mb-8 lg:mb-0 lg:order-12">
            <div class="banner-ilustration">
                <?php

                foreach (array_slice($bannerFeatureData, 0, 3) as $key => $bfd) {
                    ?>
                    <div class="hightlight <?= $featuresPositions[$key] ?>">
                        <?php \Helpers\Template::renderComponent('icon', [
                            'icon' => $bfd['icon'],
                            'style' => 'icon'
                        ]) ?><span>
                            <?= $bfd['text'] ?>
                        </span>
                    </div>
                    <?php
                }

                ?>
            </div>
        </div>

        <div class="basis-full sm:basis-10/12 lg:basis-6/12 lg:order-1 flex flex-col justify-center">
            <div class="mb-7 text-center lg:text-left">
                <h1 class="text-basi-2 text-4xl lg:text-5xl font-semibold mb-7" style="line-height:135%;">
                    <?= $bannerHeadline ?>
                </h1>
                <p class="text-basi-4 text-lg lg:text-xl font-medium lg:pr-28" style="letter-spacing: 1px;">
                    <?= $bannerSubheadline ?>
                </p>
            </div>
            <div class="flex flex-wrap gap-6 justify-center lg:justify-start">
                <?php

                \Helpers\Template::renderComponent('button', [
                    'prependIcon' => \Helpers\Url::asset('icon/whatsapp-white.svg'),
                    'text' => 'Eu quero internet',
                    'href' => \Helpers\Url::whatsappUrl('Olá, preciso de ajuda para escolher um plano de internet.', 'subscription'),
                    'target' => '_blank'
                ]);

                \Helpers\Template::renderComponent('button', [
                    'prependIcon' => 'arrow_downward',
                    'variant' => 'primary-outlined',
                    'text' => 'Quero ver os planos',
                    'href' => '#plans'
                ]);

                ?>
            </div>
        </div>
    </div>
</div>
<!-- /banner -->

<!-- features -->
<?php

$features = \Helpers\Template::sectionFeatures() ?? [];

?>
<div class="bg-primary-4 py-16 lg:py-9 flex items-center" data-aos="fade-up">
    <div class="container flex flex-wrap justify-center">
        <?php

        foreach ($features as $key => $feature):
            $feature = (object) $feature;
            ?>
            <div class="sm:basis-6/12 lg:basis-4/12 text-basi-11 p-4 border border-primary-1 border-opacity-0 mb-5 lg:mb-0"
                data-aos="fade-up" data-aos-duration="<?= 200 + (100 * ($key + 1)) ?>"
                data-aos-delay="<?= 200 + (100 * ($key + 1)) ?>">
                <div class="feature-card">
                    <h4 class="feature-card-header">
                        <?php \Helpers\Template::renderComponent('icon', [
                            'style' => 'mb-3 text-5xl',
                            'icon' => $feature->icon
                        ]) ?>
                        <span class="text-2xl">
                            <?= $feature->title ?>
                        </span>
                    </h4>
                    <p class="feature-card-text">
                        <?= $feature->description ?>
                    </p>
                </div>
            </div>
            <?php
        endforeach;
        ?>
    </div>
</div>
<!-- /features -->

<!-- plans -->
<?php

[
    'plans' => $plans,
    'title' => $plansSectionTitle,
    'subtitle' => $plansSectionSubtitle
] = \Helpers\Template::sectionPlans() ?? [];

?>
<div id="plans" class="container min-h-[100vh] flex flex-col justify-center py-16 lg:py-9">
    <div class="w-full flex flex-wrap justify-center">
        <div class="basis-10/12 sm:basis-8/12 md:basis-6/12 lg:basis-5/12 font-bold text-center py-10">
            <h1 class="text-basi-5 text-2xl lg:text-3xl mb-3" data-aos="fade-up">
                <?= $plansSectionTitle ?>
            </h1>
            <h2 class="text-basi-2 text-4xl lg:text-5xl" data-aos="fade-up" data-aos-delay="250"
                style="line-height:120%;">
                <?= $plansSectionSubtitle ?>
            </h2>
        </div>
    </div>

    <div class="w-full flex flex-wrap justify-center">
        <?php

        foreach ($plans as $key => $plan):
            $plan = (object) $plan;

            [$titleA, $titleB] = explode(' ', $plan->title);
            ?>
            <div class="basis-full sm:basis-5/12 lg:basis-4/12 xl:basis-3/12 p-6 mb-6"
                data-aos="<?= $key == 0 ? 'fade-right' : ($key == count($plans) - 1 ? 'fade-left' : 'fade-up') ?>"
                data-aos-duration="<?= 300 + (100 * (1 + $key)) ?>" data-aos-delay="<?= 200 + (100 * (1 + $key)) ?>">

                <div class="shadow-xl p-4 rounded-[100px]">
                    <div class="shadow-lg px-4 py-6 rounded-[100px] text-center text-basi-4 font-semibold">
                        <span class="block text-6xl">
                            <?= $titleA ?>
                        </span>
                        <span class="block text-2xl">
                            <?= $titleB ?>
                        </span>
                    </div>
                    <div class="px-4 py-5">
                        <ul class="font-semibold text-base text-basi-3 text-center">
                            <?php foreach ($plan->features as $feature): ?>
                                <li class="py-1">
                                    <?= $feature ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <div class="text-center translate-y-5">
                        <?php \Helpers\Template::renderComponent('button', [
                            'text' => 'Eu quero este',
                            'target' => '_blank',
                            'href' => \Helpers\Url::whatsappUrl('Olá, estou interessado(a) no plano ' . $titleA . ' ' . $titleB, 'subscription'),
                        ]) ?>
                    </div>
                </div>

            </div>
            <?php
        endforeach;
        ?>
    </div>
</div>
<!-- /plans -->

<!-- clients -->
<?php

[
    'testmonials' => $testmonials,
    'title' => $testmonialsSectionTitle,
    'subtitle' => $testmonialsSectionSubtitle
] = \Helpers\Template::sectionTestmonials() ?? [];

?>
<div id="testmonials" class="container min-h-[100vh] flex flex-col justify-center py-16 lg:py-9 relative">
    <div class="circle-decoration circle-on-left"></div>

    <div class="flex flex-wrap justify-center">
        <div class="sm:basis-8/12 lg:basis-5/12 font-bold text-center lg:text-left mb-10 lg:mb-0">
            <h1 class="text-basi-5 text-2xl lg:text-3xl mb-3" data-aos="zoom-in-right">
                <?= $testmonialsSectionTitle ?>
            </h1>
            <h2 class="text-basi-2 text-4xl lg:text-5xl" style="line-height:120%;" data-aos="zoom-in-right"
                data-aos-delay="275">
                <?= $testmonialsSectionSubtitle ?>
            </h2>
            <div class="mt-10">
                <?php \Helpers\Template::renderComponent('button', [
                    'variant' => 'primary-outlined',
                    'prependIcon' => 'arrow_upward',
                    'text' => 'Escolher um plano',
                    'href' => '#plans'
                ]) ?>
            </div>
        </div>

        <div class="lg:basis-7/12 px-2 flex flex-wrap">
            <?php

            foreach ($testmonials as $test):
                $test = (object) $test;
                ?>
                <div class="sm:basis-6/12 p-2 cursor-default" data-aos="zoom-in-left"
                    data-aos-delay="<?= 200 + (100 * ($key + 1)) ?>">
                    <div class="shadow-lg rounded-3xl py-4 px-6">
                        <div class="flex mb-3">
                            <div class="w-14 h-14 overflow-hidden rounded-full relative">
                                <img class="absolute top-0 left-0" src="<?= $test->avatar ?>"
                                    alt="<?= $test->client_name ?>">
                            </div>
                            <div class="ml-4">
                                <h3 class="text-basi-4 text-xl font-medium">
                                    <?= $test->title ?>
                                </h3>
                                <h6 class="text-basi-6 text-xs">
                                    <?= $test->client_name ?>
                                </h6>
                            </div>
                        </div>
                        <div class="text-base font-normal text-basi-5">
                            <?= $test->testmonial ?>
                        </div>
                    </div>
                </div>
                <?php
            endforeach;

            ?>
        </div>
    </div>

</div>
<!-- /clients -->

<!-- location/contact -->
<div id="contact" class="min-h-[100vh] flex justify-center items-center py-16 lg:py-9 relative bg-basi-10 text-basi-4">
    <div class="circle-decoration circle-on-right"></div>

    <div class="container flex flex-wrap">
        <div class="basis-full lg:basis-6/12 flex flex-col items-center lg:items-start mb-12">
            <h2 class="text-2xl lg:text-3xl text-primary-4 font-semibold mb-8">Nossa localização</h2>
            <iframe class="rounded-3xl mb-8 w-full max-w-[600px] h-[350px] shadow-sm border"
                src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d1907.9331951384584!2d-54.81767306054084!3d-22.178121299502063!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e1!3m2!1spt-BR!2sbr!4v1698008075553!5m2!1spt-BR!2sbr"
                style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
            <div class="cursor-default">
                <div class="flex">
                    <?php \Helpers\Template::renderComponent('icon', [
                        'style' => 'text-5xl',
                        'icon' => 'map'
                    ]); ?>

                    <div class="ml-3">
                        <div class="text-base font-medium">Rua Lorem Ipsum, 246</div>
                        <div class="text-sm">Lorem City, LS</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="basis-full lg:basis-6/12 px-10">
            <div class="bg-basi-10 bg-opacity-90 h-full p-10 rounded-[35px] shadow-lg">
                <h2 class="text-2xl lg:text-3xl font-semibold mb-8 text-basi-4">Contate-nos</h2>
                <div class="ml-5">
                    <?php

                    $contacts = [
                        [
                            'text' => '@netfacil',
                            'href' => 'https://facebook.com/',
                            'title' => '@netfacil no Facebook',
                            'icon' => \Helpers\Url::asset('icon/facebook-gray.svg'),
                            'target' => '_blank'
                        ],
                        [
                            'text' => '@netfacil',
                            'href' => 'https://instagram.com/',
                            'title' => '@netfacil no Instagram',
                            'icon' => \Helpers\Url::asset('icon/instagram-gray.svg'),
                            'target' => '_blank'
                        ],
                        [
                            'text' => '+55 00 0 0000-0000',
                            'href' => 'https://api.whatsapp.com/tel=',
                            'title' => '@netfacil no Whatsapp',
                            'icon' => \Helpers\Url::asset('icon/whatsapp-gray.svg'),
                            'target' => '_blank'
                        ],
                        [
                            'text' => 'lorem@ipsum.com',
                            'href' => 'mailto:lorem@ipsum.com',
                            'title' => '@netfacil via email',
                            'icon' => \Helpers\Url::asset('icon/envelope-gray.svg'),
                            'target' => '_blank'
                        ],
                        [
                            'text' => '00 0 0000-0000',
                            'href' => 'tel:00 0 0000-0000',
                            'title' => 'Ligue para nós',
                            'icon' => \Helpers\Url::asset('icon/telephone-gray.svg'),
                            'target' => '_blank'
                        ]
                    ];

                    foreach ($contacts as $contact):
                        $contact = (object) $contact;
                        ?>
                        <a class="py-3 flex items-center text-basi-5" href="<?= $contact->href ?>"
                            target="<?= $contact->target ?? '_self' ?>" title="<?= $contact->title ?? '' ?>">
                            <?php \Helpers\Template::renderComponent('icon', [
                                'icon' => $contact->icon
                            ]) ?>
                            <span class="inline-block ml-2">
                                <?= $contact->text ?>
                            </span>
                        </a>
                        <?php
                    endforeach;
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /location/contact -->