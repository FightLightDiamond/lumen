<?php
/**
 * Created by PhpStorm.
 * User: e
 * Date: 12/29/16
 * Time: 2:16 PM
 */

if ( ! function_exists('config_path'))
{
    /**
     * Get the configuration path.
     *
     * @param  string $path
     * @return string
     */
    function config_path($path = '')
    {
        return app()->basePath() . '/config' . ($path ? '/' . $path : $path);
    }
}