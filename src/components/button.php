<?php

/**
 * 
 * #Documentation
 * 
 * ##Component props
 * |Prop|Allowed values|
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
    'large' => 'px-9 py-4 text-lg'
];

/**
 * 
 * Component definitions
 */
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
    'rounded-3xl',
    $size,
    $variant
];

?>

<a class="<?= implode(" ", $class) ?>" <?= implode(' ', $attributes) ?>>
    <?= $text ?>
</a>