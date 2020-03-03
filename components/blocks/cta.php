<?php
$content = get_sub_field('column_1_content');
$rc = get_sub_field('row_class');
$c1c = get_sub_field('column_1_class');
$bc = get_sub_field('background_color');
$fc = get_sub_field('font_color');
$fs = get_sub_field('font_size');
$ta = get_sub_field('text_align');
$pad = get_sub_field('padding');
$bt = get_sub_field('button_text');
$bu = get_sub_field('button_url');
echo '<div class="row cta justify-content-center' . $rc . '" data-color="' . $fc . '" data-size="' . $fs . '" data-bgc="' . $bc . '">';
echo '<div class="col-md-10 col-12' . $c1c . ' ' . $ta  . '">';
echo '<div class="pad-sm">';
echo $content;
if ($bt && $bu) {
    echo '<a href="' . $bu . '" class="btn btn-primary" data-color="' . $fc . '">' . $bt . '</a>';
}
echo '</div>';
echo '</div>';
echo '</div>';
