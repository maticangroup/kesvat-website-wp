<?php get_header();

$headerImage = get_field('header_image', get_queried_object());
require "blocks/header-image.php";

$artistImages = get_field('artist_images', get_queried_object());
$artistName = get_queried_object()->name;
$artistDescription = get_queried_object()->description;
$artistArtFields = get_field('art_fields', get_queried_object());
$artistBirthDate = get_field('artist_birth_date', get_queried_object());
$artistInstagram = get_field('artist_instagram', get_queried_object());
$artistFaceBook = get_field('artist_facebook', get_queried_object());
$artistTwitter = get_field('artist_twitter', get_queried_object());
$artistTelegram = get_field('artist_telegram', get_queried_object());
require "blocks/artist-info.php";


$rows = get_field('rows', get_queried_object());
require "blocks/flexible-content.php";


$newsSubTitle = pll__('artist_news_sub_title');
$newsMainTitle = pll__('artist_news_main_title');
$newsDescription = pll__('artist_news_description');
$args = array(
    'post_type' => 'post',
    'tax_query' => array(
        array(
            'taxonomy' => 'artists',
            'field' => 'term_id',
            'terms' => get_queried_object()->term_id
        )
    )
);
$news = new WP_Query( $args );
if ($news->post_count > 0) {
    $news = $news->posts;
    require "blocks/latest-news.php";
}




get_footer(); ?>