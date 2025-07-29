<?php
namespace Core;

class View
{
    public static function render($view, $data = [], $layout = 'layouts/main')
    {
        $viewPath = __DIR__ . '/../app/views/' . str_replace('.', '/', $view) . '.php';
        $layoutPath = __DIR__ . '/../app/views/' . str_replace('.', '/', $layout) . '.php';

        if (!file_exists($viewPath)) {
            die("View [$view] not found.");
        }

        extract($data);
        ob_start();
        require $viewPath;
        $content = ob_get_clean();

        if (file_exists($layoutPath)) {
            require $layoutPath;
        } else {
            echo $content;
        }
    }
}
