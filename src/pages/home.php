<!-- banner -->
<div class="container min-h-[85vh] flex items-center py-8">

    <div class="flex flex-col lg:flex-row">
        <div class="basis-full lg:basis-6/12 p-6 flex items-center justify-center mb-8 lg:mb-0 lg:order-12">
            <div class="banner-ilustration">

                <div class="hightlight -top-8">
                    <?php render_component('icon', [
                        'icon' => 'router',
                        'style' => 'icon'
                    ]) ?><span>Roteador Dual Band</span>
                </div>

                <div class="hightlight -left-20">
                    <?php render_component('icon', [
                        'icon' => 'speed',
                        'style' => 'icon'
                    ]) ?><span>Alta Velocidade e Baixa Latência</span>
                </div>

                <div class="hightlight bottom-2 -right-20">
                    <?php render_component('icon', [
                        'icon' => 'wifi_tethering',
                        'style' => 'icon'
                    ]) ?><span>Via Fibra Ou Rádio</span>
                </div>

            </div>
        </div>

        <div class="basis-full lg:basis-6/12 lg:order-1">
            <div class="mb-7 text-center lg:text-left">
                <h1 class="text-basi-2 text-4xl lg:text-5xl font-bold text-dark-2 mb-7 lg:pr-3">
                    Assista, navegue e jogue ao mesmo tempo!
                </h1>
                <p class="text-basi-4 text-lg lg:text-xl font-medium text-dark-4 lg:pr-28">
                    É isso mesmo! Nossa internet via fibra possui
                    alta estabilidade e baixa latência, permitindo
                    que você faça <span class="text-primary-1">tudo ao mesmo tempo</span>!
                </p>
            </div>
            <div class="flex gap-6 justify-center lg:justify-start">
                <?php

                render_component('button', [
                    'prependIcon' => asset('icon/whatsapp-white.svg'),
                    'text' => 'Eu quero internet',
                    'href' => 'https://api.whatsapp.com/send?phone=' . CONF_WHATSAPP_NUMBER
                ]);

                render_component('button', [
                    'prependIcon' => 'arrow_downward',
                    'variant' => 'primary-outlined',
                    'text' => 'Quero ver os planos',
                    'href' => '#planos'
                ]);

                ?>
            </div>
        </div>
    </div>

</div>
<!-- /banner -->