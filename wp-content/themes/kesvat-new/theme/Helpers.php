<?php
if (!function_exists('assets')) {
    function assets($name, $echo = true)
    {
        $asset = get_bloginfo('template_url') . '/' . $name;
        if ($echo)
            echo $asset;
        else
            return $asset;
    }
}

if (!function_exists('get_featured_img_url')) {
    function get_featured_img_url($size = "thumbnail", $post_id = null)
    {
        $post_id = $post_id === null ? get_the_ID() : $post_id;
        $img = wp_get_attachment_image_src(get_post_thumbnail_id($post_id), $size);
        return $img ? $img[0] : "";
    }
}

if (!function_exists('theme_field')) {
    function theme_field($field, $id = 0, $default = '')
    {
        if (!function_exists('get_field'))
            return $default;

        $val = $id ? get_field($field, $id) : get_field($field);
        return $val ? $val : $default;
    }
}

if (!function_exists('text_excerpt')) {
    function text_excerpt($text, $length, $end)
    {
        $text = strip_tags(trim($text));
        if ($length > strlen($text)) {
            return $text;
        }
        $text = mb_substr($text, 0, $length, "utf-8");
        $text = mb_substr($text, 0, strripos($text, " "), "utf-8");
        $text = $text . $end;
        return $text;
    }
}

if (!function_exists('dd')) {
    function dd($param)
    {
        echo '<pre />';
        print_r($param);
        die();
    }
}

if (!function_exists('custom_excerpt')) {
    function custom_excerpt($length, $end, $format = false)
    {
        $text = get_the_content();
        $text = strip_tags($text);
        $text = preg_replace('`\[[^\]]*\]`', '', $text);
        $text = strip_shortcodes($text);

        if ($length > strlen($text)) {
            return $format ? nl2br(trim($text)) : $text;
        }

        $text = substr($text, 0, $length);
        $text = substr($text, 0, strripos($text, " "));
        $text = $text . $end;

        return $format ? nl2br(trim($text)) : $text;
    }
}

if (!function_exists('page_title')) {
    function page_title($separator = "/")
    {
        global $page, $paged;
        wp_title(" $separator ", true, 'right');
    }
}

if (!function_exists('update_theme_field')) {
    function update_theme_field($key, $value, $id)
    {
        if (!function_exists('update_field'))
            return;

        $id ? update_field($key, $value, $id) : update_field($key, $value);
    }
}
