<?php

if (!function_exists('active_class')) {
    /**
     * Return active class if the current URL matches any of the provided paths.
     *
     * @param  array|string  $paths
     * @param  string  $active
     * @return string
     */
    function active_class($paths, $active = 'active')
    {
        return call_user_func_array('Request::is', (array)$paths) ? $active : '';
    }
}
