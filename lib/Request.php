<?php

require THEME_ROOT . '/lib/Inflector.php';
require THEME_ROOT . '/lib/View.php';

/**
 * Handle requests for various parts of the blog and call the appropriate
 * controller, followed by outputting that controller's view
 *
 * @author Jonathan Patt <jonathanpatt@gmail.com>
 */
class Request
{
    static public function controller($controllerName)
    {
        get_template_part('controllers/' . $controllerName . '_controller');

        // Generate controller class name from filename passed in
        $controllerClassName = Inflector::camelize($controllerName) . 'Controller';

        // Instantiate controller
        $controllerClass = new $controllerClassName;

        // Call controller's show method
        $viewData = $controllerClass->show();
    }
}
