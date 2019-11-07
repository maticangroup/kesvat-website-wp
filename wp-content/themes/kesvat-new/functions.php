<?php
//Auto update
add_filter('auto_update_plugin', '__return_true');

require 'theme/Bootstrap.php';
require "localization.php";
require "theme/helper/theme_helper.php";

//Start General Settings
add_action('init', function () {
    if (function_exists('add_theme_support')) {
        add_theme_support('post-thumbnails');
    }
});
if (function_exists('acf_add_options_page')) {
    $parent = acf_add_options_page(array('page_title' => pll__('general_settings'),
        'menu_title' => pll__('general_settings'),
        'menu_slug' => 'theme-general-settings',
        'capability' => 'edit_posts',
        'redirect' => FALSE));
}
//End General Setting

//Start Remove editor section from some page
add_action('admin_head', 'hide_editor');
function hide_editor()
{
    $template_file = basename(get_page_template());
    if ($template_file == 'index.php' || $template_file == 'about.php' || $template_file == 'contact.php' ||  $template_file == 'news-overview.php' || $template_file == 'album-overview.php' || $template_file == 'video-overview.php' || $template_file == 'blog-overview.php') {
        remove_post_type_support('page', 'editor');
    }
}

add_action('init', 'init_remove_support', 100);
function init_remove_support()
{
    $post_type = 'post';
    remove_post_type_support($post_type, 'editor');
}

//End Remove editor section from some page

//Start Startup Post Type
function revcon_change_post_label()
{
    global $menu;
    global $submenu;
    $menu[5][0] = pll__('default_post_type');
    $submenu['edit.php'][5][0] = pll__('default_post_type');
    $submenu['edit.php'][10][0] = pll__('add_default_post_type');
    $submenu['edit.php'][16][0] = pll__('default_post_type_tag');
}

function revcon_change_post_object()
{
    global $wp_post_types;
    $labels = &$wp_post_types['post']->labels;
    $labels->name = pll__('default_post_type');
    $labels->singular_name = pll__('default_post_type');
    $labels->add_new = pll__('add_default_post_type');
    $labels->add_new_item = pll__('add_default_post_type');
    $labels->edit_item = pll__('edit_default_post_type');
    $labels->new_item = pll__('default_post_type');
    $labels->view_item = pll__('view_default_post_type');
    $labels->search_items = pll__('search_default_post_type');
    $labels->not_found = pll__('not_found_default_post_type');
    $labels->not_found_in_trash = pll__('not_found_default_post_type');
    $labels->all_items = pll__('all_default_post_type');
    $labels->menu_name = pll__('default_post_type');
    $labels->name_admin_bar = pll__('default_post_type');
}

add_action('admin_menu', 'revcon_change_post_label');
add_action('init', 'revcon_change_post_object');

function revcon_change_post_objects()
{
    global $wp_post_types;
    $labels = &$wp_post_types['post'];
    $labels->menu_icon = 'dashicons-clipboard';
}

add_filter('init', 'revcon_change_post_objects');
//End Startup Post Type


//Start Register Menu
register_nav_menus(array(
    'header_menu' => pll__('header_menu'),
));
//End Register Menu


//Start Register Artists
$labels = array(
    'name' => pll__('artists'),
    'singular_name' => pll__('artists'),
    'search_items' => pll__('search_artists'),
    'all_items' => pll__('all_artists'),
    'parent_item' => pll__('parent_artists'),
    'parent_item_colon' => pll__('parent_artists'),
    'edit_item' => pll__('edit_artists'),
    'update_item' => pll__('update_artists'),
    'add_new_item' => pll__('add_artists'),
    'new_item_name' => pll__('new_artists'),
    'menu_name' => pll__('artists'),
);

$args = array(
    'public' => true,
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array('slug' => 'artists'),
);

register_taxonomy('artists', array('post'), $args);
//Start Register Artists

//Start Album Post Type
$labels = array(
    'name' => pll__('blog_post_type'),
    'singular_name' => pll__('blog_post_type'),
    'menu_name' => pll__('blog_post_type'),
    'name_admin_bar' => pll__('blog_post_type'),
    'add_new' => pll__('add_blog_post_type'),
    'add_new_item' => pll__('add_blog_post_type'),
    'new_item' => pll__('new_blog_post_type'),
    'edit_item' => pll__('edit_blog_post_type'),
    'view_item' => pll__('view_blog_post_type'),
    'all_items' => pll__('all_blog_post_type'),
    'search_items' => pll__('search_blog_post_type'),
    'not_found' => pll__('not_fount_blog_post_type'),
    'not_found_in_trash' => pll__('not_fount_blog_post_type')
);

$args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'query_var' => true,
    'rewrite' => array('slug' => 'blog'),
    'exclude_from_search' => false,
    'has_archive' => true,
    'hierarchical' => false,
    'menu_position' => null,
    'menu_icon' => 'dashicons-edit',
    'supports' => array('title')
);

register_post_type('blog', $args);
//End Album Post Type

//Start Album Post Type
$labels = array(
    'name' => pll__('album_post_type'),
    'singular_name' => pll__('album_post_type'),
    'menu_name' => pll__('album_post_type'),
    'name_admin_bar' => pll__('album_post_type'),
    'add_new' => pll__('add_album_post_type'),
    'add_new_item' => pll__('add_album_post_type'),
    'new_item' => pll__('new_album_post_type'),
    'edit_item' => pll__('edit_album_post_type'),
    'view_item' => pll__('view_album_post_type'),
    'all_items' => pll__('all_album_post_type'),
    'search_items' => pll__('search_album_post_type'),
    'not_found' => pll__('not_fount_album_post_type'),
    'not_found_in_trash' => pll__('not_fount_album_post_type')
);

$args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'query_var' => true,
    'rewrite' => array('slug' => 'album'),
    'exclude_from_search' => false,
    'has_archive' => true,
    'hierarchical' => false,
    'menu_position' => null,
    'menu_icon' => 'dashicons-images-alt2',
    'supports' => array('title')
);

register_post_type('album', $args);
//End Album Post Type

//Start Video Post Type
$labels = array(
    'name' => pll__('video_post_type'),
    'singular_name' => pll__('video_post_type'),
    'menu_name' => pll__('video_post_type'),
    'name_admin_bar' => pll__('video_post_type'),
    'add_new' => pll__('add_video_post_type'),
    'add_new_item' => pll__('add_video_post_type'),
    'new_item' => pll__('new_video_post_type'),
    'edit_item' => pll__('edit_video_post_type'),
    'view_item' => pll__('view_video_post_type'),
    'all_items' => pll__('all_video_post_type'),
    'search_items' => pll__('search_video_post_type'),
    'not_found' => pll__('not_fount_video_post_type'),
    'not_found_in_trash' => pll__('not_fount_video_post_type')
);

$args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'query_var' => true,
    'rewrite' => array('slug' => 'video'),
    'exclude_from_search' => false,
    'has_archive' => true,
    'hierarchical' => false,
    'menu_position' => null,
    'menu_icon' => 'dashicons-format-video',
    'supports' => array('title')
);

register_post_type('video', $args);
//End Video Post Type

//Start Testimonial Post Type
$labels = array(
    'name' => pll__('testimonial_post_type'),
    'singular_name' => pll__('testimonial_post_type'),
    'menu_name' => pll__('testimonial_post_type'),
    'name_admin_bar' => pll__('testimonial_post_type'),
    'add_new' => pll__('add_testimonial_post_type'),
    'add_new_item' => pll__('add_testimonial_post_type'),
    'new_item' => pll__('new_testimonial_post_type'),
    'edit_item' => pll__('edit_testimonial_post_type'),
    'view_item' => pll__('view_testimonial_post_type'),
    'all_items' => pll__('all_testimonial_post_type'),
    'search_items' => pll__('search_testimonial_post_type'),
    'not_found' => pll__('not_fount_testimonial_post_type'),
    'not_found_in_trash' => pll__('not_fount_testimonial_post_type')
);

$args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'query_var' => true,
    'rewrite' => array('slug' => 'testimonial'),
    'exclude_from_search' => false,
    'has_archive' => true,
    'hierarchical' => false,
    'menu_position' => null,
    'menu_icon' => 'dashicons-format-quote',
    'supports' => array('title')
);

register_post_type('testimonial', $args);
//End Testimonial Post Type

//Start Team Post Type
$labels = array(
    'name' => pll__('team_post_type'),
    'singular_name' => pll__('team_post_type'),
    'menu_name' => pll__('team_post_type'),
    'name_admin_bar' => pll__('team_post_type'),
    'add_new' => pll__('add_team_post_type'),
    'add_new_item' => pll__('add_team_post_type'),
    'new_item' => pll__('new_team_post_type'),
    'edit_item' => pll__('edit_team_post_type'),
    'view_item' => pll__('view_team_post_type'),
    'all_items' => pll__('all_team_post_type'),
    'search_items' => pll__('search_team_post_type'),
    'not_found' => pll__('not_fount_team_post_type'),
    'not_found_in_trash' => pll__('not_fount_team_post_type')
);

$args = array(
    'labels' => $labels,
    'public' => true,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'query_var' => true,
    'rewrite' => array('slug' => 'team'),
    'exclude_from_search' => false,
    'has_archive' => true,
    'hierarchical' => false,
    'menu_position' => null,
    'menu_icon' => 'dashicons-image-filter',
    'supports' => array('title')
);

register_post_type('team', $args);
//End Team Post Type

//Start Contact Form Post Type
$labels = array(
    'name' => pll__('contact_post_type'),
    'singular_name' => pll__('contact_post_type'),
    'menu_name' => pll__('contact_post_type'),
    'name_admin_bar' => pll__('contact_post_type'),
    'add_new' => pll__('add_contact_post_type'),
    'add_new_item' => pll__('add_contact_post_type'),
    'new_item' => pll__('new_contact_post_type'),
    'edit_item' => pll__('edit_contact_post_type'),
    'view_item' => pll__('view_contact_post_type'),
    'all_items' => pll__('all_contact_post_type'),
    'search_items' => pll__('search_contact_post_type'),
    'not_found' => pll__('not_fount_contact_post_type'),
    'not_found_in_trash' => pll__('not_fount_contact_post_type')
);

$args = array(
    'labels' => $labels,
    'public' => false,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'query_var' => true,
    'rewrite' => array('slug' => 'contact-form'),
    'exclude_from_search' => false,
    'has_archive' => true,
    'hierarchical' => false,
    'menu_position' => null,
    'menu_icon' => 'dashicons-email',
    'supports' => array('title', 'editor')
);

register_post_type('contact-form', $args);
//End Contact Form Post Type


//Start Subscribe Post Type
$labels = array(
    'name' => pll__('subscribe_post_type'),
    'singular_name' => pll__('subscribe_post_type'),
    'menu_name' => pll__('subscribe_post_type'),
    'name_admin_bar' => pll__('subscribe_post_type'),
    'add_new' => pll__('add_subscribe_post_type'),
    'add_new_item' => pll__('add_subscribe_post_type'),
    'new_item' => pll__('new_subscribe_post_type'),
    'edit_item' => pll__('edit_subscribe_post_type'),
    'view_item' => pll__('view_subscribe_post_type'),
    'all_items' => pll__('all_subscribe_post_type'),
    'search_items' => pll__('search_subscribe_post_type'),
    'not_found' => pll__('not_fount_subscribe_post_type'),
    'not_found_in_trash' => pll__('not_fount_subscribe_post_type')
);

$args = array(
    'labels' => $labels,
    'public' => false,
    'publicly_queryable' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'query_var' => true,
    'rewrite' => array('slug' => 'subscribe'),
    'exclude_from_search' => false,
    'has_archive' => true,
    'hierarchical' => false,
    'menu_position' => null,
    'menu_icon' => 'dashicons-email',
    'supports' => array('title', 'editor')
);

register_post_type('subscribe', $args);
//End Subscribe Post Type


//Image Sizes
$homeSliderImage = [
    'mobile' => ['width' => 1920, 'height' => 1080],
    'tablet' => ['width' => 1920, 'height' => 1080],
    'pc' => ['width' => 1920, 'height' => 1080]
];
bgl_helper::add_custom_image_size('home_slider', $homeSliderImage);

$instituteSloganImage = [
    'mobile' => ['width' => 470, 'height' => 378],
    'tablet' => ['width' => 470, 'height' => 378],
    'pc' => ['width' => 470, 'height' => 378]
];
bgl_helper::add_custom_image_size('institute_slogan_image', $instituteSloganImage);

$introductionVideoImageSize = [
    'mobile' => ['width' => 1170, 'height' => 550],
    'tablet' => ['width' => 1170, 'height' => 550],
    'pc' => ['width' => 1170, 'height' => 550]
];
bgl_helper::add_custom_image_size('introduction_image_size', $introductionVideoImageSize);

$artFieldsImageSize = [
    'mobile' => ['width' => 370, 'height' => 426],
    'tablet' => ['width' => 370, 'height' => 426],
    'pc' => ['width' => 370, 'height' => 426]
];
bgl_helper::add_custom_image_size('art_fields_image_size', $artFieldsImageSize);

$testimonialImageSize = [
    'mobile' => ['width' => 100, 'height' => 100],
    'tablet' => ['width' => 100, 'height' => 100],
    'pc' => ['width' => 100, 'height' => 100]
];
bgl_helper::add_custom_image_size('testimonial_image_size', $testimonialImageSize);

$trustClientImageSize = [
    'mobile' => ['width' => 770, 'height' => 687],
    'tablet' => ['width' => 770, 'height' => 687],
    'pc' => ['width' => 770, 'height' => 687]
];
bgl_helper::add_custom_image_size('trust_client_image_size', $trustClientImageSize);

$newsThumbnailImageSize = [
    'mobile' => ['width' => 370, 'height' => 305],
    'tablet' => ['width' => 370, 'height' => 305],
    'pc' => ['width' => 370, 'height' => 305]
];
bgl_helper::add_custom_image_size('news_thumbnail_image_size', $newsThumbnailImageSize);

$newsBiggerThumbnailImageSize = [
    'mobile' => ['width' => 770, 'height' => 305],
    'tablet' => ['width' => 770, 'height' => 305],
    'pc' => ['width' => 770, 'height' => 305]
];
bgl_helper::add_custom_image_size('news_bigger_thumbnail_image_size', $newsBiggerThumbnailImageSize);

$flexibleContentImage12 = [
    'mobile' => ['width' => 1920, 'height' => 1080],
    'tablet' => ['width' => 1920, 'height' => 1080],
    'pc' => ['width' => 1920, 'height' => 1080]
];
bgl_helper::add_custom_image_size('flexible_content_image_12', $flexibleContentImage12);

$flexibleContentImage6 = [
    'mobile' => ['width' => 960, 'height' => 540],
    'tablet' => ['width' => 960, 'height' => 540],
    'pc' => ['width' => 960, 'height' => 540]
];
bgl_helper::add_custom_image_size('flexible_content_image_6', $flexibleContentImage6);

$flexibleContentImage4 = [
    'mobile' => ['width' => 640, 'height' => 360],
    'tablet' => ['width' => 640, 'height' => 360],
    'pc' => ['width' => 640, 'height' => 360]
];
bgl_helper::add_custom_image_size('flexible_content_image_4', $flexibleContentImage4);

$headerImageSize = [
    'mobile' => ['width' => 1920, 'height' => 465],
    'tablet' => ['width' => 1920, 'height' => 465],
    'pc' => ['width' => 1920, 'height' => 465]
];
bgl_helper::add_custom_image_size('header_image_size', $headerImageSize);

$teamImageSize = [
    'mobile' => ['width' => 370, 'height' => 409],
    'tablet' => ['width' => 370, 'height' => 409],
    'pc' => ['width' => 370, 'height' => 409]
];
bgl_helper::add_custom_image_size('team_image_size', $teamImageSize);

$artistImagesSize = [
    'mobile' => ['width' => 770, 'height' => 532],
    'tablet' => ['width' => 770, 'height' => 532],
    'pc' => ['width' => 770, 'height' => 532]
];
bgl_helper::add_custom_image_size('artist_images_size', $artistImagesSize);

$logoImageSize = [
    'mobile' => ['width' => 999, 'height' => 100],
    'tablet' => ['width' => 999, 'height' => 100],
    'pc' => ['width' => 999, 'height' => 100]
];
bgl_helper::add_custom_logo_size('logo_image_size', $logoImageSize);

$shortcutImageSize = [
    'mobile' => ['width' => 65, 'height' => 65],
    'tablet' => ['width' => 65, 'height' => 65],
    'pc' => ['width' => 65, 'height' => 65]
];
bgl_helper::add_custom_logo_size('short_image_size', $shortcutImageSize);

$instituteLogoImage = [
    'mobile' => ['width' => 490, 'height' => 378],
    'tablet' => ['width' => 490, 'height' => 378],
    'pc' => ['width' => 490, 'height' => 378]
];
bgl_helper::add_custom_image_size('institute_logo_image', $instituteLogoImage);
//Image Sizes


//Start Delete Menu/Submenu
function as_remove_menus()
{
    $user = wp_get_current_user();
    if (in_array('customer', (array)$user->roles)) {
        remove_submenu_page('themes.php', 'customize.php');
        global $submenu;
        global $menu;

        unset($menu[75]);//Tools
        unset($menu[25]);//Comments
        unset($menu["80.025"]);//Custom Fields
        unset($menu["99.31337"]);//Yoast Seo
        unset($submenu['themes.php'][6]);
        unset($submenu['themes.php'][5]);
        unset($submenu['options-general.php'][15]);
        unset($submenu['options-general.php'][20]);
        unset($submenu['options-general.php'][25]);
        unset($submenu['options-general.php'][30]);
        unset($submenu['options-general.php'][40]);
        unset($submenu['options-general.php'][41]);
        unset($submenu['options-general.php'][42]);
        unset($submenu['options-general.php'][43]);
        unset($submenu['options-general.php'][45]);
        unset($submenu['options-general.php'][46]);
    }
}

add_action('admin_menu', 'as_remove_menus');
//End Delete Menu/Submenu

add_filter( 'default_title', function() {
    return 'My default title';
} );