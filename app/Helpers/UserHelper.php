<?php

if (!function_exists('generateUserName')) {
    function generateUserName($email)
    {
        // Example: take part before @ and append random number
        $base = strstr($email, '@', true);
        $random = rand(100, 999);
        return strtolower($base . $random);
    }
}