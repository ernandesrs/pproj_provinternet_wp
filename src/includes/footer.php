<footer class="min-h-[365px] flex items-center text-basi-4">
    <div class="container">
        <div class="flex flex-wrap py-10">
            <div class="lg:basis-4/12 flex items-start">
                <img src="<?= asset('img/logo-light.svg') ?>" alt="<?= CONF_NAME ?> FOOTER LOGO">
                <div class="flex p-6 gap-4">
                    <?php

                    $socials = [
                        [
                            'icon' => asset('icon/facebook-primary.svg'),
                            'title' => 'Facebook',
                            'href' => 'https://facebook.com'
                        ],
                        [
                            'icon' => asset('icon/instagram-primary.svg'),
                            'title' => 'Instagram',
                            'href' => 'https://instagram.com'
                        ]
                    ];

                    foreach ($socials as $social):
                        $social = (object) $social;

                        ?>
                        <a href="<?= $social->href ?>" title="<?= $social->title ?>">
                            <?php render_component('icon', [
                                'icon' => $social->icon
                            ]) ?>
                        </a>
                        <?php
                    endforeach;
                    ?>
                </div>
            </div>

            <div class="lg:basis-4/12">

            </div>

            <div class="lg:basis-4/12">

            </div>
        </div>

        <!-- copyright -->
        <div class="text-sm py-3 cursor-default text-center">
            <a class="text-primary-1" href="<?= url() ?>" title="<?= CONF_NAME ?>">
                <?= CONF_NAME ?>
            </a> ©
            <?= date('Y') ?> - Todos os direitos reservados
        </div>
    </div>
</footer>

<script type="module" src="<?= asset('js/scripts.js') ?>"></script>
</body>

</html>