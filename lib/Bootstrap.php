<?php

if (version_compare(get_bloginfo('version'), '3.2.1', '<')) {
    wp_die('<b>Error:</b> The crux theme framework requires WordPress 3.2.1 or greater.');
}

if (!is_child_theme()) {
    wp_die('<b>Error:</b> The crux theme framework can only be used via a child theme.');
}

get_template_part('lib/Dispatch');
