<?php
get_template_part('lib/Request');

class Dispatch
{
    /**
     * Route a request to the correct controller
     *
     * If you need to use your own non-standard controller (for example, to
     * support multiple page templates), create a file in your child theme
     * which makes use of Dispatch::route()'s optional $controller parameter to
     * route to your controller.
     *
     *      get_template_part('lib/Bootstrap');
     *      Dispatch::route('custom_controller');
     *
     * To read more about creating your own page templates, read the following
     * page from the WordPress Codex. Note that you will need to include the
     * "Template Name:" comment in order for it to work for this purpose, but
     * it was not included in the example above for technical reasons.
     *
     * http://codex.wordpress.org/Pages#Creating_Your_Own_Page_Templates
     *
     * @param $controller string Optionally route directly to the controller
     *                           specified by name here.
     *
     * @return void
     **/
    static public function route($controller = null)
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
