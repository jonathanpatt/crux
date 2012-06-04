<?php

get_template_part('lib/Inflector');
get_template_part('lib/View');

/**
 * Handle requests for various parts of the blog and call the appropriate
 * controller, followed by outputting that controller's view
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

        // Call controller's show method, saving any returned data
        $viewVars = $controllerClass->show();

        // Create and render view
        $view = new View;
        $view->render($controllerName, $viewVars);
    }
}
