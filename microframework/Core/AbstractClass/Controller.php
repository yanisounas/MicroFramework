<?php

namespace MicroFramework\Core\AbstractClass;

use MicroFramework\Core\Response\View;

abstract class Controller
{
    public function view(string $path, array $args = null, bool $extract = true)
    {
        return (new View($path))->render($args, $extract);
    }
}