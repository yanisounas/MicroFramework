<?php

namespace MicroFramework\Core\AbstractClass;

use MicroFramework\Core\Response\View;

abstract class Controller
{
    public function view(string $path, mixed ...$args)
    {
        return (new View($path))->render(args:(empty($args)) ? null : $args[0]);
    }
}