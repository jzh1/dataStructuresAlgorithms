<?php

if (!function_exists('array_test')){
    function  array_test()
    {
        return 111;
    }
}

if (!function_exists('dd')){
    function dd(...$args)
    {
        http_response_code(500);

        foreach ($args as $x) {
            var_dump($x);
        }

        die(1);
    }
}

if (!function_exists('dump')){
    function dump(...$args)
    {
        http_response_code(500);

        foreach ($args as $x) {
            var_dump($x);
        }
    }
}

