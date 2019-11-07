<?php
/**
 * Template Name: FAQ
 */

get_header();


$headerImage = get_field('header_image', get_queried_object());
require "blocks/header-image.php";


$rows = get_field('rows', get_queried_object());
require "blocks/flexible-content.php";


get_footer(); ?>
