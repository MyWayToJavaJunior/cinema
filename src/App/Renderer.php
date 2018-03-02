<?php

namespace App\Renderer;

function render($path, $params = [])
{
    $dir = [dirname(getcwd(), 1), 'resources', 'views', $path];
    $fileExt = '.phtml';
    $absolutPath = implode(DIRECTORY_SEPARATOR, $dir).$fileExt;
    return \App\Template\getPage($absolutPath, $params);
}