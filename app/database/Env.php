<?php
 
function loadEnv($path) {
    if (!file_exists($path)) return;
 
    $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
   
    foreach ($lines as $line) {
        $line = trim($line);
        if ($line === '' || strpos($line, '#') === 0) continue;

        if (!str_contains($line, '=')) continue;
 
        list($name, $value) = explode('=', $line, 2);
        $name = trim($name);
        $value = trim($value, "'\" ");
 
        if ($name === '') continue;
 
        putenv("$name=$value");
        $_ENV[$name] = $value;
        $_SERVER[$name] = $value;
    }
}