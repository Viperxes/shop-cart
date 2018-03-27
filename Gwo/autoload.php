<?php

spl_autoload_register(function ($className) {
    $parts = explode('\\', $className);
    $path = implode('/', $parts) . '.php';
    if (strtolower($parts[0]) === 'gwo') {
        require_once $path;
    }
});
