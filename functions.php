<?php

// THEME SUPPORT
// ==================================================
require_once get_template_directory() . '/includes/theme-support.php';

// STYLES
// ==================================================
require_once get_template_directory() . '/includes/styles.php';

// SCRIPTS
// ==================================================
require_once get_template_directory() . '/includes/scripts.php';

// ADVANCED CUSTOM FIELDS
// ==================================================
require_once get_template_directory() . '/includes/acf/options-pages.php';
require_once get_template_directory() . '/includes/acf/populate-dynamic-fields.php';
require_once get_template_directory() . '/includes/acf/fields/unique-id.php';
require_once get_template_directory() . '/includes/acf/admin-styles.php';

// POST TYPES
// ==================================================
require_once get_template_directory() . '/includes/post-types/galleries.php';
require_once get_template_directory() . '/includes/post-types/procedures.php';
require_once get_template_directory() . '/includes/post-types/testimonials.php';
require_once get_template_directory() . '/includes/post-types/team-members.php';

// MENUS
// ==================================================
require_once get_template_directory() . '/includes/menus/header-menu.php';
require_once get_template_directory() . '/includes/menus/footer-menu.php';

// IMAGE SIZES
// ==================================================
require_once get_template_directory() . '/includes/image-sizes.php';

// CUSTOM FUNCTIONS
// ==================================================
require_once get_template_directory() . '/includes/custom-functions.php';

// FILTERS
// ==================================================
require_once get_template_directory() . '/includes/filters.php';

// SIDEBARS
// ==================================================
require_once get_template_directory() . '/includes/sidebars/blog.php';
require_once get_template_directory() . '/includes/sidebars/page_sidebar.php';

// SHORTCODES
// ==================================================
require_once get_template_directory() . '/includes/shortcodes/call_number.php';
require_once get_template_directory() . '/includes/shortcodes/reusable_block.php';
require_once get_template_directory() . '/includes/shortcodes/sidebar.php';
require_once get_template_directory() . '/includes/shortcodes/child_pages.php';
require_once get_template_directory() . '/includes/shortcodes/testimonials.php';
require_once get_template_directory() . '/includes/shortcodes/staff.php';

// PLUGINS
// ==================================================
require_once get_template_directory() . '/includes/plugins.php';

// UPDATE CHECKER
// ==================================================
// require_once get_template_directory() . '/includes/theme-updates/theme-update-checker.php';
// $im_update_checker = new ThemeUpdateChecker(
// 'incredibletheme',
// 'https://imcustomtheme.wpengine.com/incredible.json'
// );
