<?php
/**
 * Template Name: Home
 */

get_header();

//$homeSliders = get_field('home_sliders', get_queried_object());
//require "blocks/home-slider.php";

$shortcutTitle = get_field('shortcut_title', get_queried_object());
$logo = get_field('shortcut_large_image', pll__('home_id'));
$shortcuts = get_field('shortcuts', get_queried_object());
require "blocks/shortcut.php";

$instituteSloganSubTitle = get_field('institute_slogan_sub_title', get_queried_object());
$instituteSloganMainTitle = get_field('institute_slogan_main_title', get_queried_object());
$instituteSloganDescription = get_field('institute_slogan_description', get_queried_object());
$instituteSloganHasButton = get_field('institute_slogan_has_button', get_queried_object());
$instituteSloganButton = get_field('institute_slogan_button', get_queried_object());
$instituteSloganImages = get_field('institute_slogan_images', get_queried_object());
require "blocks/home-institute-slogan.php";


$introductionVideoSubTitle = get_field('introduction_video_sub_title', get_queried_object());
$introductionVideoMainTitle = get_field('introduction_video_main_title', get_queried_object());
$introductionVideoDescription = get_field('introduction_video_description', get_queried_object());
$introductionVideoTitle = get_field('introduction_video_title', get_queried_object());
$introductionVideoImage = get_field('introduction_video_image', get_queried_object());
$introductionVideo = get_field('introduction_video', get_queried_object());
$subscribeSubTitle = get_field('subscribe_sub_title', get_queried_object());
$subscribeMainTitle = get_field('subscribe_main_title', get_queried_object());
$subscribePlaceholder = get_field('subscribe_placeholder', get_queried_object());
$subscribeButtonTitle = get_field('subscribe_button', get_queried_object());
require "blocks/home-Introduction-video.php";


//$artFieldsSubTitle = get_field('art_fields_sub_title', get_queried_object());
//$artFieldsMainTitle = get_field('art_fields_main_title', get_queried_object());
//$artFieldsDescription = get_field('art_fields_description', get_queried_object());
//$artFields = get_categories([
//    'type' => 'post',
//    'hide_empty' => false
//]);
//require "blocks/home-arts-fields.php";


$testimonialSubTitle = get_field('testimonial_sub_title', get_queried_object());
$testimonialMainTitle = get_field('testimonial_main_title', get_queried_object());
$testimonials = get_posts([
    'posts_per_page' => 50,
    'post_type' => 'testimonial',
    'post_status' => 'publish',
    'orderby' => 'date',
    'order' => 'DESC'
]);
require "blocks/home-testimonial.php";


$counters = get_field('counter', get_queried_object());
require "blocks/home-counter.php";


$trustClientsImage = get_field('trust_clients_image', get_queried_object());
$trustClientsTitle = get_field('trust_clients_title', get_queried_object());
$trustClientsDescription = get_field('trust_clients_description', get_queried_object());
$trustClientsHasButton = get_field('trust_clients_has_button', get_queried_object());
$trustClientsButton = get_field('trust_clients_button', get_queried_object());
require "blocks/home-trust-clients.php";


$artFields = get_categories([
    'type' => 'post',
    'hide_empty' => false
]);
$artists = get_terms(array(
    'taxonomy' => 'artists',
    'number' => 10,
    'hide_empty' => false,
));
require "blocks/artists.php";


$newsSubTitle = get_field('latest_news_sub_tile', get_queried_object());
$newsMainTitle = get_field('latest_news_main_title', get_queried_object());
$newsDescription = get_field('latest_news_description', get_queried_object());
$news = get_posts([
    'posts_per_page' => 3,
    'post_type' => 'post',
    'post_status' => 'publish',
    'orderby' => 'date',
    'order' => 'DESC'
]);
require "blocks/latest-news.php";


$blogSubTitle = get_field('latest_blog_sub_tile', get_queried_object());
$blogMainTitle = get_field('latest_blog_main_title', get_queried_object());
$blogDescription = get_field('latest_blog_description', get_queried_object());
$blogs = get_posts([
    'posts_per_page' => 3,
    'post_type' => 'blog',
    'post_status' => 'publish',
    'orderby' => 'date',
    'order' => 'DESC'
]);
require "blocks/latest-blog.php";


$latestVideosSubTitle = get_field('home_latest_videos_sub_title', get_queried_object());
$latestVideosMainTitle = get_field('home_latest_videos_main_title', get_queried_object());
$latestVideosDescription = get_field('home_latest_videos_description', get_queried_object());
$videos = get_posts([
    'posts_per_page' => 3,
    'post_type' => 'video',
    'post_status' => 'publish',
    'orderby' => 'date',
    'order' => 'DESC'
]);
require "blocks/latest-videos.php";


get_footer(); ?>