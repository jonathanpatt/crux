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
     * @param string $viewName The name of the view to render
     * @param array  $viewVars Optional assoc. array of variables to pass into view
     * @param string $layout   Optional name of the layout to wrap the view with
     *
     * @return void
     * @author Jonathan Patt <jonathanpatt@gmail.com>
     */
    public function render($viewName, $viewVars = array(), $layout = 'default')
    {
        $this->viewName = $viewName;
        $this->viewVars = $viewVars;

        // Load and output layout template
        echo $this->loadTemplate('views/layouts/' . $layout . '.php');
    }

    /**
     * Load the content view template and return it
     *
     * This is used by the layout template to load its content.
     *
     * @return string
     * @author Jonathan Patt <jonathanpatt@gmail.com>
     */
    private function content()
    {
        return $this->loadTemplate('views/' . $this->viewName . '.php');
    }

    /**
     * Load a view template at the specified path, process it, and return it
     *
     * @return string
     * @author Jonathan Patt <jonathanpatt@gmail.com>
     */
    private function loadTemplate($__path)
    {
        // Import variables to be used in view's scope
        if (is_array($this->viewVars)) {
            extract($this->viewVars);
        }

        // Load and process view, then return it as a string
        ob_start();
        require locate_template($__path);
        return ob_get_clean();
    }
}
