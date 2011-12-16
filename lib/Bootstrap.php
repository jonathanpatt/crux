<?php

if (version_compare(get_bloginfo('version'), '3.2.1', '<')) {
    wp_die('<b>Error:</b> The crux theme framework requires WordPress 3.2.1 or greater.');
}

if (!is_child_theme()) {
    wp_die('<b>Error:</b> The crux theme framework can only be used via a child theme.');
}

define('THEME_ROOT', dirname(dirname(__FILE__)));

require THEME_ROOT . '/lib/Request.php';

class Bootstrap
{
    static public function dispatch($controller = null)
    {
        if ($controller) {
            Request::controller($controller);
        } else {
            if (is_home()) {
                // Main blog page
                Request::controller('blog');
            } else if (is_front_page() && is_page()) {
                // Main static page
                Request::controller('page');
            } else if (is_single()) {
                // Single post
                Request::controller('post');
            } else if (is_page()) {
                // Single page
                Request::controller('page');
            } else if (is_archive()) {
                // Archive page
                Request::controller('archive');
            } else if (is_search()) {
                // Search page
                Request::controller('search');
            }
        }
    }
}
