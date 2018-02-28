<?php

namespace App\Renderer;

function render($path, $params = [])
{
    $dir = [getcwd(), 'resources', 'views', $path];
    $fileExt = '.phtml';
    $absolutPath = implode(DIRECTORY_SEPARATOR, $dir).$fileExt;
    return \App\Template\getPage($absolutPath, $params);
}