<footer class="min-h-[365px] flex items-center text-basi-4">
    <div class="container">
        <div class="flex flex-wrap justify-center py-20">
            <div class="basis-full sm:basis-6/12 md:basis-4/12 mb-8 md:mb-0">
                <div>
                    <h3 class="uppercase text-base font-semibold mb-4">
                        Menu
                    </h3>
                    <nav class="flex flex-col text-primary-1 ml-2">
                        <?php
                        foreach ($navigations as $nav):
                            $nav = (object) $nav;
                            ?>
                            <a class="py-2 hover:pl-1 duration-200 hover:text-basi-6" href="<?= $nav->href ?>"
                                title="<?= $nav->title ?? $nav->text ?>" target="<?= $nav->target ?? '_self' ?>">
                                <?= $nav->text ?>
                            </a>
                            <?php
                        endforeach;
                        ?>
                    </nav>
                </div>
            </div>

            <div class="basis-full sm:basis-6/12 md:basis-3/12 mb-8 md:mb-0">
                <div>
                    <h3 class="uppercase text-base font-semibold mb-4">
                        Links
                    </h3>
                    <nav class="flex flex-col text-primary-1 ml-2">
                        <?php
                        foreach ([['text' => 'Termos de privacidade', 'href' => '#'], ['text' => 'Termos de serviço', 'href' => '#']] as $nav):
                            $nav = (object) $nav;
                            ?>
                            <a class="py-2 hover:pl-1 duration-200 hover:text-basi-6" href="<?= $nav->href ?>"
                                title="<?= $nav->title ?? $nav->text ?>" target="<?= $nav->target ?? '_self' ?>">
                                <?= $nav->text ?>
                            </a>
                            <?php
                        endforeach;
                        ?>
                    </nav>
                </div>
            </div>

            <div class="basis-full md:basis-5/12 flex items-start md:order-first">
                <img src="<?= \Helpers\Url::asset('img/logo-light.svg') ?>" alt="<?= CONF_NAME ?> FOOTER LOGO">
                <div class="flex p-6 gap-4">
                    <?php

                    $socials = [
                        [
                            'icon' => \Helpers\Url::asset('icon/facebook-primary.svg'),
                            'title' => 'Facebook',
                            'href' => 'https://facebook.com'
                        ],
                        [
                            'icon' => \Helpers\Url::asset('icon/instagram-primary.svg'),
                            'title' => 'Instagram',
                            'href' => 'https://instagram.com'
                        ]
                    ];

                    foreach ($socials as $social):
                        $social = (object) $social;

                        ?>
                        <a href="<?= $social->href ?>" title="<?= $social->title ?>">
                            <?php \Helpers\Template::render_component('icon', [
                                'icon' => $social->icon
                            ]) ?>
                        </a>
                        <?php
                    endforeach;
                    ?>
                </div>
            </div>
        </div>

        <!-- copyright -->
        <div class="text-sm py-4 cursor-default text-center">
            <a class="text-primary-1" href="<?= \Helpers\Url::url() ?>" title="<?= CONF_NAME ?>">
                <?= CONF_NAME ?>
            </a> ©
            <?= date('Y') ?> - Todos os direitos reservados
        </div>
    </div>
</footer>

<script type="module" src="<?= \Helpers\Url::asset('dist/main.bundle.js') ?>"></script>
</body>

</html>