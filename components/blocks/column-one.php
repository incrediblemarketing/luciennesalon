<?php
$content = get_sub_field('column_1_content');
$rc = get_sub_field('row_class');
$c1c = get_sub_field('column_1_class');
$bc = get_sub_field('background_color');
$bi = get_sub_field('background_image');
$cd = get_sub_field('column_design');
$fc = get_sub_field('font_color');
$fs = get_sub_field('font_size');
$ta = get_sub_field('text_align');
$pad = get_sub_field('padding');

echo '<section class="row ' . $rc . ' " data-bg="' . $bi . '" data-color="' . $fc . '" data-size="' . $fs . '" data-bgc="' . $bc . '">';
echo '<div class="' . $c1c . ' ' . $ta . '">';
if ($pad) {
    echo '<div class="' . $pad . '">';
}
if ($cd === 'card') {
    echo '<div class="card-background"><div class="card-background-bottom">';
} elseif ($cd === 'card2') {
    echo '<div class="card-background secondary-corners"><div class="card-background-bottom secondary-corners">';
} elseif ($cd === 'card3') {
    echo '<div class="card-background tertiary-corner"><div class="card-background-bottom tertiary-corner">';
} elseif ($cd === 'block') {
    echo '<div class="inner-block">';
} elseif ($cd === 'quotes') {
    echo '<div class="quotes">';
}

echo $content;

if ($cd !== 'default') {
    echo '</div>';
}
if ($cd === 'card' || $cd === 'card2' || $cd === 'card3') {
    echo '</div>';
}
if ($pad) {
    echo '</div>';
}
echo '</div>';
echo '</section>';
