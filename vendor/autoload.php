<?php

spl_autoload_register('gg_notify_autoload');

function gg_notify_autoload($class) {
    $namespace = 'inc';
    
    // Base directory para as classes no namespace
    $base_dir = plugin_dir_path(__FILE__) . '../';
    
    // Converte o namespace e a classe em um caminho do arquivo
    $file = $base_dir . str_replace('\\', '/', $class) . '.php';
    // Verifica se o arquivo existe e o inclui
    if (file_exists($file)) {
        require $file;
    }
}