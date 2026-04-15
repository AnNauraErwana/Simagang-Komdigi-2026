<?php

if (!function_exists('storage_url')) {

    function storage_url($path = null)
    {
        $baseUrl = rtrim(config('app.url', 'http://localhost'), '/');
        
        $baseUrl = str_replace('/public', '', $baseUrl);
        
        if ($path) {
            $path = ltrim($path, '/');
            return $baseUrl . '/storage/' . $path;
        }
        
        return $baseUrl . '/storage';
    }
}

