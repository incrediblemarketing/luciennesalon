<?php
$procedures = get_sub_field('procedures');
$title = get_sub_field('title');
$content = get_sub_field('content');

$rc = get_sub_field('row_class');
$c1c = get_sub_field('column_1_class');
$bc = get_sub_field('background_color');
$bi = get_sub_field('background_image');
$fc = get_sub_field('font_color');
$fs = get_sub_field('font_size');
$ta = get_sub_field('text_align');
$pad = get_sub_field('padding');
$bt = get_sub_field('button_text');
$bu = get_sub_field('button_url');

echo '<section class="row block__procedure--boxlist ' . $rc . '" data-bg="' . $bi . '" data-color="' . $fc . '" data-size="' . $fs . '" data-bgc="' . $bc . '">';
echo '<div class="col-xl-4 offset-xl-6 col-lg-5 offset-lg-6 col-sm-6 offset-sm-6 ' . $c1c . ' ' . $ta  . '">';
echo '<h2 class="text-center">' . $title . '</h2>';

echo '<ul class="procedures">';

$mypages = get_pages(array('post_type' => 'procedure', 'parent' => 0, 'sort_order' => 'ASC', 'sort_column' => 'menu_order'));
$i = 0;

foreach ($mypages as $page) {
    $id = $page->ID; ?>
    <li>
        <h3><a href="<?php echo get_page_link($page->ID); ?>"><?php echo $page->post_title; ?></a></h3>

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
