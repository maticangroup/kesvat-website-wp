<?php
/**
 * Template Name: About
 */

get_header();


$headerImage = get_field('header_image', get_queried_object());
require "blocks/header-image.php";


$rows = get_field('rows', get_queried_object());
require "blocks/flexible-content.php";

$testimonialSubTitle = get_field('testimonial_sub_title', pll__('home_id'));
$testimonialMainTitle = get_field('testimonial_main_title', pll__('home_id'));
$testimonials = get_posts([
    'posts_per_page' => 50,
    'post_type' => 'testimonial',
    'post_status' => 'publish',
    'orderby' => 'date',
    'order' => 'DESC'
]);
require "blocks/home-testimonial.php";

$counters = get_field('counter', pll__('home_id'));
require "blocks/home-counter.php";


$trustClientsImage = get_field('trust_clients_image', pll__('home_id'));
$trustClientsTitle = get_field('trust_clients_title', pll__('home_id'));
$trustClientsDescription = get_field('trust_clients_description', pll__('home_id'));
$trustClientsHasButton = get_field('trust_clients_has_button', pll__('home_id'));
$trustClientsButton = get_field('trust_clients_button', pll__('home_id'));
require "blocks/home-trust-clients.php";


$teamsSubTitle = get_field('teams_sub_title', get_queried_object());
$teamsMainTitle = get_field('teams_main_title', get_queried_object());
$teamsDescription = get_field('teams_description', get_queried_object());
$teams = get_posts([
    'posts_per_page' => 50,
    'post_type' => 'team',
    'post_status' => 'publish',
    'orderby' => 'date',
    'order' => 'DESC'
]);
require "blocks/team.php";

get_footer(); ?>
