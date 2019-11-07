<!DOCTYPE HTML>
<html lang="<?= bgl_helper::get_current_language(); ?>">
<head>
    <meta charset="UTF-8">
    <title><?= the_title(); ?></title>
    <meta name="viewport" content="width=device-width">

    <!-- Include All CSS here-->
    <link rel="stylesheet" type="text/css" href="<?= get_template_directory_uri(); ?>/css/bootstrap.css"/>
    <link rel="stylesheet" type="text/css" href="<?= get_template_directory_uri(); ?>/css/owl.carousel.css"/>
    <link rel="stylesheet" type="text/css" href="<?= get_template_directory_uri(); ?>/css/owl.theme.css"/>
    <link rel="stylesheet" type="text/css" href="<?= get_template_directory_uri(); ?>/css/font-awesome.min.css"/>
    <link rel="stylesheet" type="text/css" href="<?= get_template_directory_uri(); ?>/css/animate.css"/>
    <link rel="stylesheet" type="text/css" href="<?= get_template_directory_uri(); ?>/css/magnific-popup.css"/>
    <link rel="stylesheet" type="text/css" href="<?= get_template_directory_uri(); ?>/css/settings.css"/>
    <link rel="stylesheet" type="text/css" href="<?= get_template_directory_uri(); ?>/css/slick.css"/>
    <link rel="stylesheet" type="text/css" href="<?= get_template_directory_uri(); ?>/css/icons.css"/>
    <link rel="stylesheet" type="text/css" href="<?= get_template_directory_uri(); ?>/css/preset.css"/>
    <link rel="stylesheet" type="text/css" href="<?= get_template_directory_uri(); ?>/css/presets/color1.css"
          id="colorChange"/>
    <?php if (bgl_helper::get_current_language() == "en_US"): ?>
        <link rel="stylesheet" type="text/css" href="<?= get_template_directory_uri(); ?>/css/theme.css"/>
    <?php else: ?>
        <link rel="stylesheet" type="text/css" href="<?= get_template_directory_uri(); ?>/css/rtl.css"/>
    <?php endif; ?>
    <link rel="stylesheet" type="text/css" href="<?= get_template_directory_uri(); ?>/css/responsive.css"/>
    <!-- End Include All CSS -->

    <!-- Favicon Icon -->
    <link rel="icon" type="image/png" href="<?= get_template_directory_uri(); ?>/images/favicon.png">

    <script>
        let _info = {
            templateUrl: '<?php assets(''); ?>'
        }
    </script>

    <?php wp_head(); ?>
</head>
<body>
<!-- Preloading -->
<div class="preloader text-center">
    <div class="la-ball-circus la-2x">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
    </div>
</div>
<!-- Preloading -->

<!-- Header 01 -->
<?php $logo = get_field('logo', pll__('home_id')); ?>
<header class="header_01 black_color" id="header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2 col-sm-3 col-md-3">
                <div class="logo">
                    <a href="<?= get_the_permalink(pll__('home_id')); ?>"><img
                                src="<?= bgl_helper::get_image_url($logo, 'logo_image_size', $logoImageSize); ?>"
                                alt="<?= bgl_helper::get_logo_alt($logo); ?>"/></a>
                </div>
            </div>
            <div class="col-lg-8 col-sm-7 col-md-7">
                <nav class="mainmenu text-center">
                    <?php
                    $menu_name = "header_menu";
                    $location = get_nav_menu_locations();
                    $menu = wp_get_nav_menu_object($location[$menu_name]);
                    $menu_items = wp_get_nav_menu_items($menu);
                    ?>
                    <ul>
                        <?php
                        foreach ($menu_items as $menu_item):
                            $has_child = false;
                            foreach ($menu_items as $child):
                                if ($child->menu_item_parent == $menu_item->ID):
                                    $has_child = true;
                                endif;
                            endforeach;
                            if ($menu_item->menu_item_parent == 0):
                                $class = (get_queried_object_id() == $menu_item->object_id ? 'active' : '')
                                ?>
                                <li class="<?= ($has_child) ? "menu-item-has-children" : ""; ?>">
                                <a href="<?= $menu_item->url ?>">
                                    <?= $menu_item->title ?>
                                </a>
                            <?php endif;
                            ?>
                            <?php if ($has_child): ?>
                            <ul class="sub-menu">
                                <?php foreach ($menu_items as $value):
                                    if ($value->menu_item_parent == $menu_item->ID): ?>
                                        <li><a href="<?= $value->url ?>">
                                                <?= $value->title ?></a></li>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-2 col-sm-2 col-md-2">
                <div class="navigator text-right">
                    <!--                    <a class="search searchToggler" href="javascript:void(0);"><i class="mei-magnifying-glass"></i></a>-->
                    <a href="javascript:void(0);" class="menu mobilemenu hidden-sm hidden-md hidden-lg"><i
                                class="mei-menu"></i></a>
                    <a id="open-overlay-nav" class="menu hamburger hidden-xs" href="javascript:void(0);"><i
                                class="mei-menu"></i></a>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Header 01 -->

<!-- Search From -->
<!--<div class="searchFixed popupBG">-->
<!--    <div class="container-fluid">-->
<!--        <a href="" id="sfCloser" class="sfCloser"></a>-->
<!--        <div class="searchForms">-->
<!--            <div class="container">-->
<!--                <div class="row">-->
<!--                    <div class="col-lg-8 col-lg-offset-2">-->
<!--                        <form method="post" action="#">-->
<!--                            <input type="text" name="s" class="searchField" placeholder="Search here..."/>-->
<!--                            <button type="submit"><i class="fa fa-search"></i></button>-->
<!--                        </form>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->
<!-- Search From -->

<!-- PopUP Menu -->
<div class="popup popup__menu">
    <a href="" id="close-popup" class="close-popup"></a>
    <div class="container mobileContainer">
        <div class="row">
            <div class="col-lg-12 text-left">
                <div class="logo2">
                    <a href="<?= get_the_permalink(pll__('home_id')); ?>"><img
                                src="<?= bgl_helper::get_image_url($logo, 'logo_image_size', $logoImageSize); ?>"
                                alt="<?= bgl_helper::get_logo_alt($logo); ?>"></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="popup-inner">
                    <div class="dl-menu__wrap dl-menuwrapper">
                        <ul class="dl-menu dl-menuopen">
                            <?php
                            foreach ($menu_items as $menu_item):
                                $has_child = false;
                                foreach ($menu_items as $child):
                                    if ($child->menu_item_parent == $menu_item->ID):
                                        $has_child = true;
                                    endif;
                                endforeach;
                                if ($menu_item->menu_item_parent == 0):
//                                    $class = (get_queried_object_id() == $menu_item->object_id ? 'active' : '')
                                    ?>
                                    <li class="<?= ($has_child) ? "menu-item-has-children" : ""; ?>">
                                    <a href="<?= $menu_item->url ?>"><?= $menu_item->title ?></a>

                                <?php endif; ?>
                                <?php if ($has_child): ?>
                                <ul class="dl-submenu">
                                    <?php foreach ($menu_items as $value):
                                        if ($value->menu_item_parent == $menu_item->ID):?>
                                            <li><a href="<?= $value->url ?>"><?= $value->title ?></a></li>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-sm-6 col-xs-12 text-left">
                <?php if (bgl_helper::get_current_language() == "en_US"): ?>
                <ul class="footer__contacts text-left">
                    <?php else: ?>
                    <ul class="footer__contacts text-right">
                        <?php endif; ?>
                        <li><?= pll__('phone_title'); ?>: <a
                                    href="<?= bgl_helper::get_phone_link(get_field('phone', pll__('contact_page_id'))); ?>"><?= get_field('phone', pll__('contact_page_id')); ?></a>
                        </li>
                        <li><?= pll__('email_title'); ?>: <a
                                    href="<?= bgl_helper::get_email_link(get_field('email', pll__('contact_page_id'))); ?>"><?= get_field('email', pll__('contact_page_id')); ?></a>
                        </li>
                        <li><?= pll__('address_title'); ?>: <?= get_field('address', pll__('contact_page_id')); ?></li>
                    </ul>
            </div>
            <div class="col-lg-6 col-sm-6 col-xs-12 col-xs-12">
                <div class="popUp_social text-right">
                    <ul>
                        <!--                        <li><a href="-->
                        <? //= get_field('social_twitter', pll__('contact_page_id'));
                        ?><!--"><i-->
                        <!--                                        class="fa fa-twitter m-l"></i>-->
                        <? //= pll__('twitter_title');
                        ?><!--</a></li>-->
                        <!--                        <li><a href="-->
                        <? //= get_field('social_facebook', pll__('contact_page_id'));
                        ?><!--"><i-->
                        <!--                                        class="fa fa-facebook-square m-l"></i>-->
                        <? //= pll__('facebook_title');
                        ?><!--</a></li>-->
                        <!--                        <li><a href="-->
                        <? //= get_field('social_youtube', pll__('contact_page_id'));
                        ?><!--"><i-->
                        <!--                                        class="fa fa-youtube-play m-l"></i>-->
                        <? //= pll__('youtube_title');
                        ?><!--</a></li>-->
                        <li><a href="<?= get_field('social_instagram', pll__('contact_page_id')); ?>" target="_blank"><i
                                        class="fa fa-instagram m-l"></i><?= pll__('instagram_title'); ?></a></li>
                        <li><a href="<?= get_field('social_whatsapp', pll__('contact_page_id')); ?>" target="_blank"><i
                                        class="fa fa-whatsapp m-l"></i><?= pll__('whatsapp_title'); ?></a></li>
                        <!--                        <li><a href="-->
                        <? //= get_field('social_aparat', pll__('contact_page_id'));
                        ?><!--"><i-->
                        <!--                                        class="fa fa-play m-l"></i>-->
                        <? //= pll__('aparat_title');
                        ?><!--</a></li>-->
                        <!--                        <li><a href="-->
                        <? //= get_field('social_telegram', pll__('contact_page_id'));
                        ?><!--"><i-->
                        <!--                                        class="fa fa-telegram m-l"></i>-->
                        <? //= pll__('telegram_title');
                        ?><!--</a></li>-->
                        <li><a href="<?= get_field('social_bale', pll__('contact_page_id')); ?>" target="_blank"><i
                                        class="fa fa-superpowers m-l"></i><?= pll__('bale_title'); ?></a></li>
                        <li><a href="<?= get_field('social_sorosh', pll__('contact_page_id')); ?>" target="_blank"><i
                                        class="fa fa-ravelry m-l"></i><?= pll__('sorosh_title'); ?></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- PopUP Menu -->