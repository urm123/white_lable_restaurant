<?php

if (! function_exists('setting')) {

    function setting($key, $default = null)
    {
        if (is_null($key)) {
            return new \App\SiteSetting();
        }

        if (is_array($key)) {
            return \App\SiteSetting::set($key[0], $key[1]);
        }

        $value = \App\SiteSetting::get($key);

        return is_null($value) ? value($default) : $value;
    }
}
