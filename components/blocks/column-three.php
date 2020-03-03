<?php
/* Row*/
$rc = get_sub_field('row_class');
$rbc = get_sub_field('row_background_color');
$rbi = get_sub_field('row_background_image');

/*Col 1*/
$content1 = get_sub_field('column_1_content');
$c1c = get_sub_field('column_1_class');
$c1a = get_sub_field('column_1_alignment');
$c1bc = get_sub_field('col1_background_color');
$c1fc = get_sub_field('col1_font_color');
$c1fs = get_sub_field('col1_font_size');
$c1ta = get_sub_field('col1_text_align');
$c1pad = get_sub_field('col1_padding');

/*Col 2*/
$content2 = get_sub_field('column_2_content');
$c2c = get_sub_field('column_2_class');
$c2a = get_sub_field('column_2_alignment');
$c2bc = get_sub_field('col2_background_color');
$c2fc = get_sub_field('col2_font_color');
$c2fs = get_sub_field('col2_font_size');
$c2ta = get_sub_field('col2_text_align');
$c2pad = get_sub_field('col2_padding');

/*Col 3*/
$content3 = get_sub_field('column_3_content');
$c3c = get_sub_field('column_3_class');
$c3a = get_sub_field('column_3_alignment');
$c3bc = get_sub_field('col3_background_color');
$c3fc = get_sub_field('col3_font_color');
$c3fs = get_sub_field('col3_font_size');
$c3ta = get_sub_field('col3_text_align');
$c3pad = get_sub_field('col3_padding');

/* Row */
echo '<section class="row sh-row ' . $rc . '" data-bg="' . $rbi . '" data-bgc="' . $rbc . '">';
/* Col 1 */
if ($c1a && in_array('Vertical Align', $c1a)) {
    echo '<div class="' . $c1c . ' ' . $c1ta . ' sh-col tbl" data-color="' . $c1fc . '" data-size="' . $c1fs . '" data-bgc="' . $c1bc . '">';
    echo '<div class="inner ' . $c1ta . ' ' . $c1pad . ' ">';
    echo $content1;
    echo '</div>';
    echo '</div>';
} else {
    echo '<div class="' . $c1c . ' ' . $c1ta . ' sh-col" data-color="' . $c1fc . '" data-size="' . $c1fs . '" data-bgc="' . $c1bc . '">';
    if ($c1pad) {
        echo '<div class="' . $c1pad . '">';
    }
    echo $content1;
    if ($c1pad) {
        echo '</div>';
    }
    echo '</div>';
}

/* Col 2 */
if ($c2a && in_array('Vertical Align', $c2a)) {
    echo '<div class="' . $c2c . ' ' . $c2ta . ' sh-col tbl"  data-color="' . $c2fc . '" data-size="' . $c2fs . '" data-bgc="' . $c2bc . '">';
    echo '<div class="inner ' . $c2ta . ' ' . $c2pad . ' ">';
    echo $content2;
    echo '</div>';
    echo '</div>';
} else {
    echo '<div class="' . $c2c . ' ' . $c2ta . ' sh-col "  data-color="' . $c2fc . '" data-size="' . $c2fs . '" data-bgc="' . $c2bc . '">';
    if ($c2pad) {
        echo '<div class="' . $c2pad . '">';
    }
    echo $content2;
    if ($c2pad) {
        echo '</div>';
    }
    echo '</div>';
}

/* Col 3 */
if ($c3a && in_array('Vertical Align', $c3a)) {
    echo '<div class="' . $c3c . ' ' . $c3ta . ' sh-col tbl"  data-color="' . $c3fc . '" data-size="' . $c3fs . '" data-bgc="' . $c3bc . '">';
    echo '<div class="inner ' . $c3ta . ' ' . $c3pad . ' ">';
    echo $content3;
    echo '</div>';
    echo '</div>';
} else {
    echo '<div class="' . $c3c . ' ' . $c3ta . ' sh-col " data-color="' . $c3fc . '" data-size="' . $c3fs . '" data-bgc="' . $c3bc . '">';
    if ($c3pad) {
        echo '<div class="' . $c3pad . '">';
    }
    echo $content3;
    if ($c3pad) {
        echo '</div>';
    }
    echo '</div>';
}

echo '</section>';
