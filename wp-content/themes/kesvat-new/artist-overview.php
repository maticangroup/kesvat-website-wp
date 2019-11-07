<?php
/**
 * Template Name: Artist Overview
 */

get_header();


$headerImage = get_field('header_image', get_queried_object());
require "blocks/header-image.php";

$artFields = get_categories([
    'type' => 'post',
    'hide_empty' => false
]);
$artists = get_terms(array(
    'taxonomy' => 'artists',
    'hide_empty' => false,
));
require "blocks/artists.php";

get_footer(); ?>