<?php
if (have_rows('sections')) :
    while (have_rows('sections')) : the_row();

        /* HERO SECTION
			================================================*/
        if (get_row_layout() == 'home_slider') {
            echo get_template_part('components/blocks/home-slider');

            /* PAGE
			================================================*/
        } elseif (get_row_layout() == 'page') {
            echo get_template_part('components/blocks/page');

            /* GRID TILE 
			================================================*/
        } elseif (get_row_layout() == 'grid_tile_block') {
            echo get_template_part('components/blocks/grid_tile_block');

            /* RELATED POSTS
			================================================*/
        } elseif (get_row_layout() == 'related_posts') {
            echo get_template_part('components/blocks/related-posts');

            /* 1 COLUMN SECTION
			================================================*/
        } elseif (get_row_layout() == '1_column') {
            echo get_template_part('components/blocks/column-one');

            /* 2 COLUMN SECTION
			================================================*/
        } elseif (get_row_layout() == '2_column') {
            echo get_template_part('components/blocks/column-two');


            /* 3 COLUMN SECTION
			================================================*/
        } elseif (get_row_layout() == '3_column') {
            echo get_template_part('components/blocks/column-three');

            /* 4 COLUMN SECTION
			================================================*/
        } elseif (get_row_layout() == '4_column') {
            echo get_template_part('components/blocks/column-four');

            /* CALL TO ACTION
			================================================*/
        } elseif (get_row_layout() == 'call_to_action') {
            echo get_template_part('components/blocks/cta');

            /* PROCEDURES ROTATOR
			================================================*/
        } elseif (get_row_layout() == 'procedures_rotator') {
            $style = get_sub_field('procedure_style');

            /* Display Grid Columns */
            if ($style === 'grid-columns') :
                echo get_template_part('components/blocks/procedures/grid');

            /* Row with Text Hover Up */
            elseif ($style === 'grid') :
                echo get_template_part('components/blocks/procedures/grid-hover-up');

            /* Block List */
            elseif ($style === 'box-list') :
                echo get_template_part('components/blocks/procedures/box-list');

            /* Full Width Slider with Hover */
            elseif ($style === 'hover') :
                echo get_template_part('components/blocks/procedures/full-width-slider');

            /* Half Slider with Hover */
            elseif ($style === 'half') :
                echo get_template_part('components/blocks/procedures/half-width-slider');

            /* Accordians */
            elseif ($style === 'accordian') :
                echo get_template_part('components/blocks/procedures/accordian');

            /* Card Display */
            elseif ($style === 'card') :
                echo get_template_part('components/blocks/procedures/flip-card');

            endif;

            /* TESTIMONIALS ROTATOR
			======== = = ==== ==================================*/
        } elseif (get_row_layout() == 'testimonials_rotator') {
            echo get_template_part('components/blocks/testimonials');

            /*  FAQS
	 	 	================================================*/
        } elseif (get_row_layout() == 'faqs') {
            echo get_template_part('components/blocks/faqs');

            /*  Instagram Block
	 	 	================================================*/
        } elseif (get_row_layout() == 'instagram_block') {
            echo get_template_part('components/blocks/instagram_block');
        }
    endwhile;
endif;
