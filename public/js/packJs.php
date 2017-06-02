<?php
/*
|--------------------------------------------------------------------------
| Merge files
|--------------------------------------------------------------------------
|
*/
    $files = [
         // LIBRARIES
        'Lib/jquery.js',
        'Lib/underscore.js',
        'Lib/handlebars.js',
        'Lib/handlebars.hydrotech.js',
        'Lib/backbone.js',
        'Lib/backbone.hydrotech.js',
        'main.js'
    ];
    $folders = [
        'Views',
        'Models'
    ];

    $js = '';
    foreach ($files as $file) {
        $js .= file_get_contents($file) . "\n";
    }
    foreach ($folders as $folder) {
        foreach (glob($folder . '/*.js') as $file) {
            $js .= file_get_contents($file) . "\n";
        }
    }


/*
|--------------------------------------------------------------------------
| Regroupe toutes les templates en une seule varaiable Js global
|--------------------------------------------------------------------------
|
*/
    $templates = array();
    $dirTemplate = 'Templates/';
    foreach (glob($dirTemplate . '*.html') as $filename) {
        $viewName = str_ireplace('.html', '', $filename);
        $viewName = substr($viewName, strlen($dirTemplate));
        $content = file_get_contents($filename);
        $templates[$viewName] = preg_replace('/\s+/u', ' ', $content);
    }
    $jsonTemplate = json_encode($templates);


    header("Content-type: application/javascript");
    echo "var TMPL = {$jsonTemplate};\n";
    echo $js;
