<?php
$title = get_sub_field('title');
$rc = get_sub_field('row_class');
$c1c = get_sub_field('column_1_class');
$bc = get_sub_field('background_color');
$fc = get_sub_field('font_color');
$fs = get_sub_field('font_size');
$ta = get_sub_field('text_align');
$pad = get_sub_field('padding');
$bt = get_sub_field('button_text');
$bu = get_sub_field('button_url');
echo '<section class="row sh-row faqs ' . $rc . '" data-color="' . $fc . '" data-size="' . $fs . '" data-bgc="' . $bc . '">';
echo '<div class="' . $c1c . ' ' . $ta  . ' sh-col">';
if ($pad) {
    echo '<div class="' . $pad . '">';
}
echo '<h3>' . $title . '</h3>';
if (have_rows('q_a')) :
    echo '<div id="accordion" class="panel-group">';
    $f = 0;
    while (have_rows('q_a')) : the_row();
        $q = get_sub_field('question');
        $a = get_sub_field('answer');
        echo '<div class="panel panel-default">';
        echo '<div class="panel-heading"><h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#collapse' . $f . '">' . $q . ' <i class="fas fa-chevron-down"></i></a></h4></div>';
        echo '<div id="collapse' . $f . '" class="panel-collapse collapse"><div class="panel-body"><p>' . $a . '</p></div></div>';
        echo '</div>';
        $f++;
    endwhile;
    echo '</div>';
endif;
if ($pad) {
    echo '</div>';
}
echo '</div>';
echo '</section>';
