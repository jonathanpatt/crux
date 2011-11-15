<?php
/**
 * Provides an interface for interacting with views
 *
 * @package    WordPress
 * @subpackage Crux
 * @author     Jonathan Patt <jonathanpatt@gmail.com>
 */
class View
{
    private $viewName;

    /**
     * Render a specified view
     *
     * Note: Local variables are prefixed with two underscores to reduce the
     * change of variable collision due to the use of the extract() function,
     * which converts an associative array of variables to actual local
     * variables in scope.
     *
     * @param string $__viewName The name of the view to render
     * @param array  $__viewVars Optional assoc. array of variables to pass into view
     * @param string $__layout   Optional name of the layout to wrap the view with
     *
     * @return void
     * @author Jonathan Patt <jonathanpatt@gmail.com>
     */
    public function render($__viewName, $__viewVars = array(), $__layout = 'default')
    {
        $this->viewName = $__viewName;

        // Import variables from the $variables array to be used in view's scope
        // Note: This is done before importing the layout to ensure the layout can
        // make use of these variables as well.
        if (is_array($__viewVars)) {
            extract($__viewVars);
        }

        // Load layout template
        require locate_template('views/layouts/' . $__layout . '.php');
    }

    /**
     * Load a view template and return it
     *
     * @return string
     * @author Jonathan Patt <jonathanpatt@gmail.com>
     */
    private function content()
    {
        // Load and process view, then return it as a string
        ob_start();
        require locate_template('views/' . $this->viewName . '.php');
        return ob_get_clean();
    }
}
