<?php

function set_active($uri, $output = 'active')
{
    if (is_array($uri)) {
        foreach ($uri as $url) {
            # code...
            if (Route::is($url)) {
                return $output;
            }
        }
    } else {
        if (Route::is($uri)) {
            return $output;
        }
    }
}
