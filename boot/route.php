<?php

use Yjtec\Linphe\Router;

if (php_sapi_name() == "cli") { // 只允许在cli下面运行 
    if (!class_exists('\\Redis', false)) {
        die('必须开启Redis扩展' . PHP_EOL);
    }
    Router::cli("/cli(\/.*)*/u", "app\\cli", 'start');
} else {
    Router::get("/index(\/.*)*/u", "app\\index", 'index');
    Router::get("//u", "app\\index", 'index');
}
