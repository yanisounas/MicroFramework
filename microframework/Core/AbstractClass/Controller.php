<?php

namespace MicroFramework\Core\AbstractClass;

use MicroFramework\Core\Response\View;

abstract class Controller
{
    public function view(string $path, int $statusCode = null, ?array $args = null, bool $extract = true)
    {
        return (new View($path, $statusCode))->render($args, $extract);
    }
}