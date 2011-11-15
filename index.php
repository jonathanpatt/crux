<?php
/**
 * Front controller
 *
 * NOTE: This file should not be touched unless you really know what you're
 * doing. All it does is do a bit of setup work and then route actions to their
 * appropriate controllers.
 *
 * @author Jonathan Patt <jonathanpatt@gmail.com>
 */

define('THEME_ROOT', __DIR__);

require THEME_ROOT . '/lib/Request.php';

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
}
