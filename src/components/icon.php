<?php

/**
 * 
 * #Documentation
 * 
 * ##Component props
 * |Prop|Allowed values|
 * |name|The icon name on Google Font Icon|
 * |style|Tailwind CSS classes|
 * 
 */

/**
 * 
 * Component definitions
 */
$name = $name ?? null;
$style = $style ?? null;

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
<?php endif; ?>