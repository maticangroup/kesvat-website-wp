<?php
if (get_queried_object()->post_type == "post"):
    get_header();

    $headerImage = get_field('header_image', get_queried_object());
    require "blocks/header-image.php";

//    $newsDate = get_field('news_date', get_queried_object());
//    require "blocks/single-news-date.php";

    $rows = get_field('rows', get_queried_object());
    require "blocks/flexible-content.php";


    $newsSubTitle = get_field('latest_news_sub_tile', pll__('home_id'));
    $newsMainTitle = get_field('latest_news_main_title', pll__('home_id'));
    $newsDescription = get_field('latest_news_description', pll__('home_id'));
    $news = get_posts([
        'posts_per_page' => 3,
        'post_type' => 'post',
        'post_status' => 'publish',
        'orderby' => 'date',
        'order' => 'DESC'
    ]);
    require "blocks/latest-news.php";
    get_footer();
elseif (get_queried_object()->post_type == "video"):
    get_header();

    $headerImage = get_field('header_image', get_queried_object());
    require "blocks/header-image.php";

    $videoType = get_field('video_post_type_type', get_queried_object());
    if ($videoType['value'] == "local"):
        $localVideo = get_field('video_type_local_video', get_queried_object());
        require "blocks/local-video.php";
    else:
        $aparatVideo = get_field('video_type_aparat_video', get_queried_object());
        require "blocks/aparat-video.php";
    endif;

    $rows = get_field('rows', get_queried_object());
    require "blocks/flexible-content.php";
    get_footer();
elseif (get_queried_object()->post_type == "album"):
    get_header();

    $headerImage = get_field('header_image', get_queried_object());
    require "blocks/header-image.php";

    $albumImages = get_field('album_images', get_queried_object());
    require "blocks/album.php";

    $rows = get_field('rows', get_queried_object());
    require "blocks/flexible-content.php";
    get_footer();
elseif (get_queried_object()->post_type == "blog"):
    if (isset($_REQUEST['raw'])) {
        $rows = get_field('rows', get_queried_object());
        require "blocks/flexible-content.php";
    } else {
        get_header();
        $headerImage = get_field('header_image', get_queried_object());
        require "blocks/header-image.php";

        $blogDate = get_field('blog_date', get_queried_object());
        require "blocks/single-blog-date.php";

        $rows = get_field('rows', get_queried_object());
        require "blocks/flexible-content.php";


        $newsSubTitle = get_field('latest_news_sub_tile', pll__('home_id'));
        $newsMainTitle = get_field('latest_news_main_title', pll__('home_id'));
        $newsDescription = get_field('latest_news_description', pll__('home_id'));
        $news = get_posts([
            'posts_per_page' => 3,
            'post_type' => 'blog',
            'post_status' => 'publish',
            'orderby' => 'date',
            'order' => 'DESC'
        ]);
        require "blocks/latest-blog.php";
        get_footer();
    }
endif;
?>
