<?php
/**
 * Provides an interface for interacting with views
 *
 * @package    WordPress
 * @subpackage Crux
 */
class View
{
    private $viewName;
    private $viewVars = array();

    /**
     * Render a specified view
     *
     * @param string $viewName The name of the view to render
     * @param array  $viewVars Optional assoc. array of variables to pass into view
     * @param string $layout   Optional name of the layout to wrap the view with
     *
     * @return void
     */
    public function render($viewName, Array $viewVars = array(), $layout = 'default')
    {
        $this->viewName = $viewName;
        $this->viewVars += $viewVars;

        // Load and output layout template
        echo $this->loadTemplate('views/layouts/' . $layout . '.php');
    }

    /**
     * Load the content view template and return it
     *
     * This is used by the layout template to load its content.
     *
     * @return string
     */
    private function content()
    {
        return $this->loadTemplate('views/' . $this->viewName . '.php');
    }

    /**
     * Load an element by name, process it, and return it
     *
     * @return string
     */
    private function element($elementName)
    {
        return $this->loadTemplate('views/elements/' . $elementName . '.php');
    }

    /**
     * Load a view template at the specified path, process it, and return it
     *
     * @return string
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
