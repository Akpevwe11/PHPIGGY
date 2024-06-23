<?php

declare(strict_types=1);

namespace Framework;

class Router
{
    /**
     * @var array
     */
    private array $routes = [];


public function add(string $method, string $path, array $controller) {

    $path = $this->normalizePath($path);
    $this->routes[] = [
        'path' => $path,
        'method' => strtoupper($method),
        'controller' => $controller
    ];
}

private function normalizePath(string $path): string
{

    $path = trim($path,'/');
    return preg_replace('#[/]{2,}#', '/', $path);

}

public function dispatch(string $path, string $method)
{
    $path = $this->normalizePath($path);
    $method = strtoupper($method);

    echo $path . $method;

}

}