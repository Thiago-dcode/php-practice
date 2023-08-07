<?php

namespace core;

use Core\Exception\ViewNotFoundException;


class View
{



    public static function render($view, $params)
    {
        $path = basePath('views/') . $view . '.view.php';

        if (!file_exists($path)) {
            throw new ViewNotFoundException("The view: {$view} given does not exists: " . $path);
        }

        extract($params);

        require basePath('views/') . $view . '.view.php';
    }
}
