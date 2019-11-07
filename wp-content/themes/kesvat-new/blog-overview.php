<?php
/**
 * Template Name: Blog Overview
 */

get_header();


$headerImage = get_field('header_image', get_queried_object());
require "blocks/header-image.php";


$allNews = get_posts([
    'posts_per_page' => 999,
    'post_type' => 'blog',
    'post_status' => 'publish',
    'orderby' => 'date',
    'order' => 'DESC'
]);
require "blocks/all-blogs.php";

get_footer(); ?>