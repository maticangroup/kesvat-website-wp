<?php
require_once "mobileDetect/Mobile_Detect.php";

class bgl_helper
{
    public static function detect_device()
    {
        $detect = new Mobile_Detect;

        if ($detect->isTablet()) {
            return 'tablet';
        } elseif ($detect->isMobile()) {

            return 'mobile';
        } else {
            return 'pc';
        }
    }

    public static function detect_client_country_name()
    {
        $meta = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip=' . $_SERVER['REMOTE_ADDR']));
        return $meta['geoplugin_countryName'];
    }

    public static function detect_client_city_name()
    {
        $meta = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip=' . $_SERVER['REMOTE_ADDR']));
        return $meta['geoplugin_city'];
    }

    public static function detect_client_region_name()
    {
        $meta = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip=' . $_SERVER['REMOTE_ADDR']));
        return $meta['geoplugin_regionName'];
    }

    public static function detect_client_geo_info()
    {
        $meta = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip=' . $_SERVER['REMOTE_ADDR']));
        return $meta;
    }

    public static function detect_client_ip()
    {
        $meta = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip=' . $_SERVER['REMOTE_ADDR']));
        return $meta['geoplugin_request'];
    }

    public static function detect_country_code()
    {
        $meta = unserialize(file_get_contents('http://www.geoplugin.net/php.gp?ip=' . $_SERVER['REMOTE_ADDR']));
        return $meta['geoplugin_countryCode'];
    }

    public static function add_custom_logo_size($name, $sizes)
    {
        $mobileHeight = intval($sizes['mobile']['height']);
        $mobileWidth = intval($sizes['mobile']['width']);

        $tabletHeight = intval($sizes['tablet']['height']);
        $tabletWidth = intval($sizes['tablet']['width']);

        $pcHeight = intval($sizes['pc']['height']);
        $pcWidth = intval($sizes['pc']['width']);

        add_image_size(strtolower($name . '_mobile'), $mobileWidth, $mobileHeight);
        add_image_size(strtolower($name . '_tablet'), $tabletWidth, $tabletHeight);
        add_image_size(strtolower($name . '_pc'), $pcWidth, $pcHeight);
    }

    public static function add_custom_image_size($name, $sizes)
    {
        $mobileHeight = intval($sizes['mobile']['height']);
        $mobileWidth = intval($sizes['mobile']['width']);

        $tabletHeight = intval($sizes['tablet']['height']);
        $tabletWidth = intval($sizes['tablet']['width']);

        $pcHeight = intval($sizes['pc']['height']);
        $pcWidth = intval($sizes['pc']['width']);

        add_image_size(strtolower($name . '_mobile'), $mobileWidth, $mobileHeight, array('center', 'center'));
        add_image_size(strtolower($name . '_tablet'), $tabletWidth, $tabletHeight, array('center', 'center'));
        add_image_size(strtolower($name . '_pc'), $pcWidth, $pcHeight, array('center', 'center'));

    }

    public static function get_image_url($imageObject, $size, $allSizes)
    {
        if (gettype($imageObject) == 'string') {
            if ($imageObject) {
                return $imageObject['sizes'][$size . '_' . bgl_helper::detect_device()];
            } else {
                $imageHeight = $allSizes[bgl_helper::detect_device()]['height'];
                $imageWidth = $allSizes[bgl_helper::detect_device()]['width'];
                return "http://placehold.it/" . $imageHeight . "x" . $imageWidth;
            }
        } else {


            if ($imageObject) {
                return $imageObject['sizes'][$size . '_' . bgl_helper::detect_device()];
            } else {
                $imageHeight = $allSizes[bgl_helper::detect_device()]['height'];
                $imageWidth = $allSizes[bgl_helper::detect_device()]['width'];
                return "http://placehold.it/" . $imageHeight . "x" . $imageWidth;
            }
        }

    }

    public static function get_image_alt($imageObject)
    {

        if ($imageObject) {

            if ($imageObject['alt'] != "") {
                return $imageObject['alt'];
            } else {
                return $imageObject['title'];
            }
        } else {
            return get_bloginfo('name');
        }


    }

    public static function get_logo_alt($imageObject)
    {
        $title = "";
        if ($imageObject['alt'] != "") {
            $title = $imageObject['alt'];
        } else {
            $title = get_bloginfo('name');
        }
        return $title;
    }

    public static function get_current_page_id()
    {
        if (get_queried_object()) {
            return get_queried_object()->ID;
        } else {
            return null;
        }
    }

    public static function get_current_object()
    {
        return get_queried_object();
    }

    public static function get_phone_link($phone)
    {
        return "tel:" . preg_replace('/[^0-9]/', '', $phone);
    }

    public static function get_email_link($email)
    {
        return "mailto:" . $email;
    }

    public static function get_embed_youtube($videoLink)
    {
        $youtubeLinkDefault = explode("=", $videoLink)[1];
        return "https://www.youtube.com/embed/$youtubeLinkDefault?rel=0";
    }

    public static function replace_machine_name($machinName, $label)
    {
        return str_replace('{slug}', $machinName, $label);
    }

    public static function register_custom_post_type($post_type_name, $args)
    {
        pll_register_string($post_type_name . '_name', $post_type_name . '_name', 'System Helper Class Name', false);
        pll_register_string($post_type_name . '_singular_name', $post_type_name . '_singular_name', 'System Helper Class Name', false);
        pll_register_string($post_type_name . '_menu_name', $post_type_name . '_menu_name', 'System Helper Class Name', false);
        pll_register_string($post_type_name . '_name_admin_bar', $post_type_name . '_name_admin_bar', 'System Helper Class Name', false);
        pll_register_string($post_type_name . '_add_new', $post_type_name . '_add_new', 'System Helper Class Name', false);
        pll_register_string($post_type_name . '_add_new_item', $post_type_name . '_add_new_item', 'System Helper Class Name', false);
        pll_register_string($post_type_name . '_new_item', $post_type_name . '_new_item', 'System Helper Class Name', false);
        pll_register_string($post_type_name . '_edit_item', $post_type_name . '_edit_item', 'System Helper Class Name', false);
        pll_register_string($post_type_name . '_view_item', $post_type_name . '_view_item', 'System Helper Class Name', false);
        pll_register_string($post_type_name . '_all_items', $post_type_name . '_all_items', 'System Helper Class Name', false);
        pll_register_string($post_type_name . '_search_items', $post_type_name . '_search_items', 'System Helper Class Name', false);
        pll_register_string($post_type_name . '_parent_item_colon', $post_type_name . '_parent_item_colon', 'System Helper Class Name', false);
        pll_register_string($post_type_name . '_not_found', $post_type_name . '_not_found', 'System Helper Class Name', false);
        pll_register_string($post_type_name . 'not_found_in_trash', $post_type_name . 'not_found_in_trash', 'System Helper Class Name', false);

        $labels = array(
            'name' => bgl_helper::replace_machine_name($post_type_name, pll__($post_type_name . '_name')),
            'singular_name' => bgl_helper::replace_machine_name($post_type_name, pll__($post_type_name . '_singular_name')),
            'menu_name' => bgl_helper::replace_machine_name($post_type_name, pll__($post_type_name . '_menu_name')),
            'name_admin_bar' => bgl_helper::replace_machine_name($post_type_name, pll__($post_type_name . '_name_admin_bar')),
            'add_new' => bgl_helper::replace_machine_name($post_type_name, pll__($post_type_name . '_add_new')),
            'add_new_item' => bgl_helper::replace_machine_name($post_type_name, pll__($post_type_name . '_add_new_item')),
            'new_item' => bgl_helper::replace_machine_name($post_type_name, pll__($post_type_name . '_new_item')),
            'edit_item' => bgl_helper::replace_machine_name($post_type_name, pll__($post_type_name . '_edit_item')),
            'view_item' => bgl_helper::replace_machine_name($post_type_name, pll__($post_type_name . '_view_item')),
            'all_items' => bgl_helper::replace_machine_name($post_type_name, pll__($post_type_name . '_all_items')),
            'search_items' => bgl_helper::replace_machine_name($post_type_name, pll__($post_type_name . '_search_items')),
            'parent_item_colon' => bgl_helper::replace_machine_name($post_type_name, pll__($post_type_name . '_parent_item_colon')),
            'not_found' => bgl_helper::replace_machine_name($post_type_name, pll__($post_type_name . '_not_found')),
            'not_found_in_trash' => bgl_helper::replace_machine_name($post_type_name, pll__($post_type_name . '_not_found_in_trash'))
        );

        $args = array(
            'labels' => $labels,
            'description' => "",
            'public' => $args['is_public'],
            'publicly_queryable' => $args['queryable'],
            'show_ui' => true,
            'show_in_menu' => true,
            'menu_icon' => $args['menu_icon'],
            'query_var' => $args['query_var'],
            'capability_type' => 'post',
            'has_archive' => true,
            'hierarchical' => false,
            'menu_position' => null,
            'supports' => array('title', 'editor')
        );

        register_post_type(strtolower($post_type_name), $args);
    }

    public static function register_custom_taxonomy($taxonomy_name, $post_type_slug, $args)
    {
        $labels = array(
            'name' => $taxonomy_name,
            'singular_name' => $taxonomy_name,
            'search_items' => __('Zoeken ' . $taxonomy_name, 'textdomain'),
            'all_items' => __('Alle ' . $taxonomy_name, 'textdomain'),
            'parent_item' => __('Parent ' . $taxonomy_name, 'textdomain'),
            'parent_item_colon' => __('Parent ' . $taxonomy_name, 'textdomain'),
            'edit_item' => __($taxonomy_name . ' bewerken', 'textdomain'),
            'update_item' => __('Bijwerken ' . $taxonomy_name, 'textdomain'),
            'add_new_item' => __('Nieuw ' . $taxonomy_name, 'textdomain'),
            'new_item_name' => __('Nieuw ' . $taxonomy_name, 'textdomain'),
            'menu_name' => __($taxonomy_name, 'textdomain'),
        );

        $args = array(
            'hierarchical' => true,
            'labels' => $labels,
            'show_ui' => true,
            'show_in_menu' => true,
            'show_in_nav_menus' => true,
            'public' => true,
            'publicly_queryable' => true,
            'show_admin_column' => true,
            'query_var' => true,
            'rewrite' => array('slug' => $args['rewrite']),
            'supports' => array('title')
        );

        register_taxonomy(strtolower($taxonomy_name), $post_type_slug, $args);
    }

    public static function get_all_posts($args)
    {
        $query_arg = array(
            'posts_per_page' => $args['posts_per_page'],
            'post_type' => $args['post_type'],
            'orderby' => array(
                'date' => 'DE',
//                'menu_order' => 'ASC',
                /*Other params*/
            ),
            'post_status' => 'publish',
        );
        $posts_array = new WP_Query($query_arg);
        return $posts_array->posts;
    }

    public static function get_all_terms($term)
    {
        $terms = get_terms(array(
            'taxonomy' => $term['taxonomy'],
            'hide_empty' => $term['hide_empty']
        ));
        $all_terms = new WP_Query($terms);
        return $all_terms->query;
    }

    public static function get_post_terms($postID, $taxonomy)
    {
        return wp_get_post_terms($postID, $taxonomy);
    }

    public static function get_post_main_term($postID, $taxonomy)
    {
        $term = wp_get_post_terms($postID, $taxonomy);
        if ($term) {
            return wp_get_post_terms($postID, $taxonomy)[0];
        } else {
            return "";
        }

    }

    public static function get_page_url($page, $all_pages)
    {
        if ($all_pages != null) {
            return get_permalink($all_pages[$page]);
        } else {
            return "";
        }
    }

    public static function get_page_id($page, $all_pages)
    {
        if ($all_pages != null) {
            return $all_pages[$page];
        } else {
            return "";
        }
    }

    public static function get_menu_has_sub($menuName, $dropDownClass)
    { ?>
        <div>
            <ul class="">
                <?php
                $menu_name = $menuName; //menu slug
                $locations = get_nav_menu_locations();
                $menu = wp_get_nav_menu_object($locations[$menu_name]);
                $menuitems = wp_get_nav_menu_items($menu->term_id, array('order' => 'DESC')); ?>
                <?php foreach ($menuitems as $menuItem): ?>
                    <?php
                    $hasChild = false;
                    foreach ($menuitems as $child) {
                        if ($child->menu_item_parent == $menuItem->ID)
                            $hasChild = true;
                    } ?>
                    <?php if ($menuItem->menu_item_parent == 0): ?>
                        <li class="<?= ($hasChild) ? $dropDownClass : "" ?>">
                            <a href="<?= $menuItem->url ?>"><?= $menuItem->title ?></a>
                            <?php if ($hasChild): ?>
                                <ul class="">
                                    <?php foreach ($menuitems as $subMenuItem): ?>
                                        <?php if ($subMenuItem->menu_item_parent == $menuItem->ID): ?>
                                            <li>
                                                <a href="<?= $subMenuItem->url ?>"><?= $subMenuItem->title ?></a>
                                            </li>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </li>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php }

    public static function get_menu_without_sub($menuName)
    { ?>
        <ul class="">
            <?php
            $currentPage = get_queried_object();
            $menu_name = $menuName; //menu slug
            $locations = get_nav_menu_locations();
            $menu = wp_get_nav_menu_object($locations[$menu_name]);
            $menuitems = wp_get_nav_menu_items($menu->term_id, array('order' => 'DESC')); ?>
            <?php foreach ($menuitems as $menuItem): ?>
                <li>
                    <a href="<?= get_permalink($currentPage->post_name) ?>"><?= $menuItem->title ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php }

    public static function get_current_language()
    {
        return get_locale();
    }

    public static function get_current_languageSearch()
    {
        $translations = pll_the_languages(array('raw' => 1));
        $shortname = explode('_', get_locale());
        foreach ($translations as $translation) {
            if ($shortname[0] == explode('-', $translation['locale'])[0]) {
                return $translation['slug'];
            }
        }
//        $shortname = explode('_', get_locale());
//        if (isset($shortname[0])) {
//            return $shortname[0];
//        } else {
//            return "";
//        }

    }

    public static function get_current_languageSearch_name()
    {
        $translations = pll_the_languages(array('raw' => 1));
        $shortname = explode('_', get_locale());
        foreach ($translations as $translation) {
            if ($shortname[0] == explode('-', $translation['locale'])[0]) {
                return $translation['name'];
            }
        }
    }

    public static function get_home_url()
    {
        return "/";
    }

    public static function register_menu($menuNameAndSlug)
    {
        register_nav_menus($menuNameAndSlug);
    }

    public static function rtl_class($rtlClass, $ltrClass = "")
    {
        if (is_rtl()) {
            return " " . $rtlClass . " ";
        } else {
            return " " . $ltrClass . " ";
        }
    }

    public static function send_mail($to, $subject, $content, $emailFrom)
    {
        $headers[] = "Content-type: text/html; harset=iso-8859-1" . "\r\n";
        $headers[] = "From: " . $emailFrom . " <no-reply@" . $_SERVER['SERVER_NAME'] . ">";
        $headers[] = "MIME-Version: 1.0" . "\r\n";
        wp_mail($to, $subject, $content, $headers);
    }

    public static function get_posts_by_term_id($postType, $taxonomy, $termID)
    {
        $args = array(
            'post_type' => $postType,
            'posts_per_page' => 99999,
            'tax_query' => array(
                'tax_query' => array(
                    'taxonomy' => $taxonomy,
                    'terms' => $termID,
                    'field' => 'id',
                ),
            )
        );

        $posts = get_posts($args);
        return $posts;
    }

    public static function share_buffer($id)
    {
        return "https://bufferapp.com/add?url=" . get_the_permalink($id);
    }

    public static function share_digg_($id)
    {
        return "http://www.digg.com/submit?url=" . get_the_permalink($id);
    }

    public static function share_mail($id)
    {
        return "mailto:?Subject=Simple Share Buttons&amp;Body=I%20saw%20this%20and%20thought%20of%20you!%20" . get_the_permalink($id);
    }

    public static function share_facebook($id)
    {
        return "http://www.facebook.com/sharer.php?u=" . get_the_permalink($id);
    }

    public static function share_google($id)
    {
        return "https://plus.google.com/share?url=" . get_the_permalink($id);
    }

    public static function share_linkedin($id)
    {
        return "http://www.linkedin.com/shareArticle?mini=true&amp;url=" . get_the_permalink($id);
    }

    public static function share_pinterest()
    {
        return "javascript:void((function()%7Bvar%20e=document.createElement('script');e.setAttribute('type','text/javascript');e.setAttribute('charset','UTF-8');e.setAttribute('src','http://assets.pinterest.com/js/pinmarklet.js?r='+Math.random()*99999999);document.body.appendChild(e)%7D)());";
    }

    public static function share_print()
    {
        return "javascript:;";
    }

    public static function share_twitter($id)
    {
        return "https://twitter.com/share?url=" . get_the_permalink($id);
    }

    public static function share_vkontakte($id)
    {
        return " http://www.yummly.com/urb/verify?url" . get_the_permalink($id);
    }

    public static function share_yummly($id)
    {
        return " http://www.yummly.com/urb/verify?url" . get_the_permalink($id);
    }

    //Add menu
    public static function menu_drop_down($menuLocation)
    {
        $menu_name = $menuLocation;
        $location = get_nav_menu_locations();
        $menu = wp_get_nav_menu_object($location[$menu_name]);
        $menu_items = wp_get_nav_menu_items($menu); ?>
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
                    <li class="<?= $class ?>"> <a href="<?= $menu_item->url ?>"><?= $menu_item->title ?></a>
                <?php endif; ?>
                <?php if ($has_child): ?>
                <ul>
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
        <?php
    }

    public static function menu($menuLocation)
    {
        $manuname = $menuLocation;
        $location = get_nav_menu_locations();
        $menu = wp_get_nav_menu_object($location[$manuname]);
        $menuItems = wp_get_nav_menu_items($menu);
        ?>
        <ul>
            <?php foreach ($menuItems as $menuItem): ?>
                <li><a href="<?= $menuItem->url ?>"><?= $menuItem->title ?></a></li>
            <?php endforeach; ?>
        </ul>
        <?php
    }

    public static function social_media($SocialMediaLinks)
    {
        ?>
        <ul>
            <?php foreach ($SocialMediaLinks as $SocialMediaLink): ?>
                <?php $social_media_link = $SocialMediaLink['social_media_link'];
                $social_media_icon = $SocialMediaLink['social_media_icon'];
                ?>
                <li>
                    <?php if ($social_media_link): ?>
                    <a href="<?= $social_media_link; ?>" target="_blank" title="facebook">
                        <i
                                class="<?= $social_media_icon; ?>" aria-hidden="true">
                        </i>
                        <?php endif; ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
        <?php
    }


}