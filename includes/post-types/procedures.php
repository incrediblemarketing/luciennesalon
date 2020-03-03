<?php

if (!function_exists('im_register_procedures')) {

    // Register Custom Post Type
    function im_register_procedures()
    {

        $labels = array(
            'name'                  => _x('Procedures', 'Post Type General Name', 'text_domain'),
            'singular_name'         => _x('Procedure', 'Post Type Singular Name', 'text_domain'),
            'menu_name'             => __('Procedures', 'text_domain'),
            'name_admin_bar'        => __('Procedure', 'text_domain'),
            'archives'              => __('Procedure Archives', 'text_domain'),
            'attributes'            => __('Procedure Attributes', 'text_domain'),
            'parent_item_colon'     => __('Parent Procedure:', 'text_domain'),
            'all_items'             => __('All Procedures', 'text_domain'),
            'add_new_item'          => __('Add New Procedure', 'text_domain'),
            'add_new'               => __('Add New', 'text_domain'),
            'new_item'              => __('New Procedure', 'text_domain'),
            'edit_item'             => __('Edit Procedure', 'text_domain'),
            'update_item'           => __('Update Procedure', 'text_domain'),
            'view_item'             => __('View Procedure', 'text_domain'),
            'view_items'            => __('View Procedures', 'text_domain'),
            'search_items'          => __('Search Procedure', 'text_domain'),
            'not_found'             => __('Not found', 'text_domain'),
            'not_found_in_trash'    => __('Not found in Trash', 'text_domain'),
            'featured_image'        => __('Featured Image', 'text_domain'),
            'set_featured_image'    => __('Set featured image', 'text_domain'),
            'remove_featured_image' => __('Remove featured image', 'text_domain'),
            'use_featured_image'    => __('Use as featured image', 'text_domain'),
            'insert_into_item'      => __('Insert into Procedure', 'text_domain'),
            'uploaded_to_this_item' => __('Uploaded to this Procedure', 'text_domain'),
            'items_list'            => __('Procedures list', 'text_domain'),
            'items_list_navigation' => __('Procedures list navigation', 'text_domain'),
            'filter_items_list'     => __('Filter Procedures list', 'text_domain'),
        );
        $args = array(
            'label'                 => __('Procedure', 'text_domain'),
            'description'           => __('Procedure Pages', 'text_domain'),
            'labels'                => $labels,
            'supports'              => array('title', 'editor', 'thumbnail', 'page-attributes', 'post-formats'),
            'hierarchical'          => true,
            'public'                => true,
            'show_ui'               => true,
            'show_in_menu'          => true,
            'menu_position'         => 5,
            'menu_icon'             => 'dashicons-index-card',
            'show_in_admin_bar'     => true,
            'show_in_nav_menus'     => true,
            'can_export'            => true,
            'has_archive'           => true,
            'exclude_from_search'   => false,
            'publicly_queryable'    => true,
            'capability_type'       => 'page',
            'show_in_rest'          => true,
        );
        register_post_type('procedure', $args);
    }
    add_action('init', 'im_register_procedures', 0);
}
