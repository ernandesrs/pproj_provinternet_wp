<?php

/**
 * 
 * #Documentation
 * 
 * ##Component props
 * |Prop|Allowed values|
 * |appendIcon|A valid icon name on Google Icons, a full url to the icon or a valid svg|
 * |prependIcon|A valid icon name on Google Icons, a full url to the icon or a valid svg|
 * |variant|primary,primary-outlined|
 * |size|small,base,large|
 * |id||
 * |href||
 * |title||
 * |target|_self,_blank|
 * 
 */

/**
 * 
 * Default definitions
 * 
 */
$variants = [
    'primary' => 'bg-primary-1 text-basi-11',
    'primary-outlined' => 'border border-primary-1 text-primary-1'
];

$sizes = [
    'small' => 'px-6 py-3 text-sm',
    'base' => 'px-8 py-3 text-base',
    'large' => 'px-10 py-4 text-lg'
];

/**
 * 
 * Component definitions
 */
$appendIcon = $appendIcon ?? null;
$prependIcon = $prependIcon ?? null;
$variant = $variants[$variant ?? 'primary'];
$size = $sizes[$size ?? 'base'];
$attributes = array_filter([
    ($id ?? null) ? 'id="' . $id . '"' : '',
    ($href ?? null) ? 'href="' . $href . '"' : '',
    ($title ?? null) ? 'title="' . $title . '"' : '',
    ($target ?? '_self') ? 'target="' . ($target ?? '_self') . '"' : '',
], function ($i) {
    return empty($i) ? null : $i;
});

/**
 * 
 * Style definitions
 * 
 */
$class = [
    'rounded-full bg-opacity-90 hover:bg-opacity-100 duration-300 hover:scale-105',
    ($prependIcon || $appendIcon) ? 'inline-flex items-center gap-3' : '',
    $size,
    $variant
];

?>

<a class="<?= implode(" ", $class) ?>" <?= implode(' ', $attributes) ?>>

    <?php

    if ($prependIcon) {
        render_component('icon', [
            'icon' => $prependIcon,
            'style' => 'pointer-events-none'
        ]);
    }

    echo $text;

    if ($appendIcon) {
        render_component('icon', [
            'icon' => $appendIcon,
            'style' => 'pointer-events-none'
        ]);
    }

    ?>

</a>