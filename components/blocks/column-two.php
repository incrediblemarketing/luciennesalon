<?php
/* Row*/
$rc = get_sub_field('row_class');
$rbc = get_sub_field('row_background_color');
$rbi = get_sub_field('row_background_image');
$svg = get_sub_field('svg_background');

/*Col 1*/
$content1 = get_sub_field('column_1_content');
$c1c = get_sub_field('column_1_class');
$c1a = get_sub_field('column_1_alignment');
$c1bc = get_sub_field('col1_background_color');
$c1bi = get_sub_field('col1_background_image');
$c1fc = get_sub_field('col1_font_color');
$c1fs = get_sub_field('col1_font_size');
$c1ta = get_sub_field('col1_text_align');
$c1pad = get_sub_field('col1_padding');
$cd = get_sub_field('column_design');

/*Col 2*/
$content2 = get_sub_field('column_2_content');
$c2c = get_sub_field('column_2_class');
$c2a = get_sub_field('column_2_alignment');
$c2bc = get_sub_field('col2_background_color');
$c2bi = get_sub_field('col2_background_image');
$c2fc = get_sub_field('col2_font_color');
$c2fs = get_sub_field('col2_font_size');
$c2ta = get_sub_field('col2_text_align');
$c2pad = get_sub_field('col2_padding');
$cd2 = get_sub_field('column_2_design');

/* Row */
echo '<section class="row sh-row no-overflow ' . $rc . '" data-bg="' . $rbi . '" data-bgc="' . $rbc . '">';
if ($svg === 'slant-right') {
    echo '
							<div class="slant-right">
								<svg viewbox="0 0 160 160" preserveAspectRatio="xMinYMin meet">
									<polygon points="160,0 160,160 0,0"></polygon>
								</svg>
							</div>';
}
if ($svg === 'slant-left') {
    echo '
							<div class="slant-left">
								<svg viewbox="0 0 160 160" preserveAspectRatio="xMinYMin meet">
									<polygon points="0,160 0,0 160,160"></polygon>
								</svg>
							</div>';
}
/* Col 1 */
if ($c1a && in_array('Vertical Align', $c1a)) {
    echo '<div class="' . $c1c . ' ' . $c1ta . ' sh-col tbl" data-bg="' . $c1bi . '" data-color="' . $c1fc . '" data-size="' . $c1fs . '" data-bgc="' . $c1bc . '">';
    echo '<div class="inner ' . $c1ta . ' ' . $c1pad . ' ">';
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
    echo $content1;
    if ($cd !== 'default') {
        echo '</div>';
    }
    if ($cd === 'card' || $cd === 'card2' || $cd === 'card3') {
        echo '</div>';
    }
    echo '</div>';
    echo '</div>';
} else {
    echo '<div class="' . $c1c . ' ' . $c1ta . ' sh-col" data-bg="' . $c1bi . '" data-color="' . $c1fc . '" data-size="' . $c1fs . '" data-bgc="' . $c1bc . '">';
    if ($c1pad) {
        echo '<div class="' . $c1pad . '">';
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
    echo $content1;
    if ($cd !== 'default') {
        echo '</div>';
    }
    if ($cd === 'card' || $cd === 'card2' || $cd === 'card3') {
        echo '</div>';
    }
    if ($c1pad) {
        echo '</div>';
    }
    echo '</div>';
}

/* Col 2 */
if ($c2a && in_array('Vertical Align', $c2a)) {
    echo '<div class="' . $c2c . ' ' . $c2ta . ' sh-col tbl" data-bg="' . $c2bi . '" data-color="' . $c2fc . '" data-size="' . $c2fs . '" data-bgc="' . $c2bc . '">';
    echo '<div class="inner ' . $c2ta . ' ' . $c2pad . ' ">';
    if ($cd2 === 'card') {
        echo '<div class="card-background"><div class="card-background-bottom">';
    } elseif ($cd2 === 'card2') {
        echo '<div class="card-background secondary-corners"><div class="card-background-bottom secondary-corners">';
    } elseif ($cd2 === 'card3') {
        echo '<div class="card-background tertiary-corner"><div class="card-background-bottom tertiary-corner">';
    } elseif ($cd2 === 'block') {
        echo '<div class="inner-block">';
    } elseif ($cd2 === 'quotes') {
        echo '<div class="quotes">';
    }
    echo $content2;
    if ($cd2 !== 'default') {
        echo '</div>';
    }
    if ($cd2 === 'card' || $cd2 === 'card2' || $cd2 === 'card3') {
        echo '</div>';
    }
    echo '</div>';
    echo '</div>';
} else {
    echo '<div class="' . $c2c . ' ' . $c2ta . ' sh-col " data-bg="' . $c2bi . '" data-color="' . $c2fc . '" data-size="' . $c2fs . '" data-bgc="' . $c2bc . '">';
    if ($c2pad) {
        echo '<div class="' . $c2pad . '">';
    }
    if ($cd2 === 'card') {
        echo '<div class="card-background"><div class="card-background-bottom">';
    } elseif ($cd2 === 'card2') {
        echo '<div class="card-background secondary-corners"><div class="card-background-bottom secondary-corners">';
    } elseif ($cd2 === 'card3') {
        echo '<div class="card-background tertiary-corner"><div class="card-background-bottom tertiary-corner">';
    } elseif ($cd2 === 'block') {
        echo '<div class="inner-block">';
    } elseif ($cd2 === 'quotes') {
        echo '<div class="quotes">';
    }
    echo $content2;
    if ($cd2 !== 'default') {
        echo '</div>';
    }
    if ($cd2 === 'card' || $cd2 === 'card2' || $cd2 === 'card3') {
        echo '</div>';
    }
    if ($c2pad) {
        echo '</div>';
    }
    echo '</div>';
}

echo '</section>';
