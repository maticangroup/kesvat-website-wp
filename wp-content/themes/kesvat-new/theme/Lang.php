<?php

namespace Theme;

class Lang {

    protected $_translate = array();

    public function __construct() {
        /*define('ICL_DONT_LOAD_NAVIGATION_CSS', true);
        define('ICL_DONT_LOAD_LANGUAGE_SELECTOR_CSS', true);
        define('ICL_DONT_LOAD_LANGUAGES_JS', true);*/
    }

    public static function all() {
        if (!function_exists('icl_get_languages'))
            return null;
        $languages = icl_get_languages('skip_missing=0');

        $array = array();
        foreach ($languages as $l) {
            if (!$l['active'])
                $array[$l['language_code']] = $l['url'];
        }

        return $array;
    }

    public static function current() {
        return defined("ICL_LANGUAGE_CODE") ? ICL_LANGUAGE_CODE : "";
    }

    public static function is($lang) {
        return defined("ICL_LANGUAGE_CODE") AND ICL_LANGUAGE_CODE == $lang;
    }

    public static function locale() {
        return get_locale();
    }

    public static function translatePostId($postId) { // poly lang
        global $polylang;
        $lang = self::current();
        $t = $polylang->get_translations('post', $postId);
        return isset($t[$lang]) ? $t[$lang] : $postId;
    }

    public static function translateTermId($termId) {
        return pll_get_term($termId) ? pll_get_term($termId) : $termId;
    }

    public static function dir() {
        return isset($GLOBALS['wp_locale']->text_direction) ? $GLOBALS['wp_locale']->text_direction : 'ltr';
    }
}