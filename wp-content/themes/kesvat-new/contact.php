<?php
/**
 * Template Name: Contact
 */

get_header();


$headerImage = get_field('header_image' , get_queried_object());
require "blocks/header-image.php";


$contactFormSubTitle = get_field('contact_form_sub_title' , get_queried_object());
$contactFormMainTitle = get_field('contact_form_main_title' , get_queried_object());
$contactFormDescription = get_field('contact_form_description' , get_queried_object());
$contactFormFirstNamePlaceholder = get_field('first_name' , get_queried_object());
$contactFormLastNamePlaceholder = get_field('last_name' , get_queried_object());
$contactFormEmailPlaceholder = get_field('email_address' , get_queried_object());
$contactFormPhonePlaceholder = get_field('phone_number' , get_queried_object());
$contactFormMessagePlaceholder = get_field('message' , get_queried_object());
$contactFormButtonTitle = get_field('submit' , get_queried_object());
require "blocks/contact-form.php";
require "blocks/google-map.php";

get_footer(); ?>