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

if (is_front_page && is_home()) {
    // Main blog page

} else if (is_front_page() && is_page()) {
    // Main static page

} else if (is_single()) {
    // Single post

} else if (is_page()) {
    // Single page

} else if (is_archive()) {
    // Archive page

}
