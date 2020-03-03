<?php
$content = get_sub_field('tile_pages');
$rc = get_sub_field('row_class');
$c1c = get_sub_field('column_1_class');
$bc = get_sub_field('background_color');
$bi = get_sub_field('background_image');
$cd = get_sub_field('column_design');
$fc = get_sub_field('font_color');
$fs = get_sub_field('font_size');
$ta = get_sub_field('text_align');
$pad = get_sub_field('padding');
$bg = get_field('background_page_image', 'options');

echo '<section class="block__archive row ' . $rc . ' " data-bg="' . $bg . '" data-color="' . $fc . '" data-size="' . $fs . '" data-bgc="' . $bc . '">';
echo '<div class="' . $c1c . ' ' . $ta . '">';
if ($pad) {
    echo '<div class="' . $pad . '">';
}
echo '<h1>' . get_the_title() . '</h1>';
if ($content) : ?>
    <div class="grid">
        <?php foreach ($content as $post) : ?>
            <?php setup_postdata($post); ?>
            <div class="grid-tile">
                <a href="<?php echo get_the_permalink(); ?>">
                    <?php echo get_the_post_thumbnail($post->ID, 'procedure_thumb'); ?>
                    <h5><?php echo get_the_title(); ?></h5>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
    <?php wp_reset_postdata(); ?>
<?php endif;

if ($pad) {
    echo '</div>';
}
echo '</div>';
echo '</section>';
