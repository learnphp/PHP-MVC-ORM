<?php
namespace Core;

class Router
{
    protected $routes = [];

    public function get($uri, $action)
    {
        $this->addRoute('GET', $uri, $action);
    }

    public function post($uri, $action)
    {
        $this->addRoute('POST', $uri, $action);
    }

    protected function addRoute($method, $uri, $action)
    {
        $this->routes[$method][$uri] = $action;
    }

    public function dispatch($uri, $method)
    {
        $uri = strtok($uri, '?');

        if (isset($this->routes[$method][$uri])) {
            $action = $this->routes[$method][$uri];
            $this->callAction($action);
        } else {
            http_response_code(404);
            echo json_encode(["error" => "Route not found"]);
        }
    }

    protected function callAction($action)
    {
        if (is_callable($action)) {
            call_user_func($action);
            return;
        }

        if (is_string($action) && strpos($action, '@') !== false) {
            [$controllerName, $method] = explode('@', $action);
            $controllerClass = 'App\\Controllers\\' . $controllerName;

            if (class_exists($controllerClass)) {
                $controller = new $controllerClass();
                if (method_exists($controller, $method)) {
                    call_user_func([$controller, $method]);
                } else {
                    echo "Method $method not found in controller $controllerName";
                }
            } else {
                echo "Controller $controllerClass not found";
            }
        } else {
            echo "Invalid route action";
        }
    }
}
