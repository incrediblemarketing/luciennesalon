<?php
$procedures = get_sub_field('procedures');
$title = get_sub_field('title');
$content = get_sub_field('content');

$rc = get_sub_field('row_class');
$c1c = get_sub_field('column_1_class');
$bc = get_sub_field('background_color');
$fc = get_sub_field('font_color');
$fs = get_sub_field('font_size');
$ta = get_sub_field('text_align');
$pad = get_sub_field('padding');
$bt = get_sub_field('button_text');
$bu = get_sub_field('button_url');

echo '<section class="row procedures-accordian ' . $rc . '" data-color="' . $fc . '" data-size="' . $fs . '" data-bgc="' . $bc . '">';
echo '<div class="col-12 nopad' . $c1c . ' ' . $ta  . ' sh-col">';
echo '<div class="procedures-title"><h3>' . $title . '</h3></div>';
echo '<ul class="procedures">';
$mypages = get_pages(array('post_type' => 'procedure', 'parent' => 0));
$i = 0;
foreach ($mypages as $page) {
    $id = $page->ID;
    $img = get_the_post_thumbnail_url($id, 'full-size'); ?>
    <li data-bg="<?php echo $img; ?>">
        <h3><?php echo $page->post_title; ?></h3>

        <ul class="sub-pages">
            <?php
            wp_list_pages(array(
                'title_li'    => '',
                'post_type'   => 'procedure',
                'child_of'    => $id
            ));
            ?>
        </ul>
    </li>
    <?php
    $i++;
}
echo '</ul>';
echo '</div>';
echo '</section>';
