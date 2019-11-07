<?php
/**
 * Template Name: Album Overview
 */

get_header();


$headerImage = get_field('header_image' , get_queried_object());
require "blocks/header-image.php";



$videosAlbums = get_posts([
    'posts_per_page' => 999,
    'post_type' => 'album',
    'post_status' => 'publish',
    'orderby' => 'date',
    'order' => 'DESC'
]);
require "blocks/albums.php";

get_footer(); ?>