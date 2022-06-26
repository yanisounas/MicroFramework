<?php

namespace MicroFramework\Core;

class Application
{
    private array $controllers;

    public function __construct(private readonly string $envDir, string...$constrollers)
    {
        ini_set("display_errors", 1);
        $this->controllers = $constrollers;
    }

    public function loadEnv(): Application
    {
        $dotenv = \Dotenv\Dotenv::createImmutable($this->envDir);
        $dotenv->load();
        return $this;

    }

    /**
     * @throws Router\Exceptions\RouteNameAlreadyDeclared
     * @throws Router\Exceptions\MethodNotSupported
     * @throws \ReflectionException
     * @throws Router\Exceptions\RouteNotFound
     */
    public function listenRoutes(): Application
    {
        $router = new \MicroFramework\Core\Router\Router((empty($_GET["route"])) ? "/" : $_GET["route"]);
        $router->getRouteFromController(...$this->controllers);
        $router->listen();
        return $this;

    }


    public function start(): Application
    {
        $this->loadEnv()->listenRoutes();
        return $this;
    }
}