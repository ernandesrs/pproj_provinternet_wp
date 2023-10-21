<?php

/**
 * 
 * #Documentation
 * 
 * ##Component props
 * |Prop|Allowed values|
 * |icon|The icon name on Google Font Icon, a valid svg or a full url to the icon|
 * |style|Tailwind CSS classes|
 * 
 */

/**
 * 
 * Component definitions
 */
$icon = $icon ?? null;
$name = null;
$svg = null;
$url = null;
$style = $style ?? null;

if ($icon) {
    if (str_starts_with($icon, 'http')) {
        $url = $icon;
    } else if (str_contains($icon, '<svg')) {
        $svg = $icon;
    } else {
        $name = $icon;
    }
}

/**
 * 
 * Style definitions
 * 
 */
$class = array_filter([
    'material-symbols-outlined',
    $style ?? ''
], function ($i) {
    return empty($i) ? null : $i;
});

?>

<?php if ($name): ?>
    <span class="<?= implode(' ', $class) ?>">
        <?= $name ?>
    </span>
<?php elseif ($svg): ?>
    <?= $svg ?>
<?php elseif ($url): ?>
    <img src="<?= $url ?>" alt="Icon">
<?php endif; ?>